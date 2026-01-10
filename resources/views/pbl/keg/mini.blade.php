@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" id="theme" href="{{asset('js/plugins/summernote/summernote-lite.min.css')}}"/>


@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('pbl.harian.index')}}">Daftar PBL Harian</a></li>
    <li ><a href="{{ route('pbl.harian.show', $mininotes->keg_id)}}">PBL {{ $mininotes->keg->name }}</a></li>
        <li class="active">Mininotes SK {{ $mininotes->nomor_sk }}</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>Mininotes SK {{ $mininotes->nomor_sk}} PbL {{ $mininotes->keg->name }}</h2>
</div>
@endsection
@section('content')

<div class="row">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('pbl.harian.mininotes.update', $mininotes->id) }}" method="POST">
                @csrf
                @method('put')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong> Mininotes Skenario  </strong>{{ $mininotes->nomor_sk}}</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">

                </div>
                <div class="panel-body form-group-separated">
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Daftar Istilah</label>
                        <div class="col-md-8 col-xs-12">
                            <textarea class="form-control summernote_osin" name="step_1">{{$mininotes->step_1}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Daftar Pertanyaan</label>
                        <div class="col-md-8 col-xs-12">
                            <textarea class="form-control summernote_osin" name="step_2">{{$mininotes->step_2}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Sasaran Belajar</label>
                        <div class="col-md-8 col-xs-12">
                            <textarea class="form-control summernote_osin" name="sasbel">{{$mininotes->sasbel}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Mind Map</label>
                        <div class="col-md-8 col-xs-12">
                            <textarea class="form-control summernote_osin_pic" name="mindmap">{{$mininotes->mindmap}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Mininotes</label>
                        <div class="col-md-8 col-xs-12">
                            <textarea class="form-control summernote_osin_pic" name="mininotes">{{$mininotes->mininotes}}</textarea>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">

                    <a  class="btn btn-default" href="{{ route('pbl.harian.show', $mininotes->keg_id) }}">Kembali</a>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>




@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/plugins/summernote/summernote-lite.min.js')}}"></script>
<script>
    $(".summernote_osin").summernote({height: 250, focus: true,
                                                  toolbar: [
                                                      ['style', ['bold', 'italic', 'underline', 'clear']],
                                                      ['font', ['strikethrough', 'fontsize']],
                                                      ['fontstyle', ['fontname']],
                                                      ['color', ['color']],
                                                      ['table', ['table']],
                                                      ['para', ['ul', 'ol', 'paragraph']],
                                                      ['height', ['height']],
                                                      ['view', [ 'codeview']],

                                                  ],
                                                  callbacks: {
                                                            onPaste: function (e) {
                                                                e.preventDefault();
                                                                var bufferText = (e.originalEvent || e).clipboardData.getData('text/plain');
                                                                document.execCommand('insertText', false, bufferText);
                                                            }
                                                        }
                                                 });

    $(".summernote_osin_pic").summernote({height: 250, focus: true,
                                                  toolbar: [
                                                      ['style', ['bold', 'italic', 'underline', 'clear']],
                                                      ['font', ['strikethrough', 'fontsize']],
                                                      ['fontstyle', ['fontname']],
                                                      ['color', ['color']],
                                                      ['table', ['table','picture']],
                                                      ['para', ['ul', 'ol', 'paragraph']],
                                                      ['height', ['height']],
                                                      ['view', [ 'codeview']],
                                                      ['custom', ['pastePlainText']]
                                                  ],
                                                  callbacks: {
                                                    onPaste: function (e) {
                                                        e.preventDefault();
                                                        var bufferText = (e.originalEvent || e).clipboardData.getData('text/plain');
                                                        document.execCommand('insertText', false, bufferText);
                                                    }
                                                    }
                                                 });
</script>


@endsection
