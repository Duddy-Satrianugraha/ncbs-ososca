@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('pbl.harian.index')}}">Daftar PBL Harian</a></li>
        <li class="active"> nilai PBL </li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Daftar nilai</h2>
</div>
@endsection
@section('content')

  @php
    $pertemuans = [1, 2]; // FIXED: setiap skenario pasti 2 pertemuan
    $colSpanNilai = ($skenarios->count() * 2) + 1; // 2 pertemuan per skenario + kolom rerata
  @endphp
<!-- START WIDGETS -->
<div class="row">
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">List nilai</h3>
                                    <ul class="panel-controls">


                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-condensed ">
        <thead>
          {{-- Judul besar --}}
          <tr>
            <th colspan="4"></th>
            <th colspan="{{ ($skenarios->count() * count($pertemuans)) + 1 }}" class="text-center">
              Nilai Harian PBL
            </th>
          </tr>

          {{-- Header skenario --}}
          <tr>
            <th rowspan="2" class="text-center" style="width:50px;">No</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2" class="text-center" style="width:110px;">NPM</th>
            <th rowspan="2" class="text-center" style="width:120px;">Kelompok</th>

            @foreach($skenarios as $s)
              <th colspan="{{ count($pertemuans) }}" class="text-center">
                Skenario {{ $loop->iteration }}
              </th>
            @endforeach

            <th rowspan="2" class="text-center" style="width:110px;">Rerata Skor</th>
          </tr>

          {{-- Header pertemuan --}}
          <tr>
            @foreach($skenarios as $s)
              @foreach($pertemuans as $pt)
                <th class="text-center">Pertemuan {{ $pt }}</th>
              @endforeach
            @endforeach
          </tr>
        </thead>

        <tbody>
          @forelse($pesertas as $p)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $p->name }}</td>
              <td class="text-center">{{ $p->npm }}</td>
              <td class="text-center">{{ $p->nama_kelompok ?? '-' }}</td>

              @foreach($skenarios as $s)
                @foreach($pertemuans as $pt)
                  @php
                    // nilai bisa: int, 'Tidak hadir', atau null
                    $val = $matrix[$p->id][$s->id][$pt] ?? null;
                  @endphp

                  <td class="text-center">
                    @if($val === 'Tidak hadir')
                      <span class="text-danger">Tidak hadir</span>
                    @elseif(is_int($val))
                      {{ $val }}
                    @else
                      -
                    @endif
                  </td>
                @endforeach
              @endforeach

              <td class="text-center">
                @if(isset($rerata[$p->id]) && $rerata[$p->id] !== null)
                  {{ number_format($rerata[$p->id], 2, ',', '.') }}
                @else
                  -
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="{{ 4 + ($skenarios->count() * count($pertemuans)) + 1 }}" class="text-center text-muted">
                Tidak ada data peserta/nilai untuk kegiatan ini.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                    <!-- END RESPONSIVE TABLES -->

</div>
<!-- END WIDGETS -->




@endsection

@section('javascript')

@endsection
