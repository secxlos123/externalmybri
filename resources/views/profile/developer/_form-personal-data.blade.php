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
            {!! Form::select('city_id', ['' => ''], (old('city_id')) ? old('city_id') : @$results['city_id'], [
                'class' => 'form-control select2 cities',
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
                'class' => 'form-control', 'readonly', 'style' => 'text-transform: none;'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{@$results['email']}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>No Telepon</label>
            @if ($type != 'view')
            {!! Form::text('phone', (old('phone')) ? old('phone') : @$results['phone'], [
                'class' => 'form-control numeric', 'maxlength' => 16, 'minlength' => 7
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{@$results['phone']}}
            </span>
            @endif
        </div>

         <div class="single-query form-group bottom20">
            <label>No Handphone (*)</label>
            @if ($type != 'view')
            {!! Form::text('mobile_phone', (old('mobile_phone')) ? old('mobile_phone') : @$results['mobile_phone'], [
                'class' => 'form-control numeric', 'maxlength' => 16, 'minlength' => 7
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{@$results['mobile_phone']}}
            </span>
            @endif
        </div>

        @if ($type != 'view')
        <div class="single-query form-group bottom20 has-upload-file">
            <label>Foto (*)</label>
            {!! Form::file('image', [
                'class' => 'filestyle', 'data-target' => 'ktp_preview',
                'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
            ]) !!}
        </div>
        @endif

        @if ( $type != 'view')

            <div class="single-query form-group bottom20">
                <label>Foto</label>
                {!! Html::image(image_checker(@$results['image']), 'Foto', [
                    'class' => 'img-responsive', 'width' => 300, 'id' => 'ktp_preview',
                    'data-src' => asset('assets/images/no-image.jpg')
                ]) !!}
            </div>

        @endif
    </div>
    @if ($type != 'view')
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile') : url('profile')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
            <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
        </div>
    </div>
    @endif
</div>