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
                'placeholder' => 'Masukkan nama proyek tipe properti'
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
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan harga proyek tipe properti'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('surface_area') ? ' has-error' : '' }}">
            {!! Form::label('surface_area', 'Luas Tanah') !!}
            {!! Form::text('surface_area', old('surface_area'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan luas tanah'
            ]) !!}

            @if ($errors->has('surface_area'))
                <span class="help-block">
                    <strong>{{ $errors->first('surface_area') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('building_area') ? ' has-error' : '' }}">
            {!! Form::label('building_area', 'Luas Bangunan') !!}
            {!! Form::text('building_area', old('building_area'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan luas bangunan'
            ]) !!}

            @if ($errors->has('building_area'))
                <span class="help-block">
                    <strong>{{ $errors->first('building_area') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('electrical_power') ? ' has-error' : '' }}">
            {!! Form::label('electrical_power', 'Daya Listrik') !!}
            {!! Form::text('electrical_power', old('electrical_power'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan daya listrik'
            ]) !!}

            @if ($errors->has('electrical_power'))
                <span class="help-block">
                    <strong>{{ $errors->first('electrical_power') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="single-query form-group bottom20
            {{ $errors->has('certificate') ? ' has-error' : '' }}">
            {!! Form::label('certificate', 'Jenis Sertifikat') !!}
            {!! Form::text('certificate', old('certificate'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan jenis sertifikat'
            ]) !!}

            @if ($errors->has('certificate'))
                <span class="help-block">
                    <strong>{{ $errors->first('certificate') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('floors') ? ' has-error' : '' }}">
            {!! Form::label('floors', 'Jumlah Lantai') !!}
            {!! Form::text('floors', old('floors'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan jumlah lantai'
            ]) !!}

            @if ($errors->has('floors'))
                <span class="help-block">
                    <strong>{{ $errors->first('floors') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('bedroom') ? ' has-error' : '' }}">
            {!! Form::label('bedroom', 'Kamar Tidur') !!}
            {!! Form::text('bedroom', old('bedroom'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan jumlah kamar tidur'
            ]) !!}

            @if ($errors->has('bedroom'))
                <span class="help-block">
                    <strong>{{ $errors->first('bedroom') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('bathroom') ? ' has-error' : '' }}">
            {!! Form::label('bathroom', 'Kamar Mandi') !!}
            {!! Form::text('bathroom', old('bathroom'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan jumlah kamar mandi'
            ]) !!}

            @if ($errors->has('bathroom'))
                <span class="help-block">
                    <strong>{{ $errors->first('bathroom') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('carport') ? ' has-error' : '' }}">
            {!! Form::label('carport', 'Garasi') !!}
            {!! Form::text('carport', old('carport'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan luas bangunan'
            ]) !!}

            @if ($errors->has('carport'))
                <span class="help-block">
                    <strong>{{ $errors->first('carport') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            @include('forms.dropzone', ['btn' => true])
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        @include('forms.dropzone', ['form' => true])
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
        $('.properties').dropdown('property');
    </script>
@endpush
