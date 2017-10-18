@extends('layouts.app')

@section('title', 'Verifikasi Akun')

@section('content')
    <section id="error-404" class="has-single-page">
        <div class="container">
            <div class="single-page">
                <div class="error-image">
                    {!! Html::image('assets/images/lock-reg.png', 'image', ['class' => 'img-responsive']) !!}
                </div>
                <div class="error-text">
                    <h1>Selamat</h1>
                    <h3>Akun terverifikasi.</h3>
                    <p>Akun Anda telah terverifikasi.</p>
                    <div class="erro-button">
                        <a href="javascript:void(0)" class="btn-blue btn-sign">Masuk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection