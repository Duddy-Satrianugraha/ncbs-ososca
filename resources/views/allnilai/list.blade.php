@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
        <li class="active">nilai</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Daftar Nilai Harian</h2>
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
                                    <h3 class="panel-title">List Nilai</h3>

                                    <form action="{{ route('nilai.index') }}" method="GET">
                                        <div class="col-md-4">
                                    <div class="input-group">

                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control" name="search" placeholder="Cari nilai" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">Search</button>
                                            <a href="{{route('nilai.index')}}" class="btn btn-default">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <a href="{{ route('nilai.praktikum.create')}}" class="btn btn-info"><span class="fa fa-plus"> Biomedis </span> </a>
                                <a href="{{ route('nilai.cbt.create')}}" class="btn btn-info"><span class="fa fa-plus"> Ujian CBT</span> </a>
                                <a href="{{ route('nilai.praktikum.create')}}" class="btn btn-info"><span class="fa fa-plus"> PBl</span> </a>
                                <a href="{{ route('nilai.praktikum.create')}}" class="btn btn-info"><span class="fa fa-plus"> Skills Lab</span> </a>
                                    
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">Nomor</th>
                                                    <th>Jenis Penilaian</th>
                                                    <th>Parameter</th>
                                                    <th width="200">  </th>
                                                    <th width="300">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i =  1;@endphp
                                                @foreach ($keg as $data)
                                                <tr id="trow_{{$i}}">
                                                    <td class="text-center">{{$i}}</td>
                                                     <td>
                                                        {{ $data->jenis_nilai }}
                                                    </td>
                                                    <td>{{$data->nama}} {{ $data->blok}} ({{$data->tahun_akademik}})</td>

                                                   @if($data->jenis_nilai === 'UTB' || $data->jenis_nilai === 'UAB')
                                                    <td>
                                                        <a href="{{ route('nilai.cbt.cbtSesiNew', $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-Plus"> Tambah Sesi nilai</span></a>
                                                    </td>
                                                    @else
                                                    <td>{{$data->created_at}}</td>
                                                    @endif
                                                    
                                                    <td>
                                                      
                                                        <a href="{{ route('nilai.harian.index', $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-list"></span></a>
                                                        
                                                        <form id="del-temp-{{$data->id}}" action="{{ route('nilai.destroy', $data->id)}}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus ujian ini?');"><span class="fa fa-times"></span></button>
                                                        </form>
                                                        
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
