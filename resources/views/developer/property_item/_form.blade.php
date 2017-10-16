<div class="row top20">
    <div class="col-md-5 col-md-offset-1">
        <div class="single-query form-group bottom20
            {{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', 'Alamat') !!}
            {!! Form::text('address', old('address'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan alamat properti'
            ]) !!}

            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Harga') !!}
            <div class="input-group">
            <span class="input-group-addon">Rp</span>
            {!! Form::text('price', old('price'), [
                'class' => 'form-control numericOnly',
                'placeholder' => 'Masukkan harga properti',
                'maxlength' => '12'
            ]) !!}
            <span class="input-group-addon">,00</span>
            </div>
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>

        <div class="single-query form-group bottom20
            {{ $errors->has('status') ? ' has-error' : '' }}">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', [
                '' => '-- Pilih Status --',
                'new' => 'Baru',
                'second' => 'Bekas'
                ], old('status'), [
                'class' => 'status',
            ]) !!}

            @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
         <div class="single-query form-group bottom20
            {{ $errors->has('property') ? ' has-error' : '' }}">
            {!! Form::label('property', 'Property') !!}
            {!! Form::select('property', [], old('property'), [
                'class' => 'select2 properties',
                'data-placeholder' => '-- Pilih Property --'
            ]) !!}

            @if ($errors->has('property'))
                <span class="help-block">
                    <strong>{{ $errors->first('property') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('property_type_id') ? ' has-error' : '' }}">
            {!! Form::label('property_type_id', 'Property Type') !!}
            {!! Form::select('property_type_id', [], old('property_type_id'), [
                'class' => 'select2 property_type',
                'data-placeholder' => '-- Pilih Property Type --'
            ]) !!}

            @if ($errors->has('property_type_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('property_type_id') }}</strong>
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
    {!! JsValidator::formRequest(App\Http\Requests\Developer\PropertyItem\CreateRequest::class, '#form-proyek-item') !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">
        $('.properties').dropdown('property');

        $('.properties').on('change', function(){
            var id = $(this).val();
            $('.property_type').dropdown('types', {prop_id : id});
        });
    </script>
@endpush