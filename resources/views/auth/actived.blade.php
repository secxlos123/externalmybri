@extends('layouts.app')

@section('title', 'Verifikasi Akun')

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
                        <h3>Akun terverifikasi.</h3>
                        <p>Akun Anda telah terverifikasi.</p>
                        <div class="erro-button">
                            <a href="javascript:void(0)" class="btn-blue btn-sign">Masuk</a>
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
        width: 100%;
    }
    .bottom-space {
        margin-bottom: 100px;
    }
    section.page-banner.padding.bg_light {
        display: none;
    }
</style>
@endpush