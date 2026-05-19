<?php

namespace App\Http\Controllers;

use App\Models\Opeserta;
use App\Models\Oujian;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\Ostation;


use App\Imports\ImportPeserta;



class OpesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $ujian = Oujian::query()
            ->when($search, function ($q, $s) {
                return $q->where('name', 'like', "%{$s}%");
            })
            ->paginate(10);

        return view('admin.opeserta.listadm', compact('ujian', 'search'));

    }

    public function beritaacara($uid){
        $keg = Oujian::find($uid);
        $bas = Ostation::where('oujian_id', $uid)->get();
        return view('admin.opeserta.listba', compact('keg', 'bas'));
    }

    public function beritaacara_show($uid, $sid){
         $keg = Oujian::find($uid);
        $ba = Ostation::find($sid);
        return view('admin.opeserta.beritaacara', compact('keg', 'ba'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($uid)
    {
        $ujian = Oujian::find($uid);
        return view('admin.opeserta.new', compact('ujian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelompok' => 'required|integer',
            'urutan' => 'required|integer',
        ]);
        $oujian = Oujian::find($request->uid);
        $oujian->peserta()->create([
            'name' => $request->name,
            'npm' => $request->npm,
            'station' => $request->kelompok,
            'sesi' => $request->urutan,
            'qrpeserta'  => md5($request->npm),
        ]);
        return redirect()->back()->with('msg', 'success-Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($uid)
    {
         $search = request('search');

    $peserta = Opeserta::query()
        ->where('oujian_id', $uid) // filter ujian dulu
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

    $ujian = Oujian::findOrFail($uid);
   // dd($peserta);
    return view('admin.opeserta.listu', compact('peserta', 'ujian', 'search'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peserta = Opeserta::findOrFail($id);
        $ujian = Oujian::find($peserta->oujian_id);
        return view('admin.opeserta.edit', compact('peserta', 'ujian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $opeserta)
    {
       //dd($opeserta);

        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelompok' => 'required|integer',
            'urutan' => 'required|integer',
        ]);
        $peserta = Opeserta::findOrFail($opeserta);
        //dd($peserta->oujian_id);
        $peserta->update([
            'name' => $request->name,
            'npm' => $request->npm,
            'station' => $request->kelompok,
            'sesi' => $request->urutan,
        ]);
        //dd($peserta->oujian_id);
        return redirect(route('admin.peserta.show', $peserta->oujian_id))->with('msg', 'success-Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Opeserta::find($id)->delete();
        return redirect()->back()->with('msg', 'success-Data berhasil dihapus');
    }

    public function upload($uid)
    {
        $ujian = Oujian::find($uid);
        return view('admin.opeserta.import', compact('ujian'));
    }

    public function store_uploadxxx(Request $request)
        {
            $validated = $request->validate([
                'file' => ['required','file','mimes:xlsx,xls,csv','max:51200'],
                'uid'  => ['required','integer','exists:oujians,id'],
            ]);

            $dataPeserta = Excel::toCollection(new ImportPeserta, $validated['file']);
            $sheet = $dataPeserta[0] ?? collect();

            $npms = collect($sheet)
                ->skip(1)
                ->pluck(2)
                ->filter()
                ->all();

            $existing = \App\Models\Opeserta::where('oujian_id', $validated['uid'])
                ->whereIn('npm', $npms)
                ->pluck('npm')
                ->all();

            $running = [];
            $pesertaarray = [];
            $seenInThisImport = [];
            $skippedDuplicateInFile = 0;

            foreach ($sheet as $key => $row) {
                if ($key < 1) continue;

                if ($row->filter(fn($val) => !is_null($val) && $val !== '')->isEmpty()) {
                    continue;
                }

                $nama    = trim((string)($row[1] ?? ''));
                $npm     = trim((string)($row[2] ?? ''));
                $station = $row[3] ?? null;

                if ($npm === '') {
                    return back()->withErrors([
                        'file' => "Baris ke-".($key+1).": NPM wajib diisi."
                    ]);
                }
                if (!ctype_digit((string)$station)) {
                    return back()->withErrors([
                        'file' => "Baris ke-".($key+1).": kolom Station harus angka bilangan bulat."
                    ]);
                }
                $station = (int)$station;

                if (in_array($npm, $existing, true)) {
                    continue;
                }

                if (isset($seenInThisImport[$npm])) {
                    $skippedDuplicateInFile++;
                    continue;
                }
                $seenInThisImport[$npm] = true;

                $running[$station] = ($running[$station] ?? 0) + 1;
                $sesi = $running[$station];

                $pesertaarray[] = [
                    'oujian_id'  => $validated['uid'],
                    'name'       => $nama,
                    'npm'        => $npm,
                    'station'    => $station,
                    'sesi'       => $sesi,
                    'qrpeserta'  => md5($npm),
                ];
            }

            if (count($pesertaarray)) {
                \App\Models\Opeserta::insert($pesertaarray);
            }



            $inserted = count($pesertaarray);
            $skippedExisting = count($existing);

            return redirect(route('admin.peserta.show', $validated['uid']))->with(
                'msg',
                'success-Import selesai. '
                .$inserted.' baris baru dimasukkan, '
                .$skippedExisting.' baris dilewati (duplikat di DB), '
                .$skippedDuplicateInFile.' baris dilewati (duplikat di file).'
            );
        }

public function avatar_update($uid){

    $apiUrl = config('services.feedback_api.url').'avatars';
    $npms = Opeserta::where('oujian_id', $uid)->pluck('npm')->toArray();
        $response = Http::withToken(config('services.feedback_api.token'))
            ->post($apiUrl, [
                'npms' => $npms,
            ]);

        if ($response->successful()) {
                $avatars = $response->json();

                // Hitung berapa avatar yang masih null
                $nullCount = collect($avatars)->filter(fn($v) => is_null($v))->count();

                foreach ($avatars as $npm => $url) {
                    if ($url) {
                        Opeserta::where('oujian_id', $uid)
                            ->where('npm', $npm)
                            ->update(['avatar' => $url]);
                    }
                }

                return back()->with([
                    'msg' => "success-Avatar berhasil diperbaharui. Masih ada {$nullCount} avatar kosong."
                ]);
            } else {
            return back()->with([
                'msg' => "danger-Gagal mengambil avatar".$response->body()
            ]);
        }
}


public function store_upload(Request $request)
{
    $validated = $request->validate([
        'file' => ['required', 'file', 'mimes:xlsx,xls,csv', 'max:51200'],
        'uid'  => ['required', 'integer', 'exists:oujians,id'],
    ]);

    $dataPeserta = Excel::toCollection(new ImportPeserta, $validated['file']);
    $sheet = $dataPeserta[0] ?? collect();

    $npms = collect($sheet)
        ->skip(1)
        ->pluck(2)
        ->filter()
        ->map(fn ($npm) => trim((string) $npm))
        ->unique()
        ->values()
        ->all();

    $existing = Opeserta::where('oujian_id', $validated['uid'])
        ->whereIn('npm', $npms)
        ->pluck('npm')
        ->all();

    $running = [];
    $pesertaarray = [];
    $seenInThisImport = [];
    $skippedDuplicateInFile = 0;
    $jmlStation = 0;

    DB::transaction(function () use (
        $sheet,
        $validated,
        $existing,
        &$running,
        &$pesertaarray,
        &$seenInThisImport,
        &$skippedDuplicateInFile,
        &$jmlStation
    ) {
        /*
        |--------------------------------------------------------------------------
        | Ambil station yang sudah ada agar urutan tidak berubah saat import ulang
        |--------------------------------------------------------------------------
        */

        $existingStations = Ostation::where('oujian_id', $validated['uid'])
            ->orderBy('urutan')
            ->get();

        $stationMap = $existingStations
            ->pluck('urutan', 'name')
            ->toArray();

        $stationCounter = $existingStations->max('urutan') ?? 0;

        foreach ($sheet as $key => $row) {
            if ($key < 1) {
                continue;
            }

            $row = collect($row);

            if ($row->filter(fn ($val) => !is_null($val) && $val !== '')->isEmpty()) {
                continue;
            }

            $nama = trim((string) ($row[1] ?? ''));
            $npm  = trim((string) ($row[2] ?? ''));

            // Contoh: 1A, 1B, 2A, 2B
            $stationName = strtoupper(trim((string) ($row[3] ?? '')));

            if ($npm === '') {
                throw ValidationException::withMessages([
                    'file' => 'Baris ke-' . ($key + 1) . ': NPM wajib diisi.',
                ]);
            }

            if ($stationName === '') {
                throw ValidationException::withMessages([
                    'file' => 'Baris ke-' . ($key + 1) . ': Station wajib diisi.',
                ]);
            }

            if (!preg_match('/^[0-9]+[A-Z]*$/', $stationName)) {
                throw ValidationException::withMessages([
                    'file' => 'Baris ke-' . ($key + 1) . ': format Station harus seperti 1, 2, 3, 1A, 1B, 2A, 2B, dst.',
                ]);
            }

            /*
            |--------------------------------------------------------------------------
            | Buat urutan station unik
            | 1A => 1, 1B => 2, 2A => 3, 2B => 4
            |--------------------------------------------------------------------------
            */

            if (!isset($stationMap[$stationName])) {
                $stationCounter++;
                $stationMap[$stationName] = $stationCounter;
            }

            $stationUrutan = $stationMap[$stationName];

            $stationData = Ostation::firstOrCreate(
                [
                    'oujian_id' => $validated['uid'],
                    'name'      => $stationName,
                ],
                [
                    'urutan'    => $stationUrutan,
                    'qrstation' => numran(10).$validated['uid'].$stationUrutan, // qr station
                ]
            );

            /*
            |--------------------------------------------------------------------------
            | Cek duplikat peserta di database
            |--------------------------------------------------------------------------
            */

            if (in_array($npm, $existing, true)) {
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Cek duplikat peserta di file yang sama
            |--------------------------------------------------------------------------
            */

            if (isset($seenInThisImport[$npm])) {
                $skippedDuplicateInFile++;
                continue;
            }

            $seenInThisImport[$npm] = true;

            /*
            |--------------------------------------------------------------------------
            | Sesi berjalan per station
            |--------------------------------------------------------------------------
            */

            $running[$stationData->urutan] = ($running[$stationData->urutan] ?? 0) + 1;
            $sesi = $running[$stationData->urutan];

            $pesertaarray[] = [
                'oujian_id' => $validated['uid'],
                'name'      => $nama,
                'npm'       => $npm,
                'station'   => $stationData->urutan,
                'sesi'      => $sesi,
                'qrpeserta' => md5($npm),
            ];
        }

        if (count($pesertaarray)) {
            Opeserta::insert($pesertaarray);
        }

        $jmlStation = Ostation::where('oujian_id', $validated['uid'])->count();

        Oujian::where('id', $validated['uid'])->update([
            'jml_station' => $jmlStation,
        ]);
    });

    $inserted = count($pesertaarray);
    $skippedExisting = count($existing);

    return redirect(route('admin.peserta.show', $validated['uid']))->with(
    'msg',
    'success-Import selesai. '
    . $inserted . ' baris baru dimasukkan, '
    . $skippedExisting . ' baris dilewati (duplikat di DB), '
    . $skippedDuplicateInFile . ' baris dilewati (duplikat di file), '
    . $jmlStation . ' station terdaftar.'
    );
}


}
