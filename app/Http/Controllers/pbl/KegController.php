<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PblKeg;
use App\Models\PblMininote;
use Illuminate\Support\Facades\Auth;

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
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
