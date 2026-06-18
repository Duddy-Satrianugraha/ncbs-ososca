@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('nilai.index')}}">Daftar Ujian</a></li>
        <li class="active">Import Sesi Baru Nilai OSOCA Baru</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Import Nilai {{$allnilai->jenis_nilai}} {{ $allnilai->blok }} ({{$allnilai->tahun_akademik}})</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" action="{{ route('nilai.osoca.upload', $allnilai->id) }}" method="POST" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Import</strong> Nilai CBT</h3>
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
                        <P> <strong>Penduan Import Nilai Praktikum</strong> </br>
                            <span class="fa fa-exclamation-triangle"> Pastikan Nama dan NPM mahasiswa sudah sesuai</span> </br>
                            <span class="fa fa-exclamation-triangle"> File excel harus sesuai dengan output cbt </span></br>

                            <a href="{{ asset('doc/template-peserta-osoca.xlsx') }}" class="btn btn-primary btn-sm">Download Template</a></br>
                        </P>
                    </label>

                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label">Nama Ujian</label>
                    <div class="col-md-8 col-xs-12">
                        <div class="input-group">
                           {{ $allnilai->nama }}
                        </div>
                    </div>
                 </div>

                 <div class="form-group">
                      <label class="col-md-2 col-xs-12 control-label">Jenis Nilai</label>
                     <div class="col-md-8 col-xs-12">
                         {{ $allnilai->jenis_nilai }}
                     </div>
                 </div>
                 <div class="form-group">
                      <label class="col-md-2 col-xs-12 control-label">Blok</label>
                     <div class="col-md-8 col-xs-12">
                         {{ $allnilai->blok }}
                     </div>
                 </div>
                 <div class="form-group">
                      <label class="col-md-2 col-xs-12 control-label">Tahun akademik</label>
                     <div class="col-md-8 col-xs-12">
                         {{ $allnilai->tahun_akademik }}
                     </div>
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
                <a href="{{ route('nilai.index')}}" class="btn btn-default">Return</a>
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
