<?php

namespace App\Http\Controllers\Pbl;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\PblKeg;
use App\Models\PblMininote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class PblImportController extends Controller
{
    /**
     * Import .pbl (zip) -> update/insert pbl_mininotes + import media + rewrite token di HTML.
     * Paket PBL (pbl_kegs) sudah ada.
     */
    public function importMininotes(Request $request, PblKeg $keg)
    {
        // Jangan pakai mimes:pbl (akan gagal karena MIME zip/octet-stream)
        $request->validate([
            'file' => ['required', 'file', 'max:51200'], // 50MB (sesuaikan)
        ]);

        $file = $request->file('file');

        // Pastikan ekstensi .pbl
        if (strtolower($file->getClientOriginalExtension()) !== 'pbl') {
            return back()->withErrors('File harus berekstensi .pbl');
        }

        // Temp extract selalu di disk local (bukan private), biar Storage::disk('local') konsisten
        $tmpExtract = 'tmp/import_pbl_' . uniqid();
        Storage::disk('local')->makeDirectory($tmpExtract);

        // Extract zip (.pbl disamarkan)
        $zip = new ZipArchive();
        if ($zip->open($file->getRealPath()) !== true) {
            Storage::disk('local')->deleteDirectory($tmpExtract);
            return back()->withErrors('File .pbl tidak valid / tidak bisa dibuka sebagai zip.');
        }

        $zip->extractTo(Storage::disk('local')->path($tmpExtract));
        $zip->close();

        // Read data.json
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

        // === Sesuai format Anda ===
        $details = $payload['detail_pbls'] ?? [];
        $mediaManifest = $payload['media'] ?? [];

        // Mapping file di zip: files -> media_token[token_lama] = "media/pbl_media/xxx.jpg"
        $filesMediaToken = $this->findMediaTokenMap($payload);

        DB::beginTransaction();
        try {
            // 1) Import media (file -> private) + insert DB media + mapping token lama->baru
            [$tokenMap, $mediaStats] = $this->importMediaFromFilesMap(
                $keg,
                $tmpExtract,
                $mediaManifest,
                $filesMediaToken
            );

            // 2) Upsert mininotes + rewrite token dalam HTML
            $inserted = 0;
            $updated  = 0;
            $skipped  = 0;

            foreach ($details as $d) {
                $nomorSk = (string)($d['nomor_sk'] ?? '');
                if ($nomorSk === '') { $skipped++; continue; }

                // Rewrite token pada field yang mengandung HTML
                foreach (['skenario','step_1','step_2','sasbel','mindmap','mininotes'] as $field) {
                    if (isset($d[$field]) && is_string($d[$field])) {
                        $d[$field] = $this->rewriteMediaTokens($d[$field], $tokenMap);
                    }
                }

                // user_id hanya diset saat create (biar update tidak mengubah pemilik)
                $note = PblMininote::firstOrNew([
                    'keg_id'   => $keg->id,
                    'nomor_sk' => $nomorSk,
                ]);

                $isNew = !$note->exists;
                if ($isNew) {
                    $note->user_id = auth()->id();
                }

                $note->fill([
                    'judul_sk'  => $d['judul_sk'] ?? null,
                    'skenario'  => $d['skenario'] ?? null,
                    'step_1'    => $d['step_1'] ?? null,
                    'step_2'    => $d['step_2'] ?? null,
                    'sasbel'    => $d['sasbel'] ?? null,
                    'mindmap'   => $d['mindmap'] ?? null,
                    'mininotes' => $d['mininotes'] ?? null,
                    'dafpus'    => $d['dafpus'] ?? null,
                    // 'status' => $d['status'] ?? $note->status, // opsional
                ]);

                $note->save();

                $isNew ? $inserted++ : $updated++;
            }

            DB::commit();
            Storage::disk('local')->deleteDirectory($tmpExtract);

            // Ringkasan biar gampang ngecek
            return redirect(route('pbl.harian.show', $keg->id))->with('msg', "success-".sprintf(
                "Import OK. mininotes: inserted=%d updated=%d skipped=%d | media: created=%d skipped_not_found=%d skipped_no_map=%d",
                $inserted,
                $updated,
                $skipped,
                $mediaStats['created'] ?? 0,
                $mediaStats['skipped_not_found'] ?? 0,
                $mediaStats['skipped_no_relpath'] ?? 0
            ));
        } catch (\Throwable $e) {
            DB::rollBack();
            Storage::disk('local')->deleteDirectory($tmpExtract);
            return back()->withErrors('Import gagal: ' . $e->getMessage());
        }
    }

    /**
     * Cari mapping files.media_token dari payload Anda (tahan banting untuk bentuk array/object).
     * Target output: [ token_lama => "path/di/zip.ext", ... ]
     */
    protected function findMediaTokenMap(array $payload): array
    {
        // Case: files[0]['media_token']
        if (isset($payload['files'][0]['media_token']) && is_array($payload['files'][0]['media_token'])) {
            return $payload['files'][0]['media_token'];
        }

        // Case: files['media_token']
        if (isset($payload['files']['media_token']) && is_array($payload['files']['media_token'])) {
            return $payload['files']['media_token'];
        }

        // Case: files is list, cari item yang punya media_token
        if (isset($payload['files']) && is_array($payload['files'])) {
            foreach ($payload['files'] as $item) {
                if (is_array($item) && isset($item['media_token']) && is_array($item['media_token'])) {
                    return $item['media_token'];
                }
            }
        }

        // Case: media_token ada di root
        if (isset($payload['media_token']) && is_array($payload['media_token'])) {
            return $payload['media_token'];
        }

        return [];
    }

    /**
     * Import media dari:
     * - $mediaManifest: array of media metadata (punya token, order, original_name, mime, size, dll)
     * - $filesMediaToken: map token_lama => path_file_di_zip
     *
     * Output:
     * - $map: token_lama => token_baru (untuk rewrite di HTML)
     * - $stats: ringkasan created / skipped
     */
    protected function importMediaFromFilesMap(PblKeg $keg, string $tmpExtract, array $mediaManifest, array $filesMediaToken): array
    {
        $map = [];
        $stats = [
            'manifest' => count($mediaManifest),
            'files_map' => is_array($filesMediaToken) ? count($filesMediaToken) : 0,
            'created' => 0,
            'skipped_no_token' => 0,
            'skipped_no_relpath' => 0,
            'skipped_not_found' => 0,
        ];

        // Jika mapping kosong, kita tidak bisa pindahkan file (tapi import mininotes tetap jalan)
        if (empty($filesMediaToken) || !is_array($filesMediaToken)) {
            // tetap return stats, jangan throw
            return [$map, $stats];
        }

        foreach ($mediaManifest as $m) {
            $oldToken = $m['token'] ?? null; // token lama dari paket
            if (!$oldToken) { $stats['skipped_no_token']++; continue; }

            $relPath = $filesMediaToken[$oldToken] ?? null; // path file di zip
            if (!$relPath) { $stats['skipped_no_relpath']++; continue; }

            $localFile = $tmpExtract . '/' . ltrim($relPath, '/');

            // Jika file tidak ketemu, kemungkinan zip punya root folder.
            // Kita coba fallback: cari file berdasarkan basename di seluruh tmpExtract.
            if (!Storage::disk('local')->exists($localFile)) {
                $basename = basename($relPath);
                $found = $this->findExtractedFileByBasename($tmpExtract, $basename);

                if ($found) {
                    $localFile = $found;
                } else {
                    $stats['skipped_not_found']++;
                    continue;
                }
            }

            $abs = Storage::disk('local')->path($localFile);
            $contents = file_get_contents($abs);

            $ext = pathinfo($abs, PATHINFO_EXTENSION) ?: 'bin';
            $newToken = Str::random(40);

            $disk = 'private';
            Storage::disk($disk)->makeDirectory('media');

            // Simpan file ke disk private
            $folderName = Str::slug($keg->name) . '_' . $keg->id;

            $newPath = "media/{$folderName}/{$newToken}.{$ext}";
            Storage::disk($disk)->put($newPath, $contents);

            // order = nomor_sk (di export Anda sudah ada order)
            $orderNomorSk = $m['order'] ?? 0;

            // Insert DB media
            Media::create([
                'paket_id'      => $keg->id,
                'tipe'          => 'pbl',
                'order'         => is_numeric($orderNomorSk) ? (int)$orderNomorSk : 0,
                'token'         => $newToken,
                'disk'          => $disk,
                'path'          => $newPath,
                'original_name' => $m['original_name'] ?? basename($abs),
                'mime'          => $m['mime'] ?? (Storage::disk($disk)->mimeType($newPath) ?: 'application/octet-stream'),
                'size'          => Storage::disk($disk)->size($newPath),
            ]);

            $map[$oldToken] = $newToken;
            $stats['created']++;
        }

        return [$map, $stats];
    }

    /**
     * Cari file di folder hasil extract berdasarkan basename (fallback untuk zip yang punya root folder).
     * Return path relatif (di disk local) jika ketemu, atau null.
     */
    protected function findExtractedFileByBasename(string $tmpExtract, string $basename): ?string
    {
        // Hati-hati: allFiles bisa banyak, tapi untuk paket kecil aman.
        $all = Storage::disk('local')->allFiles($tmpExtract);
        foreach ($all as $p) {
            if (basename($p) === $basename) {
                return $p; // path relatif disk local
            }
        }
        return null;
    }

    /**
     * Rewrite token media pada HTML:
     * - /media/OLDTOKEN -> /media/NEWTOKEN
     * - https://domain/.../media/OLDTOKEN -> /media/NEWTOKEN
     */
    protected function rewriteMediaTokens(string $html, array $tokenMap): string
    {
        if (empty($tokenMap)) return $html;

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


    public function import(int $keg)
    {
        //dd($keg);
         $harian = PblKeg::find($keg);
        return view('pbl.keg.import', compact('harian'));
    }
}
