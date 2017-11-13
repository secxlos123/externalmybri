@extends('layouts.app')

@section('title', 'EForm Sukses')

@section('content')
    <section id="error-404" class="padding">
        <div class="container">
            <div class="single-page">
                <div class="error-image">
                    {!! Html::image('assets/images/success-eform.png', 'image', ['class' => 'img-responsive']) !!}
                </div>
                <div class="error-text">
                    <h1>Selamat</h1>
                    <h3>Pengajuan Kredit Anda Telah Berhasil Dikirim</h3>
                    <p>Petugas Kami Akan Memproses Pengajuan Anda Lebih Lanjut</p>
                    <div class="erro-button hide">
                        <a href="#." class="btn-blue">Lihat Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

