<div class="row">
    <div class="col-md-12">
        <div class="">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#personal" data-toggle="tab" aria-expanded="true">
                        <span class="visible-xs"><i class="fa fa-info"></i></span>
                        <span class="hidden-xs">Data Pribadi</span>
                    </a>
                </li>
                <li class="">
                    <a href="#work" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-phone"></i></span>
                        <span class="hidden-xs">Data Pekerjaan</span>
                    </a>
                </li>
                <li class="">
                    <a href="#finance" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Data Keuangan</span>
                    </a>
                </li>
                <li class="">
                    <a href="#family" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Data Keluarga</span>
                    </a>
                </li>
                <li class="">
                    <a href="#other" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs"><i class="fa fa-list"></i></span>
                        <span class="hidden-xs">Lain-lain</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="personal">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pribadi</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">NIK :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static" id="cust_nik">@if(!empty($dataCustomer['personal']['nik'])){{$dataCustomer['personal']['nik']}}
                                                        <input type="hidden" name="nik" value="{{ $dataCustomer['personal']['nik'] }}" id="nik">
                                                        @else - @endif</p>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Lengkap :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">{{$dataCustomer['personal']['first_name']}} {{$dataCustomer['personal']['last_name']}}</p>
                                                        <input type="hidden" name="name" value="{{ $dataCustomer['personal']['first_name'] }}  {{ $dataCustomer['personal']['last_name'] }}" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Tempat Lahir :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['birth_place'])){{$dataCustomer['personal']['birth_place']}}
                                                        <input type="hidden" name="birth_place" id="birth_place" value="{{$dataCustomer['personal']['birth_place']}}">
                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Tanggal Lahir :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['birth_date'])){{$dataCustomer['personal']['birth_date']}}
                                                        <input type="hidden" name="birth_date" id="birth_date" value="{{$dataCustomer['personal']['birth_date']}}">

                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Alamat :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
                                                            @if(!empty($dataCustomer['personal']['address'])){{$dataCustomer['personal']['address']}}
                                                            <input type="hidden" name="address" id="address" value="{{$dataCustomer['personal']['address']}}">
                                                            @else - @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jenis Kelamin :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['gender'])){{$dataCustomer['personal']['gender']}}
                                                        <input type="hidden" name="gender" id="gender" value="{{$dataCustomer['personal']['gender']}}">
                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Status Pernikahan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
                                                            @if(!empty($dataCustomer['personal']['status'])){{$dataCustomer['personal']['status']}}</p>
          <input type="hidden" name="status" value="{{$dataCustomer['personal']['status']}}" id="status">
                                                            @else - @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Email :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['email']))
                                                        {{$dataCustomer['personal']['email']}}
                                                        <input type="hidden" name="email" id="email" value="{{$dataCustomer['personal']['email']}}">
                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Gadis Ibu Kandung :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['mother_name'])){{$dataCustomer['personal']['mother_name']}}
                                                        <input type="hidden" name="mother_name" id="mother_name" value="{{$dataCustomer['personal']['mother_name']}}">
                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">No. Handphone :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['mobile_phone'])){{$dataCustomer['personal']['mobile_phone']}}
                                                        <input type="hidden" name="mobile_phone" id="mobile_phone" value="{{$dataCustomer['personal']['mobile_phone']}}">
                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($dataCustomer['personal']['status_id']) &&($dataCustomer['personal']['status_id'] == 2))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pasangan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">NIK :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['couple_nik'])){{$dataCustomer['personal']['couple_nik']}}
                                                        <input type="hidden" name="couple_nik" id="couple_nik" value="{{$dataCustomer['personal']['couple_nik']}}">
                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Lengkap :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['couple_name'])){{$dataCustomer['personal']['couple_name']}}
                                                        <input type="hidden" name="couple_name" id="couple_name" value="{{$dataCustomer['personal']['couple_name']}}">
                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Tempat Lahir :</label>
                                                    <div class="col-md-6">
                                                 <p class="form-control-static">@if(!empty($dataCustomer['personal']['couple_birth_place'])){{$dataCustomer['personal']['couple_birth_place']}}</p>
                                         <input type="hidden" name="couple_birth_place" value="{{$dataCustomer['personal']['couple_birth_place']}}" id="couple_birth_place" >
                                                        @else - @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Tanggal Lahir :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['personal']['couple_birth_date'])){{$dataCustomer['personal']['couple_birth_date']}}
                                                        <input type="hidden" name="couple_birth_date" id="couple_birth_date" value="{{$dataCustomer['personal']['couple_birth_date']}}">
                                                        @else - @endif</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="tab-pane" id="work">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pekerjaan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Bidang Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static" id="cust_nik">@if(!empty($dataCustomer['work']['work_field'])){{$dataCustomer['work']['work_field']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jenis Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['work']['type'])){{$dataCustomer['work']['type']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Pekerjaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['work']['work'])){{$dataCustomer['work']['work']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama Perusahaan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['work']['company_name'])){{$dataCustomer['work']['company_name']}}@else - @endif</p>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="form-horizontal" role="form">

                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Jabatan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">
                                                            @if(!empty($dataCustomer['work']['position'])){{$dataCustomer['work']['position']}}@else - @endif
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Lama Kerja :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['work']['work_duration'])){{$dataCustomer['work']['work_duration']}} Tahun {{$dataCustomer['work']['work_duration_month']}} Bulan @else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Alamat Kantor :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['work']['office_address'])){{$dataCustomer['work']['office_address']}}@else - @endif</p>
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

                <div class="tab-pane" id="finance">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Keuangan</h3>
                                </div>
                                <!-- <div class="card-box m-t-30"> -->
                                    <!-- <h4 class="m-t-min30 m-b-30 header-title custom-title">Customer</h4> -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Gaji/Pendapatan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['financial']['salary'])){{$dataCustomer['financial']['salary']}}@else - @endif</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['financial']['other_salary'])){{$dataCustomer['financial']['other_salary']}}@else - @endif</p>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">

                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Angsuran Pinjaman :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">
                                                                @if(!empty($dataCustomer['financial']['loan_installment'])){{$dataCustomer['financial']['loan_installment']}}@else - @endif
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Jumlah Tanggungan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['financial']['dependent_amount'])){{$dataCustomer['financial']['dependent_amount']}}@else - @endif</p>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!-- </div> -->
                                @if(!empty($dataCustomer['financial']['status_finance'] == "Join Income"))
                                <div class="card-box m-t-30">
                                    <h4 class="m-t-min30 m-b-30 header-title custom-title">Pasangan</h4>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Gaji/Pendapatan :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['financial']['salary_couple'])){{$dataCustomer['financial']['salary_couple']}}@else - @endif</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Pendapatan Lain :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">@if(!empty($dataCustomer['financial']['other_salary_couple'])){{$dataCustomer['financial']['other_salary_couple']}}@else - @endif</p>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form class="form-horizontal" role="form">

                                                    <div class="form-group">
                                                        <label class="col-md-6 control-label">Angsuran Pinjaman :</label>
                                                        <div class="col-md-6">
                                                            <p class="form-control-static">
                                                                @if(!empty($dataCustomer['financial']['loan_installment_couple'])){{$dataCustomer['financial']['loan_installment_couple']}}@else - @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="family">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Keluarga</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nama :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['contact']['emergency_name'])){{$dataCustomer['contact']['emergency_name']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Nomor Handphone :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['contact']['emergency_contact'])){{$dataCustomer['contact']['emergency_contact']}}@else - @endif</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-md-6 control-label">Hubungan :</label>
                                                    <div class="col-md-6">
                                                        <p class="form-control-static">@if(!empty($dataCustomer['contact']['emergency_relation'])){{$dataCustomer['contact']['emergency_relation']}}@else - @endif
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

                <div class="tab-pane" id="other">
                    <div class="row foto-nasabah">
                        <div class="col-md-12">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Lain-lain</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6" align="center">
                                            <div class="card-box">
                                                
         <!-- handle image or pdf -->
        @if((pathinfo(strtolower($dataCustomer['other']['identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['other']['identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['other']['identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                 @if(strpos($dataCustomer['other']['identity'], 'noimage.jpg'))
                <p>Foto KTP Kosong</p>
                 @else
                <img src="@if(!empty($dataCustomer['other']['identity'])){{$dataCustomer['other']['identity']}}@endif" class="img-responsive">                           
                <p>Foto KTP</p>
                  @endif
        @else
                <a href="@if(!empty($dataCustomer['other']['identity'])){{$dataCustomer['other']['identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Foto KTP</p>
        @endif
         <!-- end handle -->
                                            </div>
                                        </div>
                                        @if(!empty($dataCustomer['personal']['status_id']) &&($dataCustomer['personal']['status_id'] == 2))
                                        <div class="col-md-6" align="center">
                                            <div class="card-box">
           <!-- handle image or pdf -->
        @if((pathinfo(strtolower($dataCustomer['personal']['couple_identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($dataCustomer['personal']['couple_identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($dataCustomer['personal']['couple_identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                 @if(strpos($dataCustomer['personal']['couple_identity'], 'noimage.jpg'))
                <p>Foto KTP Kosong</p>
                 @else
                <img src="@if(!empty($dataCustomer['personal']['couple_identity'])){{$dataCustomer['personal']['couple_identity']}}@endif" class="img-responsive">
                <p>Foto KTP Pasangan</p>
                @endif
        @else
                <a href="@if(!empty($dataCustomer['personal']['couple_identity'])){{$dataCustomer['personal']['couple_identity']}}@endif" target="_blank" class="img-responsive"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive"></a>
                <p>Klik Untuk Lihat Foto KTP Pasangan</p>
        @endif
         <!-- end handle -->
                                                
                                            </div>
                                        </div>
                                        @endif
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
