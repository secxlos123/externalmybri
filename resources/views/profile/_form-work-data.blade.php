<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Jenis Pekerjaan (*)</label>
            @if ($type != 'view')
            {!! Form::select('type_id', (old('type_id')) ? old('type_id') : [$results['work']['type_id'] => $results['work']['type']], old('type_id'), [
                'class' => 'form-control select2 work_type',
                'data-placeholder' => 'Pilih Jenis Pekerjaan',
            ]) !!}
            <input type="hidden" name="type" id="work_type" value="{{isset($results['work']['type']) ? $results['work']['type'] : old('work_type')}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['type']) ? $results['work']['type'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Pekerjaan (*)</label>
            @if ($type != 'view')
            {!! Form::select('work_id', (old('work_id')) ? old('work_id') : [$results['work']['work_id'] => $results['work']['work']], old('work_id'), [
                'class' => 'form-control select2 jobs',
                'data-placeholder' => 'Pilih Pekerjaan',
            ]) !!}
            <input type="hidden" name="work" id="work_job" value="{{isset($results['work']['type']) ? $results['work']['work'] : old('work_job')}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['work']) ? $results['work']['work'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Nama Perusahaan (*)</label>
            @if ($type != 'view')
            <input type="text" class="form-control" name="company_name" id="company_name" value="{{isset($results['work']['company_name']) ? $results['work']['company_name'] : old('company_name')}}">
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
            {!! Form::select('position_id', (old('position_id')) ? old('position_id') : [$results['work']['position_id'] => $results['work']['position']], old('position_id'), [
                'class' => 'form-control select2 positions',
                'data-placeholder' => 'Pilih Jabatan',
            ]) !!}
            <input type="hidden" name="position" id="position" value="{{isset($results['work']['type']) ? $results['work']['position'] : old('position')}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['position']) ? $results['work']['position'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Bidang Pekerjaan (*)</label>
            @if ($type != 'view')
            {!! Form::select('work_field_id', (old('work_field_id')) ? old('work_field_id') : [$results['work']['work_field_id'] => $results['work']['work_field']], old('work_field_id'), [
                'class' => 'form-control select2 jobFields',
                'data-placeholder' => 'Pilih Bidang',
            ]) !!}
            <input type="hidden" name="work_field" id="work_field" value="{{isset($results['work']['work_field']) ? $results['work']['work_field'] : old('work_field')}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['work_field']) ? $results['work']['work_field'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group for-long-year bottom20">
            <label>Lama Kerja (*)</label>
            <div class="input-group bottom10">
            @if ($type != 'view')
                <input type="number" class="form-control" name="work_duration" id="work_duration" value="{{isset($results['work']['work_duration']) ? $results['work']['work_duration'] : old('work_duration')}}" min="0" maxlength="2">
                <span class="input-group-addon">Tahun</span>
                <input type="number" class="form-control" name="work_duration_month" id="work_duration_month" value="{{isset($results['work']['work_duration_month']) ? $results['work']['work_duration_month'] : old('work_duration_month')}}" min="0" maxlength="2">
                <span class="input-group-addon">Bulan</span>
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['work']['work_duration']) ? $results['work']['work_duration'] . ' Tahun' : ''}} {{isset($results['work']['work_duration_month']) ? $results['work']['work_duration_month'] . ' Bulan' : ''}}
            </span>
            @endif
            </div>
        </div>

        <div class="single-query form-group bottom20">
            <label>Alamat Kantor (*)</label>
            @if ($type != 'view')
            <textarea class="form-control" rows="3" name="office_address" value="{{isset($results['work']['office_address']) ? $results['work']['office_address'] : old('office_address')}}">{{isset($results['work']['office_address']) ? $results['work']['office_address'] : old('office_address')}}</textarea>
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
                <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile') : url('profile/work')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
                <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
            </div>
        </div>
    @else
        @if(!empty($results['is_approved']['status']))
            @if($results['is_approved']['status'] == false)
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-primary waves-light waves-effect w-md m m-b-20" disabled="disabled">Ubah</button>
            </div>
        </div>
            @elseif($results['is_approved']['status'] == true)
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/ubah') : url('profile/ubah/work')}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Ubah</a>
            </div>
        </div>
            @endif
        @elseif($results['is_approved'] == null)
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/ubah') : url('profile/ubah/work')}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Ubah</a>
            </div>
        </div>
        @endif
    @endif
</div>