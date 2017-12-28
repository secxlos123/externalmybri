<fieldset id="couple_content" hidden disabled >
    <?php print_r($customer->couple_birth_place_id); ?>
    <div class="col-md-12">
        <div class="panel panel-blue">
            <div class="panel-heading" data-toggle="collapse" data-target="#couple-data">
                <h3 class="panel-title text-uppercase">
                    Data Pasangan

                    <div class="pull-right">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </h3>
            </div>
            <div id="couple-data" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">NIK *</label>
                                <div class="col-md-8">
                                    {!! Form::text('couple_nik', old('couple_nik'), [
                                        'class' => 'form-control numeric', 'maxlength' => 16
                                    ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Lengkap *</label>
                                <div class="col-md-8">
                                    {!! Form::text('couple_name', old('couple_name'), [
                                        'class' => 'form-control'
                                    ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tempat Lahir *</label>
                                <div class="col-md-8">
                                    {!! Form::select('couple_birth_place_id', ['' => ''] + [
                                    $customer->couple_birth_place_id ? $customer->couple_birth_place_id : old('couple_birth_place_id') => $customer->couple_birth_place ? $customer->couple_birth_place : old('couple_birth_place')
                                    ], old('couple_birth_place_id'), [
                                        'class' => 'form-control select2 couple_birth',
                                        'data-placeholder' => 'Pilih Kota',
                                        'data-option' => $customer->couple_birth_place_id ?: old('couple_birth_place_id'),
                                    ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal Lahir *</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        {!! Form::text('couple_birth_date', old('couple_birth_date'), [
                                            'class' => 'form-control couple-date-birth'
                                        ]) !!}
                                        <span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Foto KTP :</label>
                                <div class="col-md-8">
                                    {!! Form::file('couple_identity', [
                                        'class' => 'filestyle', 'data-target' => 'ktp_couple_preview',
                                        'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                                        'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
                                    ]) !!}
                                </div>
                            </div>
                        </div>

                        @if ( isset($customer->couple_identity) && $customer->couple_identity )

                            <div class="col-md-6">
                                <div class="form-group ktp_couple_preview">
                                    <div class="col-md-12 col-md-offset-2">
                                        {!! Html::image($customer->couple_identity ?: 'assets/images/no-image.jpg', 'KTP Pasangan', [
                                            'class' => 'img-responsive', 'width' => 300, 'id' => 'ktp_couple_preview',
                                            'data-src' => asset('assets/images/no-image.jpg')
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                        @else

                            <div class="col-md-6">
                                <div class="form-group hide ktp_couple_preview">
                                    <div class="col-md-12 col-md-offset-2">
                                        {!! Html::image('assets/images/no-image.jpg', 'KTP Pasangan', [
                                            'class' => 'img-responsive', 'width' => 300, 'id' => 'ktp_couple_preview',
                                            'data-src' => asset('assets/images/no-image.jpg')
                                        ]) !!}
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>