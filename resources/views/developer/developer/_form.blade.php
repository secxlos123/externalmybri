<div class="row top20">
    <div class="col-md-5 col-md-offset-1">
        <div class="single-query form-group bottom20
            {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nama') !!}
            {!! Form::text('name', old('name'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan nama developer'
            ]) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', old('email'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan email developer'
            ]) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="single-query form-group bottom20
            {{ $errors->has('birth_date') ? ' has-error' : '' }}">
            {!! Form::label('birth_date', 'Tanggal lahir') !!}
            {!! Form::text('birth_date', old('birth_date'), [
                'class' => 'form-control datepicker-date',
                'placeholder' => 'Masukkan tanggal lahir'
            ]) !!}

            @if ($errors->has('birth_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('birth_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('join_date') ? ' has-error' : '' }}">
            {!! Form::label('join_date', 'Tanggal gabung') !!}
            {!! Form::text('join_date', old('join_date'), [
                'class' => 'form-control datepicker-date',
                'placeholder' => 'Masukkan tanggal gabung'
            ]) !!}

            @if ($errors->has('join_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('join_date') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
