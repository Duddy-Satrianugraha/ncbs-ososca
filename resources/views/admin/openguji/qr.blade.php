@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('tutor.penguji.index')}}">Daftar Tutor/Penguji</a></li>
        <li class="active">QR Tutor/Penguji</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> QR Tutor/Penguji</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Tutor/Penguji</strong>Baru</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
            </div>
            <div class="panel-body form-group-separated">

            <div class="form-horizontal" >

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Nama</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-user"></span></span>
                            <input type="text" name="nama" class="form-control" value="{{ $openguji->nama }}"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">NIK</label>
                    <div class="col-md-6 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" name="nik" class="form-control" value="{{ $openguji->nik }}"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Qr Code</label>
                    <div class="col-md-6 col-xs-12">
                      <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(300)->generate($openguji->qr_penguji)) }}" alt="QR Code">
                    </div>
                </div>


             </div>
            </div>
            <div class="panel-footer">
                <a href="{{ route('tutor.penguji.index')}}" class="btn btn-default">Return</a>

            </div>
        </div>

    </div>
</div>
<!-- END WIDGETS -->




@endsection

@section('javascript')

@endsection
