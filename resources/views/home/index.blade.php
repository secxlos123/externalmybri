@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')

    <!-- This is content of list product -->
    <section id="testinomialBg" class="padding bg_light">
        <div id="agent-2">
            @include('home.product')
        </div>
    </section>
    <!-- This is content of list product end -->

    <!-- This is content of list projects / properties -->
    <section id="property" class="padding grey listing1">
        <div class="row" id="text-nearby-property">
            <div class="col-sm-12 text-center">
                <h2 class="uppercase">DAFTAR PROPERTI TERDEKAT</h2>
                <p class="heading_space">Kami Memiliki Beberapa Properti terdekat di Area ini.</p>
            </div>
        </div>
        <div class="container" id="content-galery">
            <div style="height: 60px;margin: auto;padding: 10px;">
                <div class="loader-page" id="loader-page">
                </div>
            </div>
        </div>
        <div class="container hide denied">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="uppercase">Tidak tersedia properti di lokasi terdekat Anda.</h2>
                    <p class="heading_space">Pastikan GPS pada browser telah berfungsi dengan baik.</p>
                </div>
            </div>
        </div>
        <div class="container hide error-server">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="uppercase">Maaf lokasi PROPERTI terdekat sedang mengalami gangguan</h2>
                    <p class="heading_space">Silahkan coba beberapa saat lagi.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- This is content of list projects / properties end -->

    <!-- This is content of list developers -->
    <section id="logos">
        <div class="container partner2 padding">
            @include('home.partners')
        </div>
    </section>
    <!-- This is content of list developers end -->

@endsection

<!-- This is styles for this page -->
@push('styles')
    <style type="text/css">
        /*
         * @todo remove if simulation credit is work
         */
        .tp_overlay{
            background-color: transparent !important;
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
        /*.tp_overlay .topbar{
            background-color: transparent !important;
        }*/
        /*
         * @endtodo remove if simulation credit is work
         */
    </style>
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
    <script type="text/javascript">
        // navigator.geolocation.watchPosition(properties, permission_handling);

        // function permission_handling(error) {
        //     if (error.code == error.PERMISSION_DENIED){
        //         $('#text-nearby-property').addClass('hide');
        //         $('#property .container').addClass('hide');
        //         $('.denied').removeClass('hide');
        //     }else{
        //         $('#text-nearby-property').addClass('hide');
        //         $('#content-galery').hide();
        //         $('.denied').removeClass('hide');
        //     }
        // }

        // function properties(position) {
            $.ajax({
                url: '/properties',
                data: {
                    lat: null,
                    long: null
                }
            })
            .done(function (response) {
                $('#content-galery').html(response);
            })
            .fail(function (response) {
                $('#content-galery').hide();
                $('#text-nearby-property').addClass('hide');
                $('.error-server').removeClass('hide');
            });
        // }
    </script>
@endpush
<!-- This is scripts for this page end -->