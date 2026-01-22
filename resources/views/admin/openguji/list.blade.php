@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
        <li class="active">Daftar Tutor</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Daftar Tutor</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Tutor </h3>


                                  <form action="{{ route('tutor.penguji.index') }}" method="GET" class="row" id="form-search">
                                                <div id="selected-container">
                                                    @if(!empty($selected))
                                                        @foreach($selected as $id)
                                                            <input type="hidden" name="selected[]" value="{{ $id }}">
                                                        @endforeach
                                                    @endif
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <span class="fa fa-search"></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="search"
                                                            placeholder="Cari nama atau NIK"
                                                            value="{{ request('search') }}">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary">Search</button>
                                                            <a href="{{ route('tutor.penguji.index') }}" class="btn btn-default">Clear</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                    <ul class="panel-controls">

                                            <li><a href="{{ route('tutor.penguji.create')}}" class="panel-add"><span class="fa fa-plus"></span></a></li>

                                    </ul>
                                </div>
                                <div class="panel-body">
                                   <form id="form-penguji" method="POST">
                                            @csrf
                                           <div style="margin-bottom:10px;">
                                                <button type="submit" formaction="{{ route('tutor.penguji.print') }}" formmethod="POST" target="_blank" class="btn btn-success">
                                                    <i class="fa fa-print"></i> Cetak Kartu
                                                </button>

                                                <button type="submit" formaction="{{ route('tutor.penguji.massdelete') }}" formmethod="POST" class="btn btn-danger"
                                                    onclick="return confirm('Yakin ingin menghapus penguji terpilih?');">
                                                    <i class="fa fa-trash"></i> Hapus Terpilih
                                                </button>
                                            </div>
                                    <div class="table-responsive mt-2">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="30">
                                                    <input type="checkbox" id="checkAll"> <!-- Pilih semua -->
                                                </th>
                                                    <th width="50">Nomor</th>
                                                    <th >Nama</th>
                                                    <th width="200"> NIK</th>
                                                    <th width="100">actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php $i =  1;@endphp
                                                @foreach ($penguji as $data)
                                                <tr id="trow_{{$i}}">
                                                    <td class="text-center">
                                                       <input type="checkbox"
                                                        name="penguji_id[]"
                                                        value="{{ $data->id }}"
                                                        class="cb-penguji"
                                                        {{ in_array($data->id, $selected ?? []) ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="text-center">{{$i}}</td>
                                                    <td> {{$data->nama}}</td>
                                                    <td> {{$data->nik}}</td>

                                                    <td>
                                                        <a href="{{ route("tutor.penguji.qr", $data->id)}}" class="btn btn-info btn-sm"><span class="fa fa-qrcode"></span>Lihat QR Tutor</a>
                                                        <a href="{{ route("tutor.penguji.edit", $data->id)}}" class="btn btn-warning btn-sm"><span class="fa fa-pencil"></span>Edit</a>
                                                    </td>
                                                </tr>
                                                @php $i++;@endphp
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{ $penguji->appends(['search' => request('search')])->links() }}

                                    </div>
                                    </form>
                                </div>



                            </div>

                        </div>
                    </div>
                    <!-- END RESPONSIVE TABLES -->

</div>
<!-- END WIDGETS -->




@endsection

@section('javascript')
<script>
document.addEventListener('change', function (e) {
    if (!e.target.classList.contains('cb-penguji')) return;

    let container = document.getElementById('selected-container');
    let id = e.target.value;

    if (e.target.checked) {
        if (!container.querySelector('input[value="' + id + '"]')) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'selected[]';
            input.value = id;
            container.appendChild(input);
        }
    } else {
        let el = container.querySelector('input[value="' + id + '"]');
        if (el) el.remove();
    }
});

// check all
document.getElementById('checkAll').addEventListener('change', function(e) {
    let checkboxes = document.querySelectorAll('.cb-penguji');
    checkboxes.forEach(cb => {
        cb.checked = e.target.checked;
        cb.dispatchEvent(new Event('change'));
    });
});
</script>

@endsection
