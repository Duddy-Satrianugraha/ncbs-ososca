@extends('layouts.cbs_login')

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1 card shadow-card">
        @include('includes.osin_alert')
      <div class="row">
        <!-- Kiri: Info Station -->
        <div class="col-sm-12">
          <div class="info-title">Soal OSOCA <a href="{{ route('peserta.logout')}}" style="text-decoration: none; color:black; hover:black"> 2025 FK UGJ</a></div>
           <div class='col-sm-12' style="text-align: center"><br><br><br>
            <h2>{{ $station->name }} </h2>
            <h4>Sesi {{ $station->current }} </h4>
           </div>
        </div>



        <!--  akhri panel yab-->
      </div>
    </div>
  </div>


@endsection


@section('script')
<script>
  window.OSOCA = {
    inUrl: "{{ route('peserta.in') }}"
  };
</script>
<script type="text/javascript" src="{{ asset('js/osoca_insoal.js') }}"></script>

@endsection
