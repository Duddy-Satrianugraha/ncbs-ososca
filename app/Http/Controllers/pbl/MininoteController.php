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
       // dd($id);
        $mininotes = PblMininote::find($id);
        return view('pbl.keg.show', compact('mininotes'));
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
        //dd($request->all());
        $validated = $request->validate([
            'judul_sk' => 'required|string|max:255',
            'skenario' => 'required|string',
            'dafpus' => 'required|string',
        ]);
        $mininotes = PblMininote::find($id);
        $mininotes->judul_sk = $validated['judul_sk'];
        $mininotes->skenario = $validated['skenario'];
        $mininotes->dafpus = $validated['dafpus'];
        $mininotes->save();
        return redirect()->route('pbl.harian.show', $mininotes->keg_id)->with('success', 'Skenario berhasil diupdate');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function mini_edit(string $id)
    {
        $mininotes = PblMininote::find($id);
        return view('pbl.keg.mini', compact('mininotes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function mini_update(Request $request, string $id)
    {
        //dd($request->all());
        $validated = $request->validate([
            'step_1' => 'required|string',
            'step_2' => 'required|string',
            'sasbel' => 'required|string',
            'mindmap' => 'required|string',
            'mininotes' => 'required|string',
        ]);
        $mininotes = PblMininote::find($id);
        $mininotes->step_1 = $validated['step_1'];
        $mininotes->step_2 = $validated['step_2'];
        $mininotes->sasbel = $validated['sasbel'];
        $mininotes->mindmap = $validated['mindmap'];
        $mininotes->mininotes = $validated['mininotes'];
        $mininotes->save();
        return redirect()->route('pbl.harian.show', $mininotes->keg_id)->with('success', 'Mininotes berhasil diupdate');
    }

     public function skshow(string $id)
    {
       // dd($id);
        $mininotes = PblMininote::find($id);
        return view('pbl.keg.skshow', compact('mininotes'));
    }
}
