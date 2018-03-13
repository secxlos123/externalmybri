@extends('layouts.app')

@section('title', 'Manajemen Data Pengajuan Eform')

@section('breadcrumb')
    <h1 class="text-uppercase">Manajemen Data Pengajuan Eform</h1>
    <p>Kelola Data anda di sini.</p>
    <ol class="breadcrumb text-center">
        <!-- <li><a href="#">Dashboard</a></li> -->
        <li class="active">Pengajuan</li>
    </ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <!-- This List View Eform By Id -->

             <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Pengajuan</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Jumlah Permohonan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="request_amount"><?php echo number_format($data['kpr']['request_amount'], 2) ;?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama Produk :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static">KPR</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Jangka Waktu :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="year">{{ $data['kpr']['year'] }} Bulan</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Pengaju :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="ao_name">{!! session('authenticate.fullname') !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Kantor Cabang :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="office">{{ $data['branch'] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama Nasabah :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="customer_name">{{ $data['customer']['personal']['first_name'] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Tanggal Pertemuan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="appointment_date">{{ $data['appointment_date'] }}</p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Nasabah</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">NIK :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="cust_nik">{{ $data['nik'] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama Lengkap :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="customer_fullname">{{ $data['customer']['personal']['name'] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nomor HP :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="mobile_phone">{{ $data['customer']['personal']['mobile_phone'] }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            @if($data['customer']['personal']['couple_name'] == NULL)
                                            <!-- KOSONG/Single man or women -->
                                            @else
                                            <div class="form-group" id="couple1">
                                                <label class="col-md-5 control-label">NIK Pasangan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="couple_nik">{{ $data['customer']['personal']['couple_nik'] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group" id="couple2">
                                                <label class="col-md-5 control-label">Nama Lengkap Pasangan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="couple_name">{{ $data['customer']['personal']['couple_name'] }}</p>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Email :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="email">{{ $data['customer']['personal']['email'] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Status Pernikahan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="status">{{ $data['customer']['personal']['status'] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-5 control-label">Nama Gadis Ibu Kandung :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="mother_name">{{ $data['customer']['personal']['mother_name'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            @if($data['customer']['personal']['couple_name'] == NULL)
                                            <!-- KOSONG/Single man or women -->
                                            @else
                                            <div class="form-group" id="couple3">
                                                <label class="col-md-5 control-label">Tempat Lahir Pasangan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="couple_birth_place">{{ $data['customer']['personal']['couple_birth_place'] }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group" id="couple4">
                                                <label class="col-md-5 control-label">Tanggal Lahir Pasangan :</label>
                                                <div class="col-md-7">
                                                    <p class="form-control-static" id="couple_birth_date">{{ $data['customer']['personal']['couple_birth_date'] }}</p>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row foto-nasabah">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6" align="center">
                                        <div class="card-box" id="identity">
                                        @if((pathinfo(strtolower($data['customer']['other']['identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($data['customer']['other']['identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($data['customer']['other']['identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                 @if(strpos($data['customer']['other']['identity'], 'noimage.jpg'))
                                                <p>Foto KTP Kosong</p>
                                                 @else
                                                <img src="@if(!empty($data['customer']['other']['identity'])){{$data['customer']['other']['identity']}}@endif" class="img-responsive">                           
                                                <p>Foto KTP</p>
                                                  @endif
                                        @else
                                                <a href="@if(!empty($data['customer']['other']['identity'])){{$data['customer']['other']['identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                <p>Klik Untuk Lihat Foto KTP</p>
                                        @endif
                                        </div>
                                    </div>
                                        <div class="col-md-6" align="center">
                                        <div class="card-box" id="couple_identity">
                                   
                                        @if((pathinfo(strtolower($data['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($data['customer']['personal']['couple_identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($data['customer']['personal']['couple_identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                                                 @if(strpos($data['customer']['personal']['couple_identity'], 'noimage.jpg'))
                                                <p>Foto KTP Kosong</p>
                                                 @else
                                                <img src="@if(!empty($data['customer']['personal']['couple_identity'])){{$data['customer']['personal']['couple_identity']}}@endif" class="img-responsive">
                                                <p>Foto KTP Pasangan</p>
                                                @endif
                                        @else
                                                <a href="@if(!empty($data['customer']['personal']['couple_identity'])){{$data['customer']['personal']['couple_identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                                                <p>Klik Untuk Lihat Foto KTP Pasangan</p>
                                        @endif
                                     
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                   <a href="{!! route('dev-sales.data-eform') !!}" class="btn btn-default" data-dismiss="modal" >Kembali</a>
                   <!-- <a id="agree" href="#" class="btn btn-default" data-dismiss="modal" >Ajukan</a> -->
               </form>
           </div>

            <!-- End List View Eform By Id -->
            </div>
        </div>
    </div>
</section>
@endsection

