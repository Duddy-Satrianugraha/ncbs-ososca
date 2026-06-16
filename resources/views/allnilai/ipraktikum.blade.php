@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('nilai.index')}}">Daftar Ujian</a></li>
        <li class="active">Import Nilai Praktikum Baru</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Import Nilai Praktikum Baru</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" action="{{ route('nilai.praktikum.store') }}" method="POST" enctype="multipart/form-data">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Import</strong> Nilai Praktikum</h3>
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
                            <span class="fa fa-exclamation-triangle"> Nilai Biomedis adalah nilai praktikum perblok </span></br>
                            <span class="fa fa-exclamation-triangle"> Format Excel harus sesuai dengan template </span></br>

                            <a href="{{ asset('doc/template-peserta-osoca.xlsx') }}" class="btn btn-primary btn-sm">Download Template</a></br>
                        </P>
                    </label>

                </div>
                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label">Nama praktikum</label>
                    <div class="col-md-8 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" name="nama" class="form-control" />
                        </div>
                    </div>
                 </div>

                 <div class="form-group">
                      <label class="col-md-2 col-xs-12 control-label">Jenis Nilai</label> 
                     <div class="col-md-8 col-xs-12">
                         <div class="input-group">
                             <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                             <select name="jenis_nilai" class="form-control">
                                 <option value="Praktikum">Nilai Praktikum</option>
                                 <option value="Biomedis">Nilai Biomedis</option>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                      <label class="col-md-2 col-xs-12 control-label">Blok</label> 
                     <div class="col-md-8 col-xs-12">
                         <div class="input-group">
                             <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                             <select name="blok" class="form-control">
                                 <option value="HPK 1.1">HPK 1.1</option>
                                 <option value="HPK 1.2">HPK 1.2</option>
                                 <option value="HPK 1.3">HPK 1.3</option>
                                 <option value="HPK 2.1">HPK 2.1</option>
                                 <option value="HPK 2.2">HPK 2.2</option>
                                 <option value="HPK 2.3">HPK 2.3</option>
                                 <option value="HPK 3.1">HPK 3.1</option>
                                 <option value="HPK 3.2">HPK 3.2</option>
                                 <option value="HPK 3.3">HPK 3.3</option>
                                 <option value="HPK 4.1">HPK 4.1</option>
                                 <option value="HPK 4.2">HPK 4.2</option>
                                 <option value="HPK 4.3">HPK 4.3</option>
                             </select>
                         </div> 
                     </div>
                 </div>
                 <div class="form-group">
                      <label class="col-md-2 col-xs-12 control-label">Tahun akademik</label> 
                     <div class="col-md-8 col-xs-12">
                         <div class="input-group">
                             <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                             <input type="text" name="tahun_akademik" class="form-control" />
                         </div>
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
