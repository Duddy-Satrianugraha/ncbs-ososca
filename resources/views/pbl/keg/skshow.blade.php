@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('pbl.harian.index')}}">Daftar PBL Harian</a></li>
    <li ><a href="{{ route('pbl.harian.show', $mininotes->keg_id)}}">PBL {{ $mininotes->keg->name }}</a></li>
        <li class="active">Skenario {{ $mininotes->nomor_sk }}</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Mininotes   Skenario {{ $mininotes->nomor_sk}} PbL {{ $mininotes->keg->name }}</h2>
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
                                    <h3 class="panel-title"> Skenario</h3>

                                </div>
                                <div class="panel-body">
                                    <div class="text-center">
                                        <h2> {{ $mininotes->judul_sk}}</h2>
                                        <h3>SKENARIO {{ $mininotes->nomor_sk }}</h3>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th width="10">No</th>
                                                    <th width="200"> </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1 .</td>
                                                    <td>Skenario</td>
                                                    <td>{!! $mininotes->skenario !!}</td>
                                                </tr>

                                                 <tr>
                                                    <td class="text-center">2 .</td>
                                                    <td>Daftar Pustaka</td>
                                                    <td>
                                                         {!! $mininotes->dafpus !!}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <hr/>

                                    </div>

                                </div>
                                <div class="panel-footer">

                                    <a  class="btn btn-default" href="{{ route('pbl.harian.show', $mininotes->keg_id) }}">Kembali</a>
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

@endsection
