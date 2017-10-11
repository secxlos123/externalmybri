@extends('layouts.app')

@section('title', 'Manajemen Developer')

@section('breadcrumb')
	<h1 class="text-uppercase">Manajemen Developer</h1>
	<p>Kelola Developer anda di sini.</p>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! url('/') !!}">Dashboard</a></li>
	    <li class="active">Developer</li>
	</ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
	<div class="container">
		@include( 'developer.developer._table')
	</div>
</section>
@endsection

@push('styles')
    @stack('parent-style')
@endpush

@push('scripts')
    @stack('parent-script')
@endpush