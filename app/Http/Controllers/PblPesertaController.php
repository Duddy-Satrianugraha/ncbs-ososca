<?php

namespace App\Http\Controllers;

use App\Models\PblKeg;
use App\Models\PblPeserta;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use App\Imports\ImportPeserta;
use Illuminate\Support\Facades\DB;
use App\Models\PblKelompok;
use Illuminate\Validation\Rule;



class PblPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kid)
    {
         $search = request('search');

    $peserta = PblPeserta::query()
        ->where('keg_id', $kid) // filter ujian dulu
        ->when($search, function ($q) use ($search) {
            $s = trim($search);

            // Contoh: jika input numerik, ikutkan opsi exact match ke NPM
            $q->where(function ($qq) use ($s) {
                $qq->where('name', 'like', "%{$s}%")
                   ->orWhere('npm', 'like', "%{$s}%");

                if (ctype_digit($s)) {
                    $qq->orWhere('npm', $s); // optional exact match
                }
            });
        })
        ->orderBy('kelompok_id', 'asc')
        ->paginate(40)
        ->appends(['search' => $search]); // agar nilai search ikut di pagination links

    $harian = PblKeg::findOrFail($kid);

    return view('pbl.peserta.listu', compact('peserta', 'harian', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($kid)
    {
        $harian = PblKeg::findOrFail($kid);
        $kelompoks = PblKelompok::where('keg_id', $kid)->get();
        return view('pbl.peserta.new', compact('harian', 'kelompoks'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
        {
            $validated = $request->validate([
                'kid'         => ['required','integer', Rule::exists('pbl_kegs','id')],
                'name'        => ['required','string','max:255'],
                'npm'         => [
                    'required','numeric','digits:9',
                    Rule::unique('pbl_pesertas','npm')->where(fn($q) => $q->where('keg_id', $request->kid)),
                ],
                'kelompok_id' => ['required','integer', Rule::exists('pbl_kelompoks','id')],
            ]);

            DB::transaction(function () use ($validated) {

                $keg = PblKeg::lockForUpdate()->findOrFail($validated['kid']);

                $kelompok = PblKelompok::where('id', $validated['kelompok_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if ((int)$kelompok->keg_id !== (int)$validated['kid']) {
                    abort(422, 'Kelompok tidak sesuai dengan kegiatan.');
                }

                PblPeserta::create([
                    'keg_id'        => $validated['kid'],
                    'kelompok_id'   => $kelompok->id,
                    'name'          => $validated['name'],
                    'npm'           => $validated['npm'],
                    'kelompok'      => $kelompok->idkel,
                    'nama_kelompok' => $kelompok->nama_kelompok, // optional (boleh disimpan/atau hapus kalau mau normalisasi)
                    'qrpeserta'     => md5($validated['npm']),
                ]);

                // sinkron jml_peserta untuk kelompok ini (total)
                $jml = PblPeserta::where('keg_id', $validated['kid'])
                    ->where('kelompok_id', $kelompok->id)
                    ->count();

                $kelompok->update(['jml_peserta' => $jml]);

                // sinkron jml_kelompok (total)
                $totalKelompok = PblKelompok::where('keg_id', $validated['kid'])->count();
                $keg->update(['jml_kelompok' => $totalKelompok]);
            });

            return redirect()
                ->route('pbl.peserta.index', $validated['kid'])
                ->with('msg', 'success-Peserta baru berhasil ditambahkan');
        }


    /**
     * Display the specified resource.
     */
    public function show(PblPeserta $pblPeserta)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PblPeserta $pblPeserta)
    {
        $harian = PblKeg::findOrFail($pblPeserta->keg_id);
        $kelompoks = PblKelompok::where('keg_id', $pblPeserta->keg_id)->get();
        return view('pbl.peserta.edit', compact('pblPeserta', 'harian', 'kelompoks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PblPeserta $pblPeserta)
    {
    $validated = $request->validate([
    'kid'         => ['required','integer', Rule::exists('pbl_kegs','id')],
    'name'        => ['required','string','max:255'],
    'npm'         => [
        'required','numeric','digits:9',
        Rule::unique('pbl_pesertas','npm')
            ->ignore($pblPeserta->id)
            ->where(fn($q) => $q->where('keg_id', $pblPeserta->keg_id)),
    ],
    'kelompok_id' => ['required','integer', Rule::exists('pbl_kelompoks','id')],
    ]);

    DB::transaction(function () use ($validated, $pblPeserta) {

        $kegId = (int) $validated['kid'];

        // lock keg
        $keg = PblKeg::lockForUpdate()->findOrFail($kegId);

        // lock kelompok baru
        $newKelompok = PblKelompok::where('id', $validated['kelompok_id'])
            ->where('keg_id', $kegId)
            ->lockForUpdate()
            ->firstOrFail();

        // lock kelompok lama (kalau ada & beda)
        $oldKelompokId = $pblPeserta->kelompok_id ? (int) $pblPeserta->kelompok_id : null;

        $oldKelompok = null;
        if ($oldKelompokId && $oldKelompokId !== (int)$newKelompok->id) {
            $oldKelompok = PblKelompok::where('id', $oldKelompokId)
                ->where('keg_id', $kegId)
                ->lockForUpdate()
                ->first();
        }

        // update data peserta
        $pblPeserta->update([
            'keg_id'        => $kegId,
            'kelompok_id'   => (int) $newKelompok->id,
            'name'          => $validated['name'],
            'npm'           => $validated['npm'],
            'qrpeserta'     => md5($validated['npm']),
            // kolom transisi (boleh kamu hapus nanti kalau sudah bersih)
            'kelompok'      => (int) $newKelompok->idkel,
            'nama_kelompok' => $newKelompok->nama_kelompok,
        ]);

        // ===== sinkron jml_peserta kelompok baru =====
        $newCount = PblPeserta::where('keg_id', $kegId)
            ->where('kelompok_id', (int)$newKelompok->id)
            ->count();

        $newKelompok->update(['jml_peserta' => $newCount]);

        // ===== sinkron kelompok lama (kalau pindah) =====
        if ($oldKelompok) {
            $oldCount = PblPeserta::where('keg_id', $kegId)
                ->where('kelompok_id', (int)$oldKelompok->id)
                ->count();

            if ($oldCount <= 0) {
                $oldKelompok->delete(); // hapus kelompok bila kosong
            } else {
                $oldKelompok->update(['jml_peserta' => $oldCount]);
            }
        }

        // ===== sinkron jml_kelompok keg =====
        $totalKelompok = PblKelompok::where('keg_id', $kegId)->count();
        $keg->update(['jml_kelompok' => $totalKelompok]);
    });

    return redirect()
        ->route('pbl.peserta.index', $validated['kid'])
        ->with('msg', 'success-Data peserta berhasil diupdate');


    }

    /**
     * Remove the specified resource from storage.
     */


public function destroy(PblPeserta $pblPeserta)
    {
        DB::transaction(function () use ($pblPeserta) {

            $kegId = (int) $pblPeserta->keg_id;
            $kelompokId = $pblPeserta->kelompok_id ? (int) $pblPeserta->kelompok_id : null;

            $keg = PblKeg::lockForUpdate()->findOrFail($kegId);

            $kelompok = null;
            if ($kelompokId) {
                $kelompok = PblKelompok::where('id', $kelompokId)
                    ->where('keg_id', $kegId)
                    ->lockForUpdate()
                    ->first();
            }

            // 1) hapus peserta
            $pblPeserta->delete();

            if ($kelompok) {
                // 2) hitung ulang peserta di kelompok tsb
                $pesertaCount = PblPeserta::where('keg_id', $kegId)
                    ->where('kelompok_id', $kelompokId)
                    ->count();

                if ($pesertaCount <= 0) {
                    // 3) kalau kosong → hapus kelompok
                    $kelompok->delete();
                } else {
                    // 3b) update jml_peserta
                    $kelompok->update(['jml_peserta' => $pesertaCount]);
                }
            }

            // 4) sync total kelompok untuk keg
            $totalKelompok = PblKelompok::where('keg_id', $kegId)->count();
            $keg->update(['jml_kelompok' => $totalKelompok]);
        });

        return redirect()
            ->route('pbl.peserta.index', $pblPeserta->keg_id)
            ->with('msg', 'success-Peserta berhasil dihapus');
    }

    public function upload($kid)
    {
        $harian = PblKeg::find($kid);
        return view('pbl.peserta.import', compact('harian'));
    }

    public function store_uploadxx(Request $request)
        {
            $validated = $request->validate([
                'file' => ['required','file','mimes:xlsx,xls,csv','max:51200'],
                'kid'  => ['required','integer','exists:pbl_kegs,id'],
            ]);

            /**
             * Helper normalisasi nama kelompok
             * - trim spasi
             * - rapikan spasi ganda
             * - samakan huruf besar
             */
            $normKel = function ($s) {
                $s = trim((string) $s);
                $s = preg_replace('/\s+/', ' ', $s);
                return strtoupper($s);
            };

            $dataPeserta = Excel::toCollection(new ImportPeserta, $validated['file']);
            $sheet = $dataPeserta[0] ?? collect();

            // ambil npm untuk cek duplikat DB
            $npms = collect($sheet)->skip(1)->map(function ($row) {
                $row = collect($row);
                return trim((string) $row->get(2, ''));
            })->filter()->all();

            $existing = PblPeserta::where('keg_id', $validated['kid'])
                ->whereIn('npm', $npms)
                ->pluck('npm')
                ->all();

            /**
             * ================================
             * LOAD KELOMPOK DARI DB
             * ================================
             */
            $existingGroups = PblKelompok::where('keg_id', $validated['kid'])
                ->get(['idkel','nama_kelompok']);

            // map: nama_kelompok(normalized) => idkel
            $kelompokMap = [];
            $existingIdkelSet = [];

            foreach ($existingGroups as $g) {
                $key = $normKel($g->nama_kelompok);
                $kelompokMap[$key] = (int) $g->idkel;
                $existingIdkelSet[(int) $g->idkel] = true;
            }

            // idkel berikutnya
            $nextKelompokId = ((int) ($existingGroups->max('idkel') ?? 0)) + 1;

            $pesertaarray = [];
            $seenInThisImport = [];
            $skippedDuplicateInFile = 0;

            // rekap kelompok (khusus peserta BARU)
            // idkel => ['nama_kelompok','jumlah_peserta']
            $kelompokStats = [];

            foreach ($sheet as $key => $row) {
                if ($key < 1) continue;

                $row = collect($row);
                if ($row->filter(fn($v) => !is_null($v) && $v !== '')->isEmpty()) continue;

                $nama = trim((string) $row->get(1, ''));
                $npm  = trim((string) $row->get(2, ''));
                $nama_kel = normKel($row->get(3, ''));

                if ($npm === '') {
                    return back()->withErrors([
                        'file' => "Baris ke-".($key+1).": NPM wajib diisi."
                    ]);
                }

                if ($nama_kel === '') {
                    return back()->withErrors([
                        'file' => "Baris ke-".($key+1).": Nama Kelompok wajib diisi."
                    ]);
                }

                // skip peserta lama
                if (in_array($npm, $existing, true)) continue;

                // skip duplikat di file
                if (isset($seenInThisImport[$npm])) {
                    $skippedDuplicateInFile++;
                    continue;
                }
                $seenInThisImport[$npm] = true;

                // tentukan idkel
                if (!isset($kelompokMap[$nama_kel])) {
                    $kelompokMap[$nama_kel] = $nextKelompokId++;
                }
                $idkel = (int) $kelompokMap[$nama_kel];

                $pesertaarray[] = [
                    'keg_id'        => $validated['kid'],
                    'name'          => $nama,
                    'npm'           => $npm,
                    'kelompok'      => $idkel,
                    'nama_kelompok' => $nama_kel,
                    'qrpeserta'     => md5($npm),
                ];

                // rekap kelompok
                if (!isset($kelompokStats[$idkel])) {
                    $kelompokStats[$idkel] = [
                        'nama_kelompok'  => $nama_kel,
                        'jumlah_peserta' => 0,
                    ];
                }
                $kelompokStats[$idkel]['jumlah_peserta']++;
            }

            // hitung kelompok BARU
            $newKelompokCount = collect(array_keys($kelompokStats))
                ->reject(fn($idkel) => isset($existingIdkelSet[$idkel]))
                ->count();

            /**
             * ================================
             * TRANSACTION
             * ================================
             */
        DB::transaction(function () use ($validated, $pesertaarray, $kelompokStats) {

            // 1) insert peserta
            if (!empty($pesertaarray)) {
                PblPeserta::insert($pesertaarray);
            }

            // 2) upsert kelompok (buat kelompok baru jika ada, update nama/qr jika perlu)
            if (!empty($kelompokStats)) {
                $rowsKelompok = [];

                foreach ($kelompokStats as $idkel => $info) {
                    $rowsKelompok[] = [
                        'keg_id'        => $validated['kid'],
                        'idkel'         => (int) $idkel,
                        'nama_kelompok' => $info['nama_kelompok'],
                        'qr_kelompok'   => md5($validated['kid'].'|'.$idkel.'|'.$info['nama_kelompok']),
                        'jml_peserta'   => 0,// jml_peserta akan disinkron setelah ini (jadi tidak di-set di sini)
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ];
                }

                // upsert tanpa menyentuh jml_peserta (biar tidak ketimpa)
                PblKelompok::upsert(
                    $rowsKelompok,
                    ['keg_id', 'idkel'],
                    ['nama_kelompok', 'qr_kelompok', 'updated_at']
                );
            }

            // 3) sinkron jml_peserta (TOTAL peserta per kelompok di DB)
            $rekap = PblPeserta::select('kelompok', DB::raw('COUNT(*) as jumlah'))
                ->where('keg_id', $validated['kid'])
                ->groupBy('kelompok')
                ->get();

            foreach ($rekap as $r) {
                PblKelompok::where('keg_id', $validated['kid'])
                    ->where('idkel', (int) $r->kelompok)
                    ->update([
                        'jml_peserta' => (int) $r->jumlah,
                        'updated_at'  => now(),
                    ]);
            }

            // (opsional) kalau ada kelompok yang kini tidak punya peserta sama sekali, set ke 0
            // PblKelompok::where('keg_id', $validated['kid'])
            //     ->whereNotIn('idkel', $rekap->pluck('kelompok')->map(fn($v)=>(int)$v))
            //     ->update(['jml_peserta' => 0, 'updated_at' => now()]);

            // 4) sinkron jml_kelompok di pbl_kegs (TOTAL kelompok di DB)
            $totalKelompok = PblKelompok::where('keg_id', $validated['kid'])->count();

            PblKeg::where('id', $validated['kid'])
                        ->update([
                            'jml_kelompok' => $totalKelompok,
                            'updated_at'   => now(),
                        ]);
                });


            return redirect(route('pbl.peserta.index', $validated['kid']))->with(
                'msg',
                'success-Import selesai. '
                .count($pesertaarray).' peserta baru, '
                .$newKelompokCount.' kelompok baru, '
                .$skippedDuplicateInFile.' duplikat di file.'
            );
        }



    public function store_upload(Request $request)
        {
            $validated = $request->validate([
                'file' => ['required','file','mimes:xlsx,xls,csv','max:51200'],
                'kid'  => ['required','integer', Rule::exists('pbl_kegs','id')],
            ]);

            $normKel = function ($s) {
                $s = trim((string) $s);
                $s = preg_replace('/\s+/', ' ', $s);
                return strtoupper($s);
            };

            $dataPeserta = Excel::toCollection(new ImportPeserta, $validated['file']);
            $sheet = $dataPeserta[0] ?? collect();

            // ambil npm untuk cek duplikat DB (skip header)
            $npms = collect($sheet)->skip(1)->map(function ($row) {
                $row = collect($row);
                return trim((string) $row->get(2, '')); // kolom NPM
            })->filter()->all();

            $existingNpms = PblPeserta::where('keg_id', $validated['kid'])
                ->whereIn('npm', $npms)
                ->pluck('npm')
                ->all();

            // load kelompok existing
            $existingGroups = PblKelompok::where('keg_id', $validated['kid'])
                ->get(['id', 'idkel', 'nama_kelompok']);

            // map: NAMA(normalized) => kelompok_id (PK)
            $kelompokMap = [];

            // map transisi: kelompok_id (PK) => idkel
            $kelompokIdToIdkel = [];

            foreach ($existingGroups as $g) {
                $kelompokMap[$normKel($g->nama_kelompok)] = (int) $g->id;
                $kelompokIdToIdkel[(int) $g->id] = (int) $g->idkel;
            }

            $nextIdkel = ((int) ($existingGroups->max('idkel') ?? 0)) + 1;

            $pesertaRows = [];
            $seenInThisImport = [];
            $skippedDuplicateInFile = 0;

            $affectedKelompokIds = [];
            $newKelompokCount = 0;

            DB::transaction(function () use (
                $validated,
                $sheet,
                $normKel,
                &$kelompokMap,
                &$kelompokIdToIdkel,
                &$nextIdkel,
                $existingNpms,
                &$pesertaRows,
                &$seenInThisImport,
                &$skippedDuplicateInFile,
                &$affectedKelompokIds,
                &$newKelompokCount
            ) {

                $keg = PblKeg::lockForUpdate()->findOrFail($validated['kid']);

                foreach ($sheet as $idx => $row) {
                    if ($idx < 1) continue;

                    $row = collect($row);
                    if ($row->filter(fn($v) => !is_null($v) && $v !== '')->isEmpty()) continue;

                    $nama = trim((string) $row->get(1, ''));
                    $npm  = trim((string) $row->get(2, ''));
                    $namaKelompok = $normKel($row->get(3, ''));

                    if ($npm === '') abort(422, "Baris ke-".($idx+1).": NPM wajib diisi.");
                    if ($namaKelompok === '') abort(422, "Baris ke-".($idx+1).": Nama Kelompok wajib diisi.");

                    if (in_array($npm, $existingNpms, true)) continue;

                    if (isset($seenInThisImport[$npm])) {
                        $skippedDuplicateInFile++;
                        continue;
                    }
                    $seenInThisImport[$npm] = true;

                    // kelompok_id: cari/buat
                    if (!isset($kelompokMap[$namaKelompok])) {
                        $new = PblKelompok::create([
                            'keg_id'        => $validated['kid'],
                            'idkel'         => $nextIdkel++,
                            'nama_kelompok' => $namaKelompok,
                            'qr_kelompok'   => md5($validated['kid'].'|'.$namaKelompok.'|'.microtime(true)),
                            'jml_peserta'   => 0,
                        ]);

                        $kelompokMap[$namaKelompok] = (int) $new->id;
                        $kelompokIdToIdkel[(int) $new->id] = (int) $new->idkel; // ✅ transisi
                        $newKelompokCount++;
                    }

                    $kelompokId = (int) $kelompokMap[$namaKelompok];
                    $affectedKelompokIds[$kelompokId] = true;

                    $pesertaRows[] = [
                        'keg_id'        => $validated['kid'],
                        'kelompok_id'   => $kelompokId,
                        'kelompok'      => $kelompokIdToIdkel[$kelompokId] ?? null, // ✅ kolom lama
                        'name'          => $nama,
                        'npm'           => $npm,
                        'nama_kelompok' => $namaKelompok,
                        'qrpeserta'     => md5($npm),
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ];
                }

                if (!empty($pesertaRows)) {
                    PblPeserta::insert($pesertaRows);
                }

                $ids = array_keys($affectedKelompokIds);

                if (!empty($ids)) {
                    $rekap = PblPeserta::select('kelompok_id', DB::raw('COUNT(*) as jumlah'))
                        ->where('keg_id', $validated['kid'])
                        ->whereIn('kelompok_id', $ids)
                        ->groupBy('kelompok_id')
                        ->get();

                    $mapCount = $rekap->keyBy('kelompok_id');

                    foreach ($ids as $kelId) {
                        $count = isset($mapCount[$kelId]) ? (int) $mapCount[$kelId]->jumlah : 0;

                        PblKelompok::where('id', $kelId)
                            ->where('keg_id', $validated['kid'])
                            ->update([
                                'jml_peserta' => $count,
                                'updated_at'  => now(),
                            ]);
                    }
                }

                $totalKelompok = PblKelompok::where('keg_id', $validated['kid'])->count();
                $keg->update(['jml_kelompok' => $totalKelompok]);
            });

            return redirect()
                ->route('pbl.peserta.index', $validated['kid'])
                ->with('msg', 'success-Import selesai. '
                    .count($pesertaRows).' peserta baru, '
                    .$newKelompokCount.' kelompok baru, '
                    .$skippedDuplicateInFile.' duplikat di file.'
                );
        }





}
