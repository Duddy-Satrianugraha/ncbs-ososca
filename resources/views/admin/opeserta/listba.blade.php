@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
        <li class="active">Berita acara</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Berita acara Ujian OSOCA {{ $keg->name }}</h2>
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
                                    <h3 class="panel-title">List berita Acara</h3>


                                    <ul class="panel-controls">


                                    </ul>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">Nomor</th>
                                                    <th>Nama Station</th>
                                                    <th width="400">Penguji</th>
                                                    <th width="200">tanggal</th>
                                                    <th width="300">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i =  1;@endphp
                                                @foreach ($bas as $data)
                                                <tr id="trow_{{$i}}">
                                                    <td class="text-center">{{$i}}</td>
                                                    <td> station {{$data->name}}</td>
                                                    <td>{{$data->nama_penguji}}</td>
                                                    <td>{{  tgl_indox($data->updated_at)}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.peserta.beritaacara.show', [$keg->id, $data->id])}}" class="btn btn-info btn-sm"><span class="fa fa-search"></span> lihat Berita Acara</a>
                                                        <a href="{{ route('admin.ba.pdf', [$data->id])}}" class="btn btn-warning btn-sm"><span class="fa fa-print"></span> Cetak Berita acara</a>
                                                    </td>
                                                </tr>
                                                @endforeach
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
