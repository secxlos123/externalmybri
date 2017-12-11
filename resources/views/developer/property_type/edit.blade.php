@extends('layouts.app')

@section('title', 'Rubah Proyek Tipe')

@section('breadcrumb')
    <h1 class="text-uppercase">Rubah Proyek Tipe</h1>
    <p>Kelola proyek anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek-type.index') !!}">List Proyek Tipe</a></li>
        <li class="active">Rubah Proyek Tipe</li>
    </ol>
@endsection

@section( 'content' )
    <section id="proyek-type" class="padding listing1">
        <div class="container">
            {!! Form::model($type, [
                'route' => ['developer.proyek-type.update', $type->slug],
                'class' => 'callus submit_property', 'id' => 'form-proyek-type',
                'enctype' => 'multipart/form-data', 'method' => 'PUT'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Rubah Proyek Tipe</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Proyek Tipe</h3>
                            </div>
                            <div class="panel-body">
                                @include('developer.property_type._form')

                                @foreach($type->photos as $key => $photo)
                                    {!! Html::image($photo['image'], 'image', [
                                        'class' => 'photoable hide', 'data-name' => "Foto-{$key}"
                                    ]) !!}
                                @endforeach
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