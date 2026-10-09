<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Form PBL - FK UGJ</title>

  <style>
    @page { size: A4; margin: 18mm 16mm; }
    body { font-family: Arial, Helvetica, sans-serif; color:#000; margin:0; }
    .page { max-width: 760px; margin: 0 auto; }
    .sheet { page-break-after: always; }
    .sheet:last-child { page-break-after: auto; }

    .header{
      text-align:center;
      font-weight:700;
      text-transform:uppercase;
      font-size:12px;
      line-height:1.25;
      margin-top: 6px;
    }

    .title{
      text-align:center;
      font-weight:800;
      text-transform:uppercase;
      margin: 10px 0 10px;
      font-size:13px;
    }

    .line-strong{
      height:2px;
      background:#000;
      margin: 8px 0 14px;
    }

    .field-row{
      display:flex;
      gap: 10px;
      margin: 6px 0;
      font-size:12px;
      align-items:flex-end;
    }
    .field-label{ width: 160px; }
    .field-colon{ width: 10px; }
    .field-dots{
      flex:1;
      border-bottom: 1px dotted #000;
      height: 16px;
    }

    .para{
      font-size:12px;
      line-height:1.4;
      margin: 10px 0;
      text-align:justify;
    }

    .dots-area{
      margin-top: 6px;
      font-size:12px;
      line-height: 1.6;
    }
    .dots-line{
      border-bottom: 1px dotted #000;
      height: 18px;
      margin: 6px 0;
    }

    .sign-wrap{
      display:flex;
      justify-content:flex-end;
      margin-top: 14px;
      font-size:12px;
    }
    .sign-box{
      width: 260px;
      text-align:left;
    }
    .sign-center{
      text-align:center;
      margin-top: 12px;
    }
    .sign-line{
      border-bottom:1px solid #000;
      height: 18px;
      margin: 0 0 6px;
    }

    /* ====== Rubrik table ====== */
    .meta{
      display:flex; justify-content:space-between; gap: 20px;
      font-size:12px; margin-bottom: 10px;
    }
    .meta .col{ width:50%; }
    .meta-row{ display:flex; gap:8px; margin: 2px 0; }
    .meta-label{ width: 90px; }
    .meta-value{ flex:1; border-bottom:1px dotted #000; height:14px; }

    .table-scroll{ width:100%; overflow-x:auto; -webkit-overflow-scrolling:touch; }
    table{ width:100%; border-collapse:collapse; }
    .rubrik{ table-layout:fixed; border:2px solid #444; font-size:11px; min-width: 760px; }
    .rubrik th,.rubrik td{ border:1px solid #444; text-align:center; vertical-align:middle; padding:0; }
    .rubrik thead th{ font-weight:700; }

    .w-no{ width:40px; }
    .w-nama{ width:260px; }
    .w-mini{ width:30px; }
    .w-total{ width:70px; }

    .th-group{ padding:6px 4px; font-size:11px; }

    .rotate{ position:relative; height:110px; }
    .rotate > span{
      position:absolute; left:50%; top:50%;
      transform:translate(-50%,-50%) rotate(-90deg);
      white-space:nowrap; font-weight:700; font-size:11px;
    }
    .rubrik tbody td{ height:20px; }
    .rubrik tbody td.nama{ text-align:left; padding:0 6px; }
    .rubrik tbody td.no{ font-weight:600; }

    .score-wrap{ display:flex; gap: 24px; margin-top: 16px; align-items:flex-start; }
    .score{ width:50%; border:2px solid #444; font-size:11px; }
    .score th,.score td{ border:1px solid #444; padding:4px 6px; }
    .score thead th{ background:#c9c9c9; font-weight:800; }
    .score .subhead th{ background:#d9d9d9; font-weight:800; text-align:center; }
    .score .left{ width:40%; text-align:left; }
    .score .center{ text-align:center; }

    .defs{ margin-top: 12px; font-size:11px; line-height:1.25; text-align:center; }
    .defs .head{ font-weight:800; margin-bottom:4px; }
    .defs td{ padding:1px 0; vertical-align:top; }
    .defs .term{ width: 110px; }
    .defs .colon{ width: 10px; }

    .rubrik-footer{
      margin-top: 16px;
      display:flex;
      justify-content:flex-end;
      font-size:11px;
    }

    /* Mobile portrait */
    @media (max-width: 480px){
      .meta{ flex-direction:column; gap:6px; }
      .meta .col{ width:100%; }
      .score-wrap{ flex-direction:column; gap:10px; }
      .score{ width:100%; }
    }

    /* ===== Kop Surat ===== */
    .kop{
    width: 100%;
    margin-bottom: 8px;
    }
    /* Base button (Bootstrap-like) */
    .btn{
      display: inline-block;
      padding: 6px 14px;
      font-size: 14px;
      line-height: 1.4;
      border-radius: 4px;
      text-decoration: none;
      color: #ffffff;
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

    .kop img{
    width: 100%;
    height: auto;
    display: block;
    }
  </style>
</head>
<body>
  <!-- ===================== PAGE 2: RUBRIK ===================== -->
  <section class="sheet">
    <div class="page">
        <div class="kop">
        <img src="{{ asset('img/kopfkbaru.png') }}" alt="Kop FK UGJ">
        </div>

      <div class="title">RUBRIK PENILAIAN MAHASISWA DALAM DISKUSI PBL</div>

      <div class="meta">
        <div class="col">
          <div class="meta-row"><div class="meta-label">Kelompok</div><div>:</div>{{ $ba->kelompok->nama_kelompok }}</div>
          <div class="meta-row"><div class="meta-label">Skenario</div><div>:</div> Skenario {{ $ba->sks->nomor_sk }} ( {{ $ba->sks->judul_sk }})</div>
          <div class="meta-row"><div class="meta-label">Diskusi ke-</div><div>:</div>{{ $ba->pertemuan }}</div>
        </div>
        <div class="col">
          <div class="meta-row"><div class="meta-label">Blok</div><div>:</div>{{ $keg->name }}</div>
          <div class="meta-row"><div class="meta-label">Tahun Ajaran</div><div>:</div>{{ $keg->tahun_akademik }}</div>
          <div class="meta-row"><div class="meta-label">Nama Tutor</div><div>:</div>{{ $tutor->nama }}</div>
        </div>
      </div>

      <div class="table-scroll">
        <table class="rubrik">
          <thead>
            <tr>
              <th class="w-no" rowspan="2">No.</th>
              <th class="w-nama" rowspan="2">Nama Mahasiswa</th>
              <th class="th-group" colspan="5">Keterlibatan dalam<br>diskusi</th>
              <th class="th-group" colspan="3">Perilaku</th>
              <th class="w-total" rowspan="2">Total<br><span style="font-weight:700;">(Maks:<br>50)</span></th>
            </tr>
            <tr>
              <th class="w-mini rotate"><span>Sharing</span></th>
              <th class="w-mini rotate"><span>Argumentasi</span></th>
              <th class="w-mini rotate"><span>Keaktifan</span></th>
              <th class="w-mini rotate"><span>Dominasi</span></th>
              <th class="w-mini rotate"><span>Kolaborasi</span></th>
              <th class="w-mini rotate"><span>Disiplin/Kehadiran</span></th>
              <th class="w-mini rotate"><span>Komunikasi</span></th>
              <th class="w-mini rotate"><span>Sopan Santun</span></th>
            </tr>
          </thead>
          <tbody>
            <!-- 12 baris sesuai PDF -->
            @foreach ( $nilai as $data)
            <tr><td class="no">{{ $loop->iteration }}</td><td class="nama">{{ $data->peserta->name }}</td> <td>{{$data->sharing}}</td><td>{{$data->argumentasi}}</td><td>{{$data->keaktifan}}</td><td>{{$data->dominasi}}</td><td>{{$data->kolaborasi}}</td><td>{{ $data->disiplin }}</td><td>{{ $data->komunikasi }}</td><td>{{ $data->sopan }}</td><td>{{ $data->total }}</td></tr>

            @endforeach

        </table>
      </div>

      <div class="score-wrap">
        <table class="score">
          <thead>
            <tr><th></th><th colspan="3" class="center">Skor</th></tr>
            <tr class="subhead"><th></th><th class="center">0-5</th><th class="center">6-7</th><th class="center">8-10</th></tr>
          </thead>
          <tbody>
            <tr><td class="left"><i>Sharing</i></td><td class="center">Minimal</td><td class="center">Kadang-kadang</td><td class="center">Selalu</td></tr>
            <tr><td class="left">Argumentasi</td><td class="center">Kurang</td><td class="center">Cukup</td><td class="center">Baik</td></tr>
            <tr><td class="left">Keaktifan</td><td class="center">Kurang</td><td class="center">Cukup</td><td class="center">Baik</td></tr>
            <tr><td class="left">Komunikasi</td><td class="center">Kurang</td><td class="center">Cukup</td><td class="center">Baik</td></tr>
            <tr><td class="left">Kolaborasi</td><td class="center">Kurang</td><td class="center">Cukup</td><td class="center">Baik</td></tr>
          </tbody>
        </table>

        <table class="score">
          <thead>
            <tr><th></th><th colspan="3" class="center">Skor</th></tr>
            <tr class="subhead"><th></th><th class="center">-5</th><th class="center">-3</th><th class="center">0</th></tr>
          </thead>
          <tbody>
            <tr><td class="left">Dominasi</td><td class="center">Ya</td><td class="center">Kadang-kadang</td><td class="center">Tidak</td></tr>
            <tr><td class="left">Disiplin/Kehadiran</td><td class="center">Telat &gt; 15 menit</td><td class="center">Telat &lt; 15 menit</td><td class="center">Tepat Waktu</td></tr>
            <tr><td class="left">Sopan Santun</td><td class="center">Tidak ada</td><td class="center">Kadang-kadang</td><td class="center">Selalu baik</td></tr>
          </tbody>
        </table>
      </div>

      <div class="defs">
        <h2> Mohon Konfirmasi Nilai apakah sudah sesuai </h2>

        <a href="{{ route('kegiatan_pbl.mininotes') }}"
            id="btn-logout"
            class="btn btn-danger">
            Ulangi dari awal
            </a>
            
         <a href="{{ route('kegiatan_pbl.logout') }}"
            id="btn-info"
            class="btn btn-info">
            Simpan dan Logout
            </a>
      </div>


      </div>

    </div>
  </section>

</body>
</html>
