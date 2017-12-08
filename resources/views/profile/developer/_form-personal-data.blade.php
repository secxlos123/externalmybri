<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Nama (*)</label>
            @if ($type != 'view')
                {!! Form::text('name', @$results['developer_name'], [
                    'class' => 'form-control',
                    'style' => "text-transform:uppercase;"
                ]) !!}
            @else
                <span class="form-control" style="border: 0px;text-transform: uppercase;">
                    {{@$results['developer_name']}}
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
        <label>Nama Perusahaan</label>
        @if($type != 'view')
        {!! Form::text('company_name', (old('company_name')) ? old('company_name') : @$results['company_name'], [
                'class' => 'form-control', 'style' => 'text-transform: none;'
            ]) !!}
        {!! Form::hidden('summary', (old('company_name')) ? old('company_name') : @$results['summary'], [
                'class' => 'form-control', 'style' => 'text-transform: none;'
            ]) !!}
        @else
        <span class="form-control" style="border: 0px;text-transform: uppercase;">
                    {{@$results['company_name']}}
                </span>
        @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Alamat (*)</label>
            @if ($type != 'view')
                {!! Form::textarea('address', (old('address')) ? old('address') : @$results['address'], [
                    'class' => 'form-control',
                    'rows'  => 3,
                    'style' => 'resize: none'
                ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{@$results['address']}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Kota (*)</label>
            @if ($type != 'view')
             {!! Form::select('city_id', [@$results['city_id'] => @$results['city_name']], old('city_id'), [
                'class' => 'form-control select2 cities city',
                'data-placeholder' => 'Pilih Kota',
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{@$results['city_name']}}
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Email</label>
            @if ($type != 'view')
            {!! Form::email('email', (old('email')) ? old('email') : @$results['email'], [
                'class' => 'form-control', 'readonly', 'style' => 'text-transform: none;', 'id' => 'email'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{@$results['email']}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Nomor Hp</label>
            @if ($type != 'view')
            {!! Form::text('mobile_phone', (old('mobile_phone')) ? old('mobile_phone') : @$results['mobile_phone'], [
                'class' => 'form-control numeric', 'maxlength' => 12, 'minlength' => 7
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{@$results['mobile_phone']}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>No Telepon</label>
            @if ($type != 'view')
            {!! Form::text('phone', (old('phone')) ? old('phone') : @$results['phone'], [
                'class' => 'form-control numeric', 'maxlength' => 12, 'minlength' => 7
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{@$results['phone']}}
            </span>
            @endif
        </div>
    </div>
    @if ($type != 'view')
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/personal') : url('profile/personal')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
            <button type="submit" class="btn btn-primary waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
        </div>
    </div>
    @else
    <div class="col-md-12">
            <div class="pull-right">
                <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/ubah/personal') : url('profile/ubah/personal')}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Ubah</a>
            </div>
        </div>
    @endif
</div>