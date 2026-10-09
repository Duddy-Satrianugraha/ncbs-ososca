@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
        <li class="active">Berita Acara PBL</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>  Berita Acara  PBL Harian {{ $keg->name }}</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">List Berita Acara PBL</h3>


                                    <ul class="panel-controls">

                                    </ul>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">No</th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Nama Kelompok</th>

                                                    @for ($sk = 1; $sk <= $keg->jml_sk; $sk++)
                                                        <th colspan="2" class="text-center">Skenario {{ $sk }}</th>
                                                    @endfor
                                                </tr>
                                                <tr>
                                                    @for ($sk = 1; $sk <= $keg->jml_sk; $sk++)
                                                        <th class="text-center">Pertemuan 1</th>
                                                        <th class="text-center">Pertemuan 2</th>
                                                    @endfor
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($grouped as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td> kel {{ $item['nama_kelompok'] }}</td>

                                                        @for ($sk = 1; $sk <= $keg->jml_sk; $sk++)
                                                            @for ($p = 1; $p <= 2; $p++)
                                                                <td class="text-center">
                                                                    @if(isset($item['data'][$sk][$p]))
                                                                       @php
                                                                            $cell = $item['data'][$sk][$p];
                                                                            $baItem = $cell['ba'];
                                                                            $tutor = $cell['tutor'];
                                                                        @endphp
                                                                        @can('materi')

                                                                        <a href="{{ route('pbl.ba.show', $baItem->id) }}"
                                                                        class="btn btn-xs btn-info">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        @endcan
                                                                        @can('admin')
                                                                        <small>{{ $tutor }}</small><br>
                                                                        <a href="{{ route('pbl.ba.show', $baItem->id) }}"
                                                                        class="btn btn-info btn-rounded btn-sm"
                                                                        title="Lihat">
                                                                            <span class="fa fa-search"></span>
                                                                        </a>

                                                                        <a href="{{ route('pbl.ba.pdf', $baItem->id) }}"
                                                                        class="btn btn-danger btn-rounded btn-sm"
                                                                        target="_blank"
                                                                        title="Download PDF">
                                                                            <span class="fa fa-download"></span>
                                                                        </a>
                                                                        @endcan
                                                                    @else
                                                                        <span class="text-muted">-</span>
                                                                    @endif
                                                                </td>
                                                            @endfor
                                                        @endfor
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="{{ 2 + ($keg->jml_sk * 2) }}" class="text-center">
                                                            Belum ada data berita acara.
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
