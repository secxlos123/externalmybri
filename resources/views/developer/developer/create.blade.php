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
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
                        @elseif(Session::has('error_flash_message'))
                        <div class="alert alert-danger">
                        @foreach(session('error_flash_message') as $key => $error_message)
                        <em> {!!  $error_message  !!}</em>
                        @endforeach
                        </div>
                    @endif
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
    <script language="javascript">
        function getkey(e)
        {
            if (window.event)
                return window.event.keyCode;
            else if (e)
                return e.which;
            else
                return null;
        }
        function goodchars(e, goods, field)
        {
            var key, keychar;
            key = getkey(e);
            if (key == null)
                return true;

            keychar = String.fromCharCode(key);
            keychar = keychar.toLowerCase();
            goods = goods.toLowerCase();

    // check goodkeys
            if (goods.indexOf(keychar) != -1)
                return true;
    // control keys
            if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
                return true;

            if (key == 13) {
                var i;
                for (i = 0; i < field.form.elements.length; i++)
                    if (field == field.form.elements[i])
                        break;
                i = (i + 1) % field.form.elements.length;
                field.form.elements[i].focus();
                return false;
            }
            ;
    // else return false
            return false;
        }
    </script>
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
    $( ".datepicker-date-join" ).datepicker({format: 'dd-mm-yyyy', endDate: new Date()});
    </script>
@endpush
