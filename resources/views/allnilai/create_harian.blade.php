@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('nilai.index')}}">Daftar Ujian</a></li>
        <li class="active">Buat Nilai</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Import Nilai  Baru</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" action="{{ route('nilai.store') }}" method="POST">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Import</strong> Nilai </h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">

            </div>
            <div class="panel-body form-group-separated">
                    @csrf
                <div class="form-group">
                    <label class="col-md-2 col-xs-12 control-label">Nama Nilai</label>
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
                                 <option value="UTB">Nilai UTB</option>
                                 <option value="UAB">Nilai UAB</option>
                                 <option value="PBL">Nilai PBL</option>
                                 <option value="OSOCA">Nilai Osoca</option>
                                 <option value="OSCE">Nilai Osce</option>
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
                                 <option value="HPK 1.4">HPK 1.4</option>
                                 <option value="HPK 2.1">HPK 2.1</option>
                                 <option value="HPK 2.2">HPK 2.2</option>
                                 <option value="HPK 2.3">HPK 2.3</option>
                                 <option value="HPK 2.4">HPK 2.4</option>
                                 <option value="HPK 3.1">HPK 3.1</option>
                                 <option value="HPK 3.2">HPK 3.2</option>
                                 <option value="HPK 3.3">HPK 3.3</option>
                                 <option value="HPK 3.4">HPK 3.4</option>
                                 <option value="HPK 4.1">HPK 4.1</option>
                                 <option value="HPK 4.2">HPK 4.2</option>
                                 <option value="HPK 4.3">HPK 4.3</option>
                                 <option value="HPK 4.4">HPK 4.4</option>
                                 <option value="HPK 5.1">HPK 5.1</option>
                                 <option value="HPK 5.2">HPK 5.2</option>
                                 <option value="HPK 5.3">HPK 5.3</option>
                                 <option value="HPK 5.4">HPK 5.4</option>
                                 <option value="HPK 6.1">HPK 6.1</option>
                                 <option value="HPK 6.2">HPK 6.2</option>
                                 <option value="HPK 6.3">HPK 6.3</option>
                                 <option value="HPK 6.4">HPK 6.4</option>
                                 <option value="HPK 7.1">HPK 7.1</option>
                                 <option value="HPK 7.2">HPK 7.2</option>
                                 <option value="HPK 7.3">HPK 7.3</option>
                                 <option value="HPK 7.4">HPK 7.4</option>
                                 <option value="HPK 8.1">HPK 8.1</option>
                                 <option value="HPK 8.2">HPK 8.2</option>
                                 <option value="HPK 8.3">HPK 8.3</option>
                                 <option value="HPK 8.4">HPK 8.4</option>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                      <label class="col-md-2 col-xs-12 control-label">Tahun akademik</label>
                     <div class="col-md-8 col-xs-12">
                         <div class="input-group">
                             <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                             <input type="text" name="tahun_akademik" class="form-control" value="{{ date('Y')}} - {{ date('Y')+1}}" />
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
