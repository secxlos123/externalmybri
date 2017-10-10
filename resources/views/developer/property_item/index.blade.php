@extends('layouts.app')

@section('title', 'Manajemen Unit')

@section('breadcrumb')
	<h1 class="text-uppercase">Manajemen Unit</h1>
	<p>Kelola Unit anda di sini.</p>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! url('/') !!}">Dashboard</a></li>
	    <li class="active">Unit</li>
	</ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
	<div class="container">
		@include( 'developer.property_item._table')
	</div>
</section>
@endsection

@push('styles')
    @stack('parent-style')
@endpush

@push('scripts')
    @stack('parent-script')
@endpush