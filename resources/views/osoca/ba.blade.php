@extends('layouts.cbs_login')

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1 card shadow-card">
        @include('includes.osin_alert')
      <div class="row">
        <div class="info-title">BERITA ACARA UJIAN OSOCA {{$data['ujian']->name}}</div>

        <p><span class="info-label2">Station: {{$data['station']->name}} </span> </p>
        <p><span class="info-label2">Hal yang perlu dilaporkan </span> </p>
       <form action="{{ route('osoca.bachek')}}" method="post" class="form-horizontal" id="form-scan">
        @csrf
        <input type="hidden" name="station_id" id="ba-qr"  value="{{ $data['station']->id }}">
        <textarea name="berita" id="ba-qr"  class="form-control" rows="5" placeholder="hal yang perlu di laporkan"></textarea>
        <br>
        <button type="submit" class="btn btn-bahaya">simpan dan logout</button>
       </form>
      </div>
    </div>
  </div>


@endsection


@section('script')
<script type="text/javascript" src="{{ asset('js/instascan.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/osoca_mhs.js') }}"></script>

@endsection
