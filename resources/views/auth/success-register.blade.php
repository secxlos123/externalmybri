@extends('layouts.app')

@section('title', 'Sukses Registrasi')

@section('content')
    <section id="error-404" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="error-image">
                        {!! Html::image('assets/images/lock-reg.png', 'image', ['class' => 'img-responsive']) !!}
                    </div>
                    <div class="error-text">
                        <h1 class="paddingtop30">Selamat</h1>
                        <h3>Registrasi Anda berhasil.</h3>
                        <p>Silahkan cek email Anda untuk verifikasi akun.</p>
                        <div class="erro-button">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#login-register" class="btn-blue">Masuk</a>
                            <br>
                            <a href="{{url('/resend')}}" class="btn-blue btn-resend">Kirim ulang email</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-space"></div>
        </div>
    </section>
@endsection

@push('styles')
<style type="text/css">
    footer.footer_third.absolute-fix {
        bottom: 0px !important;
        position: absolute;
        width: -webkit-fill-available;
    }
    section.page-banner.padding.bg_light {
        display: none;
    }
    a.btn-blue.btn-resend {
        background: grey;
    }
    a.btn-blue.btn-resend:hover {
        background: #1f1d22;
    }
</style>
@endpush