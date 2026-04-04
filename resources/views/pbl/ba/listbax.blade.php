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
    <h2><span class="fa fa-arrow-circle-o-left"></span>  Berita Acara  PBL Harian</h2>
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
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">Nomor</th>
                                                    <th>Kelompok</th>
                                                    <th>Parameter</th>
                                                    <th width="200"></th>
                                                    <th width="300">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i =  1;@endphp
                                                @foreach ($ba as $data)
                                                <tr id="trow_{{$i}}">
                                                    <td class="text-center">{{$i}}</td>
                                                    <td>{{$data->kelompok->nama_kelompok}}</td>
                                                    <td>Skenario {{ $data->sks->nomor_sk}} ( Pertemuan {{ $data->pertemuan }})</td>


                                                    @can('admin')
                                                    <td>{{$data->created_at}}</td>
                                                    @endcan
                                                    <td>

                                                        @can('admin')
                                                        <a href="{{ route("pbl.ba.show", $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-search"></span></a>
                                                        <a href="{{ route("pbl.ba.pdf", $data->id)}}" class="btn btn-danger btn-rounded btn-sm" target="_blank"><span class="fa fa-download"></span></a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @php $i++;@endphp
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{ $ba->links() }}

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
