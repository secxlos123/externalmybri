<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Jenis Pekerjaan (*)</label>
            @if ($type != 'view')
            {!! Form::select('type_id', ['' => ''], old('type_id'), [
                'class' => 'form-control select2 work_type',
                'data-placeholder' => 'Pilih Jenis Pekerjaan',
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['type']) ? $results['work']['type'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Pekerjaan (*)</label>
            @if ($type != 'view')
            {!! Form::select('work_id', ['' => ''], old('work_id'), [
                'class' => 'form-control select2 jobs',
                'data-placeholder' => 'Pilih Pekerjaan',
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['work']) ? $results['work']['work'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Nama Perusahaan (*)</label>
            @if ($type != 'view')
            <input type="text" class="form-control" name="company_name" id="company_name">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['company_name']) ? $results['work']['company_name'] : ''}}
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Jabatan (*)</label>
            @if ($type != 'view')
            {!! Form::select('position_id', ['' => ''], old('position_id'), [
                'class' => 'form-control select2 positions',
                'data-placeholder' => 'Pilih Jabatan',
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['position']) ? $results['work']['position'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Kewarganegaraan (*)</label>
            @if ($type != 'view')
            {!! Form::select('citizenship_id', ['' => ''], old('citizenship_id'), [
                'class' => 'form-control select2 citizenships',
                'data-placeholder' => 'Pilih Negara',
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['citizenship']) ? $results['personal']['citizenship'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group for-long-year bottom20">
            <label>Lama Kerja (*)</label>
            <div class="input-group bottom10">
            @if ($type != 'view')
                <input type="number" class="form-control" name="work_duration" id="work_duration">
                <span class="input-group-addon">Tahun</span>
            @else
            <span class="form-control" style="border: 0px;">
                {{($results['work']['work_duration']) ? $results['work']['work_duration'] : '0'}} Tahun {{($results['work']['work_duration_month']) ? $results['work']['work_duration_month'] : '0'}} Bulan
            </span>
            @endif
            </div>
            <div class="input-group">
            @if ($type != 'view')
                <input type="number" class="form-control" name="work_duration_month" id="work_duration_month">
                <span class="input-group-addon">Bulan</span>
            @endif
            </div>
        </div>

        <div class="single-query form-group bottom20">
            <label>Alamat Kantor (*)</label>
            @if ($type != 'view')
            <textarea class="form-control" rows="3" name="office_address"></textarea>
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['office_address']) ? $results['work']['office_address'] : ''}}
            </span>
            @endif
        </div>
    </div>
    @if ($type != 'view')
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile') : url('profile')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
            <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
        </div>
    </div>
    @endif
</div>