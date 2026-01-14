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
    .page { max-width: 760px; margin: 0 auto; }

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
      white-space: nowrap;
      font-weight:700;
      font-size:11px;
    }
    .rubrik tbody td{ height: 20px; }
    .rubrik tbody td.nama{ text-align:left; padding: 0 6px; }
    .rubrik tbody td.no{ font-weight:600; }

    /* ====== Scoring tables ====== */
    .score-wrap{
      display:flex; gap: 26px;
      margin-top: 18px;
      align-items:flex-start;
    }
    .score{
      width: 50%;
      border:2px solid #444;
      font-size:11px;
    }
    .score th, .score td{
      border:1px solid #444;
      padding:4px 6px;
    }
    .score thead th{
      background:#c9c9c9;
      font-weight:800;
    }
    .score .subhead th{
      background:#d9d9d9;
      font-weight:800;
      text-align:center;
    }
    .score .left{ width: 40%; text-align:left; }
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

/* Mobile: beri jarak sentuh lebih besar */
@media (max-width: 480px){
  .btn{
    padding: 8px 16px;
    font-size: 13px;
  }
}

  </style>

</head>
<body>
  <div class="page">
    <div class="title-wrap">
      <div class="title-line"></div>
      <div class="title">RUBRIK PENILAIAN MAHASISWA DALAM DISKUSI PBL {{ $data['kegiatan_pbl']->name }}</div>
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

    <div class="table-scroll">
        <table class="rubrik">
          <thead>
            <tr>
              <th class="w-no" rowspan="2">No.</th>
              <th class="w-nama" rowspan="2">Nama Mahasiswa</th>
              <th class="th-group" ></th>
              <th class="th-group" colspan="5">Keterlibatan dalam<br/>diskusi</th>
              <th class="th-group" colspan="3">Perilaku</th>
              <th class="w-total" rowspan="2">
                Total<br/><span style="font-weight:700;">(Maks:<br/>50)</span>
              </th>
            </tr>
            <tr>
              <th class="w-mini rotate"><span>Hadir</span></th>
              <th class="w-mini rotate"><span>Sharing</span></th>
              <th class="w-mini rotate"><span>Argumentasi</span></th>
              <th class="w-mini rotate"><span>Keaktifan</span></th>
              <th class="w-mini rotate"><span>Dominasi</span></th>
              <th class="w-mini rotate"><span>Kolaborasi</span></th>

              <th class="w-mini rotate"><span>Disiplin/Kehadiran</span></th>
              <th class="w-mini rotate"><span>Komunikasi</span></th>
              <th class="w-mini rotate"><span>Sopan santun</span></th>
            </tr>
          </thead>
          <tbody>
           @foreach($peserta as $datas)

            <!-- 10 baris -->
            <tr>
                <td class="no">{{ $loop->iteration }}</td>
                <td class="nama">{{ $datas->name }} ({{ $datas->npm }})</td>

                <td><input type="checkbox" class="score-input" value="1"></td>
                <!-- Sharing -->
                <td><input type="number" class="score-input" min="0" max="10"></td>

                <!-- Argumentasi -->
                <td><input type="number" class="score-input" min="0" max="10"></td>

                <!-- Keaktifan -->
                <td><input type="number" class="score-input" min="0" max="10"></td>

                <!-- Dominasi -->
                <td><input type="number" class="score-input" min="-5" max="0"></td>

                <!-- Kolaborasi -->
                <td><input type="number" class="score-input" min="0" max="10"></td>

                <!-- Disiplin -->
                <td><input type="number" class="score-input" min="-5" max="0"></td>

                <!-- Komunikasi -->
                <td><input type="number" class="score-input" min="0" max="10"></td>

                <!-- Sopan santun -->
                <td><input type="number" class="score-input" min="0" max="10"></td>

                <!-- Total -->
                <td></td>
              </tr>
            @endforeach

          </tbody>
        </table>
        <div class="score-wrap">
      <!-- Kiri -->
      <table class="score">
        <thead>
          <tr><th></th><th colspan="3" class="center">Skor</th></tr>
          <tr class="subhead">
            <th></th><th class="center">0-5</th><th class="center">6-7</th><th class="center">8-10</th>
          </tr>
        </thead>
        <tbody>
          <tr><td class="left"><i>Sharing</i></td><td class="center">Minimal</td><td class="center">Kadang-kadang</td><td class="center">Selalu</td></tr>
          <tr><td class="left">Argumentasi</td><td class="center">Kurang</td><td class="center">Cukup</td><td class="center">Baik</td></tr>
          <tr><td class="left">Keaktifan</td><td class="center">Kurang</td><td class="center">Cukup</td><td class="center">Baik</td></tr>
          <tr><td class="left">Komunikasi</td><td class="center">Kurang</td><td class="center">Cukup</td><td class="center">Baik</td></tr>
          <tr><td class="left">Kolaborasi</td><td class="center">Kurang</td><td class="center">Cukup</td><td class="center">Baik</td></tr>
        </tbody>
      </table>

      <!-- Kanan -->
      <table class="score">
        <thead>
          <tr><th></th><th colspan="3" class="center">Skor</th></tr>
          <tr class="subhead">
            <th></th><th class="center">-5</th><th class="center">-3</th><th class="center">0</th>
          </tr>
        </thead>
        <tbody>
          <tr><td class="left">Dominasi</td><td class="center">Ya</td><td class="center">Kadang-kadang</td><td class="center">Tidak</td></tr>
          <tr><td class="left">Disiplin/Kehadiran</td><td class="center">Telat &gt; 15 menit</td><td class="center">Telat &lt; 15 menit</td><td class="center">Tepat waktu</td></tr>
          <tr><td class="left">Sopan santun</td><td class="center">Tidak ada</td><td class="center">Kadang-kadang</td><td class="center">Selalu baik</td></tr>
        </tbody>
      </table>
    </div>

    <div class="defs">
      <div class="head">Definisi Istilah :</div>
      <table>
        <tr><td class="term"><i>Sharing</i></td><td class="colon">:</td><td><i>sharing</i> opini/informasi yang berhubungan dengan topik diskusi kepada anggota kelompok</td></tr>
        <tr><td class="term">Argumentasi</td><td class="colon">:</td><td>memberikan pengetahuan dan argumentasi logis berdasarkan literatur</td></tr>
        <tr><td class="term">Keaktifan</td><td class="colon">:</td><td>keaktifan dalam diskusi tanpa intervensi tutor</td></tr>
        <tr><td class="term">Dominasi</td><td class="colon">:</td><td>mendominasi forum dalam diskusi kelompok</td></tr>
        <tr><td class="term">Komunikasi</td><td class="colon">:</td><td>mendengarkan, menjelaskan dan bertanya dengan menggunakan bahasa yang baik secara sistematis</td></tr>
        <tr><td class="term">Kolaborasi</td><td class="colon">:</td><td>kemampuan untuk bekerja sama dengan yang lain dan mengatasi konflik dalam kelompok</td></tr>
        <tr><td class="term">Sopan santun</td><td class="colon">:</td><td>menunjukkan perilaku saling menghormati satu sama lain</td></tr>
      </table>
    </div>
        <hr>
        <div class="nav-action">
  <a href="{{ route('kegiatan_pbl.logout') }}" class="btn btn-danger">
    Logout
  </a>

  <a href="#" class="btn btn-info">
    Simpan Nilai
  </a>
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
</body>
</html>
