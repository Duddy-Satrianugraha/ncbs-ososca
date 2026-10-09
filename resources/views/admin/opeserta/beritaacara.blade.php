<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Berita Acara Osoca - FK UGJ</title>

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

    .defs{ margin-top: 12px; font-size:11px; line-height:1.25; }
    .defs .head{ font-weight:800; margin-bottom:4px; }
    .defs td{ padding:1px 0; vertical-align:top; }
    .defs .term{ width: 110px; }
    .defs .colon{ width: 10px; text-align:center; }

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

    .kop img{
    width: 100%;
    height: auto;
    display: block;
    }
  </style>
</head>
<body>

  <!-- ===================== PAGE 1: BERITA ACARA ===================== -->
  <section class="sheet">
    <div class="page">
        <div class="kop">
        <img src="{{ asset('img/kopfkbaru.png') }}" alt="Kop FK UGJ">
        </div>


      <div class="title">BERITA ACARA KEGIATAN OSOCA</div>

      <div class="para">
        Pada hari ini {{ tgl_indox($ba->updated_at,false,'ho') }}
        tanggal {{ tgl_indox($ba->updated_at,false,'txo') }}
        bulan {{ tgl_indox($ba->updated_at,false,'bo') }}
        tahun {{ tgl_indox($ba->updated_at,false,'to') }} telah dilaksanakan Osoca
        Tahun Akademik {{ $keg->ta }}
      </div>
      @php
        $blok = explode('|', $keg->blok);
      @endphp

      <div class="field-row">
        <div class="field-label">Ujian </div><div class="field-colon">:</div> {{ $keg->name }}
      </div>

      <div class="field-row">
        <div class="field-label">Kode Blok</div><div class="field-colon">:</div>{{ $blok[0]?? "" }}
      </div>
      <div class="field-row">
        <div class="field-label">Nama Blok</div><div class="field-colon">:</div>{{ $blok[1] ?? "" }}
      </div>
      <div class="field-row">
        <div class="field-label">Waktu</div><div class="field-colon">:</div>{{ utc_to_wib($ba->updated_at) }}
      </div>
      <div class="field-row">
        <div class="field-label">Jumlah Peserta</div><div class="field-colon">: </div>

        <div style="margin-left:6px;">{{ $ba->current }}  Mahasiswa</div>
      </div>

      <div class="field-row">
        <div class="field-label">Nama Tutor</div><div class="field-colon">:</div>{{ $ba->nama_penguji }}
      </div>

      <div class="para" style="margin-top:12px;">
        Perihal yang perlu dilaporkan selama Osoca berlangsung :
      </div>

      <div class="dots-area">
        {!! $ba->berita_acara !!}
      </div>

      <div class="para">Berita acara ini dibuat dengan sebenarnya.</div>

      <div class="sign-wrap">
        <div class="sign-box">
          Cirebon, {{ tgl_indox($ba->updated_at) }}<br><br>
          Mengetahui,<br>
          Tutor
          <br>
          <br>
          <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(100)->generate("ditandatangani digital pada " . tgl_indox($ba->created_at). " oleh " . $ba->nama_penguji)) }}" alt="QR Code">
          <div class="sign-line"></div>
          <div class="sign-center">({{ $ba->nama_penguji }})</div>
        </div>
      </div>
    </div>
  </section>



</body>
</html>
