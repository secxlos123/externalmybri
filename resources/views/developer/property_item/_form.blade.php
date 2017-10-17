{!! Form::hidden('disk', 'property-item') !!}

<div class="row top20">
    <div class="col-md-5 col-md-offset-1">
         
         <div class="single-query form-group bottom20 {{ $errors->has('property') ? ' has-error' : '' }}">
            {!! Form::label('property', 'Proyek') !!}
            
            @if ( ! isset($unit->property_id) )
                {!! Form::select('property', ['' => ''], old('property'), [
                    'class' => 'select2 properties',
                    'data-placeholder' => 'Pilih Proyek'
                ]) !!}
            @else
                {!! Form::text('property_name', old('property_name'), ['class' => 'keyword-input', 'disabled']) !!}
            @endif


            @if ($errors->has('property'))
                <span class="help-block">
                    <strong>{{ $errors->first('property') }}</strong>
                </span>
            @endif
        </div>

        <div class="single-query form-group bottom20 {{ $errors->has('property_type_id') ? ' has-error' : '' }}">
            {!! Form::label('property_type_id', 'Tipe Proyek') !!}
            
            @if ( ! isset($unit->property_type_id) )
                {!! Form::select('property_type_id', ['' => ''], old('property_type_id'), [
                    'class' => 'select2 property_type',
                    'data-placeholder' => 'Pilih Tipe Proyek'
                ]) !!}
            @else
                {!! Form::text('property_type_name', old('property_type_name'), ['class' => 'keyword-input', 'disabled']) !!}
                {!! Form::hidden('property_type_id') !!}
            @endif


            @if ($errors->has('property_type_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('property_type_id') }}</strong>
                </span>
            @endif
        </div>

    </div>

    <div class="col-md-5">
        <div class="single-query form-group bottom20 {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Harga') !!}

            <div class="input-group">
                <span class="input-group-addon">Rp</span>
                {!! Form::text('price', old('price'), [
                    'class' => 'form-control numeric currency',
                    'placeholder' => 'Masukkan harga properti',
                    'maxlength' => 15
                ]) !!}
            </div>

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>

        <div class="single-query form-group bottom20 {{ $errors->has('status') ? ' has-error' : '' }}">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', [
                'new' => 'Baru',
                'second' => 'Bekas'
            ], old('status'), [
                'class' => 'select2 status',
            ]) !!}

            @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>

        @if ( isset($unit->id) )
            <div class="single-query form-group bottom20 {{ $errors->has('is_available') ? ' has-error' : '' }}">
                {!! Form::label('is_available', 'Is Avaliable') !!}
                {!! Form::select('is_available', [
                    '0' => 'Not Avaliable',
                    '1' => 'Avaliable'
                ], old('is_available'), [
                    'class' => 'select2 is_available',
                ]) !!}

                @if ($errors->has('is_available'))
                    <span class="help-block">
                        <strong>{{ $errors->first('is_available') }}</strong>
                    </span>
                @endif
            </div>
        @endif
    </div>
    
    <div class="col-md-10 col-md-offset-1">
        <div class="single-query form-group bottom20 {{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', 'Alamat') !!}
            {!! Form::textarea('address', old('address'), [
                'class' => 'form-control keyword-input', 'rows' => 3,
                'placeholder' => 'Masukkan alamat properti'
            ]) !!}

            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>

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
    {!! JsValidator::formRequest(App\Http\Requests\Developer\PropertyItem\CreateRequest::class, '#form-proyek-item') !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">
        $('.select2').select2({width: '100%'});

        $('.properties').dropdown('property')
            .on('select2:select', set_property_type)
            .on('select2:unselect', unset_property_type);

        function set_property_type(e) {
            var id = $(this).val();
            $('.property_type').empty().dropdown('types', {prop_id : id});
        }

        function unset_property_type(e) {
            $('.property_type').empty().select2({width: '100%'});
        }
    </script>
@endpush