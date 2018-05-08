@extends('layouts.app')

@section('title', 'EForm Sukses')

@section('content')
    <section id="error-404" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-image">
                        {!! Html::image('assets/images/success-eform.png', 'image', ['class' => 'img-responsive']) !!}
                    </div>
                    <div class="error-text">
                        <h1 class="paddingtop30">Mohon maaf!</h1>
                        <h3>Anda sudah Melakukan Pengajuan Kredit</h3>
                        <p>Petugas Kami Sedang Memproses Pengajuan Anda Lebih Lanjut</p>
                        <!-- <div class="erro-button hide"> -->
                            <a href="{{ url('/tracking') }}" class="btn-blue">Lihat Tracking Pengajuan Kredit Anda</a>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            <div class="bottom-space"></div>
        </div>
    </section>
@endsection

@push( 'styles' )
    <style type="text/css">
        .bottom-space {
            margin-bottom: 100px !important;
        }
        section.page-banner.padding.bg_light {
            display: none;
        }
    </style>
@endpush