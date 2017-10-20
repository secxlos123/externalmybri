<fieldset id="couple_content" hidden disabled >
    <div class="col-md-12">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <h3 class="panel-title text-uppercase">Data Pasangan</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">NIK *</label>
                            <div class="col-md-8">
                                {!! Form::text('personal[couple_nik]', $personal['couple_nik'], [
                                    'class' => 'form-control numeric', 'maxlength' => 16
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Lengkap *</label>
                            <div class="col-md-8">
                                {!! Form::text('personal[couple_name]', $personal['couple_name'], [
                                    'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tempat Lahir *</label>
                            <div class="col-md-8">
                                @if ( $personal['couple_birth_place_id'] )

                                    {!! Form::text('personal[couple_birth_place_id]', $personal['couple_birth_place'], [
                                        'class' => 'form-control', 'disabled'
                                    ]) !!}
                                    {!! Form::hidden('personal[couple_birth_place_id]', $personal['couple_birth_place_id']) !!}

                                @else

                                    {!! Form::select('personal[couple_birth_place_id]', ['' => ''], old('personal[couple_birth_place_id]'), [
                                        'class' => 'form-control select2 cities',
                                        'data-placeholder' => 'Pilih Kota',
                                        'data-option' => $personal['couple_birth_place_id'],
                                    ]) !!}
                                    
                                @endif
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tanggal Lahir *</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::text('personal[couple_birth_date]', $personal['couple_birth_date'], [
                                        'class' => 'form-control date-birth'
                                    ]) !!}
                                    <span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Foto KTP :</label>
                            <div class="col-md-8">
                                {!! Form::file('personal[couple_identity]', [
                                    'class' => 'filestyle', 'data-target' => 'ktp_couple_preview',
                                    'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                                    'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file' 
                                ]) !!}
                            </div>
                        </div>
                    </div>

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
                </div>
            </div>
        </div>
    </div>
</fieldset>