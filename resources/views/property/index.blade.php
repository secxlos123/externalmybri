@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section class="property-query-area padding_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="uppercase">Filter Pencarian</h2>
                <p class="heading_space"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="single-query form-group">
                    {!! Form::select('city_id', ['' => ''], old('city_id'), [
                        'class' => 'select2 city_id',
                        'data-placeholder' => 'Semua Kota'
                    ]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="single-query form-group">
                    {!! Form::select('developer', ['' => ''], old('developer'), [
                        'class' => 'select2 developer',
                        'data-placeholder' => 'Semua Developer'
                    ]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8 bottom15" hidden="true">
                        <div class="single-query-slider">
                            <label>Range Harga:</label>
                            <div class="price text-right">
                                <span>Rp</span>
                                <div class="leftLabel"></div>
                                <span>s/d Rp</span>
                                <div class="rightLabel"></div>
                            </div>
                            <div data-range_min="0" data-range_max="5000000000" data-cur_min="0" data-cur_max="5000000000" class="nstSlider">
                                <div class="bar"></div>
                                <div class="leftGrip"></div>
                                <div class="rightGrip"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right form-group">
                        <button type="button" class="btn-blue border_radius" id="findProperty">Cari</button>
                    </div>
                </div>
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
    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script( 'js/dropdown.min.js' ) !!}
    <script type="text/javascript">
        var long = "";
        var lat = "";
        $( document ).ready(function() {
            navigator.geolocation.getCurrentPosition(showPosition);

            $('.select2').select2({ witdh : '100%' });
            loadData(1);
            $('.city_id').dropdown('cities');
            $('.developer').dropdown('developer');


            $('#findProperty').on('click', function(){
                var dev = $('.developer').val();
                var city = $('.city_id').val();
                loadData(1, dev, city);
            });
        });

        function showPosition(position) {
            lat = position.coords.latitude;
            long = position.coords.longitude;
            // console.log(UserCoords);//Works
        }

        function loadData(nextPage, dev=null, city=null)
        {
            $('.contentProperty').html("");
            $('.contentProperty').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
            $.ajax({
                url: '/get-all-properties',
                data:   {
                        limit: 6,
                        page: nextPage,
                        dev_id: dev,
                        prop_city_id: city,
                        long: long,
                        lat: lat
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
                            +"<p class=\"heading_space\">Hidupkan GPS pada brower anda agar dapat melihat daftar PROPERTI terdekat.</p>"
                        +"</div>"
                    +"</div>"
                +"</div>");
            });
        }
    </script>
@endpush
<!-- This is scripts for this page end -->