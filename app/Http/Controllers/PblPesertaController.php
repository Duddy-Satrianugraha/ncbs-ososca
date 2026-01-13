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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
                'kid'  => ['required','integer','exists:pbl_kegs,id'], // pastikan exists sesuai tabel kamu
            ]);

            $dataPeserta = Excel::toCollection(new ImportPeserta, $validated['file']);
            $sheet = $dataPeserta[0] ?? collect();

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

            // auto kelompok (berdasarkan urutan nama kelompok muncul)
            $kelompokMap = [];
            $nextKelompokId = 1;

            // untuk hitung kelompok unik yang benar-benar terinsert
            $kelompokNamaSet = [];

            foreach ($sheet as $key => $row) {
                if ($key < 1) continue;

                $row = collect($row);
                if ($row->filter(fn($v) => !is_null($v) && $v !== '')->isEmpty()) continue;

                $nama     = trim((string) $row->get(1, ''));
                $npm      = trim((string) $row->get(2, ''));
                $nama_kel = trim((string) $row->get(3, ''));

                if ($npm === '') {
                    return back()->withErrors(['file' => "Baris ke-".($key+1).": NPM wajib diisi."]);
                }
                if ($nama_kel === '') {
                    return back()->withErrors(['file' => "Baris ke-".($key+1).": Nama Kelompok wajib diisi."]);
                }

                if (in_array($npm, $existing, true)) continue;

                if (isset($seenInThisImport[$npm])) {
                    $skippedDuplicateInFile++;
                    continue;
                }
                $seenInThisImport[$npm] = true;

                if (!isset($kelompokMap[$nama_kel])) {
                    $kelompokMap[$nama_kel] = $nextKelompokId++;
                }
                $kelompok = $kelompokMap[$nama_kel];

                $pesertaarray[] = [
                    'keg_id'        => $validated['kid'],
                    'name'          => $nama,
                    'npm'           => $npm,
                    'kelompok'      => $kelompok,
                    'nama_kelompok' => $nama_kel,
                    'qrpeserta'     => md5($npm),
                ];

                // hitung unik berdasarkan nama kelompok (hanya yang terinsert)
                $kelompokNamaSet[$nama_kel] = true;
            }

            $inserted = count($pesertaarray);
            $skippedExisting = count($existing);
            $jumlahKelompokImport = count($kelompokNamaSet);

            DB::transaction(function () use ($pesertaarray, $validated, $jumlahKelompokImport) {
                if (count($pesertaarray)) {
                    PblPeserta::insert($pesertaarray);
                }

                // UPDATE ke tabel pbl_kegs
                PblKeg::where('id', $validated['kid'])
                    ->update(['jml_kelompok' => $jumlahKelompokImport]);
            });

            return redirect(route('pbl.peserta.index', $validated['kid']))->with(
                'msg',
                'success-Import selesai. '
                .$inserted.' baris baru dimasukkan, '
                .$skippedExisting.' baris dilewati (duplikat di DB), '
                .$skippedDuplicateInFile.' baris dilewati (duplikat di file). '
                .'Kelompok diimport: '.$jumlahKelompokImport
            );
        }



public function store_upload(Request $request)
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

    // auto kelompok (urut kemunculan nama kelompok)
    $kelompokMap = [];
    $nextKelompokId = 1;

    // rekap untuk pbl_kelompoks (yang BARU diimport)
    // key: kelompok(int) => ['nama_kelompok'=>string, 'jumlah_peserta'=>int]
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

        // mapping nama_kelompok -> id kelompok otomatis
        if (!isset($kelompokMap[$nama_kel])) {
            $kelompokMap[$nama_kel] = $nextKelompokId++;
        }
        $kelompok = $kelompokMap[$nama_kel];

        // data peserta yang akan diinsert
        $pesertaarray[] = [
            'keg_id'        => $validated['kid'],
            'name'          => $nama,
            'npm'           => $npm,
            'kelompok'      => $kelompok,
            'nama_kelompok' => $nama_kel,
            'qrpeserta'     => md5($npm),
        ];

        // rekap per kelompok (hanya yang akan diinsert)
        if (!isset($kelompokStats[$kelompok])) {
            $kelompokStats[$kelompok] = [
                'nama_kelompok'  => $nama_kel,
                'jumlah_peserta' => 0,
            ];
        }
        $kelompokStats[$kelompok]['jumlah_peserta']++;
    }

    $inserted = count($pesertaarray);
    $skippedExisting = count($existing);


DB::transaction(function () use (
    $validated,
    $pesertaarray,
    $kelompokStats
) {

    // 1) insert peserta
    if (count($pesertaarray)) {
        PblPeserta::insert($pesertaarray);
    }

    // 2) insert / update pbl_kelompoks
    if (count($kelompokStats)) {
        $rowsKelompok = [];
        foreach ($kelompokStats as $kelompok => $info) {
            $rowsKelompok[] = [
                'keg_id'         => $validated['kid'],
                'idkel'       => $kelompok,
                'nama_kelompok'  => $info['nama_kelompok'],
                'jml_peserta' => $info['jumlah_peserta'],
                'qr_kelompok'     => md5($validated['kid']."unique".$info['nama_kelompok']),
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        PblKelompok::upsert(
            $rowsKelompok,
            ['keg_id', 'idkel'],
            ['nama_kelompok', 'jml_peserta', 'updated_at']
        );
    }

    // 3) UPDATE jumlah kelompok ke pbl_kegs
    PblKeg::where('id', $validated['kid'])
        ->update([
            'jml_kelompok' => count($kelompokStats),
        ]);
});


    return redirect(route('pbl.peserta.index', $validated['kid']))->with(
        'msg',
        'success-Import selesai. '
        .$inserted.' baris baru dimasukkan, '
        .$skippedExisting.' baris dilewati (duplikat di DB), '
        .$skippedDuplicateInFile.' baris dilewati (duplikat di file).'
    );
}



}
