@extends('layouts.app')

@section('title', 'Ubah Developer')

@section('breadcrumb')
    <h1 class="text-uppercase">Ubah Data Agen Developer</h1>
    <p>Kelola developer anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek.index') !!}">List Developer</a></li>
        <li class="active">Ubah Data Agen Developer</li>
    </ol>
@endsection

@section( 'content' )
    <section class="padding listing1">
        <div class="container">
        <?php $id = $data['contents']['userdeveloper']['user_id'] ;?>
            {!! Form::model($data, [
                'route' => ['developer.developer.update', $id],
                'class' => 'callus submit_property', 'id' => 'form_data_agen',
                'enctype' => 'multipart/form-data', 'method' => 'PUT'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">@if($type !='view')Ubah Data Agen Developer @else Lihat Informasi Detail @endif</h2>
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
                        @if($type !='view')
                        <input type="button" value="Kembali" onClick="history.go(-1);" class="btn btn-primary waves-light waves-effect w-md m-b-20">
                            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20">
                                <i class="mdi mdi-content-save"></i> Ubah
                            </button>
                        @else
                        <input type="button" value="Kembali" onClick="history.go(-1);" class="btn btn-primary waves-light waves-effect w-md m-b-20">
                           <a href="{{ route('developer.developer.edit', $id) }}" class="btn btn-primary waves-light waves-effect w-md m-b-20">
                                <!-- <i class="mdi mdi-content-save"></i> --> Edit
                            </a>           
                        @endif
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
    <!-- Laravel Javascript Validation -->
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Agent\CreateRequest::class, '#form_data_agen'); !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Agent\UpdateRequest::class, '#form_data_agen'); !!}
    <!-- end javascript validation -->
    <script type="text/javascript">
    $( ".datepicker-date-born" ).datepicker({
        format: 'dd-mm-yyyy',
        endDate: '-17y'
    });
    $( ".datepicker-date-join" ).datepicker({
        format: 'dd-mm-yyyy'
    });
    </script>
@endpush
