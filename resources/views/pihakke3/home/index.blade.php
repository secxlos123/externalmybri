@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
	<h1 class="text-uppercase">DASHBOARD PIHAK KE 3</h1>
	<p>Kelola akun Anda di sini.</p>
	<ol class="breadcrumb text-center">
	    <li><a href="javascript:void(0)">Dashboard</a></li>
	    <li class="active">Home</li>
	</ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
	<div class="container">

		<div class="row bottom20">
			<div class="col-md-6">
				@include('pihakke3.home.grafik')
			</div>
			<div class="col-md-6">
				@include('pihakke3.home.top-agent')
			</div>
		</div>
		<div class="row">
			@include('pihakke3.home.top-project')
		</div>

	</div>
</section>
@endsection

@push('styles')
	{!! Html::style('assets/css/morris.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/js/morris.min.js') !!}
	{!! Html::script('assets/js/raphael-min.js') !!}
	{!! Html::script('assets/js/jquery.morris.init.js') !!}
@endpush