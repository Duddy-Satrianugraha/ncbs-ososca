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
    <h2><span class="fa fa-arrow-circle-o-left"></span> Nilai PBL Harian</h2>
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

                                    <form action="{{ route('pbl.list.nilai') }}" method="GET">
                                        <div class="col-md-4">
                                    <div class="input-group">

                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" class="form-control" name="search" placeholder="Cari PBL" value="{{ request('search') }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary">Search</button>
                                            <a href="{{route('pbl.list.nilai')}}" class="btn btn-default">Clear</a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                    <ul class="panel-controls">

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

                                                        <a class="badge badge-info"> {{ $data->jml_kelompok ?? 0}} kelompok</a>

                                                    </td>

                                                    <td>{{$data->created_at}}</td>

                                                    <td>

                                                        <a href="{{ route("pbl.nilai.harian", $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-list"></span></a>

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
