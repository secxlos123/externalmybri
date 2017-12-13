<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>My BRI | @yield('title')</title>

    <!-- This is main stylesheet -->
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/owl.carousel.css') !!}
    {!! Html::style('assets/css/owl.transitions.css') !!}

    <!-- This is place for dynamis stylesheet per page -->
    @stack('styles')

    {!! Html::style('assets/css/style.css') !!}
    {!! Html::style('assets/css/custom.css') !!}
    {!! Html::favicon('assets/images/favicon.png') !!}
    <style type="text/css">
        .keyword-input {
            text-transform: unset !important;
        }
    </style>
</head>

<body>

    <!-- This is present on homepage only -->
    @if ( request()->is('/') )
        @include('home.banner')
    @endif
    <!-- This is present on homepage only -->

    <!-- Header -->
    <header class="white_header">
        @include('layouts.navigation')
    </header>
    <!-- Header end -->

    <!-- Page Banner Start-->
    @if ( ! request()->is('/')
        && ! request()->is('successed')
        && ! request()->is('eform/konfrimasi')
        && ! request()->is('eform/sukses')
        && ! request()->is('activated')
        && ! request()->is('password/success')
        && ! request()->is('rincian-produk')
        && ! request()->is('daftar-proyek')
        && ! request()->is('password/success') )

        <section class="page-banner padding bg_light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @yield('breadcrumb')
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Page Banner End -->

    @yield('content')

    <!-- Footer -->
    <footer class="footer_third absolute-fix csm-footer">
        <!-- <div class="icons">{!! Html::image('assets/images/logo/callbri.png') !!}</div> -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-bri">
                        <ul class="list-inline">
                            <li>Contact <strong>BRI 14017 / 1500017</strong></li>
                            <li><a href="http://bri.co.id/">www.bri.co.id</a></li>
                            <li><a href="https://www.facebook.com/BRIofficialpage" target="_blank"><i class="fa fa-facebook-square"></i> Bank BRI</a></li>
                            <li><a href="https://twitter.com/promo_BRI" target="_blank"><i class="fa fa-twitter"></i> @promo_BRI</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @include('layouts.footer')
        </div>
    </footer>
    <!-- Footer end -->


    <!-- This is main script -->
    {!! Html::script('assets/js/jquery-2.1.4.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/jquery.appear.js') !!}
    {!! Html::script('assets/js/jquery-countTo.js') !!}
    {!! Html::script('assets/js/bootsnav.js') !!}
    {!! Html::script('assets/js/masonry.pkgd.min.js') !!}
    {!! Html::script('assets/js/jquery.parallax-1.1.3.js') !!}
    {!! Html::script('assets/js/jquery.cubeportfolio.min.js') !!}
    {!! Html::script('assets/js/range-Slider.min.js') !!}
    {!! Html::script('assets/js/owl.carousel.min.js') !!}
    {!! Html::script('assets/js/selectbox-0.2.min.js') !!}
    {!! Html::script('assets/js/zelect.js') !!}
    {!! Html::script('assets/js/jquery.fancybox.js') !!}
    {!! Html::script('assets/js/jquery.themepunch.tools.min.js') !!}
    {!! Html::script('assets/js/jquery.themepunch.revolution.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.actions.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.layeranimation.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.navigation.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.parallax.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.slideanims.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.video.min.js') !!}
    {!! Html::script('assets/js/custom.js') !!}
    {!! Html::script('assets/js/functions.js') !!}

    {!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {!! Html::script('assets/js/jquery.inputmask.bundle.min.js') !!}
    {!! Html::script('assets/js/inputmask.numeric.extensions.js') !!}
    {!! Html::script('js/numeric.min.js') !!}



    <script type="text/javascript">
        $(document).ready(function () {
            Inputmask.extendAliases({
                rupiah : {
                    radixPoint: ",",
                    groupSeparator: ".",
                    alias: "numeric",
                    autoGroup: true,
                    digits: 2,
                    rightAlign: false,
                    clearIncomplete: true,
                }
            });

            $('.filestyle').on('change', function () {
                var target = $(this).data('target');
                $(`.${target}`).removeClass('hide');

                if ($(this).val() != '') {
                    read_url($(this).prop('files')[0], `#${target}`);
                } else {
                    $(`#${target}`).attr('src', $(`#${target}`).data('src'));
                }
            });

            $('.numeric').numeric();
            $('.currency').inputmask({ alias : "rupiah" });
        });

        function read_url(input, target) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $(target).attr('src', e.target.result);
            }
            reader.readAsDataURL(input);
        }
    </script>

    @if ( ! session('authenticate') )
        <!-- Modal -->
        @include('layouts.modal')

        {!! JsValidator::formRequest(App\Http\Requests\Auth\LoginRequest::class, '#form-login') !!}
        {!! JsValidator::formRequest(App\Http\Requests\Auth\RegisterRequest::class, '#form-register-store') !!}
        {!! JsValidator::formRequest(App\Http\Requests\Auth\ForgotPasswordRequest::class, '#form-reset-password') !!}

        <script type="text/javascript">
            $('#login-register').on('hide.bs.modal', function () {
                $('#daftar, #reset').removeClass('active in');
                $('.daftar').removeClass('active');
                $('#masuk').addClass('active in');
                $('.masuk').addClass('active');
                $('.keyword-input').val('');
                $('.alert, .help-block').remove();
            });

            $('#btn-reset').on('click', function () {
                $('.masuk').removeClass('active');
            });

            $('.submission-of-credit, .btn-sign').on('click', function () {
                $('#login-register').modal('show');
            });
        </script>
    @endif

    @if (session('error-login'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#login-register').modal('show');
                $('#daftar').removeClass('active in');
                $('.daftar').removeClass('active');
                $('#masuk').addClass('active in');
                $('.masuk').addClass('active');
            });
        </script>
    @endif

    @if (session('error-register'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#login-register').modal('show');
                $('#masuk').removeClass('active in');
                $('.masuk').removeClass('active');
                $('#daftar').addClass('active in');
                $('.daftar').addClass('active');
            });
        </script>
    @endif

    @if (session('error-forgot-password'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#login-register').modal('show');
                $('#masuk, #daftar').removeClass('active in');
                $('.masuk, .daftar').removeClass('active');
                $('#reset').addClass('active in');
            });
        </script>
    @endif

    <!-- This is place for dynamis scripts per page -->
    @stack('scripts')
</body>
</html>
