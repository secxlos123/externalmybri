@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
	<h1 class="text-uppercase">DASHBOARD DEVELOPER</h1>
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
			<div class="panel-body">
				<div class="col-md-6">
				 	<h2 class="text-uppercase bottom20">Daftar Status Aplikasi Yang Masuk</h3>
	      			<br/>
	          		<div id="chart-container" style="height: 250px;"></div>
				</div>
				<div class="col-md-6">
					 @include('developer.home._dataDashboard._form') 
				</div>
			</div>	
			<div class="row">
				 @include('developer.home._dataDashboard.table_proyek')
			</div>
		</div>
	</div>
</section>
@endsection
@include('developer.home._dataDashboard._script_dashboard')