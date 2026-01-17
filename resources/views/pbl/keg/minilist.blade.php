@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('pbl.harian.index')}}">Daftar PBL Harian</a></li>
        <li class="active"> PBL {{ $keg->name }} </li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Daftar @can('meu')Mininotes @endcan @can('materi') Skenario @endcan PBL {{ $keg->name }}</h2>
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
                                    <h3 class="panel-title">List @can('meu')Mininotes @endcan @can('materi') Skenario @endcan PBL</h3>
                                    <ul class="panel-controls">


                                    </ul>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">Nomor</th>
                                                    <th>Skenario</th>
                                                    <th>Judul Skenario</th>
                                                    @can('meu')
                                                    <th>Parameter</th>
                                                     @endcan
                                                    <th width="200">actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i =  1;@endphp
                                                @foreach ($keg->mininotes as $data)
                                                <tr id="trow_{{$i}}">
                                                    <td class="text-center">{{$i}}</td>
                                                    <td>Skenario {{$data->nomor_sk}}</td>
                                                    <td>{{ $data->judul_sk }}</td>
                                                    @can('meu')
                                                    <td>
                                                        @if($data->status == 0)
                                                        <a href="{{ route("pbl.harian.skenario", $data->id)}}" class="badge badge-success"> Skenario</a>
                                                        <a href="{{ route("pbl.harian.mininotes", $data->id)}}" class="badge badge-info"> Mininote</a>
                                                        <a href="{{route('pbl.harian.mininotes.act', $data->id) }}" class="badge badge-secondary" onclick="return confirm('Apakah Anda yakin ingin memfinalisasi mininotes ini?');"> Draft </a>
                                                        @else
                                                        <a class="badge badge-info"> Final </a>
                                                        @endif
                                                    </td>
                                                     @endcan
                                                    <td>
                                                        @can('materi')
                                                         <a href="{{ route("pbl.mininotes.show", $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-search"></span></a>
                                                         @if($data->status == 0)

                                                        <a class="badge badge-secondary"> Draft </a>
                                                        @else
                                                        <a href="{{ route('admin.pdf.skenario', $data->id) }}" class="badge badge-info" target="_blank"> Cetak Skenario </a>
                                                        @endif
                                                         @endcan
                                                         @can('meu')
                                                          <a href="{{ route("pbl.mininotes.show", $data->id)}}" class="btn btn-info btn-rounded btn-sm"><span class="fa fa-search"></span></a>
                                                        <form id="del-temp-{{$data->id}}" action="{{ route('pbl.harian.destroy', $data->id)}}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus ujian ini?');"><span class="fa fa-times"></span></button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @php $i++;@endphp
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
