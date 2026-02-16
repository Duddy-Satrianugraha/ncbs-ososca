@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
        <li class="active">PBL</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Daftar PBL Harian</h2>
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
                                    <h3 class="panel-title">List PBL</h3>

                                    <form action="{{ route('pbl.harian.index') }}" method="GET">
                                        <div class="col-md-4">
                                    <div class="input-group">

                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control" name="search" placeholder="Cari PBL" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">Search</button>
                                            <a href="{{route('pbl.harian.index')}}" class="btn btn-default">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                    <ul class="panel-controls">
                                        @can('meu')

                                        <li><a href="{{ route('pbl.harian.create')}}" class="panel-add"><span class="fa fa-plus"></span></a></li>
                                        @endcan
                                    </ul>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">Nomor</th>
                                                    <th>Nama PBL</th>
                                                    <th>Parameter</th>
                                                    <th width="200"> @can('materi') Skenario Aktif @endcan </th>
                                                    <th width="300">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i =  1;@endphp
                                                @foreach ($keg as $data)
                                                <tr id="trow_{{$i}}">
                                                    <td class="text-center">{{$i}}</td>
                                                    <td>{{$data->name}} ({{$data->tahun_akademik}})</td>
                                                    <td>
                                                        <a class="badge badge-primary"> {{ $data->jml_sk }} skenario</a>
                                                        @can('admin')
                                                        <a class="badge badge-info"> {{ $data->jml_kelompok ?? 0}} kelompok</a>
                                                        @endcan
                                                        @can('materi')
                                                        <a class="badge badge-danger"> {{ $data->jml_kelompok ?? 0}} kelompok</a>
                                                        @if($data->jml_kelompok > 0)
                                                        <a href="{{ route("admin.pdf.linkkel", $data->id)}}" class="badge badge-info" target="_blank"> cetak QR Kelompok PBL</a>
                                                        @endif
                                                        @endcan
                                                    </td>
                                                    @can('materi')
                                                    <td>
                                                        @if($data->jml_sk > 0 && $data->jml_kelompok > 0)
                                                        <a href="{{ route("pbl.harian.aktif", $data->id) }}" class="badge @if($data->sk_aktif == 0)badge-danger @else badge-info @endif"> Skenario : {{ $data->sk_aktif ?? 0 }} pertemuan : {{ $data->pertemuan ?? 0 }} </a>
                                                        @endif
                                                    </td>
                                                    @endcan
                                                    @can('meu')
                                                    <td>{{$data->created_at}}</td>
                                                    @endcan
                                                    @can('admin')
                                                    <td>{{$data->created_at}}</td>
                                                    @endcan
                                                    <td>
                                                        @can('materi')
                                                        <a href="{{ route("pbl.harian.show", $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-list"></span></a>
                                                        @endcan
                                                        @can('meu')
                                                        <a href="{{ route('pbl.keg.import', $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-download"></span></a>
                                                         <a href="{{ route("pbl.harian.show", $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-list"></span></a>
                                                        <a href="{{ route("pbl.harian.edit", $data->id)}}" class="btn btn-warning btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>
                                                        <form id="del-temp-{{$data->id}}" action="{{ route('pbl.harian.destroy', $data->id)}}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus ujian ini?');"><span class="fa fa-times"></span></button>
                                                        </form>
                                                        @endcan
                                                        @can('admin')
                                                        <a href="{{ route("pbl.peserta.index", $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-list"></span></a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @php $i++;@endphp
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{ $keg->appends(['search' => request('search')])->links() }}

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
