@extends('layouts.app')

@section('title', 'Rubah Developer')

@section('breadcrumb')
    <h1 class="text-uppercase">Rubah Data Agen Developer</h1>
    <p>Kelola developer anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek.index') !!}">List Developer</a></li>
        <li class="active">Rubah Data Agen Developer</li>
    </ol>
@endsection

@section( 'content' )
    <section class="padding listing1">
        <div class="container">
        <?php $id = $data['contents']['userdeveloper']['user_id'] ;?>
            {!! Form::model($data, [
                'route' => ['developer.developer.update', $id],
                'class' => 'callus submit_property', 'id' => 'form-property-edit',
                'enctype' => 'multipart/form-data', 'method' => 'PUT'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Rubah Developer Properti</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Developer</h3>
                            </div>
                            <div class="panel-body">
                                @include( 'developer.developer._form', [ 'developer' => $data ] )
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20">
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

@endpush

@push( 'scripts' )
    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.date-pickers.init.js')}}"></script>
    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Agent\CreateRequest::class, '#form-property-edit') !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">
    $( ".datepicker-date-born" ).datepicker({format: 'dd-mm-yyyy', endDate: '-17y'});
    </script>
    <script type="text/javascript">
    $( ".datepicker-date-join" ).datepicker({format: 'dd-mm-yyyy'});
    </script>
@endpush
