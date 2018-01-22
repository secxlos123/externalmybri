@extends('layouts.app')

@section('title', 'Tambah Unit')

@section('breadcrumb')
    <h1 class="text-uppercase">Tambah Unit</h1>
    <p>Kelola unit anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek-item.index') !!}">List Unit</a></li>
        <li class="active">Tambah Unit</li>
    </ol>
@endsection

@section( 'content' )
    <section id="property" class="padding listing1">
        <div class="container">
            {!! Form::open([
                'route' => 'developer.proyek-item.store',
                'class' => 'callus submit_property', 'id' => 'form-proyek-item',
                'enctype' => 'multipart/form-data'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Tambah Properti Unit</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Properti Unit</h3>
                            </div>
                            <div class="panel-body">
                                @include('developer.property_item._form')
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
