<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rubrik Penilaian Mahasiswa dalam Diskusi PBL</title>

    <style>
    /* ====== Print setup ====== */
    @page { size: A4; margin: 18mm 16mm; }
    body { font-family: Arial, Helvetica, sans-serif; color:#000; }
    .page { max-width: 1200px; margin: 0 auto; }

    /* ====== Header ====== */
    .topbar{
      display:flex; align-items:flex-start; justify-content:space-between;
      margin-bottom: 6px;
    }
    .inst{
      text-align:center; flex: 1;
      font-size:12px; line-height:1.2; font-weight:700;
      text-transform: uppercase;
      padding-top: 6px;
    }
    .logo{
      width:56px; height:56px; object-fit:contain;
      margin-left: 10px;
    }

    .title-wrap{ margin-top: 4px; }
    .title{
      text-align:center; font-size:13px; font-weight:800;
      text-transform: uppercase;
      margin: 4px 0 6px;
    }
    .title-line{
      height:3px; background:#2f3e5a;
      margin: 4px 0 10px;
    }

    /* ====== Meta fields ====== */
    .meta{
      display:flex; justify-content:space-between; gap: 20px;
      font-size:12px;
      margin-bottom: 8px;
    }
    .meta .col{ width: 50%; }
    .meta-row{ display:flex; gap:8px; margin: 2px 0; }
    .meta-label{ width: 90px; }
    .dots{ flex:1; border-bottom:1px dotted #000; height: 14px; }

    /* ====== Main table ====== */
    table{ border-collapse: collapse; width:100%; }
    .rubrik{
      table-layout: fixed;
      border:2px solid #444;
      font-size:11px;
    }
    .rubrik th, .rubrik td{
      border:1px solid #444;
      padding: 0;
      vertical-align: middle;
      text-align:center;
    }
    .rubrik thead th{
      font-weight:700;
    }

    .w-no{ width:40px; }
    .w-nama{ width:230px; }
    .w-mini{ width:28px; }
    .w-total{ width:70px; }

    .th-group{
      padding:6px 4px;
      font-size:11px;
    }
    .rotate{
      height:110px; /* tinggi header kolom sempit */
      position: relative;
    }
    .rotate > span{
      position:absolute;
      left:50%; top:50%;
      transform: translate(-50%,-50%) rotate(-90deg);
      white-space: wrap;
      font-weight:700;
      font-size:11px;
    }
    .rubrik tbody td{ height: 20px; }
    .rubrik tbody td.nama{ text-align:left; padding: 0 6px; }
    .rubrik tbody td.no{ font-weight:600; }

    /* ====== Scoring tables ====== */
    .score-wrap{
      width:100%;
      margin-top:18px;
    }
    .score{
      width:100%;
      table-layout:fixed;
      border:2px solid #444;
      font-size:11px;
    }
    .score th, .score td{
      border:1px solid #444;
      padding:6px;
      vertical-align:top;
      overflow-wrap:anywhere;
      line-height:1.4;
    }
    .score thead th{
      background:#c9c9c9;
      font-weight:800;
      text-align:center;
    }
    .score .score-no{ width:4%; }
    .score .score-criteria{ width:20%; }
    .score .score-level{ width:19%; }
    .score .center{ text-align:center; }

    .scorex{
      width: 100%;
      border:2px solid #444;
      font-size:12px;
    }
    .scorex th, .scorex td{
      border:1px solid #444;
      padding:4px 6px;
    }
    .scorex thead th{
      background:#c9c9c9;
      font-weight:800;
    }
    .scorex .subhead th{
      background:#d9d9d9;
      font-weight:800;
      text-align:center;
    }
    .scorex .left{ width: 40%; text-align:left; }
    .scorex .center{ text-align:center; }

    /* ====== Definitions ====== */
    .defs{
      margin-top: 12px;
      font-size:11px;
      line-height:1.25;
    }
    .defs .head{ font-weight:800; margin-bottom:4px; }
    .defs table{ width:100%; }
    .defs td{ padding:1px 0; vertical-align:top; }
    .defs .term{ width: 110px; }
    .defs .colon{ width: 10px; text-align:center; }

    /* ====== Footer ====== */
    .footer{
      margin-top: 18px;
      font-size:11px;
      display:flex;
      justify-content:flex-end;
    }
    .sign{
      margin-top: 26px;
      display:flex;
      justify-content:flex-end;
      font-size:11px;
    }
    .sign .box{
      width: 220px;
      text-align:center;
    }
    .line{
      border-bottom:1px solid #000;
      height: 18px;
      margin: 14px 0 2px;
    }
    /* ===== Navigation buttons ===== */
.nav-action{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 10px 0;
}

/* Base button (Bootstrap-like) */
.btn{
  display: inline-block;
  padding: 6px 14px;
  font-size: 12px;
  line-height: 1.4;
  border-radius: 4px;
  text-decoration: none;
  color: #fff;
  border: 1px solid transparent;
  cursor: pointer;
  transition: background-color .15s ease, border-color .15s ease;
}

/* Info button (Kembali) */
.btn-info{
  background-color: #3039d4;
  border-color: #163794;
}
.btn-info:hover{
  background-color: #31b0d5;
  border-color: #269abc;
}



/* Danger button (Logout) */
.btn-danger{
  background-color: #d9534f;
  border-color: #d43f3a;
}
.btn-danger:hover{
  background-color: #c9302c;
  border-color: #ac2925;
}
 #btn-simpan:disabled{
    opacity: .6;
    cursor: not-allowed;
  }
/* Mobile: beri jarak sentuh lebih besar */
@media (max-width: 480px){
  .btn{
    padding: 8px 16px;
    font-size: 13px;
  }
}
  .nilai-field:disabled{
    background:#eee;
    cursor:not-allowed;
  }
  .total-score{
    font-weight:700;
    text-align:center;
    background:#f9f9f9;
  }
  .invalid-value{
    border:2px solid #e74c3c !important;
    background:#fdecea !important;
  }
  .hint-invalid{
    display:block;
    font-size:11px;
    margin-top:4px;
    color:#e74c3c;
  }

    .nilai-pending{
    background:#fff8d9 !important;
    border:2px dashed #f1c40f !important;
  }
  .table-scroll{
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch; /* smooth di mobile */
    }

    .rubrik{
    min-width: 1000px; /* paksa tabel lebih lebar dari layar */
    }
    .rubrik-modal{
      width: min(1200px, calc(100% - 40px));
      max-height: 80vh;
      overflow: auto;
      border: 0;
      border-radius: 8px;
      padding: 20px;
    }
    .rubrik-modal::backdrop{ background: rgba(0, 0, 0, .5); }
    .rubrik-modal h2{ margin-top: 0; font-size: 18px; }
    .rubrik-modal th, .rubrik-modal td{ border: 1px solid #444; padding: 10px; }
    .rubrik-modal th{ background: #eee; }
    .rubrik-modal .score{ min-width: 900px; }
    .rubrik-modal .score-choice{ display: block; width: 100%; min-height: 100px; padding: 10px; border: 0; background: transparent; color: inherit; font: inherit; text-align: left; cursor: pointer; }
    .rubrik-modal td.score-option{ padding: 0; }
    .rubrik-modal td.score-option.selected{ background: #2563eb; color: #fff; }
    .rubrik-modal .score-choice:focus-visible{ outline: 3px solid #60a5fa; outline-offset: -3px; }
    #rubrik-modal-error{ color: #c62828; }
    .rubrik-modal .modal-actions{ margin-top: 16px; text-align: right; }
    .score-input.nilai-field{ cursor: pointer; }
    @media print{ .rubrik-modal{ display: none; } }
  </style>

</head>
<body>
@php
    // Rubrik per kolom. Kunci mengikuti nama field agar payload penilaian tetap sama.
    // Kriteria selain diagnosis banding merupakan draf yang dapat disesuaikan.
    $rubrikKolom = [
        'sharing' => [
            'judul' => 'Menyusun Diagnosis Banding dalam Diagram Venn',
            'kriteria' => [
                1 => 'Diagnosis banding tidak relevan dengan gejala kasus, atau hanya menyebut 1 kemungkinan diagnosis; diagram Venn tidak dibuat',
                2 => 'Menyusun 2 diagnosis banding berdasarkan gejala, namun salah satu kurang relevan/masih terlalu umum; diagram Venn dibuat namun kurang rapi.',
                3 => 'Menyusun 2-3 diagnosis banding yang relevan dan masuk akal secara klinis; diagram Venn dibuat dengan rapi dan area irisan/pembeda mulai terisi.',
                4 => 'Menyusun ≥3 diagnosis banding yang relevan (mencakup diagnosis sering/common maupun "can`t miss"); diagram Venn rapi, lengkap, dan informatif.',
            ],
        ],
        'argumentasi' => [
            'judul' => 'Menggali Data Gejala/Tanda/Pemeriksaan Fisik',
            'kriteria' => [
                1 => 'Data yang digali tidak terarah/tidak sesuai diagnosis banding; anamnesis dan pemeriksaan fisik tidak sistematis',
                2 => 'Data yang digali sebagian sesuai diagnosis banding, namun ada data kunci (penting untuk membedakan) yang terlewat.',
                3 => 'Data anamnesis dan pemeriksaan fisik digali secara terarah dan relevan untuk menguji sebagian besar diagnosis banding',
                4 => 'Data anamnesis dan pemeriksaan fisik digali secara sistematis, lengkap, dan tepat sasaran untuk menguji seluruh diagnosis banding pada diagram',
            ],
        ],
        'keaktifan' => [
            'judul' => 'Menentukan Diagnosis Kerja Berdasarkan Data',
            'kriteria' => [
                1 => 'Diagnosis kerja tidak ditentukan, atau ditentukan tanpa dasar data yang jelas (menebak).',
                2 => 'Diagnosis kerja ditentukan, namun kurang konsisten dengan data/fitur pembeda pada diagram Venn',
                3 => 'Diagnosis kerja tepat dan konsisten dengan data serta fitur pembeda pada diagram Venn',
                4 => 'Diagnosis kerja tepat, konsisten dengan diagram, disertai justifikasi ilmiah mengapa diagnosis lain disingkirkan/belum disingkirkan.',
            ],
        ],
        'dominasi' => [
            'judul' => 'Mengusulkan Pemeriksaan Penunjang',
            'kriteria' => [
                1 => 'Tidak mengusulkan pemeriksaan penunjang, atau usulan tidak relevan dengan diagnosis kerja/banding',
                2 => 'Mengusulkan pemeriksaan penunjang yang sebagian relevan, namun ada pemeriksaan penting yang terlewat atau berlebihan (tidak efisien)',
                3 => 'Mengusulkan pemeriksaan penunjang yang relevan dan cukup untuk mengonfirmasi diagnosis kerja.',
                4 => 'Mengusulkan pemeriksaan penunjang yang relevan, efisien (evidence-based), dan mampu menjelaskan tujuan tiap pemeriksaan terhadap diagnosis banding.',
            ],
        ],
        'kolaborasi' => [
            'judul' => 'Menetapkan Diagnosis Definitif',
            'kriteria' => [
                1 => 'Diagnosis definitif tidak ditetapkan, atau tidak sesuai dengan hasil pemeriksaan penunjang.',
                2 => 'Diagnosis definitif kurang sesuai dengan hasil pemeriksaan',
                3 => 'Diagnosis definitif sesuai tetapi dasar penetapannya belum lengkap',
                4 => 'Diagnosis definitif tepat berdasarkan data dan hasil pemeriksaan sesuai standar',
            ],
        ],
        'disiplin' => [
            'judul' => 'Menentukan Penatalaksanaan Kausatif',
            'kriteria' => [
                1 => 'Tidak mengusulkan penatalaksanaan kausatif, atau usulan tidak sesuai etiologi/diagnosis definitif.',
                2 => 'Mengusulkan penatalaksanaan kausatif yang sebagian sesuai, namun kurang lengkap (dosis/durasi/alternatif tidak dijelaskan).',
                3 => 'Mengusulkan penatalaksanaan kausatif yang tepat dan sesuai dengan diagnosis definitif serta kondisi pasien.',
                4 => 'Mengusulkan penatalaksanaan kausatif yang tepat, lengkap, evidence-based, dan mempertimbangkan kondisi individual pasien (komorbid, kontraindikasi, dsb).',
            ],
        ],
        'komunikasi' => [
            'judul' => 'Menjelaskan Perjalanan Penyakit & Prognosis',
            'kriteria' => [
                1 => 'Tidak mampu menjelaskan perjalanan penyakit maupun prognosis pasien.',
                2 => 'Menjelaskan perjalanan penyakit secara umum namun kurang runtut, atau prognosis tidak dikaitkan dengan kondisi pasien.',
                3 => 'Menjelaskan perjalanan penyakit secara runtut (onset-perkembangan-tata laksana) serta menyampaikan prognosis yang sesuai',
                4 => 'Menjelaskan perjalanan penyakit secara runtut dan komprehensif, mengaitkan patofisiologi dengan tata laksana yang diberikan, serta menyampaikan prognosis (quo ad vitam/functionam/sanationam) secara tepat dan meyakinkan.',
            ],
        ],

    ];
@endphp
   <noscript>
    <style>
        .js-required {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #fff;
            z-index: 99999;
            overflow-y: auto;
            padding: 30px;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .js-required .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .js-required h1 {
            color: #c62828;
            margin-bottom: 20px;
        }

        .js-required h2 {
            margin-top: 25px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }

        .js-required .alert {
            background: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>

    <div class="js-required">
        <div class="container">

            <h1>⚠ JavaScript Diperlukan</h1>

            <div class="alert">
                Aplikasi ini memerlukan JavaScript agar dapat berfungsi dengan baik.<br>
                Silakan aktifkan JavaScript pada browser Anda atau hubungi Administrator Sistem.
            </div>

            <h2>Android</h2>

            <h3>Google Chrome</h3>
            <ol>
                <li>Buka Chrome.</li>
                <li>Ketuk ikon tiga titik (⋮).</li>
                <li>Pilih Settings.</li>
                <li>Pilih Site Settings.</li>
                <li>Pilih JavaScript.</li>
                <li>Aktifkan JavaScript.</li>
            </ol>

            <h3>Firefox for Android</h3>
            <ol>
                <li>Buka menu (⋮)</li>
                <li>Pilih <b>Add-ons</b>.</li>
                <li>Nonaktifkan add-on yang memblokir script seperti:
                    <ul>
                        <li>NoScript</li>
                        <li>uBlock Origin (jika memblokir JavaScript)</li>
                        <li>AdBlock</li>
                        <li>Privacy Badger</li>
                    </ul>
                </li>
                <li>Tutup dan buka kembali Firefox.</li>
                <li>Muat ulang halaman.</li>
            </ol>

            <h3>Samsung Internet</h3>
            <ol>
                <li>Buka Samsung Internet.</li>
                <li>Pilih Menu (☰).</li>
                <li>Pilih Settings.</li>
                <li>Pilih Sites and Downloads.</li>
                <li>Pilih JavaScript.</li>
                <li>Aktifkan JavaScript.</li>
            </ol>

            <h2>iPhone / iPad (iOS)</h2>

            <h3>Safari</h3>
            <ol>
                <li>Buka Pengaturan (Settings).</li>
                <li>Pilih Apps → Safari.</li>
                <li>Pilih Advanced.</li>
                <li>Aktifkan JavaScript.</li>
            </ol>

            <h3>Google Chrome iOS</h3>
            <p>
                Chrome pada iPhone mengikuti pengaturan Safari.
                Aktifkan JavaScript melalui pengaturan Safari.
            </p>

            <h2>Windows</h2>

            <h3>Google Chrome</h3>
            <ol>
                <li>Buka Chrome.</li>
                <li>Klik ikon tiga titik (⋮).</li>
                <li>Pilih Settings.</li>
                <li>Pilih Privacy and Security.</li>
                <li>Pilih Site Settings.</li>
                <li>Pilih JavaScript.</li>
                <li>Pilih "Sites can use JavaScript".</li>
            </ol>

            <h3>Microsoft Edge</h3>
            <ol>
                <li>Buka Microsoft Edge.</li>
                <li>Klik ikon tiga titik (...).</li>
                <li>Pilih Settings.</li>
                <li>Pilih Cookies and Site Permissions.</li>
                <li>Pilih JavaScript.</li>
                <li>Aktifkan Allowed.</li>
            </ol>

            <h3>Mozilla Firefox</h3>
            <ol>
                <li>Ketik <code>about:config</code> pada address bar.</li>
                <li>Cari <code>javascript.enabled</code>.</li>
                <li>Pastikan nilainya <b>true</b>.</li>
            </ol>

            <h2>Jika Masih Tidak Berfungsi</h2>
            <ul>
                <li>Refresh halaman.</li>
                <li>Tutup dan buka kembali browser.</li>
                <li>Nonaktifkan AdBlock atau NoScript.</li>
                <li>Perbarui browser ke versi terbaru.</li>
            </ul>

        </div>
    </div>
</noscript>
  <div class="page">
    <div class="title-wrap">
      <div class="title-line"></div>
      <div class="title">RUBRIK PENILAIAN MAHASISWA DALAM DISKUSI CR {{ $data['kegiatan_pbl']->name }}</div>
    </div>

    <div class="meta">
      <div class="col">
        <div class="meta-row"><div class="meta-label">Kelompok</div><div>:</div>{{ $data['kelompok']->nama_kelompok }}</div>
        <div class="meta-row"><div class="meta-label">Skenario</div><div>:</div>{{ $data['skenario']->judul_sk }}</div>
        <div class="meta-row"><div class="meta-label">Diskusi ke-</div><div>:</div>{{ $data['pertemuan'] }}</div>
      </div>
      <div class="col">
        <div class="meta-row"><div class="meta-label">Blok</div><div>:</div>{{ $data['kegiatan_pbl']->name }}</div>
        <div class="meta-row"><div class="meta-label">Tahun Ajaran</div><div>:</div>{{ $data['kegiatan_pbl']->tahun_akademik }}</div>
        <div class="meta-row"><div class="meta-label">Nama Tutor</div><div>:</div>{{ $tutor->nama }}</div>
      </div>
    </div>
<form action="{{ route('kegiatan_pbl.nilai.input') }}" method="post">
  @csrf
  <input type="hidden" name="type" value="{{ $data['kegiatan_pbl']->type }}">
    <div class="table-scroll">
        <table class="rubrik">
            <thead>
                <tr>
                <th class="w-no" rowspan="2">No.</th>
                <th class="w-nama" rowspan="2">Nama Mahasiswa</th>
                <th class="th-group"></th>
                <th class="th-group" colspan="5">diagnosis</th>
                <th class="th-group" colspan="2">penatalaksanaan</th>
                <th class="w-total" rowspan="2">
                    Total<br/><span style="font-weight:700;">(Maks:<br/>28)</span>
                </th>
                </tr>
                <tr>
                <th class="w-mini rotate"><span>Hadir</span></th>
                <th class="w-mini rotate">Menyusun Diagnosis Banding dalam Diagram Venn</th>
                <th class="w-mini rotate">Menggali Data Gejala/Tanda/Pemeriksaan Fisik</th>
                <th class="w-mini rotate">Menentukan Diagnosis Kerja Berdasarkan Data</th>
                <th class="w-mini rotate">Mengusulkan Pemeriksaan Penunjang </th>
                <th class="w-mini rotate">Menetapkan Diagnosis Definitif</th>

                <th class="w-mini rotate">Menentukan Penatalaksanaan Kausatif</th>
                <th class="w-mini rotate">Menjelaskan Perjalanan Penyakit & Prognosis</th>
                </tr>
            </thead>

            <tbody>
                @foreach($peserta as $datas)
                <tr data-peserta-id="{{ $datas->id }}">
                    <td class="no">{{ $loop->iteration }}</td>
                    <td class="nama">
                        {{ $datas->name }} ({{ $datas->npm }})
                        <input type="hidden" name="nilai[{{ $datas->id }}][sopan]" value="0">
                    </td>
                    <input type="hidden" name="nilai[{{ $datas->id }}][blok]" value="{{ $data['kegiatan_pbl']->id }}">
                    <input type="hidden" name="nilai[{{ $datas->id }}][kelompok]" value="{{ $data['kelompok']->id }}">
                    <input type="hidden" name="nilai[{{ $datas->id }}][skenario]" value="{{ $data['skenario']->id }}">
                    <input type="hidden" name="nilai[{{ $datas->id }}][pertemuan]" value="{{ $data['pertemuan'] }}">
                    <input type="hidden" name="nilai[{{ $datas->id }}][tutor]" value="{{ $tutor->id }}">

                    {{-- HADIR --}}
                    <td>
                    {{-- supaya kalau tidak dicentang tetap terkirim 0 --}}
                    <input type="hidden" name="nilai[{{ $datas->id }}][hadir]" value="0">

                    <input type="checkbox"
                            class="score-input hadir-check"
                            name="nilai[{{ $datas->id }}][hadir]"
                            value="1">
                    </td>

                    {{-- Sharing --}}
                    <td>
                    <input type="number" class="score-input nilai-field"
                            data-rubrik="sharing"
                            name="nilai[{{ $datas->id }}][sharing]"
                            min="1" max="4">
                    </td>

                    {{-- Argumentasi --}}
                    <td>
                    <input type="number" class="score-input nilai-field"
                            data-rubrik="argumentasi"
                            name="nilai[{{ $datas->id }}][argumentasi]"
                            min="1" max="4">
                    </td>

                    {{-- Keaktifan --}}
                    <td>
                    <input type="number" class="score-input nilai-field"
                            data-rubrik="keaktifan"
                            name="nilai[{{ $datas->id }}][keaktifan]"
                            min="1" max="4">
                    </td>

                    {{-- Dominasi --}}
                    <td>
                    <input type="number" class="score-input nilai-field"
                            data-rubrik="dominasi"
                            name="nilai[{{ $datas->id }}][dominasi]"
                            min="1" max="4">
                    </td>

                    {{-- Kolaborasi --}}
                    <td>
                    <input type="number" class="score-input nilai-field"
                            data-rubrik="kolaborasi"
                            name="nilai[{{ $datas->id }}][kolaborasi]"
                            min="1" max="4">
                    </td>

                    {{-- Disiplin --}}
                    <td>
                    <input type="number" class="score-input nilai-field"
                            data-rubrik="disiplin"
                            name="nilai[{{ $datas->id }}][disiplin]"
                            min="1" max="4">
                    </td>

                    {{-- Komunikasi --}}
                    <td>
                    <input type="number" class="score-input nilai-field"
                            data-rubrik="komunikasi"
                            name="nilai[{{ $datas->id }}][komunikasi]"
                            min="1" max="4">
                    </td>


                    {{-- TOTAL (tampil + hidden untuk dikirim ke server) --}}
                    <td class="total-score">0</td>
                    <input type="hidden"
                        name="nilai[{{ $datas->id }}][total]"
                        class="total-input"
                        value="0">
                </tr>
                @endforeach
            </tbody>
            </table>

        <div class="score-wrap">
          <table class="score">
            <colgroup>
              <col class="score-no">
              <col class="score-criteria">
              <col class="score-level">
              <col class="score-level">
              <col class="score-level">
              <col class="score-level">
            </colgroup>
            <thead>
              <tr><th></th><th colspan="5" class="center">Rubrik Penilaian  Critical Reasoning</th></tr>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kriteria Penilaian </th>
                <th scope="col">Skor 1</th>
                <th scope="col">Skor 2</th>
                <th scope="col">Skor 3</th>
                <th scope="col">Skor 4</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rubrikKolom as $rubrik)
                <tr>
                  <td class="center">{{ $loop->iteration }}</td>
                  <td>{{ $rubrik['judul'] }}</td>
                  @for($skor = 1; $skor <= 4; $skor++)
                    <td>{{ $rubrik['kriteria'][$skor] }}</td>
                  @endfor
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    
     <hr>
     <h5>Hal yang perlu dilaporkan selama tutorial berlangsung</h5>
     <textarea name="BA" id="BA" style="width:100%; height:200px;" placeholder="Mohon tulis disini"></textarea>
      <h3 style="color: red;">Penilaian hanya dapat dilakukan Jika Anda Terhubung ke Wifi Hotspot FK</h3>
        <hr>
        <div class="nav-action">
        <a href="{{ route('kegiatan_pbl.logout') }}"
            id="btn-logout"
            class="btn btn-danger">
            Logout
            </a>

  <button type="submit" id="btn-simpan" class="btn btn-info" disabled  onclick="return confirm('Penilaian hanya dapat dilakukan satu kali, apakah Anda yakin?')">
    Simpan Nilai
    </button>
</form>
</div>
        <hr>
        <table class="scorex">
            <thead>
                <tr>
                    <th width="10">No</th>
                    <th width="200"> </th>
                    <th> Skenario  {{ $data['skenario']->nomor_sk }} <br/>
                        {{ $data['skenario']->judul_sk }} </th>
                </tr>
            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1 .</td>
                                                    <td>Skenario</td>
                                                    <td>{!! $data["skenario"]->skenario !!}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2 .</td>
                                                    <td>Daftar Istilah</td>
                                                    <td>{!! $data["skenario"]->step_1 !!}</td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center">3 .</td>
                                                    <td>Daftar Pertanyaan</td>
                                                    <td>{!! $data["skenario"]->step_2 !!}</td>

                                                </tr>
                                                <tr>
                                                    <td class="text-center">4 .</td>
                                                    <td>Sasaran Belajar</td>
                                                    <td>
                                                         {!! $data["skenario"]->sasbel !!}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">5 .</td>
                                                    <td>Mind Map</td>
                                                    <td>
                                                         {!! $data["skenario"]->mindmap !!}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center" >6 .</td>
                                                    <td >Mininotes</td>
                                                    <td>
                                                        {!! $data["skenario"]->mininotes !!}

                                                    </td>
                                                </tr>

                                                 <tr>
                                                    <td class="text-center">7 .</td>
                                                    <td>Daftar Pustaka</td>
                                                    <td>
                                                         {!! $data["skenario"]->dafpus !!}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>


    </div>
  </div>

<dialog id="rubrik-modal" class="rubrik-modal" aria-labelledby="rubrik-modal-title">
  <h2 id="rubrik-modal-title">Rubrik Penilaian</h2>
  <p id="rubrik-modal-student"></p>
  <p>Pilih satu skor untuk setiap kriteria, lalu klik Simpan Skor.</p>
  <div class="table-scroll">
    <table class="score">
      <thead><tr><th scope="col">Kriteria Penilaian</th><th scope="col">Skor 1</th><th scope="col">Skor 2</th><th scope="col">Skor 3</th><th scope="col">Skor 4</th></tr></thead>
      <tbody id="rubrik-modal-body"></tbody>
    </table>
  </div>
  <p id="rubrik-modal-error" role="alert" hidden>Pilih skor untuk semua kriteria sebelum menyimpan.</p>
  <div class="modal-actions">
    <button type="button" id="rubrik-modal-close" class="btn btn-danger">Batal</button>
    <button type="button" id="rubrik-modal-save" class="btn btn-info">Simpan Skor</button>
  </div>
</dialog>

<script>
(function () {
  const rubrikKolom = @json($rubrikKolom);
  const modal = document.getElementById('rubrik-modal');
  let activeRow = null;
  let returnFocus = null;
  let draftScores = {};

  document.querySelectorAll('.score-input.nilai-field').forEach(input => {
    input.min = '1';
    input.max = '4';
    input.readOnly = true;
    input.classList.remove('nilai-restrict');
    input.setAttribute('aria-haspopup', 'dialog');
    input.setAttribute('aria-controls', 'rubrik-modal');
  });
  document.querySelectorAll('.hadir-check').forEach(input => {
    input.setAttribute('aria-haspopup', 'dialog');
    input.setAttribute('aria-controls', 'rubrik-modal');
  });

  function openRubrik(row, trigger) {
    if (!row.querySelector('.hadir-check').checked || modal.open) return;
    activeRow = row;
    returnFocus = trigger;
    draftScores = {};
    document.getElementById('rubrik-modal-title').textContent = 'Rubrik Penilaian Critical Reasoning';
    document.getElementById('rubrik-modal-student').textContent = row.querySelector('.nama').textContent.trim();
    document.getElementById('rubrik-modal-error').hidden = true;
    const tbody = document.getElementById('rubrik-modal-body');
    tbody.replaceChildren();
    Object.entries(rubrikKolom).forEach(([key, rubrik]) => {
      const input = row.querySelector('[data-rubrik="' + key + '"]');
      draftScores[key] = input.value;
      const criteriaRow = document.createElement('tr');
      const title = document.createElement('th');
      title.scope = 'row';
      title.textContent = rubrik.judul;
      criteriaRow.appendChild(title);
      Object.entries(rubrik.kriteria).forEach(([score, description]) => {
        const cell = document.createElement('td');
        cell.className = 'score-option';
        cell.classList.toggle('selected', score === input.value);
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'score-choice';
        button.textContent = description;
        button.setAttribute('aria-label', rubrik.judul + ', skor ' + score + ': ' + description);
        button.setAttribute('aria-pressed', String(score === input.value));
        button.addEventListener('click', function () {
          draftScores[key] = score;
          criteriaRow.querySelectorAll('.score-option').forEach(option => {
            const selected = option === cell;
            option.classList.toggle('selected', selected);
            option.querySelector('button').setAttribute('aria-pressed', String(selected));
          });
          document.getElementById('rubrik-modal-error').hidden = true;
        });
        cell.appendChild(button);
        criteriaRow.appendChild(cell);
      });
      tbody.appendChild(criteriaRow);
    });
    modal.showModal();
  }

  document.addEventListener('click', function (event) {
    if (event.target.matches('.score-input.nilai-field') && !event.target.disabled) {
      openRubrik(event.target.closest('tr'), event.target);
    }
  });

  document.addEventListener('keydown', function (event) {
    if (event.target.matches('.score-input.nilai-field') && !event.target.disabled &&
        (event.key === 'Enter' || event.key === ' ')) {
      event.preventDefault();
      openRubrik(event.target.closest('tr'), event.target);
    }
  });

  document.getElementById('rubrik-modal-save').addEventListener('click', function () {
    if (!activeRow || !activeRow.querySelector('.hadir-check').checked) return;
    if (Object.keys(rubrikKolom).some(key => !['1', '2', '3', '4'].includes(draftScores[key]))) {
      document.getElementById('rubrik-modal-error').hidden = false;
      return;
    }
    activeRow.querySelectorAll('.nilai-field').forEach(input => {
      input.value = draftScores[input.dataset.rubrik];
    });
    updateRow(activeRow);
    modal.close();
  });

  document.getElementById('rubrik-modal-close').addEventListener('click', () => modal.close());
  modal.addEventListener('close', function () {
    if (returnFocus) returnFocus.focus();
    activeRow = null;
    returnFocus = null;
    draftScores = {};
  });

  function toInt(val) {
    const n = parseInt(val, 10);
    return Number.isNaN(n) ? null : n;
  }

  function ensureHint(input) {
    // buat 1 hint kecil di bawah input (sekali saja)
    let hint = input.parentElement.querySelector('.hint-invalid');
    if (!hint) {
      hint = document.createElement('small');
      hint.className = 'hint-invalid';
      hint.textContent = '';
      hint.style.display = 'none';
      input.parentElement.appendChild(hint);
    }
    return hint;
  }

  function markPending(input, isPending){
    if (isPending) {
        input.classList.add('nilai-pending');
    } else {
        input.classList.remove('nilai-pending');
    }
    }
  function markInvalid(input, isInvalid) {
    const hint = ensureHint(input);
    if (isInvalid) {
      input.classList.add('invalid-value');
      hint.style.display = 'block';
    } else {
      input.classList.remove('invalid-value');
      hint.style.display = 'none';
    }
  }



  function validateRestricted(input) {
    // hanya untuk field yg punya class nilai-restrict
    if (!input.classList.contains('nilai-restrict')) {
      markInvalid(input, false);
      return true;
    }

    // kosong = dianggap belum isi (tidak invalid)
    if (input.value === '') {
      markInvalid(input, false);
      return true;
    }

    const v = toInt(input.value);
    const ok = (v !== null && v >= 1 && v <= 4);

    markInvalid(input, !ok);
    return ok;
  }

  function clampMinMax(input) {
    // clamp min/max untuk semua number
    if (input.type !== 'number') return;
    if (input.value === '') return;

    const v = toInt(input.value);
    if (v === null) return;

    const min = (input.min !== '' ? toInt(input.min) : null);
    const max = (input.max !== '' ? toInt(input.max) : null);

    if (min !== null && v < min) input.value = min;
    if (max !== null && v > max) input.value = max;
  }

   function updateSubmitButton() {
            const pendingCount = document.querySelectorAll('.nilai-pending').length;
            const invalidCount = document.querySelectorAll('.invalid-value').length;

            const ba = document.getElementById('BA');
            const baEmpty = !ba || ba.value.trim() === '';

            const hadirCount = document.querySelectorAll('.hadir-check:checked').length;
            const noHadir = hadirCount === 0;

            const btn = document.getElementById('btn-simpan');
            if (!btn) return;

            btn.disabled = (
                pendingCount > 0 ||
                invalidCount > 0 ||
                baEmpty ||
                noHadir
            );
            }

    function updateLogoutButton() {
    const btnLogout = document.getElementById('btn-logout');
    if (!btnLogout) return;

    // cek checkbox hadir
    const adaHadir = document.querySelectorAll('.hadir-check:checked').length > 0;

    // cek ada nilai terisi
    const adaNilai = [...document.querySelectorAll('.nilai-field')]
        .some(input => input.value.trim() !== '');

    // cek BA
    const ba = document.getElementById('BA');
    const adaBA = ba && ba.value.trim() !== '';

    const formSudahDiisi = adaHadir || adaNilai || adaBA;

    if (formSudahDiisi) {
        btnLogout.classList.add('disabled');
        btnLogout.style.pointerEvents = 'none';
        btnLogout.style.opacity = '0.5';
    } else {
        btnLogout.classList.remove('disabled');
        btnLogout.style.pointerEvents = '';
        btnLogout.style.opacity = '';
    }
}

function validatePositiveInput(input) {
  if (input.classList.contains('nilai-restrict')) {
    return true;
  }

  if (input.value === '') {
    markInvalid(input, false);
    return true;
  }

  const v = toInt(input.value);
  const ok = v !== null && v >= 1 && v <= 4;

  markInvalid(input, !ok);
  return ok;
}

  function updateRow(row) {
  const hadirCheck = row.querySelector('.hadir-check');
  const hadir = hadirCheck ? hadirCheck.checked : false;

  const fields = row.querySelectorAll('.nilai-field');
  const totalCell = row.querySelector('.total-score');
  const totalInput = row.querySelector('.total-input');

  if (!hadir) {
    fields.forEach(input => {
      input.value = '';
      input.disabled = true;
      markInvalid(input, false);
      markPending(input, false);
    });

    if (totalCell) totalCell.innerText = 0;
    if (totalInput) totalInput.value = 0;

     updateSubmitButton();
     updateLogoutButton();
    return;
  }

  let total = 0;

  fields.forEach(input => {
    input.disabled = false;

    // clamp min max
    clampMinMax(input);

    // Validasi skor
    const isValidRestricted = validateRestricted(input);
    const isValidPositive = validatePositiveInput(input);

    const isValid = isValidRestricted && isValidPositive;

    const isEmpty = (input.value === '');
    markPending(input, isEmpty && isValid);

    if (!isValid) return;

    const v = toInt(input.value);
    if (v !== null) total += v;
        });

        if (totalCell) totalCell.innerText = total;
        if (totalInput) totalInput.value = total;

        // update status tombol simpan
        updateSubmitButton();
        updateLogoutButton();
        }


  // --- Events ---
  document.addEventListener('change', function (e) {
    // toggle hadir
    if (e.target.classList.contains('hadir-check')) {
      const row = e.target.closest('tr');
      if (row) {
        updateRow(row);
        if (e.target.checked) openRubrik(row, e.target);
      }
      return;
    }

    // saat number selesai diubah (mis. pakai spinner)
    if (e.target.classList.contains('nilai-field')) {
      const row = e.target.closest('tr');
      if (row) updateRow(row);
      return;
    }
  });

  document.addEventListener('input', function (e) {
  // input nilai
    if (e.target.classList.contains('nilai-field')) {
        const row = e.target.closest('tr');
        if (row) updateRow(row);
        return;
    }

    // input BA
    if (e.target.id === 'BA') {
        updateSubmitButton();
        updateLogoutButton();
        return;
    }
    })
  // init semua baris saat load
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.rubrik tbody tr[data-peserta-id]').forEach(row => updateRow(row));
    updateSubmitButton();
    updateLogoutButton();
  });

})();


</script>



</body>
</html>
