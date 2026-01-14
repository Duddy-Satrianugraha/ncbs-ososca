@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('pbl.harian.index')}}">Daftar PBL Harian</a></li>
        <li class="active">Skenario Aktif</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"> PBL</span> {{ $keg->name }} </h2>
</div>
@endsection
@section('content')

<div class="row">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('pbl.harian.aktivate') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $keg->id }}">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Aktivasi Skenario </strong> {{ $keg->name }}</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">

                </div>
                <div class="panel-body form-group-separated">

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Skenario</label>
                        <div class="col-md-8 col-xs-12">
                            <select class="form-control" name="sk_aktif">
                                @foreach($keg->mininotes as $data)
                                <option value="{{$data->id}}">skenario {{$data->nomor_sk}}  :  {{$data->judul_sk}}</option>
                                @endforeach
                            </select>
                            <small class="text">pilih skenario yang akan diaktifkan</small>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Pertemuan </label>
                        <div class="col-md-8 col-xs-12">
                            <select class="form-control" name="pertemuan">
                                <option value="1">Pertemuan 1</option>
                                <option value="2">Pertemuan 2</option>
                            </select>
                            <small class="text">pilih pertemuan yang akan diaktifkan</small>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">

                    <a  class="btn btn-default" href="{{ route('pbl.harian.index') }}">Kembali</a>
                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>




@endsection

@section('javascript')

@endsection
