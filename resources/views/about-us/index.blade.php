@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section id="DetailProduct" class="padding bg_white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="image-detail-product">
                    {!! Html::image('assets/images/home1-banner1.jpg', '', [
                        'class' => 'img-responsive img-thumbnail'
                    ]) !!}
                </div>
                <h2 class="text-uppercase top30 bottom30">Tentang Kami</h2>
                <p class="text-justify">Bank BRI memahami bahwa kebutuhan dan pelayanan prima untuk Anda sebagai Nasabah adalah sebuah komitmen dan prioritas.  Perkembangan dunia teknologi finansial berbasis digital di industri perbankan, mendorong Bank BRI untuk menjadi pioneer dalam menciptakan inovasi berbasis layanan teknologi finansial.</p>
                <!-- <p class="title-detail top20"><strong>Syarat</strong></p> -->
                <p class="text-justify">Salah satu bentuk komitmen dan prioritas Bank BRI dalam memenuhi kebutuhan Anda adalah dengan menghadirkan inovasi pengajuan layanan (self service) perbankan berbasis mobile application dan web service dengan user experience yang baru. Kami mewujudkan impian layanan perbankan Anda melalui MyBRI. MyBRI memahami kebutuhan Anda sebagai Nasabah seperti halnya Anda memahami kebutuhan Anda sendiri.</p>
                <p class="text-justify">MyBRI akan membantu berbagai macam pengajuan pinjaman konsumtif Anda seperti Kredit Pemilikan Rumah (KPR), Kredit Kendaraan Bermotor (KKB), Kredit BRIGuna (Salary Based Loan) dan Kartu Kredit dengan pelayanan yang cepat, mudah, dan transparan dan didukung fitur-fitur teknologi finansial seperti pengajuan layanan pinjaman, simulasi pinjaman, notifikasi pembayaran, pemilihan kantor layanan Bank BRI hingga marketplace properti.</p>
                <!-- <p class="title-detail top20"><strong>Keunggulan</strong></p> -->
                <p class="text-justify">Anda juga dapat melakukan janji temu dengan Relationship Manager kami melalui MyBRI. Bank BRI akan menghubungkan layanan perbankan menjadi lebih dekat dengan Anda kapanpun dan dimanapun. MyBRI, Beyond the Edge.</p>
            </div>
        </div>
    </section>
@endsection

<!-- This is styles for this page -->
@push('styles')
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
@endpush
<!-- This is scripts for this page end -->