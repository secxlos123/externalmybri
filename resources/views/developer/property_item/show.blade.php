@extends('layouts.app')

@section('title', 'Detail Unit')

@section('breadcrumb')
	<h1 class="text-uppercase">Detail Unit</h1>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! route('developer.proyek-item.index') !!}">List Unit</a></li>
	    <li class="active">Detail Unit</li>
	</ol>
@endsection

@section('content')
<section id="property" class="padding bg_white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 listing1 property-details">
                <div class="row title-box">
                    <div class="col-md-9 p-0 b-r-1">
                        <h2 class="text-uppercase">{!! $unit->property_name . ' | ' . $unit->property_type_name !!}</h2>
                        <p><i class="fa fa-map-marker"></i> {{$unit->address}}</p>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="dev pull-right">
                            <p>Harga:</p>
                            <h2><a href="#">Rp. {{number_format($unit->price, 0, ',', '.')}}</a></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="property-d-1" class="owl-carousel single">
                        @foreach($unit->photos as $photo)
                            <div class="item">
                                <img src="{{$photo}}" alt="image"/>
                            </div>
                        @endforeach
                        </div>
                        <div id="property-d-1-2" class="owl-carousel single">
                        @foreach($unit->photos as $photo)
                            <div class="item">
                                <img src="{{$photo}}" alt="image"/>
                            </div>
                        @endforeach
                        </div>
                        <div class="property_meta bg-black bottom40">
                            <!-- <span>4800 m<sup>2</sup></span> -->
                            <span>Nama Projek: <b> {!! $unit->property_name . ' | ' . $unit->property_type_name !!}</b></span>
                            <span>Status: <b>{{($unit->is_available) ? 'Available' : 'Not Available'}}</b></span>
                        </div>

                        <h2 class="text-uppercase bottom20">Deskripsi Unit</h2>
                        <p class="bottom20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum a. Curabitur sit amet pretium lectus, nec consequat orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus in libero sollicitudin venenatis eu sed enim. Nam felis lorem, suscipit ac nisl ac, iaculis dapibus tellus. Cras ante justo, aliquet quis placerat nec, molestie id turpis. </p>
                        <div class="text-it-p bottom40 top-inherit">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                        </div>

                        <div class="btn-group btn-group-justified m-b-10">
                            <a class="btn waves-effect waves-light btn-lg agree" role="button">Simulasi KPR</a>
                            <a class="btn waves-effect waves-light btn-lg disagree" role="button">Ajukan KPR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')

@endpush

@push('scripts')
@endpush