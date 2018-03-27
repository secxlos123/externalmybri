@extends('layouts.app')

@section('title', 'Pengajuan Kredit')

@section('breadcrumb')

<style type="text/css">
    .modal-dialog-custom {
        width: 1200px;
        margin: 50px auto;
    }
    label {
        font-weight: unset;
        font-size: 14px;
    }
</style>
<div id="leads-modal" class="container">
    <div class="modal-dialog-custom" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title">Tambah Nasabah</h4>
           </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        @if (\Session::has('error'))
                         <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        @endif
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Personal</h3>
                            </div>
                            <!-- ini form untuk save leads -->
                            <form role="form" action="{{route('eform.add-lead')}}" method="POST" enctype="multipart/form-data" id="form_data_personal">
                          {{ csrf_field() }}
                            <div class="panel-body">
                              
                                    <div class="row">
                                        <div class="col-md-6">
                                        
                                                <div class="form-horizontal" >
                                                    <div class="form-group nik {!! $errors->has('nik') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">NIK * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control numericOnly nikStep2" name="nik" id="nik_customer" value="{{ old('nik') }}" maxlength="16">
                                                            @if ($errors->has('nik')) <p class="help-block">{{ $errors->first('nik') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group full_name {!! $errors->has('full_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="full_name" id="full_name" value="{{ old('full_name') }}" maxlength="50">
                                                             @if ($errors->has('full_name')) <p class="help-block">{{ $errors->first('full_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_place {!! $errors->has('birth_place') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                                        <div class="col-md-9">
                                                            {!! Form::select('birth_place_id', ['' => ''], old('cities'), [
                                                                'class' => 'select2 cities',
                                                                'data-placeholder' => 'Pilih Kota',
                                                                'readonly' => true,
                                                                'style' => "width:100%"
                                                            ]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group birth_date {!! $errors->has('birth_date') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Tanggal Lahir * :</label>
                                                        <div class="col-md-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control datepicker-date birthDate" id="datepicker-date" name="birth_date" value="{{ old('birth_date') }}">
                                                                <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                                @if ($errors->has('birth_date')) <p class="help-block">{{ $errors->first('birth_date') }}</p> @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group gender {!! $errors->has('gender') ? 'has-error' : '' !!}">
                                                        <label class="col-md-3 control-label">Jenis Kelamin * :</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" name="gender" id="gender">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="L">Laki-laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                            @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group status {!! $errors->has('status') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Status Pernikahan * :</label>
                                                        <div class="col-md-7">
                                                            <select class="form-control" name="status" id="status">
                                                                <option disabled="" selected="">-- Pilih --</option>
                                                                <option value="1">Belum Menikah</option>
                                                                <option value="2">Menikah</option>
                                                                <option value="3">Janda/Duda</option>
                                                            </select>
                                                            @if ($errors->has('status')) <p class="help-block">{{ $errors->first('status') }}</p> @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group email {!! $errors->has('email') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Email * :</label>
                                                        <div class="col-md-7">
                                                            <input type="email" class="form-control" name="email" value="{{old('email')}}" maxlength="50" id="email">
                                                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group mobile_phone {!! $errors->has('mobile_phone') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">No. Handphone * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" name="mobile_phone" value="{{old('mobile_phone')}}" maxlength="16" id="mobile_phone">
                                                            @if ($errors->has('mobile_phone')) <p class="help-block">{{ $errors->first('mobile_phone') }}</p> @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-5 control-label">No. Telepon :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control numericOnly" name="phone" value="{{old('phone')}}" maxlength="16" id="phone">
                                                            @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group mother_name {!! $errors->has('mother_name') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Nama Gadis Ibu Kandung * :</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{old('mother_name')}}" maxlength="50">
                                                            @if ($errors->has('mother_name')) <p class="help-block">{{ $errors->first('mother_name') }}</p> @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group identity {!! $errors->has('identity') ? 'has-error' : '' !!}">
                                                        <label class="col-md-5 control-label">Foto KTP * :</label>
                                                        <div class="col-md-7">
                                                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" accept="image/png,image/jpeg,image/gif">
                                                            @if ($errors->has('identity')) <p class="help-block">{{ $errors->first('identity') }}</p> @endif
                                                        </div>
                                                    </div>
                                                     <input type="submit" name="" class="btn btn-orange" value="Simpan">
                                            </div>
                                        </div>
                                
                                </div>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="row" id="couple_data">
                    <div class="col-md-12">
                        @if (\Session::has('error'))
                         <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        @endif
                        <div class="panel panel-color panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Pasangan</h3>
                            </div>
                            <form class="form-horizontal" role="form" action="#" method="POST" enctype="multipart/form-data" id="form1">
                            {{ csrf_field() }}
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-horizontal" >
                                            <div class="form-group couple_nik {!! $errors->has('couple_nik') ? 'has-error' : '' !!}">
                                                <label class="col-md-3 control-label">NIK * :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control numericOnly" name="couple_nik" id="nik" value="{{ old('couple_nik') }}" maxlength="16">
                                                    @if ($errors->has('couple_nik')) <p class="help-block">{{ $errors->first('couple_nik') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group couple_name {!! $errors->has('couple_name') ? 'has-error' : '' !!}">
                                                <label class="col-md-3 control-label">Nama Lengkap * :</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="couple_name" id="couple_name" value="{{ old('couple_name') }}" maxlength="50">
                                                     @if ($errors->has('couple_name')) <p class="help-block">{{ $errors->first('couple_name') }}</p> @endif
                                                </div>
                                            </div>
                                            <div class="form-group couple_birth_place {!! $errors->has('couple_birth_place') ? 'has-error' : '' !!}">
                                                <label class="col-md-3 control-label">Tempat Lahir * :</label>
                                                <div class="col-md-9">
                                                    {!! Form::select('couple_birth_place_id', ['' => ''], old('cities'), [
                                                        'class' => 'select2 cities',
                                                        'data-placeholder' => 'Pilih Kota',
                                                        'readonly' => true,
                                                        'style' => "width:100%"
                                                    ]) !!}
                                                </div>
                                            </div>
                                            <div class="form-group couple_birth_date {!! $errors->has('couple_birth_date') ? 'has-error' : '' !!}">
                                                <label class="col-md-3 control-label">Tanggal Lahir * :</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control datepicker-date" id="datepicker-autoclose" name="couple_birth_date" value="{{ old('couple_birth_date') }}">
                                                        <span class="input-group-addon b-0"><i class="mdi mdi-calendar"></i></span>
                                                        @if ($errors->has('couple_birth_date')) <p class="help-block">{{ $errors->first('couple_birth_date') }}</p> @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-horizontal">
                                            <div class="form-group couple_identity {!! $errors->has('couple_identity') ? 'has-error' : '' !!}">
                                                <label class="col-md-5 control-label">KTP Pasangan * :</label>
                                                <div class="col-md-7">
                                                    <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="couple_identity" accept="image/png,image/jpeg,image/gif">
                                                    @if ($errors->has('couple_identity')) <p class="help-block">{{ $errors->first('couple_identity') }}</p> @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-right">
                        <input type="submit" name="" class="btn btn-orange" value="Simpan">
                            <a href="#" data-dismiss="modal" class="btn btn-default waves-light waves-effect w-md m-b-20">Batal</a>
                           <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20" data-toggle="modal" id="btn-save"><i class="mdi mdi-content-save"></i>Simpan </button>
                        </div>
                    </div>
                </div>            
            </div>

        </div>
    </div>
</div>
@push('styles')
    {!! Html::style('assets/css/jquery.steps.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
    {!! Html::style('assets/css/bootstrap-datepicker.min.css') !!}
    @stack('parent-styles')
@endpush

@push('scripts')
    {!! Html::script('assets/js/jquery.steps.js') !!}
    {!! Html::script('assets/js/bootstrap-datepicker.min.js') !!}
    <!-- This script for init jquery steps you can replace this script with your logic -->
    {!! Html::script('assets/js/select2.min.js') !!}
    {!! Html::script('js/dropdown.min.js') !!}
     <script src="{{asset('assets/js/HoldOn.min.js')}}"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>

<script type="text/javascript">
    $('#btn-save').on('click', function() {
       $('#form_data_personal').submit();
       $('#form1').submit();
     });

    $('.cities').dropdown('cities');

        $('#status').on('change', function(){
            if ($(this).val() == 2) {
                $('#couple_data').show();
            }else{
                $('#couple_data').hide();
            }
        });

        $('#datepicker-date').datepicker({
            format: "yyyy-mm-dd",
            clearBtn: true,
            autoclose: true,
            endDate: new Date(),
            todayHighlight: true
        });

        $('#datepicker-date').datepicker("setDate",  "{{date('Y-m-d', strtotime('-21 years'))}}");
</script>
    @stack('parent-scripts')
@endpush