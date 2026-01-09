<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PblMininote;

class MininoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     */
    public function sk_edit(string $id)
    {
        $mininotes = PblMininote::find($id);
        return view('pbl.keg.skenario', compact('mininotes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function sk_update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function mini_edit(string $id)
    {
        $mininotes = PblMininote::find($id);
        return view('pbl.keg.mininote', compact('mininotes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function mini_update(Request $request, string $id)
    {
        dd($request->all());
    }
}
