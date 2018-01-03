{!! Form::open(['route' => 'auth.login', 'class' => 'callus clearfix', 'id' => 'form-login']) !!}

    <div class="single-query form-group col-sm-12">
        {!! Form::email('email', old('email'), [ 'class' => 'keyword-input', 'placeholder' => 'Email' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::password('password', [ 'class' => 'keyword-input', 'placeholder' => 'Kata Sandi' ]) !!}

    </div>
    @include('form._input_long_lat')
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-6 text-right">
                <a href="#reset" aria-controls="reset" id="btn-reset" role="tab" data-toggle="tab" class="lost-pass">Lupa Password?</a>
            </div>
        </div>
    </div>

    <div class=" col-sm-12">
        <input type="submit" value="Masuk" class="btn-slide border_radius">
    </div>
{!! Form::close() !!}