{!! Form::open(['route' => 'auth.password.reset', 'class' => 'callus clearfix', 'id' => 'form-reset-password']) !!}

    <div class="single-query form-group col-sm-12">
        {!! Form::email('email', old('email'), [ 
            'class' => 'keyword-input',
            'placeholder' => 'Masukan email anda'
        ]) !!}
    </div>
     @include('form._input_long_lat')
    <div class=" col-sm-12">
        <input type="submit" value="Ubah Password" class="btn-slide border_radius">
    </div>

{!! Form::close() !!}