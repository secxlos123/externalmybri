@extends('layouts.app')

@section('title', 'Verifikasi Akun')

@section('breadcrumb')
    <h1 class="text-uppercase">Verifikasi Akun</h1>
    <p>
        Data akun anda sudah terverifikasi. Silahkan masuk ke halaman <a href="{!! route('homepage') !!}"><u>Home</u></a> untuk melakukan login.
    </p>
@endsection

@push('styles')
    <style type="text/css">
        .absolute-fix {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
        }
    </style>
@endpush