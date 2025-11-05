<?php

namespace App\Http\Controllers;

use App\Models\Ostation;
use App\Models\Oujian;
use App\Models\Opeserta;
use App\Models\Osesi;
use App\Models\Otemplate;
use Illuminate\Http\Request;

class PesertaController extends Controller
{

    public function check(){

       // dd(session()->all());
        $station = Ostation::find(session('Station'));

        return view('peserta.loginp', compact('station'));
    }

    public function in(Request $request)
        {
            // cari station yang sedang dibuka
            $station = Ostation::where('id', session('Station'))
                ->where('open', 1)
                ->first();

            // Kalau request datang dari AJAX polling
            if ($request->ajax()) {
                if ($station) {
                    // station open → beri sinyal ke JS untuk redirect (normal request)
                    return response()->json(['open' => true], 200);
                }
                // station belum open → diam (no content)
                return response()->noContent(204);
            }

            // Normal request (bukan AJAX): proses seperti biasa
            if (!$station) {
                return back()->with('warning', 'Station belum dibuka.');
            }

            $sesi = Osesi::where('oujian_id', session('oujian'))
                ->where('urutan', $station->current)
                ->first();

            if (!$sesi) {
                return back()->with('error', 'Sesi tidak ditemukan.');
            }

            // set session lalu arahkan ke halaman soal
            session(['osesi' => $sesi->id]);

            return redirect()->route('peserta.soal')
                ->with('success', 'Waktu untuk melihat soal adalah 10 menit');
        }
    public function out(Request $request)
        {
            // Cari station yang sudah ditutup (open = 0)
            $station = Ostation::where('id', session('Station'))
                ->where('open', 0)
                ->first();

            // Jika request dari JS (AJAX polling)
            if ($request->ajax()) {
                if ($station) {
                    // Station ditutup → suruh JS redirect
                    return response()->json(['closed' => true], 200);
                }
                // Masih open → diam
                return response()->noContent(204);
            }

            // Kalau akses normal (redirect langsung)
            if ($station) {
                // Hapus session
                session()->forget(['Sesi', 'osesi']);

                // Redirect ke halaman index peserta
                return redirect()
                    ->route('peserta.index')
                    ->with('info', 'Station telah ditutup, Anda dikembalikan ke halaman utama.');
            }

            // Jika belum ditutup
            return back()->with('warning', 'Station masih terbuka.');
        }

    public function logout(){
            session()->flush();
            return redirect(route('peserta.login'));
        }

    public function tolist(){
        session()->forget('Sesi');
        return redirect(route('peserta.index'));
    }

    Public function scan(Request $request){
        //dd($request->all());
        $request->validate([
            'soal_slug' => ['required','string'],
        ]);
        $soal_slug = $request->soal_slug;
        $station = Ostation::find(session('Station'));
        $sesi = Osesi::where('oujian_id', session('oujian'))->where('urutan', $station->current)->first();
       // dd($sesi);
        $peserta = Opeserta::where('qrpeserta', $soal_slug)->where('status', 0)->first();

        if($peserta){

            session([
                'osesi' => $sesi->id,
            ]);

            return redirect(route('peserta.soal'))->with('success', 'Waktu untuk melihat soal adalah 10 menit');
        } else {
            return redirect(route('peserta.index'))->with('msg', 'danger-peserta telah di uji atau tidak terdaftar');
        }
    }

    public function soal(){
        $ujian = Oujian::find(session('oujian'));
        $sesi = Osesi::find(session('osesi'));
        $template = Otemplate::find($sesi->otemplate_id);

        //dd($sesi);

        return view('peserta.template', compact('ujian', 'sesi', 'template'));
    }

}
