@extends('layouts.app')

@section('title', 'Halaman Utama')
@section('breadcrumb')
    <h1 class="text-uppercase">Detail Tracking</h1>
    <ol class="breadcrumb text-center">
        <li><a href="{!! url('/') !!}">Dashboard</a></li>
        <li class="active">Tracking Detail</li>
    </ol>
@endsection
@section('content')
<section id="property" class="padding listing1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-page">
                    <div class="content">
                        <div class="container">
                            <div class="row table-scroll">

                                <div class="tracking-widget cms-tracking-widget">
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results['status'] == 'Pengajuan Kredit') ? 'active' : ''}}">
                                            <div class="bg-icon">
                                                <!-- <div class="icon_pengajuan"></div> -->
                                                {!! Html::image('assets/images/fa_envelope_o.png', '', [
                                                    'class' => 'track-icon'
                                                ]) !!}
                                                <!-- <i class="fa fa-envelope"></i> -->
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Pengajuan Telah Diterima</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{($results['status'] == 'Proses CLF' || $results['status'] == 'Prakarsa') ? 'active' : '' }}">
                                            <div class="bg-icon">
                                                {!! Html::image('assets/images/fa_analis_o.png', '', [
                                                    'class' => 'track-icon'
                                                ]) !!}
                                                <!-- <i class="fa fa-crosshairs"></i> -->
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Proses Analisa Pengajuan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three {{ ($results['status'] == 'Kredit Ditolak' || $results['status'] == 'Disposisi Pengajuan') ? 'active' : ''}}">
                                            <div class="bg-icon">
                                                {!! Html::image('assets/images/fa_file_o.png', '', [
                                                    'class' => 'track-icon'
                                                ]) !!}
                                                <!--  <i class="fa fa-hdd-o"></i> -->
                                            </div>
                                            <div class="text-center">
                                            @if ($results['status'] == 'Kredit Ditolak' || $results['status'] == 'Disposisi Pengajuan')
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">{{($results['status'] == 'Kredit Ditolak') ? 'Status Pengajuan Di Tolak' : 'Status Pengajuan Di Terima'}}</p>
                                            @else
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Status Pengajuan</p>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tracking-card">
                                        <div class="card-box widget-box-three ">
                                            <div class="bg-icon">
                                                {!! Html::image('assets/images/fa_dollar_o.png', '', [
                                                    'class' => 'track-icon'
                                                ]) !!}
                                                <!--  <i class="fa fa-dollar"></i> -->
                                            </div>
                                            <div class="text-center">
                                                <p class="m-t-5 text-uppercase font-600 font-secondary">Proses Pencairan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box w-80">
                                        <h4 class="m-t-0 m-b-30 header-title"><b>Detail Informasi</b></h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">No. Ref :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['ref_number'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Tanggal Pengajuan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ date("d-m-Y", strtotime($results['created_at'])) }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lama Pengajuan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['aging'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jenis KPR :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['status_property_name'] }}</p>
                                                        </div>
                                                    </div>

                                                    @if ( $results['kpr']['status_property'] == 1 )
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama Developer :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['developer_name'] }}</p>
                                                        </div>
                                                    </div>
                                                    @endif

                                                    @if ( !$results['kpr']['kpr_type_property'] )
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Nama Proyek :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['property_name'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Tipe Properti :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['property_type_name'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Unit Properti :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['property_item_name'] }}</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        @if ( $results['kpr']['status_property'] != 1 )
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Jenis Properti :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['kpr_type_property_name'] }}</p>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @if ( $results['kpr']['kpr_type_property'] == 1 )
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label">Jenis Properti :</label>
                                                            <div class="col-md-8">
                                                                <p class="form-control-static">{{ @$results['kpr']['kpr_type_property_name'] }}</p>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endif

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Harga Rumah :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp. {{ number_format(@$results['kpr']['price'], 2, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Luas Bangunan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['building_area'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Lokasi Rumah :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['home_location'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jangka Waktu (Bulan) :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['kpr']['year'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">KPR Aktif :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">
                                                            @if (isset($results['kpr']['active_kpr']))
                                                                @if ($results['kpr']['active_kpr'] == 3)
                                                                    > 2
                                                                @else
                                                                    {{$results['kpr']['active_kpr']}}
                                                                @endif
                                                            @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Uang Muka :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp. {{number_format(@$results['kpr']['down_payment'], 2, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Jumlah Permohonan :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">Rp. {{number_format(@$results['kpr']['request_amount'], 2, ',', '.') }}</p>
                                                        </div>
                                                    </div>
                                                    @if(!empty($results['ao_name']))
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Nama AO :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['ao_name'] }}</p>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Kantor Cabang :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">{{ @$results['branch'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Status :</label>
                                                        <div class="col-md-8">
                                                            <p class="form-control-static">
                                                                <mark>
                                                                    @if ($results['status'] == 'Pengajuan Kredit')
                                                                        Pengajuan diterima
                                                                    @elseif ($results['status'] == 'Proses CLF' || $results['status'] == 'Prakarsa')
                                                                        Proses Analisa Pengajuan
                                                                    @elseif ($results['status'] == 'Kredit Ditolak')
                                                                        Status Pengajuan Di Tolak
                                                                    @elseif ($results['status'] == 'Disposisi Pengajuan')
                                                                        Status Pengajuan Di Terima
                                                                    @else
                                                                        Status Tidak Diketahui
                                                                    @endif
                                                                </mark>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
    <style type="text/css">
        .content-page {
            margin-left: 0px !important;
            overflow: unset !important;
        }
    </style>
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
   <!--  <script type="text/javascript">
    $( document ).ready(function() {
        var dob = new Date($("input[name='createdEform']").val());
        var today = new Date();
        var age = Math.floor((today-dob) / (1000 * 60 * 60 * 24));
        $('.agingVal').html(age+' Hari');
    });
    </script> -->
@endpush