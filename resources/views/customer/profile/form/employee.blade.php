<div class="col-md-12">
    <div class="panel panel-blue">
        <div class="panel-heading" data-toggle="collapse" data-target="#employee-data">
            <h3 class="panel-title text-uppercase">
                Data Pekerjaan
                
                <div class="pull-right">
                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                </div>
            </h3>
        </div>
        <div id="employee-data" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Bidang Pekerjaan *:</label>
                            <div class="col-md-8">
                                {!! Form::select('work_field', ['' => ''] + [
                                    $customer->work_field_id ?: old('work_field') => $customer->work_field ?: old('work_field_name')
                                ], old('work_field'), [
                                    'class' => 'select2 job-fields',
                                    'data-option' => $customer->work_field_id ?: old('work_field'),
                                    'data-placeholder' => 'Pilih Bidang Pekerjaan',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Jenis Pekerjaan *:</label>
                            <div class="col-md-8">
                                {!! Form::select('work_type', ['' => ''] + [
                                    $customer->type_id ?: old('work_type') => $customer->type_id ?: old('work_type_name')
                                ], old('work_type'), [
                                    'class' => 'select2 job-types',
                                    'data-option' => $customer->type_id ?: old('work_type'),
                                    'data-placeholder' => 'Pilih Jenis Pekerjaan',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Pekerjaan *:</label>
                            <div class="col-md-8">
                                {!! Form::select('work', ['' => ''] + [
                                    $customer->work_id ?: old('work') => $customer->work ?: old('work_name')
                                ], old('work'), [
                                    'class' => 'select2 jobs',
                                    'data-option' => $customer->work_id ?: old('work'),
                                    'data-placeholder' => 'Pilih Pekerjaan',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Jabatan *:</label>
                            <div class="col-md-8">
                                {!! Form::select('position', ['' => ''] + [
                                    $customer->position_id ?: old('position') => $customer->position ?: old('position_name')
                                ], old('position'), [
                                    'class' => 'select2 positions',
                                    'data-option' => $customer->position_id ?: old('position'),
                                    'data-placeholder' => 'Pilih Jabatan',
                                ]) !!}
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Perusahaan *:</label>
                            <div class="col-md-8">
                                {!! Form::text('company_name', old('company_name'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Lama Kerja *:</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::text('work_duration', old('work_duration'), [
                                        'class' => 'form-control numeric', 'maxlength' => 2
                                    ]) !!}
                                    <span class="input-group-addon">Tahun:</span>

                                    {!! Form::text('work_duration_month', old('work_duration_month'), [
                                        'class' => 'form-control numeric', 'maxlength' => 2, 'id' => 'work_mount'
                                    ]) !!}
                                    <span class="input-group-addon">Bulan</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Alamat Kantor *:</label>
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
</div>