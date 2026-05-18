<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use App\Models\Soal;
use App\Models\Rotation;
use App\Models\Opeserta;
use App\Models\Ostation;
use App\Models\User;
use App\Models\Oujian;
use App\Models\PblKeg;
use App\Models\PblKelompok;
use App\Models\PblMininote;
use App\Models\PblBa;
use App\Models\PblNilai;
use App\Models\Openguji;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function station($uid)
    {
        $ujian = Oujian::find($uid);
        $soal = Ostation::where('oujian_id', $uid)->get();
        $stations = collect();

        foreach ($soal as $data) {
            $station = new \stdClass; // Atau bisa pakai array jika lebih nyaman
            $station->ujian = $ujian->name ?? null;
            $station->station = $data->name ?? null;
            $station->nama_penguji = $data->nama_penguji ?? null;
            $station->urutan = $data->urutan;
            $station->slug = $data->qrstation;
            $stations->push($station);
        }
        //dd($stations);
       $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf.station', compact('stations'))
        ->setPaper('A4', 'portrait');
        return $pdf->stream('kartu_station_'.$ujian->name.'.pdf');
        //return view('admin.pdf.station', compact('stations'));
    }

    public function kelompok($kid)
    {
        $keg = PblKeg::find($kid);
        $kelompok = PblKelompok::where('keg_id', $kid)->get()->sortBy('nama_kelompok');
        $stations = collect();

        foreach ($kelompok as $data) {
            $station = new \stdClass; // Atau bisa pakai array jika lebih nyaman
            $station->pbl = $keg->name ?? null;
            $station->kels = $data->nama_kelompok ?? null;
            $station->slug = $data->qr_kelompok;
            $stations->push($station);
        }
        //dd($stations);
       $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf.pbl_kelompok', compact('stations'))
        ->setPaper('A4', 'portrait');
        return $pdf->stream('kartu_kelompok_'.$keg->name.'.pdf');
        //return view('admin.pdf.station', compact('stations'));
    }

    public function linlkel($kid)
    {
        $keg = PblKeg::find($kid);
        $kelompok = PblKelompok::where('keg_id', $kid)->get()->sortBy('nama_kelompok');
        $stations = collect();

        foreach ($kelompok as $data) {
            $station = new \stdClass; // Atau bisa pakai array jika lebih nyaman
            $station->pbl = $keg->name ?? null;
            $station->kels = $data->nama_kelompok ?? null;
            $station->slug = $data->qr_kelompok;
            $stations->push($station);
        }
        //dd($stations);
       $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf.pbl_linkkel', compact('stations'))
        ->setPaper('A4', 'portrait');
        return $pdf->stream('kartu_kelompok_'.$keg->name.'.pdf');
        //return view('admin.pdf.station', compact('stations'));
    }


    public function stationX(Sesi $sesi)
    {
        $soal = Soal::where('sesi_id', $sesi->id)->get();
        $stations = collect();

        foreach ($soal as $data) {
            $station = new \stdClass; // Atau bisa pakai array jika lebih nyaman
            $station->ujian = $data->ujian()->first()->name ?? null;
            $station->sesi = $sesi->name ?? null;
            $station->lokasi = $data->location()->first()->nama ?? null;
            $station->urutan = $data->urutan;
            $station->slug = $data->slug;

            $stations->push($station);
        }
        //dd($stations);
       $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf.station', compact('stations'))
        ->setPaper('A4', 'portrait');
        return $pdf->stream('kartu_station_'.$sesi->name.'.pdf');
        //return view('admin.pdf.station', compact('stations'));
    }

    public function peserta(Rotation $rotasi)
    {
        $pesertas = collect();
       //dd($rotasi->pesertas()->get());
        foreach ($rotasi->pesertas()->get() as $data) {
            $peserta = new \stdClass; // Atau bisa pakai array jika lebih nyaman
            $pdata = User::find($data->user_id);
            $peserta->nama = $pdata->name ?? null;
            $peserta->username = $pdata->username ?? null;
            $peserta->urutan = $data->urutan;
            $pesertas->push($peserta);
        }
       // dd($pesertas);
       $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf.peserta', compact('pesertas', 'rotasi'))
        ->setPaper('A4', 'portrait');
        return $pdf->stream('daftar_peserta_'.$rotasi->full_name.'.pdf');
        //return view('admin.pdf.peserta', compact('pesertas', 'rotasi'));
    }

    public function mhs(){
        $user = Auth::user();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('mhs.pdf.nametag', compact('user'))
                  ->setPaper('A4', 'potrait'); // bisa A6/A7 dan landscape biar cocok ukuran name tag

        return $pdf->stream('nametag_'.$user->username.'.pdf');

        //return view('mhs.pdf.nametag', compact('user'));


    }
    public function penguji(){
        $user = Auth::user();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('penguji.pdf.nametag', compact('user'))
                  ->setPaper('A4', 'potrait'); // bisa A6/A7 dan landscape biar cocok ukuran name tag

        return $pdf->stream('Kartu_penguji_'.$user->username.'.pdf');

       // return view('penguji.pdf.nametag', compact('user'));


    }

    public function ps(){
        $user = Auth::user();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pasien.pdf.psnametag', compact('user'))
                  ->setPaper('A4', 'potrait'); // bisa A6/A7 dan landscape biar cocok ukuran name tag

        return $pdf->stream('Kartu_Pasien_Standar_'.$user->username.'.pdf');

       // return view('penguji.pdf.nametag', compact('user'));
    }

    public function one_ps($id){
        $user = User::find($id);
        //dd($user);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pasien.pdf.psnametag', compact('user'))
                  ->setPaper('A4', 'potrait'); // bisa A6/A7 dan landscape biar cocok ukuran name tag

        return $pdf->stream('Kartu_Pasien_Standar_'.$user->username.'.pdf');

        // return view('penguji.pdf.nametag', compact('user'));
    }

     public function listpeserta($uid)
    {
        $pesertas = Opeserta::where('oujian_id', $uid)->get();
        $ujian = Oujian::find($uid);
        $stations = collect();
        foreach ($pesertas as $data) {
            $peserta = new \stdClass; // Atau bisa pakai array jika lebih nyaman
            $peserta->ujian = $ujian->name ?? null;
            $peserta->sesi = $data->sesi ?? null;
            $peserta->station = $data->ostation->name ?? null;
            $peserta->name = $data->name;
            $peserta->npm = $data->npm;
            $peserta->qrpeserta = $data->qrpeserta;
            $stations->push($peserta);
        }
        //dd($stations);
       $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf.listpeserta', compact('stations'))
        ->setPaper('A4', 'portrait');
        return $pdf->stream('kartu_peserta_'.$ujian->name.'.pdf');
        //return view('admin.pdf.station', compact('stations'));
    }

    public function skenario(string $id)
    {
        $skenario = PblMininote::find($id);
        $keg = PblKeg::find($skenario->keg_id);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf.skenario', compact('skenario', 'keg'))
        ->setPaper('A4', 'portrait');
        return $pdf->stream('skenario_'.$skenario->nomor_sk.'_Blok'.$keg->name.'.pdf');
    }

    public function pdfba(string $id){
        $ba = PblBa::find($id);
        $keg = PblKeg::find($ba->keg_id);
        $tutor = Openguji::find($ba->tutor_id);
        $nilai = PblNilai::where('keg_id', $ba->keg_id)->where('kelompok_id', $ba->kelompok_id)->where('skenario_id', $ba->sk_id)->where('pertemuan', $ba->pertemuan)->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf.ba', compact('ba', 'keg', 'nilai','tutor'))
        ->setPaper('A4', 'portrait');
        return $pdf->stream('ba_'.$keg->name.'_sk'.$ba->sks->nomor_sk.'_'.$ba->pertemuan.'.pdf');
    }

}
