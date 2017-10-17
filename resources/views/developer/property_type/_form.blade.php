{!! Form::hidden('disk', 'property_types') !!}

<div class="row top20">
    <div class="col-md-5 col-md-offset-1">
        <div class="single-query form-group bottom20
            {{ $errors->has('property_id') ? ' has-error' : '' }}">
            {!! Form::label('property_id', 'Nama Proyek') !!}

            @if ( ! isset($type->property_id) )
                {!! Form::select('property_id', ['' => ''], old('property_id'), [
                    'class' => 'select2 properties',
                    'data-placeholder' => 'Pilih Nama Proyek'
                ]) !!}
            @else
                {!! Form::text('property_name', old('property_name'), ['class' => 'keyword-input', 'disabled']) !!}
                {!! Form::hidden('property_id', old('property_id')) !!}
            @endif

            @if ($errors->has('property_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('property_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nama Proyek Tipe') !!}
            {!! Form::text('name', old('name'), [
                'class' => 'keyword-input',
            ]) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Harga Proyek Tipe') !!}
            <div class="input-group">
                <span class="input-group-addon">Rp</span>
                {!! Form::text('price', old('price'), [
                    'class' => 'keyword-input numeric currency', 'maxlength' => 15
                ]) !!}
            </div>

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="single-query">
            <div class="form-group bottom20 col-sm-6 {{ $errors->has('surface_area') ? ' has-error' : '' }}"
                style="padding-left: unset;">

                {!! Form::label('surface_area', 'Luas Tanah') !!}
                <div class="input-group">
                    {!! Form::text('surface_area', old('surface_area'), [
                        'class' => 'keyword-input numeric',
                    ]) !!}
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>

                @if ($errors->has('surface_area'))
                    <span class="help-block">
                        <strong>{{ $errors->first('surface_area') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group bottom20 col-sm-6 {{ $errors->has('building_area') ? ' has-error' : '' }}"
                style="padding-right: unset;">
                {!! Form::label('building_area', 'Luas Bangunan') !!}
                <div class="input-group">
                    {!! Form::text('building_area', old('building_area'), [
                        'class' => 'keyword-input numeric',
                    ]) !!}
                    <span class="input-group-addon">m<sup>2</sup></span>
                </div>

                @if ($errors->has('building_area'))
                    <span class="help-block">
                        <strong>{{ $errors->first('building_area') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="single-query">
            <div class="col-sm-6 form-group bottom20 {{ $errors->has('electrical_power') ? ' has-error' : '' }}"
                style="padding-left: unset;">            
                {!! Form::label('electrical_power', 'Daya Listrik') !!}
                <div class="input-group">
                    {!! Form::text('electrical_power', old('electrical_power'), [
                        'class' => 'keyword-input numeric',
                    ]) !!}
                    <span class="input-group-addon">watt</span>
                </div>

                @if ($errors->has('electrical_power'))
                    <span class="help-block">
                        <strong>{{ $errors->first('electrical_power') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-sm-6 form-group bottom20 {{ $errors->has('floors') ? ' has-error' : '' }}"
                style="padding-right: unset;">
                {!! Form::label('floors', 'Jumlah Lantai') !!}
                <div class="input-group">
                    {!! Form::text('floors', old('floors'), [
                        'class' => 'keyword-input numeric',
                    ]) !!}
                    <span class="input-group-addon">lantai</span>
                </div>

                @if ($errors->has('floors'))
                    <span class="help-block">
                        <strong>{{ $errors->first('floors') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="single-query form-group bottom20
            {{ $errors->has('certificate') ? ' has-error' : '' }}">
            {!! Form::label('certificate', 'Jenis Sertifikat') !!}
            {!! Form::select('certificate', [
                'SHM'   => 'SHM (Sertifikat Hak Milik)',
                'SHGB'  => 'SHGB (Sertifikat Hak Guna Bangunan)',
                'SHSRS' => 'SHSRS (Sertifikat Hak Satuan Rumah Susun)'
            ], old('certificate'), [
                'class' => 'select2 keyword-input'
            ]) !!}

            @if ($errors->has('certificate'))
                <span class="help-block">
                    <strong>{{ $errors->first('certificate') }}</strong>
                </span>
            @endif
        </div>

        <div class="single-query">
            <div class="col-sm-6 form-group bottom20 {{ $errors->has('bedroom') ? ' has-error' : '' }}"
                style="padding-left: unset;">
                {!! Form::label('bedroom', 'Kamar Tidur') !!}
                {!! Form::text('bedroom', old('bedroom'), [
                    'class' => 'keyword-input numeric',
                ]) !!}

                @if ($errors->has('bedroom'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bedroom') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-sm-6 form-group bottom20 {{ $errors->has('bathroom') ? ' has-error' : '' }}"
                style="padding-right: unset;">
                {!! Form::label('bathroom', 'Kamar Mandi') !!}
                {!! Form::text('bathroom', old('bathroom'), [
                    'class' => 'keyword-input numeric',
                ]) !!}

                @if ($errors->has('bathroom'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bathroom') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="single-query form-group bottom20
            {{ $errors->has('carport') ? ' has-error' : '' }}">
            {!! Form::label('carport', 'Garasi') !!}
            {!! Form::select('carport', [0 => 'Tidak Tersedia', 1 => 'Tersedia'], old('carport'), [
                'class' => 'select2 keyword-input',
            ]) !!}

            @if ($errors->has('carport'))
                <span class="help-block">
                    <strong>{{ $errors->first('carport') }}</strong>
                </span>
            @endif
        </div>

    </div>
    <div class="col-md-10 col-md-offset-1">

        <div class="single-query form-group bottom20">
            @include('additional-forms.dropzone', ['btn' => true])
        </div>

        @include('additional-forms.dropzone', ['form' => true])
    </div>
</div>


@push( 'styles' )
    {!! Html::style( 'assets/css/dropzone.min.css' ) !!}
    {!! Html::style( 'assets/css/select2.min.css' ) !!}
    {!! Html::style( 'css/style-dropzone.min.css' ) !!}
@endpush

@push( 'scripts' )
    {!! Html::script( 'assets/js/dropzone.min.js' ) !!}
    {!! Html::script( 'assets/js/select2.min.js' ) !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script( 'js/dropdown.min.js' ) !!}
    {!! Html::script( 'js/main-dropzone.min.js' ) !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\PropertyType\CreateRequest::class, '#form-proyek-type') !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">
        $('.select2').select2({ witdh : '100%' });
        $('.properties').dropdown('property');
    </script>
@endpush
