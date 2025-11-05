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
                    <li><a href="{{ route('peserta.tolist')}}">Logout</a></li>
                </ul>
            </a>
@endsection



@section('detail-soal')
<div class="card">
    <a href="{{ route('peserta.tolist')}}" class="btn btn-lg btn-danger">Logout</a>
    <div class="pull-right" style="font-size:20px; font-weight:bold;">
    Jangan Close browser ini
</div>

    <hr>
    <div class="panel-body">
                        <div class="table-responsive">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th width="10">No</th>
                                                    <th width="100"> </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1 .</td>
                                                    <td>Nomor kasus</td>
                                                    <td>{{$template->nomor_station}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2 .</td>
                                                    <td>Skenario Klinik</td>
                                                    <td><font size= "6">
                                                         {!!$template->soal !!}
                                                         </font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3 .</td>
                                                    <td>Tugas</td>
                                                    <td><font size= "6">
                                                         {!! $template->tugas_mhs !!}
                                                         </font>
                                                    </td>
                                                </tr>



                                            </tbody>
                                        </table>
                                        <hr/>


                                    </div>

    </div>
</div>
@endsection



@section('script')
<script>
  window.OSOCA = {
    outUrl: "{{ route('peserta.out') }}"
  };
</script>
<script src="{{ asset('js/osoca_outsoal.js') }}"></script>
@endsection
