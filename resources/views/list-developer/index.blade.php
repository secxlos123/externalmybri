@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section id="property" class="padding bg_light listing1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="uppercase">DAFTAR {{(isset($id) ? 'PROPERTI' : 'DEVELOPER')}}</h2>
                <p class="heading_space">Kami Memiliki Beberapa {{(isset($id) ? 'Properti' : 'Developer')}}.</p>
            </div>
        </div>
        <div class="contentDev">
        </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
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
    <script type="text/javascript">
        loadData(1);

        function loadData(nextPage)
        {
            $('.contentDev').html("");
            $('.contentDev').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
            @if (isset($id))
                var url = '/get-properti-developer';
                var id = <?= $id ?>;
                var $data = {
                        limit: 6,
                        page: nextPage,
                        dev_id: id
                    };
            @else
                var url = '/get-all-developer';
                var $data = {
                        limit: 6,
                        page: nextPage
                    };
            @endif
            $.ajax({
                url: url,
                data: $data
            })
            .done(function (response) {
                $('.contentDev').html("");
                $('.contentDev').html(response);
            })
            .fail(function (response) {
                $('.contentDev').html("");
                $('.contentDev').html("<div class=\"container hide denied\">"
                    +"<div class=\"row\">"
                        +"<div class=\"col-sm-12 text-center\">"
                            +"<h2 class=\"uppercase\">Sedang Terjadi kesalahan pada sistem.</h2>"
                            +"<p class=\"heading_space\">Silakan coba untuk me-reload kambali browser anda.</p>"
                        +"</div>"
                    +"</div>"
                +"</div>");
            });
        }
    </script>
@endpush
<!-- This is scripts for this page end -->