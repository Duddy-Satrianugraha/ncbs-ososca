<?php

namespace App\Http\Controllers;


use App\Models\Media;
use App\Models\Otemplate;
use App\Models\Orubrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class OsocaImportController extends Controller
{
    /**
     * Halaman upload import OSOCA
     */
    public function importTemplate()
    {
        return view('admin.otemplate.import'); // buat blade: resources/views/osoca/import.blade.php
    }

    /**
     * Proses i mport file .osoca (zip samaran)
     * Struktur dalam file:
     * - data.json
     * - media/{zip_name}
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => ['required', 'file', 'max:51200'], // 50MB, sesuaikan
        ]);

        $file = $request->file('file');
        $ext  = strtolower($file->getClientOriginalExtension());

        if (!in_array($ext, ['osoca', 'zip'])) {
            return back()->withErrors('File harus berekstensi .osoca (atau .zip).');
        }

        // temp extract selalu disk local
        $tmpExtract = 'tmp/import_osoca_' . uniqid();
        Storage::disk('local')->makeDirectory($tmpExtract);

        // extract zip
        $zip = new ZipArchive();
        if ($zip->open($file->getRealPath()) !== true) {
            Storage::disk('local')->deleteDirectory($tmpExtract);
            return back()->withErrors('File tidak bisa dibuka (zip/osoca tidak valid).');
        }
        $zip->extractTo(Storage::disk('local')->path($tmpExtract));
        $zip->close();

        // data.json
        $jsonLocal = $tmpExtract . '/data.json';
        if (!Storage::disk('local')->exists($jsonLocal)) {
            Storage::disk('local')->deleteDirectory($tmpExtract);
            return back()->withErrors('File tidak valid: data.json tidak ditemukan.');
        }

        $payload = json_decode(Storage::disk('local')->get($jsonLocal), true);
        if (!is_array($payload)) {
            Storage::disk('local')->deleteDirectory($tmpExtract);
            return back()->withErrors('data.json tidak valid (gagal parse).');
        }

        // sesuai JSON export Anda
       $details   = $payload['details'] ?? [];
        $rootMedia = $payload['media'] ?? [];

// dd([
//   'details_count' => count($details),
//   'first_detail_keys' => isset($details[0]) ? array_keys($details[0]) : null,
//   'first_detail_media_count' => count($details[0]['media'] ?? []),
//   'first_media_item' => $details[0]['media'][0] ?? null,
//   'all_extracted_files_sample' => array_slice(Storage::disk('local')->allFiles($tmpExtract), 0, 50),
// ]);

        DB::beginTransaction();
        try {
            $createdTemplates = 0;
            $createdRubriks   = 0;
            $createdMedia     = 0;
            $skippedMedia     = 0;

            foreach ($details as $d) {
                // 1) Append: selalu buat template baru
                $otemplate = Otemplate::create([
                    'user_id'       => auth()->id(),
                    'nama_template' => $d['nama_template'] ?? '',
                    'nomor_station' => (string)($d['nomor_station'] ?? ''),
                    'judul_station' => $d['judul_station'] ?? '',
                    'soal'          => $d['soal'] ?? null,
                    'tugas_mhs'     => $d['tugas_mhs'] ?? null,
                    'mininotes'     => $d['mininotes'] ?? null,
                ]);
                $createdTemplates++;

                // 2) Import media detail ini + mapping token lama -> token baru
               $detailMedia = $d['media'] ?? [];


                [$tokenMap, $mCreated, $mSkipped] = $this->importDetailMedia(
                    $tmpExtract,
                    $otemplate,
                    $detailMedia
                );
                $createdMedia += $mCreated;
                $skippedMedia += $mSkipped;

                // 3) Rewrite token pada konten template
                $otemplate->soal      = $this->rewriteMediaTokens($otemplate->soal, $tokenMap);
                $otemplate->tugas_mhs = $this->rewriteMediaTokens($otemplate->tugas_mhs, $tokenMap);
                $otemplate->mininotes = $this->rewriteMediaTokens($otemplate->mininotes, $tokenMap);
                $otemplate->save();

                // 4) Append rubrik (rewrite token juga di Nilai_0..Nilai_3)
                foreach (($d['rubriks'] ?? []) as $r) {
                    Orubrik::create([
                        'otemplate_id' => $otemplate->id,
                        'urutan'       => (int)($r['urutan'] ?? 0),
                        'name'         => $r['name'] ?? '',
                        'Nilai_0'      => $this->rewriteMediaTokens($r['Nilai_0'] ?? null, $tokenMap),
                        'Nilai_1'      => $this->rewriteMediaTokens($r['Nilai_1'] ?? null, $tokenMap),
                        'Nilai_2'      => $this->rewriteMediaTokens($r['Nilai_2'] ?? null, $tokenMap),
                        'Nilai_3'      => $this->rewriteMediaTokens($r['Nilai_3'] ?? null, $tokenMap),
                        'aktif0'       => (int)($r['aktif0'] ?? 0),
                        'aktif1'       => (int)($r['aktif1'] ?? 0),
                        'aktif2'       => (int)($r['aktif2'] ?? 0),
                        'aktif3'       => (int)($r['aktif3'] ?? 0),
                        'bobot'        => (int)($r['bobot'] ?? 1),
                    ]);
                    $createdRubriks++;
                }
            }

            DB::commit();
            Storage::disk('local')->deleteDirectory($tmpExtract);
            //dd(Storage::disk('local')->allFiles($tmpExtract));
            return redirect()
                ->route('admin.templates.index')
                ->with('msg', "success-Import OSOCA OK. templates={$createdTemplates}, rubriks={$createdRubriks}, media={$createdMedia}, media_skipped={$skippedMedia}");
        } catch (\Throwable $e) {
            DB::rollBack();
            Storage::disk('local')->deleteDirectory($tmpExtract);
            return back()->withErrors('Import gagal: ' . $e->getMessage());
        }
    }

    /**
     * Import media per detail:
     * - ambil file dari zip di media/{zip_name}
     * - simpan ulang ke private/media/{nama_template}_{otemplate_id}/tokenbaru.ext
     * - insert ke tabel media:
     *   paket_id = otemplate_id
     *   tipe = osoca
     *   order = nomor_station
     *
     * @return array [$tokenMap, $createdCount, $skippedCount]
     */
    protected function importDetailMedia(string $tmpExtract, Otemplate $otemplate, array $mediaList): array
{
    $tokenMap = [];
    $created  = 0;
    $skipped  = 0;

    foreach ($mediaList as $m) {
        $oldToken = $m['token'] ?? null;
        $zipName  = $m['zip_name'] ?? null;
        $oldPath  = $m['path'] ?? null; // contoh: media/paket-1-1/8N6z....jpg

        if (!$oldToken) { $skipped++; continue; }

        // kandidat lokasi file di hasil extract (zip berisi data.json + folder media)
        $candidates = [];

        // 1) yang paling ideal: media/{zip_name}
        if ($zipName) $candidates[] = $tmpExtract . '/media/' . ltrim($zipName, '/');
        if ($zipName) {
                $candidates[] = $tmpExtract . '/media/' . basename($zipName);
                $candidates[] = $tmpExtract . '/' . basename($zipName);
            }


        // 2) kadang zip simpan mengikuti old path (relatif)
        if ($oldPath) {
            $p = ltrim(str_replace('\\', '/', $oldPath), '/');
            $candidates[] = $tmpExtract . '/' . $p;           // {tmp}/media/paket-1-1/xxx.jpg
            $candidates[] = $tmpExtract . '/media/' . $p;     // {tmp}/media/media/paket-1-1/xxx.jpg (kalau dobel)
            $candidates[] = $tmpExtract . '/media/' . basename($p); // {tmp}/media/xxx.jpg
        }

        // 3) fallback berdasarkan basename zip_name / basename path (untuk zip yang punya root folder)
        $localFile = null;

        foreach ($candidates as $cand) {
            if (Storage::disk('local')->exists($cand)) {
                $localFile = $cand;
                break;
            }
        }

        if (!$localFile) {
            // cari by basename (scan)
            $tryNames = array_filter([
                $zipName ? basename($zipName) : null,
                $oldPath ? basename(str_replace('\\', '/', $oldPath)) : null,
            ]);

            foreach ($tryNames as $bn) {
                $found = $this->findExtractedFileByBasename($tmpExtract, $bn);
                if ($found) { $localFile = $found; break; }
            }
        }

        if (!$localFile) { $skipped++; continue; }

        // baca file
        $abs = Storage::disk('local')->path($localFile);
        $contents = file_get_contents($abs);

        $ext = pathinfo($abs, PATHINFO_EXTENSION) ?: 'bin';
        $newToken = Str::random(40);

        $disk = 'private';

        // folder tujuan: media/{nama_template}_{id}
        $folderName = str_replace('-', '_', Str::slug($otemplate->nama_template)) . '_' . $otemplate->id;
        $newPath = "media/{$folderName}/{$newToken}.{$ext}";

        Storage::disk($disk)->put($newPath, $contents);

        // order = nomor_station (atau fallback ke m['order'])
        $orderNomor = is_numeric($otemplate->nomor_station)
            ? (int)$otemplate->nomor_station
            : (int)($m['order'] ?? 0);

        // paket_id = otemplate_id (sesuai kebutuhan Anda)
        Media::create([
            'paket_id'      => $otemplate->id,
            'tipe'          => 'osoca',
            'order'         => $orderNomor,
            'token'         => $newToken,
            'disk'          => $disk,
            'path'          => $newPath,
            'original_name' => $m['original_name'] ?? basename($abs),
            'mime'          => $m['mime'] ?? (Storage::disk($disk)->mimeType($newPath) ?: 'application/octet-stream'),
            'size'          => Storage::disk($disk)->size($newPath),
        ]);

        $tokenMap[$oldToken] = $newToken;
        $created++;
    }

    return [$tokenMap, $created, $skipped];
}


    protected function findExtractedFileByBasename(string $tmpExtract, string $basename): ?string
    {
        foreach (Storage::disk('local')->allFiles($tmpExtract) as $p) {
            if (basename($p) === $basename) return $p;
        }
        return null;
    }

    protected function rewriteMediaTokens(?string $html, array $tokenMap): ?string
    {
        if ($html === null || $html === '' || empty($tokenMap)) return $html;

        foreach ($tokenMap as $old => $new) {
            $html = str_replace("/media/{$old}", "/f/{$new}", $html);
            $html = preg_replace(
                '#https?://[^"\s]+/media/' . preg_quote($old, '#') . '#',
                '/f/' . $new,
                $html
            );
        }

        return $html;
    }

    protected function resolveDetailMedia(array $detail, array $rootMedia): array
    {
        // 1) Kalau detail punya media sendiri, pakai itu
        if (!empty($detail['media']) && is_array($detail['media'])) {
            return $detail['media'];
        }

        // 2) Kalau root media kosong, ya sudah
        if (empty($rootMedia) || !is_array($rootMedia)) {
            return [];
        }

        $nomorStation = (string)($detail['nomor_station'] ?? '');
        $idOld = (string)($detail['id_old'] ?? '');

        // 3) Filter root media yg cocok ke detail ini
        $filtered = array_values(array_filter($rootMedia, function ($m) use ($nomorStation, $idOld) {
            if (!is_array($m)) return false;

            $order = (string)($m['order'] ?? '');
            $paketId = (string)($m['paket_id'] ?? '');

            // Cocok kalau:
            // - order == nomor_station (umumnya begitu)
            // - atau paket_id == id_old (kalau export pakai id_old)
            return ($nomorStation !== '' && $order === $nomorStation)
                || ($idOld !== '' && $paketId === $idOld);
        }));

        return $filtered;
    }

}
