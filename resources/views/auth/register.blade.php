{!! Form::open(['route' => 'auth.register.store', 'class' => 'callus clearfix', 'id' => 'form-register-store']) !!}
    
    {!! Form::hidden('register', 'register') !!}

    <div class="single-query form-group col-sm-12">
        {!! Form::text('fullname', old('fullname'), [ 'class' => 'keyword-input', 'placeholder' => 'Nama Lengkap' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::email('email', old('email'), [ 'class' => 'keyword-input', 'placeholder' => 'Email' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::text('phone', old('phone'), [ 'class' => 'keyword-input', 'placeholder' => 'Phone ( Optional )' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::password('password', [ 'class' => 'keyword-input', 'placeholder' => 'Kata Sandi' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::password('password_confirmation', [ 'class' => 'keyword-input', 'placeholder' => 'Ulangi Kata Sandi' ]) !!}
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        <div class="query-submit-button">
            <input type="submit" value="Buat Akun" class="btn-slide">
        </div>
    </div>

{!! Form::close() !!}