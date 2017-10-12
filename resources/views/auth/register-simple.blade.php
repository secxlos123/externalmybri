@extends('auth._form-register')

@section('_form-register')
	{!! Form::hidden('register', 'simple') !!}
    @include('auth._form-register-simple')
@endsection

@section('btn-action')
    <a href="{!! route('homepage') !!}" class="btn btn-default waves-light waves-effect w-md m-b-20">Lewati</a>
@endsection
