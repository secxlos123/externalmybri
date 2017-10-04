{!! Form::open(['route' => 'auth.login', 'class' => 'callus clearfix', 'id' => 'form-login']) !!}

    <div class="single-query form-group col-sm-12">
        {!! Form::email('email', old('email'), [ 'class' => 'keyword-input', 'placeholder' => 'Email' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::password('password', [ 'class' => 'keyword-input', 'placeholder' => 'Kata Sandi' ]) !!}
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6 col-sm-offset-6 text-right">
                <a id="linkforgotpassword" href="javascript:void(0)" class="lost-pass">Lupa Password?</a>
            </div>
        </div>
    </div>

    <div class=" col-sm-12">
        <input type="submit" value="Masuk" class="btn-slide border_radius">
    </div>
{!! Form::close() !!}