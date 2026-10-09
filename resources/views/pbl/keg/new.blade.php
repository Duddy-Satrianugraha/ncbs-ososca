@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('pbl.harian.index')}}">Daftar PBL Harian</a></li>
        <li class="active">PBL Baru</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left">Buat PBL</span> Baru</h2>
</div>
@endsection
@section('content')

<div class="row">
    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('pbl.harian.store') }}" method="POST">
                @csrf

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Buat PBL </strong>Baru</h3>
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
                                <option value="Blok 1.1|Introduction Being a Physician">Blok 1.1 (Introduction Being a Physician)</option>
                                <option value="Blok 1.2|Human Body and Locomotor System">Blok 1.2 (Human Body and Locomotor System)</option>
                                <option value="Blok 1.3|Neurology System and Endocrine">Blok 1.3 (Neurology System and Endocrine)</option>
                                <option value="Blok 2.1|Cardiorespiratory System">Blok 2.1 (Cardiorespiratory System)</option>
                                <option value="Blok 2.2|Digestive System">Blok 2.2 (Digestive System)</option>
                                <option value="Blok 2.3|Genitourinary System">Blok 2.3 (Genitourinary System)</option>
                                <option value="Blok 3.1|Basic Medical Principles">Blok 3.1 (Basic Medical Principles)</option>
                                <option value="Blok 3.2|Tropical Diseases">Blok 3.2 (Tropical Diseases)</option>
                                <option value="Blok 3.3|Neurosensory Disorders">Blok 3.3 (Neurosensory Disorders)</option>
                                <option value="Blok 4.1|Cardiorespiratory Disorders">Blok 4.1 (Cardiorespiratory Disorders)</option>
                                <option value="Blok 4.2|Digestive Disorders">Blok 4.2 (Digestive Disorders)</option>
                                <option value="Blok 4.3|Dermatology - Genitourinary Disorders">Blok 4.3 (Genitourinary Disorders)</option>
                                <option value="Blok 5.1|Metabolic Disorders and HematoOncology">Blok 5.1 (Metabolic Disorders and HematoOncology)</option>
                                <option value="Blok 5.2|Ethic Medicolegal and Patient Safety">Blok 5.2 (Ethic Medicolegal and Patient Safety)</option>
                                <option value="Blok 5.3|Research,Statistic, and Epidemiology">Blok 5.3 (Research,Statistic, and Epidemiology)</option>
                                <option value="Blok 6.1|Safe Motherhood and Infancy">Blok 6.1 (Safe Motherhood and Infancy)</option>
                                <option value="Blok 6.2|Childhood and Adolescent">Blok 6.2 (Childhood and Adolescent)</option>
                                <option value="Blok 6.3|Adulthood and Elderly">Blok 6.3 (Adulthood and Elderly)</option>
                                <option value="Blok 7.1|Implementation of Emergency Medicine">Blok 7.1 (Implementation of Emergency Medicine)</option>
                                <option value="Blok 7.2|Implementation of Family Medicine and Community Health">Blok 7.2 (Implementation of Family Medicine and Community Health)</option>
                                <option value="Blok 7.3|Elektif Medical Education">Blok 7.3 (Elektif Medical Education)</option>
                                <option value="Blok 7.3|Elektif Medical Nutrition">Blok 7.3 (Elektif Medical Nutrition)</option>
                                <option value="Blok 7.3|Elektif Genetics">Blok 7.3 (Elektif Medical Genetics)</option>
                                <option value="Blok 7.3|Elektif Cultural Competence">Blok 7.3 (Elektif Cultural Competence)</option>
                                <option value="Blok 7.3|Elektif Techopreneur">Blok 7.3 (Elektif Medical Education)</option>
                                <option value="Blok 8.2|Entrepreneurship">Blok 8.2 (Entrepreneurship)</option>
                                <option value="Blok 8.4|Preclearkship">Blok 8.4 (Preclearkship)</option>
                            </select>
                            <small class="text">contoh Blok 4.1</small>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Tahun Akademik</label>
                        <div class="col-md-8 col-xs-12">
                            <input type="text" class="form-control" name="tahun_akademik" value="{{ old('tahun_akademik') }}"/>
                            <small class="text">pastikan menulis tahun akademik berjalan contoh :2029/2030</small>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Jumlah Skenario</label>
                        <div class="col-md-8 col-xs-12">
                            <input type="number" class="form-control" name="jml_sk" value="{{ old('jml_sk') }}"/>
                            <small class="text">Jumlah skenario yang akan dibuat</small>
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
