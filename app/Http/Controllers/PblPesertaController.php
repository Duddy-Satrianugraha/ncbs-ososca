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
        ->orderBy('id')
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
        return view('pbl.peserta.new', compact('harian'));
    }

    /**
     * Store a newly created resource in storage.
     */



public function store(Request $request)
    {
        $validated = $request->validate([
            'kid'      => ['required','integer', Rule::exists('pbl_kegs','id')],
            'name'     => ['required','string','max:255'],
            'npm'      => [
                'required','numeric','digits:9',
                Rule::unique('pbl_pesertas', 'npm')->where(fn($q) => $q->where('keg_id', $request->kid)),
            ],
            'kelompok' => ['required','integer', Rule::exists('pbl_kelompoks','id')],
        ]);

        try {
            DB::transaction(function () use ($validated) {

                // lock row kelompok supaya aman kalau insert barengan
                $kelompok = PblKelompok::where('id', $validated['kelompok'])
                    ->lockForUpdate()
                    ->firstOrFail();

                // insert peserta
                PblPeserta::create([
                    'keg_id'        => $validated['kid'],
                    'name'          => $validated['name'],
                    'npm'           => $validated['npm'],
                    'kelompok'      => $kelompok->idkel,
                    'nama_kelompok' => $kelompok->nama_kelompok,
                    'qrpeserta'     => md5($validated['npm']),
                ]);

                // hitung ulang peserta DI KEGIATAN INI + kelompok ini
                $jml = PblPeserta::where('keg_id', $validated['kid'])
                    ->where('kelompok', $kelompok->idkel)
                    ->count();

                // update jml_peserta
                $kelompok->update(['jml_peserta' => $jml]);
            });

            return redirect()
                ->route('pbl.peserta.index', $validated['kid'])
                ->with('msg', 'success-Peserta baru berhasil ditambahkan');

        } catch (\Throwable $e) {
            return redirect()
                ->route('pbl.peserta.index', $validated['kid'])
                ->with('msg', 'error-Peserta gagal ditambahkan: '.$e->getMessage());
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PblPeserta $pblPeserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

public function destroy(PblPeserta $pblPeserta)
{
    //dd($pblPeserta);
    DB::transaction(function () use ($pblPeserta) {

        $kegId   = $pblPeserta->keg_id;
        $kelKey  = $pblPeserta->kelompok;

        $keg = PblKeg::lockForUpdate()->findOrFail($kegId);
        $pblPeserta->delete();
        $pesertaCount = PblPeserta::where('keg_id', $kegId)
            ->where('kelompok', $kelKey)
            ->count();
        $kelompok = PblKelompok::where('keg_id', $kegId)
            ->where('idkel', $kelKey)
            ->lockForUpdate()
            ->first();

        if ($pesertaCount <= 0) {
            if ($kelompok) {
                $kelompok->delete();
            }
        } else {
            if ($kelompok) {
                $kelompok->update(['jml_peserta' => $pesertaCount]);
            }
        }
        $kelompokCount = PblKelompok::where('keg_id', $kegId)->count();
        $keg->update(['jml_kelompok' => $kelompokCount]);
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




public function store_uploadzxz(Request $request)
    {
        $validated = $request->validate([
            'file' => ['required','file','mimes:xlsx,xls,csv','max:51200'],
            'kid'  => ['required','integer','exists:pbl_kegs,id'],
        ]);

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

        $pesertaarray = [];
        $seenInThisImport = [];
        $skippedDuplicateInFile = 0;

        /**
         * ================================
         * LOAD MAPPING KELOMPOK DARI DB
         * ================================
         * Supaya idkel tidak mulai dari 1 lagi setiap import,
         * dan kelompok baru tidak menimpa kelompok lama.
         */
        $existingGroups = PblKelompok::where('keg_id', $validated['kid'])
            ->get(['idkel','nama_kelompok']);

        // map: nama_kelompok => idkel (yang sudah ada)
        $kelompokMap = $existingGroups->pluck('idkel', 'nama_kelompok')->toArray();

        $existingIdkelSet = $existingGroups
            ->pluck('idkel')
            ->flip() // jadi set
            ->toArray();

        // next idkel = max(idkel) + 1
        $nextKelompokId = ((int)($existingGroups->max('idkel') ?? 0)) + 1;

        // rekap untuk pbl_kelompoks (yang BARU diimport)
        // key: idkel(int) => ['nama_kelompok'=>string, 'jumlah_peserta'=>int]
        $kelompokStats = [];

        foreach ($sheet as $key => $row) {
            if ($key < 1) continue; // skip header

            $row = collect($row);

            // skip baris kosong
            if ($row->filter(fn($v) => !is_null($v) && $v !== '')->isEmpty()) {
                continue;
            }

            $nama     = trim((string) $row->get(1, ''));
            $npm      = trim((string) $row->get(2, ''));
            $nama_kel = trim((string) $row->get(3, ''));

            if ($npm === '') {
                return back()->withErrors(['file' => "Baris ke-".($key+1).": NPM wajib diisi."]);
            }
            if ($nama_kel === '') {
                return back()->withErrors(['file' => "Baris ke-".($key+1).": Nama Kelompok wajib diisi."]);
            }

            // skip jika sudah ada di DB
            if (in_array($npm, $existing, true)) {
                continue;
            }

            // skip duplikat di file
            if (isset($seenInThisImport[$npm])) {
                $skippedDuplicateInFile++;
                continue;
            }
            $seenInThisImport[$npm] = true;

            // mapping nama_kelompok -> idkel otomatis (PAKAI YANG SUDAH ADA DI DB)
            if (!isset($kelompokMap[$nama_kel])) {
                $kelompokMap[$nama_kel] = $nextKelompokId++;
            }
            $idkel = (int) $kelompokMap[$nama_kel];

            // data peserta yang akan diinsert
            $pesertaarray[] = [
                'keg_id'        => $validated['kid'],
                'name'          => $nama,
                'npm'           => $npm,
                'kelompok'      => $idkel,         // simpan idkel ke kolom kelompok peserta
                'nama_kelompok' => $nama_kel,
                'qrpeserta'     => md5($npm),
            ];

            // rekap per kelompok (hanya yang akan diinsert)
            if (!isset($kelompokStats[$idkel])) {
                $kelompokStats[$idkel] = [
                    'nama_kelompok'  => $nama_kel,
                    'jumlah_peserta' => 0,
                ];
            }
            $kelompokStats[$idkel]['jumlah_peserta']++;
        }

        $inserted = count($pesertaarray);
        $skippedExisting = count($existing);

        $newKelompokCount = 0;

        foreach (array_keys($kelompokStats) as $idkel) {
            if (!isset($existingIdkelSet[$idkel])) {
                $newKelompokCount++;
            }
        }

        DB::transaction(function () use ($validated, $pesertaarray, $kelompokStats, $newKelompokCount) {

            // 1) insert peserta
            if (count($pesertaarray)) {
                PblPeserta::insert($pesertaarray);
            }

            // 2) insert / update pbl_kelompoks (rekap import ini)
            if (count($kelompokStats)) {
                $rowsKelompok = [];
                foreach ($kelompokStats as $idkel => $info) {
                    $rowsKelompok[] = [
                        'keg_id'        => $validated['kid'],
                        'idkel'         => $idkel,
                        'nama_kelompok' => $info['nama_kelompok'],
                        'jml_peserta'   => $info['jumlah_peserta'],
                        'qr_kelompok'   => md5($validated['kid']."unique".$info['nama_kelompok']),
                        'created_at'    => now(),
                        'updated_at'    => now(),
                    ];
                }

                PblKelompok::upsert(
                    $rowsKelompok,
                    ['keg_id', 'idkel'],
                    ['nama_kelompok', 'jml_peserta', 'updated_at']
                );
            }

            // 3) UPDATE jumlah kelompok di pbl_kegs (jumlah kelompok yang KEIMPORT kali ini)
            if ($newKelompokCount > 0) {
                    PblKeg::where('id', $validated['kid'])
                        ->increment('jml_kelompok', $newKelompokCount);
                }
        });

        return redirect(route('pbl.peserta.index', $validated['kid']))->with(
            'msg',
            'success-Import selesai. '
            .$inserted.' baris baru dimasukkan, '
            .$skippedExisting.' baris dilewati (duplikat di DB), '
            .$skippedDuplicateInFile.' baris dilewati (duplikat di file).'
        );
    }


public function store_upload(Request $request)
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





}
