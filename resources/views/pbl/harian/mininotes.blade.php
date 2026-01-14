<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Rubrik Penilaian Mahasiswa dalam Diskusi PBL</title>

  <style>
@page { size: A4; margin: 18mm 16mm; }

body{ font-family: Arial, Helvetica, sans-serif; color:#000; margin:0; }
.page{ max-width:760px; margin:0 auto; padding:12px; }

.title-wrap{ margin-top:4px; }
.title{ text-align:center; font-size:13px; font-weight:800; text-transform:uppercase; margin:4px 0 6px; }
.title-line{ height:3px; background:#2f3e5a; margin:4px 0 10px; }

.meta{ display:flex; justify-content:space-between; gap:20px; font-size:12px; margin-bottom:8px; }
.meta .col{ width:50%; }
.meta-row{ display:flex; gap:8px; margin:2px 0; }
.meta-label{ width:90px; }
.dots{ flex:1; border-bottom:1px dotted #000; height:14px; }

table{ width:100%; border-collapse:collapse; }
.rubrik{ table-layout:fixed; border:2px solid #444; font-size:11px; }
.rubrik th,.rubrik td{ border:1px solid #444; text-align:center; vertical-align:middle; padding:0; }
.rubrik thead th{ font-weight:700; }

.w-no{ width:40px; }
.w-nama{ width:230px; }
.w-mini{ width:28px; }
.w-total{ width:70px; }
.th-group{ padding:6px 4px; font-size:11px; }

.rotate{ position:relative; height:110px; }
.rotate > span{
  position:absolute; top:50%; left:50%;
  transform:translate(-50%,-50%) rotate(-90deg);
  white-space:nowrap; font-weight:700; font-size:11px;
}
.rubrik tbody td{ height:20px; }
.rubrik tbody td.nama{ text-align:left; padding:0 6px; }
.rubrik tbody td.no{ font-weight:600; }

/* ===== Mobile portrait ===== */
.table-scroll{
  overflow-x:auto;
  -webkit-overflow-scrolling: touch;
  border:1px solid transparent; /* biar smooth di iOS */
}
.table-scroll table{
  min-width: 700px; /* memaksa scroll horizontal di HP */
}

/* layar kecil: meta jadi 1 kolom, font sedikit turun */
@media (max-width: 480px){
  .page{ max-width:100%; padding:10px; }
  .meta{ flex-direction:column; gap:6px; }
  .meta .col{ width:100%; }
  .meta-label{ width:95px; } /* sedikit lebih enak dibaca */
  .title{ font-size:12px; }
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
        <div class="meta-row"><div class="meta-label">Skenario</div><div>:</div>{{ $data['skenario']->nomor_sk }}</div>
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
              <th class="th-group" colspan="5">Keterlibatan dalam<br/>diskusi</th>
              <th class="th-group" colspan="3">Perilaku</th>
              <th class="w-total" rowspan="2">
                Total<br/><span style="font-weight:700;">(Maks:<br/>50)</span>
              </th>
            </tr>
            <tr>
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
           @foreach($peserta as $data)

            <!-- 10 baris -->
            <tr>
                <td class="no">{{ $loop->iteration }}</td>
                <td class="nama">{{ $data->name }} ({{ $data->npm }})</td>


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

        
    </div>
  </div>
</body>
</html>
