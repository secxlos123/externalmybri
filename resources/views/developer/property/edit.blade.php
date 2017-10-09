@extends('layouts.app')

@section('title', 'Rubah Proyek')

@section('breadcrumb')
    <h1 class="text-uppercase">Rubah Proyek</h1>
    <p>Kelola proyek anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek.index') !!}">List Proyek</a></li>
        <li class="active">Rubah Proyek</li>
    </ol>
@endsection

@section( 'content' )
    <section id="property" class="padding listing1">
        <div class="container">
            {!! Form::model($property, [
                'route' => ['developer.proyek.update', $property->slug],
                'class' => 'callus submit_property', 'id' => 'form-property',
                'enctype' => 'multipart/form-data', 'method' => 'PUT'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Rubah Proyek Properti</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Proyek</h3>
                            </div>
                            <div class="panel-body">
                                @include( 'developer.property._form', [ 'property' => $property ] )
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20">
                                <i class="mdi mdi-content-save"></i> Rubah
                            </button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push( 'styles' )
    {!! Html::style( 'assets/css/select2.min.css' ) !!}
    {!! Html::script( 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places' ) !!}

    <style type="text/css">
        .map {
            width: 100%;
            height: 400px;
        }
    </style>
@endpush

@push( 'scripts' )
    {!! Html::script( 'assets/js/jquery.gmaps.js' ) !!}
    {!! Html::script( 'assets/js/ckeditor/ckeditor.js' ) !!}
    {!! Html::script( 'assets/js/select2.min.js' ) !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script( 'js/dropdown.min.js' ) !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Property\CreateRequest::class, '#form-property') !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">
        CKEDITOR.replace( 'txtEditor' );
        CKEDITOR.replace( 'txtEditor2' );

        $('select').select2({
            allowClear: true,
        });

        $('.cities').dropdown('cities');
    </script>
@endpush
