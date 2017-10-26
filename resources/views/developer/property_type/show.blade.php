@extends('layouts.app')

@section('title', 'Detail Proyek Tipe')

@section('breadcrumb')
    @if ($role)
	<h1 class="text-uppercase">Detail Proyek Tipe</h1>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! route('developer.proyek-type.index') !!}">List Proyek Tipe</a></li>
	    <li class="active">Detail Proyek Tipe</li>
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
                        <h2 class="text-uppercase">{!! sprintf('%s | %s', $type->property_name, $type->name) !!}</h2>
                        <p><i class="fa fa-map-marker"></i> {!! $type->property_address !!}</p>
                    </div>
                    <div class="col-md-3 dev-logo text-right">
                        {!! Html::image($type->developer_logo, 'image', ['class' => 'img-thumbnail img-responsive']) !!}
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="dev pull-right">
                            <p>Oleh:</p>
                            <h2>
                                <a href="javascript:void(0)">{!! $type->developer_name !!}</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="property-d-1" class="owl-carousel single">
                            @foreach ($type->photos as $photo)
                                <div class="item">
                                    {!! Html::image($photo, 'image') !!}
                                </div>
                            @endforeach
                        </div>
                        <div id="property-d-1-2" class="owl-carousel single">
                            @foreach ($type->photos as $photo)
                                <div class="item">
                                    {!! Html::image($photo, 'image') !!}
                                </div>
                            @endforeach
                        </div>

                        <div class="property_meta bg-black bottom40">
                            <span>Stock <b>{!! $type->items_count !!}</b> Unit</span>

                            <span>Mulai Dari : <b>Rp. {!! number_format($type->price, 0, '.', ',') !!}</b></span>
                        </div>

                        <fieldset hidden>
                            <h2 class="text-uppercase bottom20">Fasilitas (Dari table project)</h2>
                            <p class="bottom20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum a. Curabitur sit amet pretium lectus, nec consequat orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus in libero sollicitudin venenatis eu sed enim. Nam felis lorem, suscipit ac nisl ac, iaculis dapibus tellus. Cras ante justo, aliquet quis placerat nec, molestie id turpis. </p>
                            <div class="text-it-p bottom20 top-inherit">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                            </div>
                        </fieldset>

                        <!--About Us -->
                        <section id="about" class="bottom40">
                            <div class="container text-center">
                                <div class="row number-counters text-center">
                                    <!-- first count item -->
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Luas Tanah (m<sup>2</sup>)</p>
                                        <!-- Set Your Number here. i,e. data-to="56" -->
                                        <strong data-to="{!! $type->surface_area !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Luas Bangunan (m<sup>2</sup>)</p>
                                        <strong data-to="{!! $type->building_area !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Jumlah Lantai</p>
                                        <strong data-to="{!! $type->floors !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Daya Listrik (watt)</p>
                                        <strong data-to="{!! $type->electrical_power !!}">0</strong>
                                    </div>
                                </div>

                                <div class="row number-counters text-center">
                                    <!-- first count item -->
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Kamar Mandi</p>
                                        <!-- Set Your Number here. i,e. data-to="56" -->
                                        <strong data-to="{!! $type->bathroom !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Kamar Tidur</p>
                                        <strong data-to="{!! $type->bedroom !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa {!! $type->carport ? 'fa-check' : 'fa-times' !!}"></i>
                                        <p>Garasi</p>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa {!! $type->certificate ? 'fa-check' : 'fa-times' !!}"></i>
                                        <p>{!! $type->certificate !!}</p>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <!--About & Counters-->

                        <!-- @todo to update relation with user cause pic is user have account -->
                        {{-- @include('developer.fake-pic') --}}
                        <!-- @endtodo to update relation with user cause pic is user have account -->
                        @if ($role == 'developer')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-blue">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-uppercase">List Unit Properti</h3>
                                    </div>
                                    <div class="panel-body">
                                        @include('developer.property_item._table')
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="pagination-property">
                            <a href="javascript:;" class="btn" id="button-left"><i class="fa fa-angle-left"></i></a>
                            <a href="javascript:;" class="btn" id="button-right"><i class="fa fa-angle-right"></i></a>
                        </div>
                        <h2 class="text-uppercase bottom20">Unit Property</h2>
                        <div class="container my-pro list-t-border bottom40" id="content-unit">

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
    @stack('parent-style')
    <style type="text/css">
        .loader-page {
            left: 0px;
            top: 0px;
            margin-left: 48%;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('/assets/images/load.gif') no-repeat;
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
    </style>
@endpush

@push('scripts')
    @stack('parent-script')
    <script type="text/javascript">
        $( document ).ready(function() {
            loadDataPropUnit(1);
            $("#button-left").on('click', function(){
                var curPage = $("#current-page").val();
                if (curPage > 1) {
                    curPage--;
                    loadDataPropUnit(curPage);
                }
            });

            $("#button-right").on('click', function(){
                var curPage = $("#current-page").val();
                var total = $("#last-page").val();
                if (curPage < total) {
                    curPage++;
                    loadDataPropUnit(curPage);
                }
            });
            function loadDataPropUnit(nextPage)
            {
                $('#content-unit').html("");
                $('#content-unit').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
                $.ajax({
                    url: '/get-unit-property',
                    data:   {
                        property_type_id: "{{$type->id}}",
                        limit: 5,
                        page:nextPage
                    }
                })
                .done(function (response) {
                    $('#content-unit').html("");
                    $('#content-unit').html(response);
                })
                .fail(function (response) {

                });
            }
        });
    </script>
@endpush