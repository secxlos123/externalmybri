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
                <!-- <h2 class="text-uppercase top30 bottom30">KPR (Kredit Perumahan Rakyat)</h2> -->
                <h2 class="text-uppercase top30 bottom30">KPR (Kredit Pemilikan Rumah)</h2>
                <p class="text-justify">KPR BRI memberikan solusi dan kemudahan dalam memiliki hunian yang anda inginkan.</p>
                <p class="title-detail top20"><strong>Keunggulan</strong></p>
                <ol class="list-detail">
                    <li type="a">Proses cepat.</li>
                    <li type="a">Biaya kredit ringan.</li>
                    <li type="a">Jangka waktu sampai dengan 20 tahun.</li>
                    <li type="a">Suku bunga kompetitif.</li>
                    <li type="a">DP mulai dari 10% *.</li>
                    <li type="a">Objek yang dibiayai berupa rumah tinggal, apartemen, condotel, ruko atau rukan.</li>
                    <li type="a">Berlaku untuk pembelian (baru/bekas), pembangunan, renovasi atau take over dari bank lain.</li>
                </ol>
                <p class="title-detail top20"><strong>Fasilitas</strong></p>
                <ol class="list-detail">
                    <li type="a">Pembayaran dapat dilakukan dengan Automatic Fund Transfer (AFT)/Automatic Grab Fund (AGF).</li>
                    <li type="a">Asuransi jiwa Kredit serta asuransi kerugian/kebakaran.</li>
                </ol>
                <p class="title-detail top20"><strong>Persyaratan</strong></p>
                <ol class="list-detail">
                    <li type="a">Mengisi formulir aplikasi KPR BRI.</li>
                    <li type="a">WNI cakap hukum.</li>
                    <li type="a">Membuka rekening BRItama.</li>
                    <li type="a">Usia minimal 21 th/sudah menikah.</li>
                    <li type="a">Lokasi tempat tinggal/lokasi bekerja/usaha/praktek debitur di kota dimana KC/KCP berada.</li>
                    <li type="a">Melampirkan dokumen kredit (copy KTP, copy KK, NPWP, pas foto suami/istri terbaru, surat keterangan gaji dsb).</li>
                </ol>
                <span class="list-detail">*) untuk developer tertentu</span>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
    <style type="text/css">
        .list-detail {
            font-size: 15px;
            color: #676767;
            margin-left: 20px;
        }
    </style>
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')

@endpush
<!-- This is scripts for this page end -->