@extends('layouts.cbs_temp')

@section('css')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" href="{{ asset('css/toastr/toastr.min.css') }}" />

@endsection

@section('judul')
<div class="col-xs-4 text-center">
    <strong>SELAMAT DATANG DI {{strtoupper( $ujian->name) }} {{ strtoupper($ujian->ta) }}</strong><br>
    <small>Tanggal : {{ tgl_indo($ujian->tgl_ujian) }}</small>
</div>
@endsection

@section('penguji')

            <a class="dropdown-toggle" href="#"  data-toggle="dropdown" >
              <span><img src="{{ asset('img/mduser.jpg')  }}" alt="avatar" class="logo" style="height: 40px; width: 40px; border-radius: 50%; object-fit: cover;"></span>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('peserta.logout')}}">Logout</a></li>
                </ul>
            </a>
@endsection



@section('detail-soal')
<div id="soal-container">
    @include('peserta._detail_soal', ['template' => $template ?? null])
</div>
@endsection



@section('script')
<script>
    window.OSOCA = {
        soalUrl: "{{ route('peserta.index') }}"
    };
</script>
<script src="{{ asset('js/osoca_soal.js') }}"></script>
@endsection
