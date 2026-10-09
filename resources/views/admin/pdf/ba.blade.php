<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <title>Form PBL - FK UGJ</title>

  <style>
    @page { size: A4; margin: 18mm 16mm; }
    body { font-family: Arial, Helvetica, sans-serif; color:#000; margin:0; font-size: 12px; }
    .page { width: 100%; }

    /* Page break */
    .page-break { page-break-after: always; }
    .page-break:last-child { page-break-after: auto; }

    /* Kop */
    .kop { width:100%; margin: 0 0 10px 0; }
    .kop img { width:100%; height:auto; display:block; }

    /* Title */
    .title{
      text-align:center;
      font-weight:800;
      text-transform:uppercase;
      margin: 6px 0 10px;
      font-size:13px;
    }

    /* Paragraph */
    .para{ font-size:11px; line-height:1.45; margin: 10px 0; text-align:justify; }

    /* Simple table layout (DomPDF friendly) */
    .meta-table, .field-table { width:100%; border-collapse:collapse; }
    .field-table td { padding: 3px 0; vertical-align:top; }
    .field-label { width: 160px; }
    .field-colon { width: 10px; }

    /* BA text area */
    .ba-box { font-size:12px; line-height:1.5; }

    /* Signature */
    .sign-wrap { width:100%; margin-top: 10px; }
    .sign-box { width: 280px; margin-left:auto; font-size:12px; }
    .sign-line { border-bottom:1px solid #000; height: 18px; margin: 6px 0; }
    .sign-center { text-align:center; }

    /* Rubrik table */
    table { border-collapse: collapse; width:100%; }
    .rubrik{
      table-layout: auto;
      border:2px solid #444;
      font-size:11px;
    }
    .rubrik th, .rubrik td{
      border:1px solid #444;
      padding: 0;
      vertical-align: middle;
      text-align:center;
    }
    .rubrik thead th{ font-weight:700; }
    .w-no{ width:40px; }
    .w-nama{ width:260px; }
    .w-mini{ width:30px; }
    .w-total{ width:70px; }
    .th-group{ padding:6px 4px; font-size:11px; }

    /* Vertical header (DomPDF biasanya OK) */
    .rotate{ height:110px; position: relative; }
    .rotate > span{
      position:absolute;
      left:50%; top:50%;
      transform: translate(-50%,-50%) rotate(-90deg);
      white-space: nowrap;
      font-weight:700;
      font-size:11px;
    }

    .rubrik tbody td{ height:20px; }
    .rubrik tbody td.nama{ text-align:left; padding:0 6px; }
    .rubrik tbody td.no{ font-weight:600; }


    /* Score tables: pakai table layout, bukan flex */
    .score-wrap { width:100%; margin-top: 14px; }
    .score-box { width:49%; display:inline-block; vertical-align:top; }
    .score{
      width:100%;
      border:2px solid #444;
      font-size:8px;
      border-collapse: collapse;
    }
    .score th,.score td{ border:1px solid #444; padding:4px 6px; }
    .score thead th{ background:#c9c9c9; font-weight:800; }
    .score .subhead th{ background:#d9d9d9; font-weight:800; text-align:center; }
    .left{ width:40%; text-align:left; }
    .center{ text-align:center; }

    .defs{ margin-top: 10px; font-size:8px; line-height:1.25; }
    .defs .head{ font-weight:800; margin-bottom:4px; }
    .defs td{ padding:1px 0; vertical-align:top; }
    .defs .term{ width: 110px; }
    .defs .colon{ width: 10px; text-align:center; }

    .rubrik-footer{ margin-top: 12px; font-size:11px; width:100%; }
    .rubrik-footer .box{ width:280px; margin-left:auto; }

    /* Kecilkan font khusus meta-table */
    .meta-table,
    .meta-table td,
    .meta-table th{
    font-size: 10px;      /* coba 10px; turunkan ke 9px jika perlu */
    line-height: 1.25;
    }

    /* Rapikan jarak baris meta */
    .meta-table td{
    padding: 2px 0;       /* lebih rapat */
    }

    /* Label meta sedikit tebal (opsional) */
    .meta-table .field-label{
    font-weight: 600;
    }

  </style>
</head>

<body>

  {{-- ===================== PAGE 1: BERITA ACARA ===================== --}}
  <div class="page page-break">
    <div class="kop">
      <img src="{{ public_path('img/kopfkbaru.png') }}" alt="Kop FK UGJ">
    </div>

    <div class="title">BERITA ACARA KEGIATAN TUTORIAL/PBL</div>

    <div class="para">
      Pada hari ini {{ tgl_indox($ba->updated_at,false,'ho') }}
      tanggal {{ tgl_indox($ba->updated_at,false,'txo') }}
      bulan {{ tgl_indox($ba->updated_at,false,'bo') }}
      tahun {{ tgl_indox($ba->updated_at,false,'to') }}
      telah dilaksanakan Tutorial/PBL semester
      Tahun Akademik {{ $keg->tahun_akademik }}
    </div>

    <table class="field-table">
      <tr>
        <td class="field-label">Skenario</td><td class="field-colon">:</td>
        <td>Skenario {{ $ba->sks->nomor_sk }} ({{ $ba->sks->judul_sk }})</td>
      </tr>
      <tr>
        <td class="field-label">Pertemuan Ke</td><td class="field-colon">:</td>
        <td>{{ $ba->pertemuan }}</td>
      </tr>
      <tr>
        <td class="field-label">Kode Blok</td><td class="field-colon">:</td>
        <td>{{ $keg->name }}</td>
      </tr>
      <tr>
        <td class="field-label">Nama Blok</td><td class="field-colon">:</td>
        <td>{{ $keg->blok_name }}</td>
      </tr>
      <tr>
        <td class="field-label">Waktu</td><td class="field-colon">:</td>
        <td>{{ jam_sesi($ba->updated_at) }}</td>
      </tr>
      <tr>
        <td class="field-label">Jumlah Peserta</td><td class="field-colon">:</td>
        <td>{{ $ba->jml_peserta }} Mahasiswa</td>
      </tr>
      <tr>
        <td class="field-label">Nama Tutor</td><td class="field-colon">:</td>
        <td>{{ $tutor->nama }}</td>
      </tr>
    </table>

    <div class="para" style="margin-top:12px;">
      Perihal yang perlu dilaporkan selama tutorial berlangsung :
    </div>

    <div class="ba-box">
      {!! $ba->ba !!}
    </div>

    <div class="para">Berita acara ini dibuat dengan sebenarnya.</div>

    <div class="sign-wrap">
      <div class="sign-box">
        Cirebon, {{ tgl_indox($ba->updated_at) }}<br><br>
        Mengetahui,<br>
        Tutor<br><br>

        <img
          src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(80)->generate('ditandatangani digital pada ' . tgl_indox($ba->updated_at) . ' oleh ' . $tutor->nama)) }}"
          alt="QR Code"
        >

        <div class="sign-line"></div>
        <div class="sign-center">({{ $tutor->nama }})</div>
      </div>
    </div>
  </div>


  {{-- ===================== PAGE 2: RUBRIK ===================== --}}
  <div class="page">
    <div class="kop">
      <img src="{{ public_path('img/kopfkbaru.png') }}" alt="Kop FK UGJ">
    </div>

    <div class="title">RUBRIK PENILAIAN MAHASISWA DALAM DISKUSI PBL</div>

    <table class="meta-table" style="margin-bottom:10px;">
      <tr>
        <td style="width:50%; vertical-align:top;">
          <table class="field-table">
            <tr><td class="field-label" style="width:90px;">Kelompok</td><td class="field-colon">:</td><td>{{ $ba->kelompok->nama_kelompok }}</td></tr>
            <tr><td class="field-label" style="width:90px;">Skenario</td><td class="field-colon">:</td><td>Skenario {{ $ba->sks->nomor_sk }} ({{ $ba->sks->judul_sk }})</td></tr>
            <tr><td class="field-label" style="width:90px;">Diskusi ke-</td><td class="field-colon">:</td><td>{{ $ba->pertemuan }}</td></tr>
          </table>
        </td>
        <td style="width:50%; vertical-align:top;">
          <table class="field-table">
            <tr><td class="field-label" style="width:90px;">Blok</td><td class="field-colon">:</td><td>{{ $keg->name }}</td></tr>
            <tr><td class="field-label" style="width:90px;">Tahun Ajaran</td><td class="field-colon">:</td><td>{{ $keg->tahun_akademik }}</td></tr>
            <tr><td class="field-label" style="width:90px;">Nama Tutor</td><td class="field-colon">:</td><td>{{ $tutor->nama }}</td></tr>
          </table>
        </td>
      </tr>
    </table>

    <table class="rubrik">
         <colgroup>
            <col style="width:40px">        <!-- No -->
            <col style="width:300px">       <!-- Nama Mahasiswa (LEBAR) -->
            <col style="width:28px">
            <col style="width:28px">
            <col style="width:28px">
            <col style="width:28px">
            <col style="width:28px">
            <col style="width:28px">
            <col style="width:28px">
            <col style="width:28px">
            <col style="width:60px">        <!-- Total -->
        </colgroup>
      <thead>
        <tr>
          <th  rowspan="2">No.</th>
          <th  rowspan="2">Nama Mahasiswa</th>
          <th  colspan="5">Keterlibatan dalam<br>diskusi</th>
          <th colspan="3">Perilaku</th>
          <th  rowspan="2">Total<br><span style="font-weight:700;">(Maks:<br>50)</span></th>
        </tr>
        <tr>
          <th class=" rotate"><span>Sharing</span></th>
          <th class=" rotate"><span>Argumentasi</span></th>
          <th class=" rotate"><span>Keaktifan</span></th>
          <th class=" rotate"><span>Dominasi</span></th>
          <th class=" rotate"><span>Kolaborasi</span></th>
          <th class=" rotate"><span>Disiplin/Kehadiran</span></th>
          <th class=" rotate"><span>Komunikasi</span></th>
          <th class=" rotate"><span>Sopan Santun</span></th>
        </tr>
      </thead>
      <tbody>
        @foreach($nilai as $data)
          <tr>
            <td class="no">{{ $loop->iteration }}</td>
            <td class="nama">{{ $data->peserta->name }}</td>
            <td>{{ $data->sharing }}</td>
            <td>{{ $data->argumentasi }}</td>
            <td>{{ $data->keaktifan }}</td>
            <td>{{ $data->dominasi }}</td>
            <td>{{ $data->kolaborasi }}</td>
            <td>{{ $data->disiplin }}</td>
            <td>{{ $data->komunikasi }}</td>
            <td>{{ $data->sopan }}</td>
            <td>{{ $data->total }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <table width="100%" cellspacing="0" cellpadding="0" style="margin-top:14px;">
  <tr>
    <td width="50%" valign="top" style="padding-right:6px;">
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
    </td>

    <td width="50%" valign="top" style="padding-left:6px;">
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
    </td>
  </tr>
</table>


    <div class="defs">
      <div class="head">Definisi Istilah :</div>
      <table>
        <tr><td class="term">Sharing</td><td class="colon">:</td><td>sharing opini/informasi yang berhubungan dengan topik diskusi kepada anggota kelompok</td></tr>
        <tr><td class="term">Argumentasi</td><td class="colon">:</td><td>memberikan pengetahuan dan argumentasi logis berdasarkan literatur</td></tr>
        <tr><td class="term">Keaktifan</td><td class="colon">:</td><td>keaktifan dalam diskusi tanpa intervensi tutor</td></tr>
        <tr><td class="term">Dominasi</td><td class="colon">:</td><td>mendominasi forum dalam diskusi kelompok</td></tr>
        <tr><td class="term">Komunikasi</td><td class="colon">:</td><td>mendengarkan, menjelaskan dan bertanya dengan menggunakan bahasa yang baik secara sistematis</td></tr>
        <tr><td class="term">Kolaborasi</td><td class="colon">:</td><td>kemampuan untuk bekerja sama dengan yang lain dan mengatasi konflik dalam kelompok</td></tr>
        <tr><td class="term">Sopan santun</td><td class="colon">:</td><td>menunjukan perilaku saling menghormati satu sama lain</td></tr>
      </table>
    </div>

    <div class="rubrik-footer">
      <div class="box">
        Cirebon, {{ tgl_indox($ba->updated_at) }}<br><br>
        <img
          src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(80)->generate('ditandatangani digital pada ' . tgl_indox($ba->created_at) . ' oleh ' . $tutor->nama)) }}"
          alt="QR Code"
        >
        <div style="margin-top:6px;">({{ $tutor->nama }})</div>
      </div>
    </div>

  </div>
</body>
</html>
