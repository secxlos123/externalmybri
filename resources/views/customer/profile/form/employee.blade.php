<div class="col-md-12">
    <div class="panel panel-blue">
        <div class="panel-heading">
            <h3 class="panel-title text-uppercase">Data Pekerjaan</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Jenis Pekerjaan *:</label>
                        <div class="col-md-8">
                            {!! Form::select('work_type', ['' => ''], old('work_type'), [
                                'class' => 'select2 work_type',
                                'data-placeholder' => '-- Pilih Pekerjaan --',
                                'style' => 'width: 100%'
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Pekerjaan *:</label>
                        <div class="col-md-8">
                            <input name="work" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama Perusahaan *:</label>
                        <div class="col-md-8">
                            <input name="company_name" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Bidang Pekerjaan *:</label>
                        <div class="col-md-8">
                            <input name="work_field" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Jabatan *:</label>
                        <div class="col-md-8">
                            <input name="position" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Lama Kerja *:</label>
                        <div class="col-md-8">
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="work_duration" maxlength="3" min="0">
                            </div>
                            <label class="col-md-2 control-label">Tahun</label>
                            <div class="col-md-4">
                                <input type="number" class="form-control" name="work_duration" maxlength="2" min="0" max="11">
                            </div>
                            <label class="col-md-1 control-label">Bulan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Alamat Kantor *:</label>
                        <div class="col-md-8">
                            <textarea name="office_address" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>