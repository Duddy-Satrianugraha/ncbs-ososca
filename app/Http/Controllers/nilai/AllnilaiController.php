<?php

namespace App\Http\Controllers\nilai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Allnilai;


class AllnilaiController extends Controller
{
    public function index(Request $request)
    {
      $search = $request->query('search');

        // Ambil 1 team pertama milik user (atau null)
        $team = Auth::user()?->teams()->first();

        // Ambil daftar user id dalam team tsb (Collection kosong jika null)
        $userIds = $team?->users()->pluck('users.id') ?? collect();

        $keg = Allnilai::query()
            ->when($search, function ($q, $s) {
                return $q->where('nama', 'like', "%{$s}%")->orWhere('blok', 'like', "%{$s}%");
            })
            ->when($userIds->isNotEmpty(), function ($q) use ($userIds) {
                return $q->whereIn('user_id', $userIds);
            })->orderBy('id', 'desc')
            ->paginate(10);

      return view('allnilai.list', compact('keg', 'search'));
    }

    public function create_praktikum(){
        return view('allnilai.ipraktikum');
    }
    public function store_praktikum(Request $request){
        $validator = $request->validate([
            'nama'         => ['required','string','max:255'],
            'jenis_nilai'  => ['required','string','max:255'],
            'blok'         => ['required','string','max:255'],
            'tahun_akademik' => ['required','string','max:255'],
            'file'         => ['required','file','mimes:xlsx,xls,csv','max:51200'],
        ]);

        
        
        }



    public function show(string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
