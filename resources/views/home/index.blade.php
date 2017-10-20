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
        <div class="container" id="content-galery"></div>
        <div class="container hide denied">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="uppercase">Tidak dapat mencari lokasi PROPERTI terdekat</h2>
                    <p class="heading_space">Hidupkan GPS pada brower anda agar dapat melihat daftar PROPERTI terdekat.</p>
                </div>
            </div>
        </div>
        <div class="container hide error-server">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="uppercase">Maaf lokasi PROPERTI terdekat sendang mengalami gangguan</h2>
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
        navigator.geolocation.watchPosition(properties, permission_handling);

        function permission_handling(error) {
            if (error.code == error.PERMISSION_DENIED){
                $('#property .container').addClass('hide');
                $('.denied').removeClass('hide');
            }
        }

        function properties(position) {
            $.ajax({
                url: '/properties',
                data: { lat: position.coords.latitude, long: position.coords.longitude}
            })
            .done(function (response) {
                $('#content-galery').html(response);
            })
            .fail(function (response) {
                $('.error-server').removeClass('hide');
            });
        }
    </script>
@endpush
<!-- This is scripts for this page end -->