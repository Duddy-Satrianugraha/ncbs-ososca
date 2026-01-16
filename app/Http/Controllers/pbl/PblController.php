<?php

namespace App\Http\Controllers\pbl;

use App\Http\Controllers\Controller;
use App\Models\PblKeg;
use App\Models\PblKelompok;
use App\Models\PblMininote;
use App\Models\PblPeserta;
use App\Models\Openguji;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PblNilai;
use Illuminate\Support\Facades\DB;

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
       // dd($request->all());
            $request->validate([
                'nilai' => ['required', 'array'],

                // scope / identitas
                'nilai.*.blok'       => ['required', 'integer', 'exists:pbl_kegs,id'],
                'nilai.*.kelompok'   => ['required', 'integer', 'exists:pbl_kelompoks,id'],
                'nilai.*.skenario'   => ['required', 'integer', 'exists:pbl_mininotes,id'],
                'nilai.*.pertemuan'  => ['required', 'integer', 'min:1'],
                'nilai.*.tutor'      => ['nullable', 'integer', 'exists:opengujis,id'],

                // status
                'nilai.*.hadir'      => ['required', 'boolean'],

                // nilai umum
                'nilai.*.sharing'      => ['nullable', 'integer', 'between:0,10'],
                'nilai.*.argumentasi'  => ['nullable', 'integer', 'between:0,10'],
                'nilai.*.keaktifan'    => ['nullable', 'integer', 'between:0,10'],
                'nilai.*.kolaborasi'   => ['nullable', 'integer', 'between:0,10'],
                'nilai.*.komunikasi'   => ['nullable', 'integer', 'between:0,10'],

                // nilai khusus
                'nilai.*.dominasi'   => ['nullable', Rule::in([0, -3, -5])],
                'nilai.*.disiplin'   => ['nullable', Rule::in([0, -3, -5])],
                'nilai.*.sopan'      => ['nullable', Rule::in([0, -3, -5])],
            ]);

            DB::transaction(function () use ($request) {

                foreach ($request->nilai as $pesertaId => $n) {

                    // jika tidak hadir → semua nilai 0
                    if ((int)$n['hadir'] === 0) {
                        $payloadNilai = [
                            'hadir'        => false,
                            'sharing'      => 0,
                            'argumentasi'  => 0,
                            'keaktifan'    => 0,
                            'dominasi'     => 0,
                            'kolaborasi'   => 0,
                            'disiplin'     => 0,
                            'komunikasi'   => 0,
                            'sopan'        => 0,
                            'total'        => 0,
                        ];
                    } else {
                        // casting + default
                        $sharing      = (int)($n['sharing'] ?? 0);
                        $argumentasi  = (int)($n['argumentasi'] ?? 0);
                        $keaktifan    = (int)($n['keaktifan'] ?? 0);
                        $dominasi     = (int)($n['dominasi'] ?? 0);
                        $kolaborasi   = (int)($n['kolaborasi'] ?? 0);
                        $disiplin     = (int)($n['disiplin'] ?? 0);
                        $komunikasi   = (int)($n['komunikasi'] ?? 0);
                        $sopan        = (int)($n['sopan'] ?? 0);

                        // HITUNG TOTAL DI SERVER
                        $total = $sharing
                            + $argumentasi
                            + $keaktifan
                            + $dominasi
                            + $kolaborasi
                            + $disiplin
                            + $komunikasi
                            + $sopan;

                        $payloadNilai = [
                            'hadir'        => true,
                            'sharing'      => $sharing,
                            'argumentasi'  => $argumentasi,
                            'keaktifan'    => $keaktifan,
                            'dominasi'     => $dominasi,
                            'kolaborasi'   => $kolaborasi,
                            'disiplin'     => $disiplin,
                            'komunikasi'   => $komunikasi,
                            'sopan'        => $sopan,
                            'total'        => $total,
                        ];
                    }

                    // SIMPAN / UPDATE
                    PblNilai::updateOrCreate(
                        [
                            'keg_id'       => $n['blok'],
                            'kelompok_id'  => $n['kelompok'],
                            'skenario_id'  => $n['skenario'],
                            'pertemuan'   => $n['pertemuan'],
                            'tutor_id'    => $n['tutor'] ?? null,
                            'peserta_id'  => $pesertaId,
                        ],
                        $payloadNilai
                    );
                }
            });
            session()->flush();
            return redirect(route('pbl.login'));
        }


    public function logout(){
        session()->flush();
        return redirect(route('pbl.login'));
    }
}
