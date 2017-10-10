@extends('layouts.app')

@section('title', 'Manajemen Tipe Proyek')

@section('breadcrumb')
	<h1 class="text-uppercase">Manajemen Tipe Proyek</h1>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! url('/') !!}">Dashboard</a></li>
	    <li class="active">Tipe Proyek</li>
	</ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
	<div class="container">
		@include('developer.property_type._table')
	</div>
</section>
@endsection

@push('styles')
    @stack('parent-style')
@endpush

@push('scripts')
    @stack('parent-script')
@endpush