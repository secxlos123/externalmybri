@extends('layouts.app')

@section('title', 'Sukses Registrasi')

@section('content')
    <section id="error-404" class="has-single-page">
        <div class="container">
            <div class="single-page">
                <div class="error-image">
                    {!! Html::image('assets/images/lock-reg.png', 'image', ['class' => 'img-responsive']) !!}
                </div>
                <div class="error-text">
                    <h1>Selamat</h1>
                    <h3>Registrasi Anda berhasil.</h3>
                    <p>Silahkan cek email Anda untuk verifikasi akun.</p>
                </div>
            </div>
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
</style>
@endpush