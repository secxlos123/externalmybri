@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('breadcrumb')
    @if ($role == 'developer')
	<h1 class="text-uppercase">Detail Proyek</h1>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! route('developer.proyek.index') !!}">List Proyek</a></li>
	    <li class="active">Detail Proyek</li>
	</ol>
    @else
    <h1 class="text-uppercase">Detail Properti</h1>
    <p>Dapatkan properti idaman Anda.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! url('daftar-proyek') !!}">List Properti</a></li>
        <li class="active">Detail Properti</li>
    </ol>
    @endif
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

                    <div class="col-md-3 dev-logo text-right">
                        {!! Html::image($property->developer_logo, 'logo', ['class' => 'img-thumbnail img-responsive']) !!}
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="dev pull-right">
                            <p>Oleh:</p>
                            <h2><a href="#">{!! $property->developer_name !!}</a></h2>
                        </div>
                    </div>

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
                        {{-- @include('developer.fake-pic') --}}
                        <!-- @endtodo to update relation with user cause pic is user have account -->

                        @if ($role == 'developer')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-blue">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-uppercase">List Tipe Properti</h3>
                                        </div>
                                        <div class="panel-body">
                                            @include('developer.property_type._table')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="pagination-property">
                            <a href="javascript:;" class="btn" id="button-left"><i class="fa fa-angle-left"></i></a>
                            <a href="javascript:;" class="btn" id="button-right"><i class="fa fa-angle-right"></i></a>
                            </div>
                            <h2 class="text-uppercase">Tipe Property</h2>
                            <p class="bottom20 custom-title-property"></p>
                            <div class="row content-type">

                            </div>

                            <div class="social-networks bottom40">
                                <div class="social-icons-2">
                                    <span class="share-it">Bagikan Property</span>
                                    <span><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></span>
                                    <span><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></span>
                                    <span><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> Google +</a></span>
                                </div>
                            </div>
                        @endif

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
        .pagination-property .btn {
            border: 1px solid #d5dadf;
            border-radius: 4px;
            color: #777;
            font-size: 16px;
            width: 42px;
        }
        .pagination-property {
            float: right;
        }
        .loader-page {
            left: 0px;
            top: 0px;
            margin-left: 48%;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('/assets/images/load.gif') no-repeat;
        }
    </style>
    @stack('parent-style')
@endpush

@push('scripts')
    @stack('parent-script')
    @if ($role == 'customer')
    <script type="text/javascript">
        $( document ).ready(function() {
            loadDataPropType(1);
            $("#button-left").on('click', function(){
                var curPage = $("#current-page").val();
                if (curPage > 1) {
                    curPage--;
                    loadDataPropType(curPage);
                }
            });

            $("#button-right").on('click', function(){
                var curPage = $("#current-page").val();
                var total = $("#last-page").val();
                if (curPage < total) {
                    curPage++;
                    loadDataPropType(curPage);
                }
            });

            function loadDataPropType(nextPage)
            {
                $('.content-type').html("");
                $('.content-type').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
                $.ajax({
                    url: '/get-tipe-property',
                    data:   {
                        property_id: "{{$property->id}}",
                        limit: 3,
                        page:nextPage
                    }
                })
                .done(function (response) {
                    // console.log(response);
                    $('.content-type').html("");
                    $('.content-type').html(response);
                })
                .fail(function (response) {

                });
            }
        });
    </script>
    @endif
@endpush