@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('pbl.harian.index')}}">Daftar PBL Harian</a></li>
        <li class="active">Edit PBL {{ $keg->name }}</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left">Edit PBL</span> {{ $keg->name }}</h2>
</div>
@endsection
@section('content')

<div class="row">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('pbl.harian.update', $keg->id )}}" method="POST">
                @csrf
                @method('PUT')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Edit PBL </strong>{{ $keg->name }}</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">

                </div>
                <div class="panel-body form-group-separated">

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Nama Blok</label>
                        <div class="col-md-8 col-xs-12">
                            <select class="form-control" name="name">
                                <option value="Blok 1.1|Introduction Being a Physician" @if($keg->name."|".$keg->blok_name == 'Blok 1.1|Introduction Being a Physician') selected @endif>Blok 1.1 (Introduction Being a Physician)</option>
                                <option value="Blok 1.2|Human Body and Locomotor System" @if($keg->name."|".$keg->blok_name == 'Blok 1.2|Human Body and Locomotor System') selected @endif>Blok 1.2 (Human Body and Locomotor System)</option>
                                <option value="Blok 1.3|Neurology System and Endocrine" @if($keg->name."|".$keg->blok_name == 'Blok 1.3|Neurology System and Endocrine') selected @endif>Blok 1.3 (Neurology System and Endocrine)</option>
                                <option value="Blok 2.1|Cardiorespiratory System" @if($keg->name."|".$keg->blok_name == 'Blok 2.1|Cardiorespiratory System') selected @endif>Blok 2.1 (Cardiorespiratory System)</option>
                                <option value="Blok 2.2|Digestive System" @if($keg->name."|".$keg->blok_name == 'Blok 2.2|Digestive System') selected @endif>Blok 2.2 (Digestive System)</option>
                                <option value="Blok 2.3|Genitourinary System" @if($keg->name."|".$keg->blok_name == 'Blok 2.3|Genitourinary System') selected @endif>Blok 2.3 (Genitourinary System)</option>
                                <option value="Blok 3.1|Basic Medical Principles" @if($keg->name."|".$keg->blok_name == 'Blok 3.1|Basic Medical Principles') selected @endif>Blok 3.1 (Basic Medical Principles)</option>
                                <option value="Blok 3.2|Tropical Diseases" @if($keg->name."|".$keg->blok_name == 'Blok 3.2|Tropical Diseases') selected @endif>Blok 3.2 (Tropical Diseases)</option>
                                <option value="Blok 3.3|Neurosensory Disorders" @if($keg->name."|".$keg->blok_name == 'Blok 3.3|Neurosensory Disorders') selected @endif>Blok 3.3 (Neurosensory Disorders)</option>
                                <option value="Blok 4.1|Cardiorespiratory Disorders" @if($keg->name."|".$keg->blok_name == 'Blok 4.1|Cardiorespiratory Disorders') selected @endif>Blok 4.1 (Cardiorespiratory Disorders)</option>
                                <option value="Blok 4.2|Digestive Disorders" @if($keg->name."|".$keg->blok_name == 'Blok 4.2|Digestive Disorders') selected @endif>Blok 4.2 (Digestive Disorders)</option>
                                <option value="Blok 4.3|Dermatology - Genitourinary Disorders" @if($keg->name."|".$keg->blok_name == 'Blok 4.3|Dermatology - Genitourinary Disorders') selected @endif>Blok 4.3 (Genitourinary Disorders)</option>
                                <option value="Blok 5.1|Metabolic Disorders and HematoOncology" @if($keg->name."|".$keg->blok_name == 'Blok 5.1|Metabolic Disorders and HematoOncology') selected @endif>Blok 5.1 (Metabolic Disorders and HematoOncology)</option>
                                <option value="Blok 5.2|Ethic Medicolegal and Patient Safety" @if($keg->name."|".$keg->blok_name == 'Blok 5.2|Ethic Medicolegal and Patient Safety') selected @endif>Blok 5.2 (Ethic Medicolegal and Patient Safety)</option>
                                <option value="Blok 5.3|Research,Statistic, and Epidemiology" @if($keg->name."|".$keg->blok_name == 'Blok 5.3|Research,Statistic, and Epidemiology') selected @endif>Blok 5.3 (Research,Statistic, and Epidemiology)</option>
                                <option value="Blok 6.1|Safe Motherhood and Infancy" @if($keg->name."|".$keg->blok_name == 'Blok 6.1|Safe Motherhood and Infancy') selected @endif>Blok 6.1 (Safe Motherhood and Infancy)</option>
                                <option value="Blok 6.2|Childhood and Adolescent" @if($keg->name."|".$keg->blok_name == 'Blok 6.2|Childhood and Adolescent') selected @endif>Blok 6.2 (Childhood and Adolescent)</option>
                                <option value="Blok 6.3|Adulthood and Elderly" @if($keg->name."|".$keg->blok_name == 'Blok 6.3|Adulthood and Elderly') selected @endif>Blok 6.3 (Adulthood and Elderly)</option>
                                <option value="Blok 7.1|Implementation of Emergency Medicine" @if($keg->name."|".$keg->blok_name == 'Blok 7.1|Implementation of Emergency Medicine') selected @endif>Blok 7.1 (Implementation of Emergency Medicine)</option>
                                <option value="Blok 7.2|Implementation of Family Medicine and Community Health" @if($keg->name."|".$keg->blok_name == 'Blok 7.2|Implementation of Family Medicine and Community Health') selected @endif>Blok 7.2 (Implementation of Family Medicine and Community Health)</option>
                                <option value="Blok 7.3|Elektif Medical Education" @if($keg->name."|".$keg->blok_name == 'Blok 7.3|Elektif Medical Education') selected @endif>Blok 7.3 (Elektif Medical Education)</option>
                                <option value="Blok 7.3|Elektif Medical Nutrition" @if($keg->name."|".$keg->blok_name == 'Blok 7.3|Elektif Medical Nutrition') selected @endif>Blok 7.3 (Elektif Medical Nutrition)</option>
                                <option value="Blok 7.3|Elektif Genetics" @if($keg->name."|".$keg->blok_name == 'Blok 7.3|Elektif Genetics') selected @endif>Blok 7.3 (Elektif Medical Genetics)</option>
                                <option value="Blok 7.3|Elektif Cultural Competence" @if($keg->name."|".$keg->blok_name == 'Blok 7.3|Elektif Cultural Competence') selected @endif>Blok 7.3 (Elektif Cultural Competence)</option>
                                <option value="Blok 7.3|Elektif Techopreneur" @if($keg->name."|".$keg->blok_name == 'Blok 7.3|Elektif Techopreneur') selected @endif>Blok 7.3 (Elektif Medical Education)</option>
                                <option value="Blok 8.2|Entrepreneurship" @if($keg->name."|".$keg->blok_name == 'Blok 8.2|Entrepreneurship') selected @endif>Blok 8.2 (Entrepreneurship)</option>
                                <option value="Blok 8.4|Preclearkship" @if($keg->name."|".$keg->blok_name == 'Blok 8.4|Preclearkship') selected @endif>Blok 8.4 (Preclearkship)</option>

                            </select>
                            <small class="text">contoh Blok 4.1</small>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Tahun Akademik</label>
                        <div class="col-md-8 col-xs-12">
                            <input type="text" class="form-control" name="tahun_akademik" value="{{ $keg->tahun_akademik }}"/>
                            <small class="text">pastikan menulis tahun akademik berjalan contoh :2029/2030</small>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">

                    <a  class="btn btn-default" href="{{ route('pbl.harian.index') }}">Kembali</a>
                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                </div>
            </div>
            </form>

        </div>
    </div>
</div>




@endsection

@section('javascript')

@endsection
