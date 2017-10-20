<div class="col-md-12">
    <div class="panel panel-blue">
        <div class="panel-heading">
            <h3 class="panel-title text-uppercase">Data Pekerjaan</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Bidang Pekerjaan *</label>
                        <div class="col-md-8">
                            {!! Form::select('work_field', ['' => ''], old('work_field'), [
                                'class' => 'select2 job-fields',
                                'data-placeholder' => 'Pilih Bidang Pekerjaan',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Jenis Pekerjaan *</label>
                        <div class="col-md-8">
                            {!! Form::select('work_type', ['' => ''], old('work_type'), [
                                'class' => 'select2 job-types',
                                'data-placeholder' => 'Pilih Jenis Pekerjaan',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Pekerjaan *</label>
                        <div class="col-md-8">
                            {!! Form::select('work', ['' => ''], old('work'), [
                                'class' => 'select2 jobs',
                                'data-placeholder' => 'Pilih Pekerjaan',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Perusahaan *</label>
                        <div class="col-md-8">
                            {!! Form::text('company_name', old('company_name'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Jabatan *</label>
                        <div class="col-md-8">
                            {!! Form::text('position', old('position'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Lama Kerja *</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                {!! Form::text('year_old', old('year_old'), [
                                    'class' => 'form-control numeric', 'maxlength' => 2
                                ]) !!}
                                <span class="input-group-addon">Tahun</span>

                                {!! Form::text('mount_old', old('mount_old'), [
                                    'class' => 'form-control numeric', 'maxlength' => 2
                                ]) !!}
                                <span class="input-group-addon">Bulan</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Alamat Kantor *</label>
                        <div class="col-md-8">
                            {!! Form::textarea('office_address', old('office_address'), [
                                'class' => 'form-control', 'rows' => 3, 'style' => 'resize: none;'
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>