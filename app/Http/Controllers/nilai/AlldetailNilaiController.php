<?php

namespace App\Http\Controllers\nilai;

use App\Http\Controllers\Controller;
use App\Models\AlldetailNilai;
use App\Models\Allnilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlldetailNilaiController extends Controller
{
     public function index($kid)
    {
         $search = request('search');

    $detail= AlldetailNilai::query()
        ->where('allnilai_id', $kid) // filter ujian dulu
        ->when($search, function ($q) use ($search) {
            $s = trim($search);

            // Contoh: jika input numerik, ikutkan opsi exact match ke NPM
            $q->where(function ($qq) use ($s) {
                $qq->where('nama_mhs', 'like', "%{$s}%")
                   ->orWhere('npm', 'like', "%{$s}%");

                if (ctype_digit($s)) {
                    $qq->orWhere('npm', $s); // optional exact match
                }
            });
        })
        ->orderBy('npm', 'asc')
        ->paginate(50)
        ->appends(['search' => $search]); // agar nilai search ikut di pagination links

    $nilai = Allnilai::where('id', $kid)->first();

        if($nilai->jenis_nilai === 'Praktikum') {
            return view('allnilai.detailPraktikum', compact('detail', 'nilai', 'search'));
        } else if($nilai->jenis_nilai === 'OSOCA')
        {
            return view('allnilai.detailOsoca', compact('detail', 'nilai', 'search'));
        } else
        {
            return view('allnilai.detailCbt', compact('detail', 'nilai', 'search'));
        }
    }

    Public function edit(string $id)
    {
        $detail = AlldetailNilai::find($id);
        $nilai = Allnilai::where('id', $detail->allnilai_id)->first();
        if($nilai->jenis_nilai === 'Praktikum') {
        return view('allnilai.editPraktikum', compact('nilai', 'detail'));
        } else {
            return view('allnilai.editcbt', compact('nilai', 'detail'));
        }
    }

    Public function update(Request $request, string $id)
    {
        $request->validate([
            'pretest'     => ['nullable', 'string', 'max:255'],
            'posttest'    => ['nullable', 'string', 'max:255'],
            'laporan'     => ['nullable', 'string', 'max:255'],
            'ujian_prax'  => ['nullable', 'string', 'max:255'],
            'nilai_akhir' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();
        $detail = AlldetailNilai::find($id);
        $detail->update([
                'pretest' => $request->pretest,
                'posttest' => $request->posttest,
                'laporan' => $request->laporan,
                'ujian_prax' => $request->ujian_prax,
                'nilai_akhir' => $request->nilai_akhir,
                'status' => 0,
                'lastupdated_by' => Auth::user()->id,
            ]);
        $nilai = Allnilai::find($detail->allnilai_id);
        if($nilai->jenis_nilai === 'Praktikum') {
        $nilai->update(['status' => 1]);
        } else {
            $nilai->update(['status' => 0]);
        }

        DB::commit();
        return redirect()->route('nilai.harian.index', $detail->allnilai_id)->with('msg', 'success-Data berhasil diupdate');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }

    }


}
