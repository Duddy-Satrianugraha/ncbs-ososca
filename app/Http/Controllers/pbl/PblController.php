<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use App\Models\PblKeg;
use App\Models\PblKelompok;
use App\Models\PblMininote;
use App\Models\PblPeserta;
use App\Models\Openguji;
use Illuminate\Http\Request;

class PblController extends Controller
{
    private function data_pbl(){
        $kegiatan_pbl = PblKeg::find(session('kegiatan_pbl'));
        $kelompok = PblKelompok::find(session('pblKelompok'));
        $skenario = PblMininote::find(session('skenario'));
        $pertemuan = session('pertemuan');
        return compact('kegiatan_pbl', 'kelompok', 'skenario', 'pertemuan');
    }



    Public function tutor(){
        if(session()->has('Tutor')){
            return redirect(route('osoca.mhs.login'))->with('msg', 'success-Selamat datang kembali dok,Silahkan scan kartu peserta');
        }
        $data = $this->data_pbl();
            //dd($data);
        return view('pbl.harian.tutor', compact('data'));
    }

    public function chek_tutor(Request $request){
        //dd($request->all());
        $request->validate([
            'soal_slug' => ['required','numeric'],

        ]);
        $qr_penguji = $request->soal_slug;
        $tutor = Openguji::where('qr_penguji', $qr_penguji)->first();
        if($tutor){
            session([
                'Tutor' => $tutor->id,
            ]);
            return redirect(route('kegiatan_pbl.mininotes'))->with('msg', 'success-Selamat datang dok');
        } else {
            return redirect(route('kegiatan_pbl.tutor'))->with('msg', 'danger-Maaf, tutor tidak ditemukan');
        }
    }

    public function mininotes(){
        $data = $this->data_pbl();
        $tutor = Openguji::find(session('Tutor'));
       // dd($data);
        $peserta = PblPeserta::where('kelompok_id', session('pblKelompok'))->get();

        return view('pbl.harian.mininotes', compact('data', 'tutor', 'peserta'));
    }

    public function nilaiinput(Request $request){
        dd($request->all());
    }

    public function logout(){
        session()->flush();
        return redirect(route('pbl.login'));
    }
}
