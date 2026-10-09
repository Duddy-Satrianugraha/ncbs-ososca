<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PblKeg;
use App\Models\PblMininote;
use App\Models\PblNilai;
use App\Models\PblPeserta;
use App\Models\PblKelompok;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;

class KegController extends Controller
{
    /**
     * Display a listing of the resource.
     */

         public function index(Request $request)
    {
        $search = $request->query('search');

        // Ambil 1 team pertama milik user (atau null)
        $team = Auth::user()?->teams()->first();

        // Ambil daftar user id dalam team tsb (Collection kosong jika null)
        $userIds = $team?->users()->pluck('users.id') ?? collect();

        $keg = PblKeg::query()
            ->when($search, function ($q, $s) {
                return $q->where('name', 'like', "%{$s}%");
            })
            ->when($userIds->isNotEmpty(), function ($q) use ($userIds) {
                return $q->whereIn('user_id', $userIds);
            })->orderBy('id', 'desc')
            ->paginate(10);

        return view('pbl.keg.list', compact('keg', 'search'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pbl.keg.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  // dd($request->all());
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'tahun_akademik' => 'required|string|max:255',
            'jml_sk' => 'required|numeric',
        ]);
        try{
            DB::beginTransaction();
        $blok = explode('|', $request->name);

        $keg = new PblKeg();
        $keg->name = $blok[0];
        $keg->blok_name = $blok[1];
        $keg->tahun_akademik = $request->tahun_akademik;
        $keg->jml_sk = $request->jml_sk;
        $keg->user_id = Auth::user()->id;
        $keg->save();

        for($i=1;$i<=$request->jml_sk;$i++){
            $mininote = new PblMininote();
            $mininote->keg_id = $keg->id;
            $mininote->user_id = Auth::user()->id;
            $mininote->nomor_sk = $i;
            $mininote->save();
        }
        DB::commit();
        return redirect()->route('pbl.harian.index')->with('msg', 'success-Data berhasil disimpan');
    } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('msg', 'danger-Data gagal disimpan '.$e->getMessage());
            }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $keg = PblKeg::find($id);
        return view('pbl.keg.minilist', compact('keg'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $keg = PblKeg::find($id);
        return view('pbl.keg.edut', compact('keg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // dd($request->all());
        $blok = explode('|', $request->name);

        $keg = PblKeg::find($id);
        $keg->name = $blok[0];
        $keg->blok_name = $blok[1];
        $keg->tahun_akademik = $request->tahun_akademik;
        $keg->save();
        return redirect()->route('pbl.harian.index')->with('msg', 'success-Pbl berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keg = PblKeg::find($id);
        $nilai = PblNilai::where('keg_id', $keg->id)->get();
        foreach ($nilai as $nilai) {
            $nilai->delete();
        }
        $peserta = PblPeserta::where('keg_id', $keg->id)->get();
        foreach ($peserta as $peserta) {
            $peserta->delete();
        }
        $kelompok = PblKelompok::where('keg_id', $keg->id)->get();
        foreach ($kelompok as $kelompok) {
            $kelompok->delete();

        }
        $mininote = PblMininote::where('keg_id', $keg->id)->get();
        foreach ($mininote as $mininote) {
            $mininote->delete();
        }
        $media = Media::where('paket_id', $keg->id)->get();
        foreach ($media as $media) {
            if (Storage::disk($media->disk)->exists($media->path)) {
                Storage::disk($media->disk)->delete($media->path);
            }
            $media->delete();
        }
        $keg->delete();
        return redirect()->route('pbl.harian.index')->with('msg', 'success-Pbl berhasil dihapus');

    }

    Public function aktif($id){

        $keg = PblKeg::find($id);
        $sk = PblMininote::where('keg_id', $keg->id)->where('status', 1)->get();
        return view('pbl.keg.aktif', compact('keg', 'sk'));
    }

    public function aktivate(Request $request){
        //dd($request->all());
        $keg = PblKeg::find($request->id);
        $keg->sk_aktif = $request->sk_aktif;
        $keg->pertemuan = $request->pertemuan;
        $keg->save();
        return redirect()->route('pbl.harian.index')->with('msg', 'success-Skenario berhasil diaktifkan');

    }



}
