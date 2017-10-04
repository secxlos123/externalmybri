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
        <div class="container">
            @include('home.gallery')
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
        .tp_overlay .topbar{
            background-color: transparent !important;
        }
        /*
         * @endtodo remove if simulation credit is work
         */
        
        .keyword-input {
            text-transform: unset !important;
        }
    </style>
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
    <script type="text/javascript">
        this.getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            $.ajax({
                url: '/properties',
                data: {
                    lat: position.coords.latitude,
                    long: position.coords.longitude,
                },
                beforeSend: function () {
                }
            })
            .done(function (response) {
                $('#content-galery').html(response);
            })
            .fail(function (response) {
                console.log(response);
            });
        }
    </script>
@endpush
<!-- This is scripts for this page end -->