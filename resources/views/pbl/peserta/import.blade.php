@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('pbl.harian.index')}}">Daftar PBL Harian</a></li>
    <li ><a href="{{ route('pbl.peserta.index', $harian->id)}}">Daftar Peserta PBL {{ $harian->name }}</a></li>
        <li class="active">Import Peserta Baru</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Import Peserta PBL {{ $harian->name }}</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" action="{{ route('pbl.peserta.store_upload') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="kid" value="{{ $harian->id }}">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Import</strong> Peserta</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">

            </div>
            <div class="panel-body form-group-separated">
                    @csrf
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">
                        <P> <strong>Penduan Import Data Peserta</strong> </br>

                            <span class="fa fa-exclamation-triangle"> Nama Kelompok case sensitif </span></br>
                            <span class="fa fa-exclamation-triangle"> Format Excel harus sesuai dengan template </span></br>
                            <a href="{{ asset('doc/template-peserta-osoca.xlsx') }}" class="btn btn-primary btn-sm">Download Template</a></br>
                        </P>
                    </label>

                </div>

                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label">File Excel</label>
                    <div class="col-md-8 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="file" name="file" class="form-control" />
                        </div>
                    </div>
                </div>



            </div>
            <div class="panel-footer">
                <a href="{{ route('pbl.peserta.index', $harian->id)}}" class="btn btn-default">Return</a>
                <button type="submit"  class="btn btn-primary pull-right">Submit</button>
            </div>
        </div>

        </form>
    </div>
</div>
<!-- END WIDGETS -->




@endsection

@section('javascript')

@endsection
