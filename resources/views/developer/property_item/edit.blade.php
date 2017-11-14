@extends('layouts.app')

@section('title', 'Rubah Unit')

@section('breadcrumb')
    <h1 class="text-uppercase">Rubah Unit</h1>
    <p>Kelola unit anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek-item.index') !!}">List Unit</a></li>
        <li class="active">Rubah Unit</li>
    </ol>
@endsection

@section( 'content' )
    <section id="proyek-type" class="padding listing1">
        <div class="container">
            {!! Form::model($unit, [
                'route' => ['developer.proyek-item.update', $unit->id],
                'class' => 'callus submit_property', 'id' => 'form-proyek-item',
                'enctype' => 'multipart/form-data', 'method' => 'PUT'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Rubah Unit Properti</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Unit</h3>
                            </div>
                            <div class="panel-body">
                                @include( 'developer.property_item._form')

                                @foreach($unit->photos as $key => $photo)
                                    {!! Html::image($photo, 'image', [
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
