@extends('layouts.app')

@section('title', 'Tambah Agen Developer')

@section('breadcrumb')
    <h1 class="text-uppercase">Tambah Agen Developer</h1>
    <p>Kelola Developer anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.developer.index') !!}">List Developer</a></li>
        <li class="active">Tambah Agen Developer</li>
    </ol>
@endsection

@section( 'content' )
    <section class="padding listing1">
        <div class="container">
            {!! Form::open([
                'route' => 'developer.developer.store',
                'class' => 'callus', 'id' => 'form-property',
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Tambah Agen Developer</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Agen Developer</h3>
                            </div>
                            <div class="panel-body">
                                @include('developer.developer._form')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20">
                                <i class="mdi mdi-content-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push( 'styles' )
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
@endpush

@push( 'scripts' )
    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.date-pickers.init.js')}}"></script>
    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Agent\CreateRequest::class, '#form-property') !!}

    <!-- Laravel Javascript Validation -->
      <script type="text/javascript">
    $( ".datepicker-date-born" ).datepicker({format: 'dd-mm-yyyy', endDate: '-17y'});
    </script>
    <script type="text/javascript">
    $( ".datepicker-date-join" ).datepicker({format: 'dd-mm-yyyy',});
    </script>
@endpush
