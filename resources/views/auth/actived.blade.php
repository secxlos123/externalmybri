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
                    <h1>Selamat</h1>
                    <h3>Akun terverifikasi.</h3>
                    <p>Akun Anda telah terverifikasi.</p>
                    <div class="erro-button">
                        <a href="#." class="btn-blue">Lihat Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection