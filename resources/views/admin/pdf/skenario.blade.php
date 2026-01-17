<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Skenario </title>
  <style>
    /* ===== Print setup (opsional) ===== */
    @page { size: A4; margin: 22mm 18mm; }

    body{
      font-family: Arial, Helvetica, sans-serif;
      color:#000;
      background:#fff;
      margin:0;
      line-height: 1.55;
    }

    /* Area halaman */
    .page{
      max-width: 900px;     /* buat tampilan layar enak */
      margin: 0 auto;
      padding: 36px 24px;
    }

    /* Judul */
    .title{
      text-align:center;
      font-weight: 800;
      line-height: 1.1;
      margin: 10px 0 28px;
      font-size: 16px;
    }
    .title span{
      display:block;
      font-size: 20px;
      margin-top: 6px;
    }

    /* Paragraf utama */
    .content{
      font-size: 16px;
      text-align: justify;
      text-justify: inter-word;
      margin: 0 0 40px;
    }

    /* Referensi */
    .ref-title{
      font-size: 15px;
      font-weight: 800;
      margin: 0 0 10px;
    }
    ol.refs{
      margin: 0;
      padding-left: 5px; /* jarak nomor */
      font-size: 12px;
    }
    ol.refs li{
      margin: 10px 0;
    }
  </style>
</head>

<body>
  <div class="page">

    <div class="title">
      {{ $keg->name }}<br>
      Skenario {{ $skenario->nomor_sk }}
      <span>{{ $skenario->judul_sk }}</span>
    </div>

    <p class="content">

    {!! $skenario->skenario !!}
    </p>

    <div class="ref-title">Referensi:</div>
    <ol class="refs">
      {!! $skenario->dafpus !!}
    </ol>

  </div>
</body>
</html>
