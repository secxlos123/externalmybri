@extends('layouts.app')

@section('title', 'e-Form Konfirmasi')

@section('content')
    <section id="error-404" class="has-single-page">
        <div class="container">
            <div class="single-page">
                <div class="error-image">
                    {!! Html::image('assets/images/lock-reg.png', 'image', ['class' => 'img-responsive']) !!}
                </div>
                <div class="error-text">
                    @if ($status == 'approve')
                        <h3>Terima kasih telah menyetujui verifikasi data Anda.</h3>
                        <p>Selanjutnya kami akan memproses pengajuan Aplikasi e-Form anda.</p>
                    @else
                        <h3>Mohon maaf ada kesalahan data yang diinputkan.</h3>
                        <p>Account Officer kami segera akan mengupdate data Abda.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection