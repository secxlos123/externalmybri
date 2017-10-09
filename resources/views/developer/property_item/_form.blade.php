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
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input numericOnly currency-rp',
                'placeholder' => 'Masukkan harga properti',
                'maxlength' => '12'
            ]) !!}

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
                '' => '',
                'new' => 'Baru',
                'second' => 'Bekas'
                ], old('status'), [
                'class' => 'select2 status',
                'data-placeholder' => '-- Pilih Status --'
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
                'class' => 'select2 property',
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
        <div class="form-group custom-uploader {{ $errors->has('photo') ? ' has-error' : '' }}">
            {!! Form::label('photo', 'Foto', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-8">
                {!! Form::file('photo', old('photo'), ['class' => 'filestyle']) !!}
            </div>

            <div class="clearfix"></div>
            @if ($errors->has('photo'))
                <span class="help-block">
                    <strong>{{ $errors->first('photo') }}</strong>
                </span>
            @endif
      </div>
    </div>
</div>