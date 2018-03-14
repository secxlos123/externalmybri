@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section class="property-query-area padding_bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="uppercase">Filter Pencarian</h2>
                <p class="heading_space"></p>
            </div>
        </div>
        <div class="row">
            <form class="callus" role="form">
                <div class="col-md-4">
                    <div class="single-query form-group">
                        {!! Form::select('city_id', ['' => ''], old('city_id'), [
                            'class' => 'select2 city_id',
                            'data-placeholder' => 'Semua Kota'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-query form-group">
                        {!! Form::select('category', [
                            '' => '', '1' => 'Rumah Tapak','2' => 'Rumah Susun/ Apartement','3' => 'Rumah Toko',
                        ], old('category'), [
                            'class' => 'select2 category',
                            'data-placeholder' => 'Semua Kategori'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-query form-group">
                        {!! Form::select('developer', ['' => ''], old('developer'), [
                            'class' => 'select2 developer',
                            'data-placeholder' => 'Semua Developer'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-query form-group">
                        {!! Form::select('property_type_id', ['' => ''], old('property_type_id'), [
                            'class' => 'select2 property_type',
                            'data-placeholder' => 'Semua tipe properti'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-query form-group">
                        {!! Form::select('bedroom', [
                            '' => '', '1 Kamar', '2 Kamar', '3 Kamar', '4 Kamar', '>4 Kamar'
                        ], old('bedroom'), [
                            'class' => 'select2 bedroom',
                            'data-placeholder' => 'Semua kamar tidur'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-query form-group">
                        {!! Form::select('bathroom', [
                            '' => '', '1 Kamar', '2 Kamar', '3 Kamar', '>3 Kamar'
                        ], old('bathroom'), [
                            'class' => 'select2 bathroom',
                            'data-placeholder' => 'Semua kamar mandi'
                        ]) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-query form-group">
                        {!! Form::select('garage', [
                            '' => '','0' => 'Tidak ada','1' => 'Ada'
                        ], old('garage'), [
                            'class' => 'select2 garage',
                            'data-placeholder' => 'Semua garasi'
                        ]) !!}
                    </div>
                </div>
            </form>
        </div>
        <div class="row top20">
            <div class="col-md-4 bottom15">
                <div class="single-query-slider">
                    <label>Luas Tanah:</label>
                    <div class="price text-right rangeLand">
                        <div class="leftLabel"></div>
                        <span>-</span>
                        <div class="rightLabel"></div>
                        <span>m<sup>2</sup></span>
                    </div>
                    <div data-range_min="50" data-range_max="10000" data-cur_min="50" data-cur_max="10000" class="nstSlider land">
                        <div class="bar"></div>
                        <div class="leftGrip"></div>
                        <div class="rightGrip"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 bottom15">
                <div class="single-query-slider rangeBuild">
                    <label>Luas Bangunan:</label>
                    <div class="price text-right">
                        <div class="leftLabel"></div>
                        <span>-</span>
                        <div class="rightLabel"></div>
                        <span>m<sup>2</sup></span>
                    </div>
                    <div data-range_min="30" data-range_max="10000" data-cur_min="30" data-cur_max="10000" class="nstSlider build">
                        <div class="bar"></div>
                        <div class="leftGrip"></div>
                        <div class="rightGrip"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 bottom15">
                <div class="single-query-slider">
                    <label>Harga:</label>
                    <div class="price text-right rangePrice">
                        <span>Rp</span>
                        <div class="leftLabel"></div>
                        <span>s/d Rp</span>
                        <div class="rightLabel"></div>
                    </div>
                    <div data-range_min="0" data-range_max="5000000000" data-cur_min="0" data-cur_max="5000000000" class="nstSlider price">
                        <div class="bar"></div>
                        <div class="leftGrip"></div>
                        <div class="rightGrip"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-right form-group top20">
                <button type="button" class="btn-blue border_radius" id="findProperty">Cari</button>
            </div>
        </div>
    </div>
</section>

<section id="property" class="padding bg_light listing1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="uppercase">DAFTAR PROPERTI</h2>
                <p class="heading_space">Kami Memiliki Beberapa Properti.</p>
            </div>
        </div>
        <div class="contentProperty">
        </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
    {!! Html::style( 'assets/css/select2.min.css' ) !!}
    {!! Html::style('assets/css/range-Slider.min.css') !!}
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
    </style>
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
    {!! Html::script( 'assets/js/select2.min.js' ) !!}
    {!! Html::script('assets/js/range-Slider.min.js') !!}
    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script( 'js/dropdown.min.js' ) !!}
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.select2').select2({ 
                witdh : '100%',
                allowClear: true 
            });
            loadData(1);
            $('.city_id').dropdown('cities');
            $('.developer').dropdown('list_developer');


            $('#findProperty').on('click', function(){
                var dev = $('.developer').val();
                var city = $('.city_id').val();
                var rangePrice = $('.rangePrice div.leftLabel').text()+'|'+$('.rangePrice div.rightLabel').text();
                var rangeLand = $('.rangeLand div.leftLabel').text()+'|'+$('.rangeLand div.rightLabel').text();
                var rangeBuild = $('.rangeBuild div.leftLabel').text()+'|'+$('.rangeBuild div.rightLabel').text();
                var type = $('.property_type').val();
                var category = $('.category').val();
                var bedroom = $('.bedroom').val();
                var bathroom = $('.bathroom').val();
                var garage = $('.garage').val();
                rangePrice = rangePrice.split('.').join("");
                if (bedroom) {
                    bedroom++;
                }
                if (bathroom) {
                    bathroom++;
                }
                // console.log(bathroom);
                loadData(1, dev, city, rangePrice, rangeLand, rangeBuild, category, bedroom, bathroom, garage, type);
            });

            $('.property_type').empty().dropdown('list_proptype');
            $('.nstSlider.price').nstSlider({
                "rounding": {
                    "100": "1000",
                    "1000": "10000",
                    "10000": "100000",
                    "100000": "1000000"
                },
                "left_grip_selector": ".leftGrip",
                "right_grip_selector": ".rightGrip",
                "value_bar_selector": ".bar",
                "value_changed_callback": function(cause, leftValue, rightValue) {
                    var $container = $(this).parent();

                    var reverse = leftValue.toString().split('').reverse().join(''),
                    ribuan  = reverse.match(/\d{1,3}/g);
                    leftValue  = ribuan.join('.').split('').reverse().join('');

                    var reverseRight = rightValue.toString().split('').reverse().join(''),
                    ribuanRight  = reverseRight.match(/\d{1,3}/g);
                    rightValue  = ribuanRight.join('.').split('').reverse().join('');

                    $container.find('.leftLabel').text(leftValue);
                    $container.find('.rightLabel').text(rightValue);
                }
            });
        });

        function loadData(nextPage, dev=null, city=null, price=null, land=null, build=null, category=null, bedroom=null, bathroom=null, garage=null, type=null)
        {
            console.log("loadData", price);
            $('.contentProperty').html("");
            $('.contentProperty').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
            $.ajax({
                url: '/get-all-properties',
                data:   {
                    limit: 6,
                    page: nextPage,
                    dev_id: dev,
                    prop_city_id: city,
                    price: price,
                    category: category,
                    land: land,
                    building: build,
                    bedroom: bedroom,
                    bathroom: bathroom,
                    carport: garage,
                    prop_type: type
                }
            })
            .done(function (response) {
                $('.contentProperty').html("");
                $('.contentProperty').html(response);
            })
            .fail(function (response) {
                $('.contentProperty').html("");
                $('.contentProperty').html("<div class=\"container hide denied\">"
                    +"<div class=\"row\">"
                        +"<div class=\"col-sm-12 text-center\">"
                            +"<h2 class=\"uppercase\">Tidak dapat mencari lokasi PROPERTI</h2>"
                            +"<p class=\"heading_space\">Hidupkan GPS pada browser anda agar dapat melihat daftar PROPERTI terdekat.</p>"
                        +"</div>"
                    +"</div>"
                +"</div>");
            });
        }
    </script>
@endpush
<!-- This is scripts for this page end -->