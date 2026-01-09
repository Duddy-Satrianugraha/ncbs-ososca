<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PblKeg;
use App\Models\PblMininote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            })
            ->paginate(5);

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

        $keg = new PblKeg();
        $keg->name = $request->name;
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
        return view('pbl.keg.mini', compact('keg'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
