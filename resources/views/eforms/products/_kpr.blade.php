@if (false)
    <div class="row">
        <div class="col-md-12">
            @include('eforms.products._product-description')
        </div>
    </div>

    <hr>
@endif
<div class="row">
    <div class="col-md-6">
         <div class="form-group kpr_type {!! $errors->has('kpr_type') ? 'has-error' : '' !!}">
            <label class="control-label col-md-4">Jenis KPR *: </label>
            <div class="col-md-8">
            <?php $rumahcom = $results['userdeveloper']['bound_project'] ? $results['userdeveloper']['bound_project'] : 0;  ?>
            @if ('developer-sales' != session('authenticate.role'))
                {!! Form::select('status_property', array("" => "", "1" => "Baru", "2" => "Secondary", "3" => "Refinancing", "4" => "Renovasi", "5" => "Top Up", "6" => "Take Over", "7" => "Take Over Top Up", "8" => "Take Over Account In House (Cash Bertahap)"), old('status_property'), [
                    'class' => 'select2 status_property ',
                    'data-placeholder' => 'Pilih Jenis KPR',
                    'data-bri' => '',
                    'id' => 'kpr_type',
                    'data-id' => 'kpr_type',
                ]) !!}
            @else
                @if($rumahcom == 0)
                    {!! Form::select('status_property', array("" => "", "1" => "Baru", "2" => "Secondary", "3" => "Refinancing", "4" => "Renovasi", "5" => "Top Up", "6" => "Take Over", "7" => "Take Over Top Up", "8" => "Take Over Account In House (Cash Bertahap)"), old('status_property'), [
                    'class' => 'select2 status_property ',
                    'data-placeholder' => 'Pilih Jenis KPR',
                    'data-bri' => '',
                    'id' => 'kpr_type',
                    'data-id' => 'kpr_type',
                ]) !!}
                @else
                {!! Form::select('status_property', array("1" => "Baru"), old('status_property'), [
                    'class' => 'select2 status_property ',
                    'data-placeholder' => 'Pilih Jenis KPR',
                    'data-bri' => ''
                ]) !!}
                @endif
            @endif
                <p>Wajib diisi</p>
                @if ($errors->has('kpr_type')) <p class="help-block">{{ $errors->first('kpr_type') }}</p> @endif
            </div>
        </div>

        <div class="form-group developer developer-group" hidden>
            <label class="control-label col-md-4">Developer *:</label>
            <div class="col-md-8">
            @if ('developer-sales' != session('authenticate.role'))
                {!! Form::select('developer', isset($param['developer_id']) ? [@$param['developer_id'] => @$param['developer_name']] : [''=>''] + [
                   old('developer') => old('developer_name')
                ], old('developer'), [
                    'class' => 'select2 developers ',
                    'data-option' => old('developer'),
                    'data-placeholder' => 'Pilih Developer',
                    'id' => 'developer',
                    'data-id' => 'developer'
                ]) !!}
            @else
                @if($rumahcom == 0)
                {!! Form::select('developer', isset($param['developer_id']) ? [@$param['developer_id'] => @$param['developer_name']] : [''=>''] + [
                   old('developer') => old('developer_name')
                ], old('developer'), [
                    'class' => 'select2 developers ',
                    'data-option' => old('developer'),
                    'data-placeholder' => 'Pilih Developer',
                    'id' => 'developer',
                    'data-id' => 'developer'
                ]) !!}
                @else
                {!! Form::select('developer', isset($results['userdeveloper']['admin_developer_id']) ? [@$results['userdeveloper']['admin_developer_id'] => @$results['developer']['company_name']] : [''=>''] + [
                   old('developer') => old('developer_name')
                ], old('developer'), [
                    'class' => 'select2 dev_name',
                    'data-option' => old('developer'),
                    'data-placeholder' => 'Pilih Developer',
                ]) !!}
                @endif
            @endif
                <p>Wajib diisi</p>
            </div>
        </div>

        <div class="form-group kpr_type_property {!! $errors->has('kpr_type_property') ? 'has-error' : '' !!}">
            <label class="control-label col-md-4">Jenis Properti *:</label>
            <div class="col-md-8">
                {!! Form::select('kpr_type_property', array("" => "", "1" => "Rumah Tapak", "2" => "Rumah Susun/Apartment", "3" => "Rumah Toko"), old('kpr_type_property'), [
                    'class' => 'select2 kpr_type_properties ',
                    'data-placeholder' => 'Pilih Jenis Properti',
                    'data-bri' => '',
                    'id' => 'kpr_type_property',
                    'data-id' => 'kpr_type_property'
                ]) !!}
                <p>Wajib diisi</p>
                @if ($errors->has('kpr_type_property')) <p class="help-block">{{ $errors->first('kpr_type_property') }}</p> @endif
            </div>
        </div>

        <div class="form-group property-select property property-group" hidden>
            <label class="control-label col-md-4">Nama Proyek *:</label>
            <div class="col-md-8">
                {!! Form::select('property', isset($param['property_id']) ? [@$param['property_id']=>@$param['property_name']] : ['' => ''] + [
                    old('property') => old('property_name')
                ], old('property'), [
                    'class' => 'select2 properties',
                    'data-option' => old('property'),
                    'data-placeholder' => 'Pilih Nama Proyek',
                    'id' => 'property',
                    'data-id' => 'property'
                ]) !!}
                <p>Wajib diisi</p>
            </div>
        </div>
        <div class="form-group types-select property_type" hidden>
            <label class="control-label col-md-4">Tipe Properti *:</label>
            <div class="col-md-8">
                {!! Form::select('property_type', isset($param['property_type_id']) ? [@$param['property_type_id']=>@$param['property_type_name']] : ['' => ''] + [
                   old('property_type') => old('property_type_name')
                ], old('property_type'), [
                    'class' => 'select2 types',
                    'data' => old('property_type'),
                    'data-placeholder' => 'Pilih Tipe Properti',
                    'id' => 'property_type',
                    'data-id' => 'property_type'
                    ]) !!}
                <p>Wajib diisi</p>
            </div>
        </div>
        <div class="form-group units-select property_unit" hidden>
            <label class="control-label col-md-4">Unit Properti *:</label>
            <div class="col-md-8">
                {!! Form::select('property_item', isset($param['property_item_address']) ? [@$param['property_item_id']=>@$param['property_item_address']] : ['' => ''] + [
                    old('property_item') => old('property_item_name')
                ], old('property_item'), [
                    'class' => 'select2 items',
                    'data-option' => old('property_item'),
                    'data-placeholder' => 'Pilih Unit Properti',
                    'id' => 'property_unit',
                    'data-id' => 'property_unit'
                ]) !!}
                <p>Wajib diisi</p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-4">Harga Rumah *:</label>
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    {!! Form::text('price', old('price'), [
                        'id' => 'price', 'class' => 'currency form-control calculate', 'maxlength' => 15, 'readonly'
                    ]) !!}
                </div>
                <p>Wajib diisi</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Luas Bangunan *:</label>
            <div class="col-md-8">
                <div class="input-group">
                    {!! Form::text('building_area', old('building_area'), [
                        'id' => 'building_area', 'class' => 'form-control calculate', 'readonly', 'onkeypress' => 'return goodchars(event, "1234567890 ", this)',
                        'maxlength' => 4
                    ]) !!}
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>
                <p>Wajib diisi</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Lokasi Rumah *:</label>
            <div class="col-md-8">
                {!! Form::textarea('home_location', old('home_location'), [
                    'id' => 'home_location', 'class' => 'form-control', 'rows' => 3, 'readonly',
                    'style' => 'resize: none;'
                ]) !!}
                <p>Wajib diisi</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Jangka Waktu *:</label>
            <div class="col-md-8">
                <div class="input-group">
                    {!! Form::text('year',old('year'), [
                        'class' => 'form-control calculate', 'id' => 'year', 'maxlength' => 3, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)',
                    ]) !!}
                    <span class="input-group-addon">Bulan</span>
                </div>
                <p>Wajib diisi</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">KPR Aktif ke *:</label>
            <div class="col-md-8">
                {!! Form::select('active_kpr', [ '' => '', '1' => '1', '2' => '2', '3' => '> 2' ], old('active_kpr'), [
                    'class' => 'select2 calculate',
                    'data-placeholder' => 'Pilih KPR',
                    'id' => 'active_kpr'
                ]) !!}
                <p>Wajib diisi</p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Uang Muka *:</label>
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    {!! Form::text('down_payment',old('down_payment'), [
                        'class' => 'form-control currency', 'id' => 'down_payment', 'maxlength' => 15
                    ]) !!}
                </div>
                <p>Wajib diisi</p>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <div class="input-group">
                    {!! Form::text('dp',old('dp'), [
                        'class' => 'form-control numeric calculate currency', 'id' => 'dp', 'maxlength' => 3
                    ]) !!}
                    <span class="input-group-addon">%</span>
                </div>
                <p>Wajib diisi</p>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-4">Jumlah Permohonan *:</label>
            <div class="col-md-8">
                <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    {!! Form::text('request_amount',old('request_amount'), [
                        'class' => 'form-control currency', 'id' => 'request_amount', 'readonly', 'maxlength' => 15
                    ]) !!}
                </div>
                <p>Wajib diisi</p>
            </div>
        </div>
    </div>
    @include('form._input_long_lat')
</div>