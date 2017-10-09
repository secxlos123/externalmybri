@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('breadcrumb')
	<h1 class="text-uppercase">Detail Proyek</h1>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! route('developer.proyek.index') !!}">List Proyek</a></li>
	    <li class="active">Detail Proyek</li>
	</ol>
@endsection

@section('content')
<section id="property" class="padding bg_white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 listing1 property-details">
                <div class="row title-box">
                    
                    <div class="col-md-6 p-0 b-r-1">
                        <h2 class="text-uppercase">{!! $property->name !!}</h2>
                        <p><i class="fa fa-map-marker"></i> {!! $property->address !!}</p>
                    </div>

                    <!-- @todo to update restapi get detail property -->
                    <div class="col-md-3 dev-logo text-right">
                        <img src="{{asset('assets/images/logo/logo_dummy.png')}}" class="img-thumbnail img-responsive">
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="dev pull-right">
                            <p>Oleh:</p>
                            <h2><a href="#">{!! $property->developer !!}</a></h2>
                        </div>
                    </div>
                    <!-- @endtodo to update restapi get detail property -->

                </div>

                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="single">
                            <img src="{!! $property->photo !!}" class="img-property" alt="image"/>
                        </div>

                        <!-- @todo to update database and add new field description -->
                        <h2 class="text-uppercase">Deskripsi Proyek</h2>
                        <div class="text-it-p bottom40">
                            {!! $property->description !!}
                        </div>
                        <!-- @endtodo to update database and add new field description -->

                        <h2 class="text-uppercase bottom20">Detail</h2>
                        <p class="bottom30">{!! $property->facilities !!}</p>

                        <!-- @todo to update relation with user cause pic is user have account -->
                        <h2 class="text-uppercase bottom20">PIC</h2>
                        <div class="row">
                            <div class="col-sm-4 bottom40">
                                <div class="agent_wrap">
                                    <div class="image">
                                        <img src="{{asset('assets/images/agen/agent-one.jpg')}}" alt="Agents">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 bottom40">
                                <div class="agent_wrap">
                                    <h3>John Doe</h3>
                                    <p class="bottom30">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer adipiscing eleifend option congue nihil imperdiet doming…</p>
                                    <table class="agent_contact table">
                                        <tbody>
                                            <tr class="bottom10">
                                                <td><strong>Telepon:</strong></td>
                                                <td class="text-right">022 75023456</td>
                                            </tr>
                                            <tr class="bottom10">
                                                <td><strong>HP:</strong></td>
                                                <td class="text-right">0812 3456 7890</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Alamat Email:</strong></td>
                                                <td class="text-right"><a href="#.">johndoe@domain.com</a></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- @endtodo to update relation with user cause pic is user have account -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-blue">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-uppercase">List Tipe Properti</h3>
                                    </div>
                                    <div class="panel-body">
                                        {{-- @include('developer.types._table') --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
    <style type="text/css">
        .img-property {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
        }
    </style>
@endpush

@push('scripts')
@endpush