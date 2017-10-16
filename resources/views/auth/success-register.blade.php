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
                        <h1>Selamat</h1>
                        <h3>Registrasi Anda berhasil.</h3>
                        <p>Silahkan cek email Anda untuk verifikasi akun.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection