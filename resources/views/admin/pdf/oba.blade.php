<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <title>Osoca - FK UGJ</title>

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

    <<div class="title">BERITA ACARA KEGIATAN OSOCA</div>

      <div class="para">
        Pada hari ini {{ tgl_indox($ba->created_at,false,'ho') }}
        tanggal {{ tgl_indox($ba->created_at,false,'txo') }}
        bulan {{ tgl_indox($ba->created_at,false,'bo') }}
        tahun {{ tgl_indox($ba->created_at,false,'to') }} telah dilaksanakan Osoca
        Tahun Akademik {{ $keg->ta }}
      </div>
      @php
        $blok = explode('|', $keg->blok);
      @endphp

    <table class="field-table">
      <tr>
        <td class="field-label">Ujian</td><td class="field-colon">:</td>
        <td> {{ $keg->name }}</td>
      </tr>
      <tr>
        <td class="field-label">Kode Blok</td><td class="field-colon">:</td>
        <td>{{ $blok[0]?? "" }}</td>
      </tr>
      <tr>
        <td class="field-label">Nama Blok</td><td class="field-colon">:</td>
        <td>{{ $blok[1] ?? "" }}</td>
      </tr>
      <tr>
        <td class="field-label">Waktu</td><td class="field-colon">:</td>
        <td>{{ utc_to_wib($ba->created_at) }}</td>
      </tr>
      <tr>
        <td class="field-label">Jumlah Peserta</td><td class="field-colon">:</td>
        <td>{{ $ba->current }} Mahasiswa</td>
      </tr>
      <tr>
        <td class="field-label">Nama Tutor</td><td class="field-colon">:</td>
        <td>{{ $ba->nama_penguji }}</td>
      </tr>
    </table>

    <div class="para" style="margin-top:12px;">
      Perihal yang perlu dilaporkan selama Osoca berlangsung :
    </div>

    <div class="ba-box">
      {!! $ba->berita_acara !!}
    </div>

    <div class="para">Berita acara ini dibuat dengan sebenarnya.</div>

    <div class="sign-wrap">
      <div class="sign-box">
        Cirebon, {{ tgl_indox($ba->created_at) }}<br><br>
        Mengetahui,<br>
        Tutor<br><br>

        <img
          src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(80)->generate('ditandatangani digital pada ' . tgl_indox($ba->created_at) . ' oleh ' . $ba->nama_penguji)) }}"
          alt="QR Code"
        >

        <div class="sign-line"></div>
        <div class="sign-center">({{ $ba->nama_penguji }})</div>
      </div>
    </div>
  </div>
</body>
</html>
