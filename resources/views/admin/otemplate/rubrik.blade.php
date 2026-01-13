@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" id="theme" href="{{asset('js/plugins/summernote/summernote-lite.min.css')}}"/>
@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('admin.templates.index')}}">daftar template</a></li>
        <li class="active">Template {{ $otemplate->judul_station }}</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Template Soal   {{ $otemplate->judul_station }}</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.templates.rubrik.update',$otemplate->id)}}" method="POST">
                                @csrf
                                @method('put')
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Rubrik Ujian</h3>

                                </div>
                                <div class="panel-body">
                                    <button type="button" id="checkAllAktif" class="btn btn-success btn-sm">Aktifkan Semua</button>
                                    <button type="button" id="uncheckAllAktif" class="btn btn-danger btn-sm">Nonaktifkan Semua</button>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="10">No</th>
                                                    <th width="100">Kompetensi </th>
                                                    <th>Nilai 0</th>
                                                    <th >Nilai 1</th>
                                                    <th >Nilai 2</th>
                                                    <th >Nilai 3</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($rubrik as $index => $data)
                                                <tr id="trow_{{$loop->iteration}}">
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{$data['komp']}}
                                                        <input type="hidden" name="id[]" value="{{ $data['id'] }}">
                                                    </td>
                                                        <td>
                                                        <input type="hidden" name="aktif0[{{$index}}]" value="0">
                                                        <label class="check">
                                                            <input type="checkbox" class="icheckbox" name="aktif0[{{$index}}]" value="1" {{ isset($data['aktif0']) && $data['aktif0'] == 1 ? 'checked' : '' }}>
                                                            <span></span> aktif
                                                        </label>
                                                        <textarea name="Nilai_0[]" class="form-control summernote_osin">{{ $data['nilai_0'] }}</textarea>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="aktif1[{{$index}}]" value="0">
                                                        <label class="check">
                                                            <input type="checkbox" class="icheckbox" name="aktif1[{{$index}}]" value="1" {{ isset($data['aktif1']) && $data['aktif1'] == 1 ? 'checked' : '' }}>
                                                            <span></span> aktif
                                                        </label>
                                                        <textarea name="Nilai_1[]" class="form-control summernote_osin">{{ $data['nilai_1'] }}</textarea>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="aktif2[{{$index}}]" value="0">
                                                        <label class="check">
                                                            <input type="checkbox" class="icheckbox" name="aktif2[{{$index}}]" value="1" {{ isset($data['aktif2']) && $data['aktif2'] == 1 ? 'checked' : '' }}>
                                                            <span></span> aktif
                                                        </label>
                                                        <textarea name="Nilai_2[]" class="form-control summernote_osin">{{ $data['nilai_2'] }}</textarea>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="aktif3[{{$index}}]" value="0">
                                                        <label class="check">
                                                            <input type="checkbox" class="icheckbox" name="aktif3[{{$index}}]" value="1" {{ isset($data['aktif3']) && $data['aktif3'] == 1 ? 'checked' : '' }}>
                                                            <span></span> aktif
                                                        </label>
                                                        <textarea name="Nilai_3[]" class="form-control summernote_osin">{{ $data['nilai_3'] }}</textarea>
                                                    </td>

                                                        <input type="hidden" name="bobot[{{$index}}]" value="{{$data['bobot']}}">

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="panel-footer">

                                    <a  class="btn btn-default" href="{{ route('admin.templates.index') }}">Kembali</a>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>



                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- END RESPONSIVE TABLES -->

</div>
<!-- END WIDGETS -->




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
  height: 150,
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
  height: 150,
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

      $editor.summernote('insertImage', res.url, function ($image) {
        $image.attr('alt', file.name);
      });

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
<script>
   // Centang semua
   $('#checkAllAktif').on('click', function() {
            $('.icheckbox').iCheck('check');
        });

        // Hapus centang semua
        $('#uncheckAllAktif').on('click', function() {
            $('.icheckbox').iCheck('uncheck');
        });
</script>
@endsection
