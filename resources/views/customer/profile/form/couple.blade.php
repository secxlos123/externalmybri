<fieldset id="couple_content" disabled hidden>
    <div class="col-md-12">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <h3 class="panel-title text-uppercase">Data Pasangan</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK *</label>
                            <div class="col-md-9">
                                {!! Form::text('personal[couple_nik]', $personal['couple_nik'], [
                                    'class' => 'form-control', 'maxlength' => 16
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Lengkap *</label>
                            <div class="col-md-9">
                                {!! Form::text('personal[couple_name]', $personal['couple_name'], [
                                    'class' => 'form-control'
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tempat Lahir *</label>
                            <div class="col-md-9">
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
                            <label class="col-md-3 control-label">Tanggal Lahir *</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('personal[couple_birth_date]', $personal['couple_birth_date'], [
                                        'class' => 'form-control datepicker-date'
                                    ]) !!}
                                    <span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Foto KTP *</label>
                            <div class="col-md-9">
                                <input name="personal[couple_identity]" type="file" data-placeholder="Tidak ada file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>