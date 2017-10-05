@extends('auth._form-register')

@section('_form-register')

@include('auth._form-register-simple')

{!! Form::hidden('register', 'complete') !!}

<div class="row">
    @include('customer.profile.form.employee')
</div>

<div class="row">
    @include('customer.profile.form.financial')
</div>

<div class="row">
    @include('customer.profile.form.contact')
</div>

@endsection