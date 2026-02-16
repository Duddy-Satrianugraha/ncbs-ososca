<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\pbl\KegController;
use App\Http\Controllers\pbl\MininoteController;
use App\Http\Controllers\pbl\PblController;
use App\Http\Controllers\pbl\PblNilaiController;
use App\Http\Controllers\pbl\BaController;
use App\Http\Controllers\PblPesertaController;
use App\Http\Controllers\Pbl\PblImportController;
use App\Http\Controllers\OsocaImportController;
use App\Http\Controllers\OsocaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileContoller;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\OpesertaController;
use App\Http\Controllers\OpengujiController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\MediaController;

use App\Http\Controllers\OtemplateController;
use App\Http\Controllers\OujianController;
use App\Http\Controllers\OfeedbackController;


use App\Http\Middleware\Peserta;
use App\Http\Middleware\Panitia;
use App\Http\Middleware\Osoca;
use App\Http\Middleware\Pbls;



Route::get('/feedback', function () {
    return view('oumpan.login');
});
Route::get('/', function () {
    return redirect()->route('dashbord');
});

Route::post('/feedback', [OfeedbackController::class, 'chek_feed'])->name('feedback.chek');


Route::get('/login/penguji', [DashbordController::class, 'login'])->name('penguji.login');
Route::get('/register/penguji', [DashbordController::class, 'register'])->name('penguji.register');

Route::get('/login/osoca', [DashbordController::class, 'osoca'])->name('osoca.login');
Route::post('/scan/osoca', [DashbordController::class, 'oscan'])->name('osoca.scan');
Route::get('/login/peserta', [DashbordController::class, 'peserta'])->name('peserta.login');
Route::post('/scan/peserta', [DashbordController::class, 'pscan'])->name('peserta.scan');

Route::get('/login/pbl', [DashbordController::class, 'pbllogin'])->name('pbl.login');
Route::post('/scan/pbl', [DashbordController::class, 'pblscan'])->name('pbl.scan');
Route::get('/p/{slug}', [DashbordController::class, 'pblkelcari'])->name('pbl.link');

Route::get('/dashbord', [DashbordController::class, 'index'])->middleware(['auth', ])->name('dashbord');
Route::get('/admin/power/destroy',[PowerController::class, 'destroy'])->name('admin.powerdown');
Route::post('/profile/photo', [ProfileContoller::class, "updatePhoto"])->middleware('auth')->name('profile.photo.update');
Route::resource('/profile', ProfileContoller::class)->middleware(['auth', ]);
Route::get('/f/{token}', [MediaController::class, 'showPrivate'])
    ->name('mfile');

Route::prefix('admin')->middleware(['auth', Panitia::class ])->name('admin.')->group( function (){
    Route::resource('/users', AdminController::class);
    Route::resource('/roles', RoleController::class);
    Route::get('/power/{id}', [PowerController::class, 'index'])->name('powerup');
    Route::resource('/options', OptionController::class);
    Route::get('repas/{user}', [AdminController::class, 'repas'])->name('repas');

    Route::resource('/templates', OtemplateController::class);
    Route::get('/templates/soal/{id}', [OtemplateController::class, 'soal'])->name('templates.soal');
    Route::put('/templates/soal/{id}', [OtemplateController::class, 'soal_update'])->name('templates.soal.update');
    Route::get('/templates/mininote/{id}', [OtemplateController::class, 'mininote'])->name('templates.mininotes');
    Route::put('/templates/mininote/{id}', [OtemplateController::class, 'mininote_update'])->name('templates.mininotes.update');
    Route::get('/templates/rubrik/{id}', [OtemplateController::class, 'rubrik'])->name('templates.rubrik');
    Route::put('/templates/rubrik/{id}', [OtemplateController::class, 'rubrik_update'])->name('templates.rubrik.update');
    Route::get('/copy/templates', [OtemplateController::class, 'copy_template'])->name('templates.copy');
    Route::post('/copy/templates', [OtemplateController::class, 'copy'])->name('templates.copy.store');
    Route::resource('/ujian', OujianController::class);
    Route::post('/sesi/store', [OujianController::class, 'sesi_store'])->name('sesi.store');
    Route::resource('/peserta', OpesertaController::class)->except(['create']);
    Route::get('/peserta/{uid}/avatar',[OpesertaController::class, 'avatar_update'])->name('peserta.avatar.update');
    Route::get('/peserta/{uid}/baru',[OpesertaController::class, 'create'])->name('peserta.create');
    Route::get('/peserta/{uid}/upload',[OpesertaController::class, 'upload'])->name('peserta.upload');
    Route::post('/peserta/upload',[OpesertaController::class, 'store_upload'])->name('peserta.store_upload');
    Route::get('/kartu/peserta/{uid}', [PdfController::class, 'listpeserta'])->name('pdf.peserta');
    Route::get('/kartu/station/{uid}', [PdfController::class, 'station'])->name('pdf.station');
    Route::get('/kartu/kelompok/{kid}', [PdfController::class, 'kelompok'])->name('pdf.kelompok');
    Route::get('/kartu/linkkel/{kid}', [PdfController::class, 'linlkel'])->name('pdf.linkkel');
    Route::get('/kartu/skenario/{id}', [PdfController::class, 'skenario'])->name('pdf.skenario');
    Route::resource('/nilai', NilaiController::class);
    Route::get('/export/nilai/{uid}', [NilaiController::class, 'export'])->name('export.nilai');
    Route::get('/export/feedback/{uid}', [OfeedbackController::class, 'kirim_feedback'])->name('kirim.feedback');
    Route::get('/template/import', [OsocaImportController::class, 'importTemplate'])
    ->name('osoca.import.form');
    Route::post('/template/import', [OsocaImportController::class, 'import'])
    ->name('osoca.import');



    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::post('/media/upload', [MediaController::class, 'store'])->name('media.upload');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
});

Route::prefix('tutor')->middleware(['auth', Panitia::class ])->name('tutor.')->group( function (){
    Route::resource('/penguji', OpengujiController::class);
    Route::post('/print/penguji', [OpengujiController::class, 'print'])->name('penguji.print');
    Route::post('/massdelete/penguji', [OpengujiController::class, 'massDelete'])->name('penguji.massdelete');
    Route::get('/qr/{openguji}', [OpengujiController::class, 'qrshow'])->name('penguji.qr');
});

Route::prefix('peserta')->middleware(Peserta::class)->name('peserta.')->group( function (){
    Route::get('/', [PesertaController::class, 'check'])->name('index');
    Route::get('/soal', [PesertaController::class, 'soal'])->name('soal');
    Route::get('/in', [PesertaController::class, 'in'])->name('in');
    Route::get('/out', [PesertaController::class, 'out'])->name('out');
    Route::get('/tolist', [PesertaController::class, 'tolist'])->name('tolist');
    Route::get('/logout', [PesertaController::class, 'logout'])->name('logout');
    Route::post('/scan_soal', [PesertaController::class, 'scan'])->name('sscan');
});

Route::prefix('osoca')->middleware([Osoca::class])->name('osoca.')->group( function (){
    Route::get('/logout', [OsocaController::class, 'logout'])->name('logout');
    Route::get('/tolist', [OsocaController::class, 'tolist'])->name('tolist');
    Route::get('/penguji', [OsocaController::class, 'penguji'])->name('penguji.login');
    Route::post('/penguji', [OsocaController::class, 'penguji_check'])->name('penguji.chek');
    Route::get('/mhs', [OsocaController::class, 'mhs'])->name('mhs.login');
    Route::post('/mhs', [OsocaController::class, 'mhs_check'])->name('mhs.chek');
    Route::get('/ujian', [OsocaController::class, 'ujian'])->name('ujian');
    Route::get('/template', [OsocaController::class, 'template'])->name('template');
    Route::post('/penilaian', [OsocaController::class, 'penilaian'])->name('penilaian.store');

});

Route::prefix('pbl')->middleware(['auth', Panitia::class ])->name('pbl.')->group( function (){
    Route::get('harian/', [KegController::class, 'index'])->name('harian.index');
    Route::get('harian/create', [KegController::class, 'create'])->name('harian.create');
    Route::post('harian/store', [KegController::class, 'store'])->name('harian.store');
    Route::get('harian/show/{id}', [KegController::class, 'show'])->name('harian.show');
    Route::get('harian/edit/{id}', [KegController::class, 'edit'])->name('harian.edit');
    Route::put('harian/update/{id}', [KegController::class, 'update'])->name('harian.update');
    Route::delete('harian/destroy/{id}', [KegController::class, 'destroy'])->name('harian.destroy');
    Route::get('harian/mininotes/{id}', [MininoteController::class, 'mini_edit'])->name('harian.mininotes');
    Route::put('harian/mininotes/{id}', [MininoteController::class, 'mini_update'])->name('harian.mininotes.update');
    Route::get('harian/act/mininotes/{id}', [MininoteController::class, 'miniact'])->name('harian.mininotes.act');
    Route::get('harian/skenario/{id}', [MininoteController::class, 'sk_edit'])->name('harian.skenario');
    Route::put('harian/skenario/{id}', [MininoteController::class, 'sk_update'])->name('harian.skenario.update');
    Route::get('mininotes/{id}', [MininoteController::class, 'show'])->name('mininotes.show');
    Route::put('mininotes/{id}', [MininoteController::class, 'update'])->name('mininotes.update');
    Route::delete('mininotes/{id}', [MininoteController::class, 'destroy'])->name('mininotes.destroy');
    Route::get('skenario/{id}', [MininoteController::class, 'skshow'])->name('skenario.show');
    Route::get('peserta/{kid}', [PblPesertaController::class, 'index'])->name('peserta.index');
    Route::get('peserta/{kid}/upload',[PblPesertaController::class, 'upload'])->name('peserta.upload');
    Route::post('peserta/upload',[PblPesertaController::class, 'store_upload'])->name('peserta.store_upload');
    Route::get('peserta/{kid}/add',[PblPesertaController::class, 'create'])->name('peserta.add');
    Route::post('peserta/store',[PblPesertaController::class, 'store'])->name('peserta.store');
    Route::get('edit/peserta/{pblPeserta}', [PblPesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('update/peserta/{pblPeserta}', [PblPesertaController::class, 'update'])->name('peserta.update');
    Route::delete('peserta/{pblPeserta}', [PblPesertaController::class, 'destroy'])->name('peserta.destroy');
    Route::get('aktif/{id}', [KegController::class, 'aktif'])->name('harian.aktif');
    Route::post('aktivate', [KegController::class, 'aktivate'])->name('harian.aktivate');
    Route::get('nilai', [PblNilaiController::class, 'index'])->name('list.nilai');
    Route::get('nilai/harian/{keg}', [PblNilaiController::class, 'rekapKegiatan'])->name('nilai.harian');
    Route::get('nilai/export/{keg}', [PblNilaiController::class, 'nilai_export'])->name('nilai.export');
    Route::get('ba', [BaController::class, 'index'])->name('ba.index');
    Route::get('ba/detail/{id}', [BaController::class, 'detail'])->name('ba.detail');
    Route::get('ba/show/{id}', [BaController::class, 'beritaacara'])->name('ba.show');
    Route::get('ba/pdf/{id}', [PdfController::class, 'pdfba'])->name('ba.pdf');

    Route::get('keg/{keg}/import', [PblImportController::class, 'import'])
    ->name('keg.import');
    Route::post('keg/{keg}/import-mininotes', [PblImportController::class, 'importMininotes'])
    ->name('keg.importMininotes');

});

Route::prefix('kegiatan_pbl')->middleware([Pbls::class])->name('kegiatan_pbl.')->group( function (){
    Route::get('tutor', [PblController::class, 'tutor'])->name('tutor');
    Route::post('chek/tutor', [PblController::class, 'chek_tutor'])->name('chek.tutor');
    Route::get('mininotes', [PblController::class, 'mininotes'])->name('mininotes');
    Route::post('nilai', [PblController::class, 'nilaiinput'])->name('nilai.input');
    Route::get('logout', [PblController::class, 'logout'])->name('logout');
});


