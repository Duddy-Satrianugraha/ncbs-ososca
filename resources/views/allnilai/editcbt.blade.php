@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('nilai.index')}}">Daftar Nilai</a></li>
    <li ><a href="{{ route('nilai.harian.index', $nilai->id)}}">Daftar Nilai Harian</a></li>
        <li class="active">Edit Nilai Harian</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Nilai {{ $nilai->nama }}  {{ $detail->nam_mhs }} </h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" action="{{ route('nilai.harian.update', $detail->id) }}" method="POST" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Nilai</strong>Edit</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
            </div>
            <div class="panel-body form-group-separated">
                    @csrf
                    @method('PUT')
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Nama</label>
                    <div class="col-md-6 col-xs-12">
                       {{ $detail->nama_mhs }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">NPM</label>
                    <div class="col-md-6 col-xs-12">
                        {{ $detail->npm }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Nilai Akhir</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-users"></span></span>
                            <input type="number" name="nilai_akhir" class="form-control" value="{{ $detail->nilai_akhir }}"/>
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="panel-footer">
                <a href="{{ route('nilai.harian.index', $nilai->id)}}" class="btn btn-default">Return</a>
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
