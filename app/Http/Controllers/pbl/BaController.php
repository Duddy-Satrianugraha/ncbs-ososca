<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use App\Models\PblKeg;
use App\Models\PblBa;
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

    public function detail(int $id)
    {
        $ba = PblBa::where('keg_id', $id)->paginate(10);
        $keg = PblKeg::find($id);
        return view('pbl.ba.listba', compact('ba', 'keg'));
    }

}
