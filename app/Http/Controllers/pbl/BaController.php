<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use App\Models\Openguji;
use App\Models\PblKeg;
use App\Models\PblBa;
use App\Models\PblNilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BaController extends Controller
{
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

        return view('pbl.ba.list', compact('keg', 'search'));
    }

    public function detailx(int $id)
    {
        $ba = PblBa::where('keg_id', $id)->paginate(10);
        $keg = PblKeg::find($id);
        return view('pbl.ba.listbax', compact('ba', 'keg'));
    }

    public function detail(int $id)
        {
            $ba = PblBa::with(['kelompok', 'sks'])
            ->where('keg_id', $id)
            ->get()
            ->sortBy(fn($item) => $item->kelompok->nama_kelompok);

            $keg = PblKeg::findOrFail($id);

            $grouped = [];

            foreach ($ba as $item) {
                $kelompokId   = $item->kelompok->id;
                $namaKelompok = $item->kelompok->nama_kelompok;
                $nomorSk      = $item->sks->nomor_sk;
                $pertemuan    = $item->pertemuan;

                if (!isset($grouped[$kelompokId])) {
                    $grouped[$kelompokId] = [
                        'nama_kelompok' => $namaKelompok,
                        'data' => []
                    ];
                }

                $grouped[$kelompokId]['data'][$nomorSk][$pertemuan] = $item;
            }

            return view('pbl.ba.listba', compact('grouped', 'keg'));
        }


    public function beritaacara(int $id){
        $ba = PblBa::find($id);
        $keg = PblKeg::find($ba->keg_id);
        $tutor = Openguji::find($ba->tutor_id);
        $nilai = PblNilai::where('keg_id', $ba->keg_id)->where('kelompok_id', $ba->kelompok_id)->where('skenario_id', $ba->sk_id)->where('pertemuan', $ba->pertemuan)->get();


        return view('pbl.ba.beritaacara', compact('ba', 'keg', 'nilai','tutor'));
    }

}
