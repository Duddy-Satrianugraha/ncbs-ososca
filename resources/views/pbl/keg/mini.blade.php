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
                 <input type="hidden" name="paket_id" id="paket_id" value="{{ $mininotes->keg_id }}">
                <input type="hidden" name="order" id="order" value="{{ $mininotes->nomor_sk }}">
                <input type="hidden" name="tipe" id="tipe" value="pbl">
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
/** =========================
 *  1) BUTTON: Insert Simbol
 *  ========================= */

function makeSymbolButton(symbols) {
  return function (context) {
    var ui = $.summernote.ui;

    // bikin dialog (sekali)
    var $dialog = ui.dialog({
      title: 'Insert Simbol',
      body:
        '<div class="sn-symbol-wrap" style="padding:10px;max-height:240px;overflow:auto"></div>',
      footer:
        '<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>'
    }).render().appendTo('body');

    // isi simbol ke dalam dialog
    function fillSymbols() {
      var $wrap = $dialog.find('.sn-symbol-wrap');
      if ($wrap.data('filled')) return;

      var html = '';
      symbols.forEach(function (s) {
        html += '<button type="button" class="btn btn-default btn-sm sn-insert-symbol" ' +
                'data-symbol="' + s.replace(/"/g, '&quot;') + '" ' +
                'style="margin:2px;min-width:36px">' + s + '</button>';
      });

      $wrap.html(html);
      $wrap.data('filled', true);
    }

    // klik simbol → insert ke editor
    $dialog.on('click', '.sn-insert-symbol', function () {
      var sym = $(this).data('symbol');

      context.invoke('editor.restoreRange');
      context.invoke('editor.focus');
      context.invoke('editor.insertText', sym);

      $dialog.modal('hide');
    });

    return ui.button({
      contents: '<b>Σ</b>',
      tooltip: 'Insert Simbol',
      click: function () {
        // simpan cursor, isi simbol, tampilkan modal
        context.invoke('editor.saveRange');
        fillSymbols();
        $dialog.modal('show');
      }
    }).render();
  };
}

// daftar simbol (bebas tambah)
var SYMBOLS = [
  '±','×','÷','≈','≠','≤','≥',
  '→','←','↑','↓','↔',
  'α','β','γ','δ','ε','θ','λ','μ','π','σ','Ω','Σ',
  '°','‰','√','∞','∑','∫'
];

var symbolButton = makeSymbolButton(SYMBOLS);


/** =========================
 *  2) SUMMERNOTE: TEXT ONLY
 *  ========================= */
$(".summernote_osin").summernote({
  height: 250,
  focus: true,
  toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'fontsize']],
    ['fontstyle', ['fontname']],
    ['color', ['color']],
    ['table', ['table']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['view', ['codeview']],
    ['custom', ['symbol']] // ✅ tombol simbol
  ],
  buttons: {
    symbol: symbolButton // ✅ register tombol
  },
  callbacks: {
    onPaste: function (e) {
      e.preventDefault();
      var bufferText = (e.originalEvent || e).clipboardData.getData('text/plain');
      document.execCommand('insertText', false, bufferText);
    }
  }
});


/** =========================
 *  3) SUMMERNOTE: WITH IMAGE UPLOAD
 *  ========================= */
$(".summernote_osin_pic").summernote({
  height: 250,
  focus: true,
  toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'fontsize']],
    ['fontstyle', ['fontname']],
    ['color', ['color']],
    ['table', ['table','picture']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['view', ['codeview']],
    ['custom', ['symbol']] // ✅ tombol simbol
  ],
  buttons: {
    symbol: symbolButton // ✅ register tombol
  },
  callbacks: {
    onPaste: function (e) {
      e.preventDefault();
      var bufferText = (e.originalEvent || e).clipboardData.getData('text/plain');
      document.execCommand('insertText', false, bufferText);
    },

    // ✅ upload gambar (drag/drop/paste/insert picture)
    onImageUpload: function (files) {
      var $editor = $(this);
      $editor.summernote('saveRange');

      for (var i = 0; i < files.length; i++) {
        uploadSummernoteImage(files[i], $editor);
      }
    }
  }
});

function uploadSummernoteImage(file, $editor) {
  var formData = new FormData();
  formData.append('image', file);
    const paketInput = document.getElementById('paket_id');
    const orderInput = document.getElementById('order');
    const tipeInput = document.getElementById('tipe');
     if (paketInput) {
      formData.append('paket_id', paketInput.value);
      formData.append('order', orderInput.value);
      formData.append('tipe', tipeInput.value);
    }

  $.ajax({
    url: "{{ route('admin.media.upload') }}",
    method: "POST",
    data: formData,
    contentType: false,
    processData: false,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      'Accept': 'application/json'
    },
    success: function (res) {
      $editor.summernote('restoreRange');
      $editor.summernote('focus');

      $editor.summernote('insertImage', res.url);

      $editor.summernote('saveRange');
    },
    error: function (xhr) {
      var msg = 'Upload gagal';
      if (xhr.responseJSON) {
        msg = xhr.responseJSON.message || msg;
        if (xhr.responseJSON.errors) {
          var firstKey = Object.keys(xhr.responseJSON.errors)[0];
          msg = (xhr.responseJSON.errors[firstKey] && xhr.responseJSON.errors[firstKey][0]) || msg;
        }
      }
      alert(msg);
    }
  });
}
</script>


@endsection
