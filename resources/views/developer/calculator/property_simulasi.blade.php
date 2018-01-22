@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
	<h1 class="text-uppercase">Kalkulator DEVELOPER</h1>
 	<ol class="breadcrumb text-center">
	    <li><a href="{!! url('/') !!}">Dashboard</a></li>
	    <li class="active">Kalkulator</li>
	</ol>
@endsection

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
                {!! Form::open(['route' => 'developer.post_calculator','class' => 'callus top201', 'id' => 'form-calculator', ]) !!}
                    @include('home.calculator._form_credit_simulation')
                {!!  Form::close()  !!}
            </div>
        </div>
    </div>
    <div class="col-md-8">
       <ul class="nav nav-tabs">
            <li class="active">
                <a href="#rincian_pinjaman" data-toggle="tab" aria-expanded="true">
                    <span class="visible-xs"><i class="fa fa-info"></i></span>
                    <span class="hidden-xs text-uppercase">Rincian Pinjaman</span>
                </a>
            </li>
            <li class="">
                <a href="#detail_angsuran" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-phone"></i></span>
                    <span class="hidden-xs text-uppercase">Detail Angsuran</span>
                </a>
            </li>
            <li class="">
                <a href="#download" data-toggle="tab" aria-expanded="false">
                    <span class="visible-xs"><i class="fa fa-list"></i></span>
                    <span class="hidden-xs text-uppercase">Download</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="rincian_pinjaman">
                @include('home.calculator._rincian_pinjaman')
            </div>
            <div class="tab-pane" id="detail_angsuran">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box table-responsive for-table-detail">
                          @include('home.calculator._detail_angsuran')
                            <p class="term2">Catatan: Perhitungan ini adalah hasil perkiraan aplikasi KPR secara umum Data perhitungan di atas dapat berbeda dengan perhitungan bank. Untuk perhitungan yang akurat, silahkan hubungi bank</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="download">
                <div class="row">
                    <div class="col-sm-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</section>

@endsection

