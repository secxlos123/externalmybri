@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')

<section id="property" class="padding listing1">
  <div class="container">
<h2></h2>
<div class="row">
 @include('home.calculator._error_validation') 
    <div class="col-md-4">
        <div class="panel panel-color panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title text-uppercase">Simulasi Perhitungan Kredit</h3>
            </div>
            <div class="panel-body" style="border: none;">
                {!! Form::open(['route' => 'kalkulator.post','class' => 'callus top201', 'id' => 'form-calculator', ]) !!}
                    @include('home.calculator._form_credit_simulation')
                {!!  Form::close()  !!}    
            </div>
        </div>
    </div>
    <div class="col-md-8">
       <ul class="nav nav-tabs">
            <li class="active">
                <a href="#developer-info" data-toggle="tab" aria-expanded="true">
                    <span class="visible-xs"><i class="fa fa-info"></i></span>
                    <span class="hidden-xs text-uppercase">Rincian Pinjaman</span>
                </a>
            </li>
            <li class="">
                <a href="#contact-list" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-phone"></i></span>
                    <span class="hidden-xs text-uppercase">Detail Angsuran</span>
                </a>
            </li>
            <li class="">
                <a href="#property-list" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-list"></i></span>
                    <span class="hidden-xs text-uppercase">Download</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="developer-info">
                @include('home.calculator._rincian_pinjaman')
            </div>
            <div class="tab-pane" id="contact-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive for-table-detail">
                          @include('home.calculator._detail_angsuran')
                            <p class="term2">Catatan: Perhitungan ini adalah hasil perkiraan aplikasi KPR secara umum Data perhitungan di atas dapat berbeda dengan perhitungan bank. Untuk perhitungan yang akurat, silahkan hubungi bank</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="property-list">
                <div class="row">
                    <div class="col-sm-12">

                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="bottom-space"></div>
</div>
</section>


@endsection

 
 