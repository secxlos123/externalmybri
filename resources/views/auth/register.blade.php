@if(Session::has('flash_message'))
    <div class="alert alert-danger"><em> {!! session('flash_message') !!}</em></div>
    <script>
        $(function() {
            $('#login-register').modal('show');
            $('ul.nav-tabs li').removeClass('active');
            $('ul.nav-tabs li.daftar a').trigger("click");
        });
    </script>
@endif
{!! Form::open(['route' => 'auth.register.store', 'class' => 'callus clearfix', 'id' => 'form-register-store']) !!}

    {!! Form::hidden('register', 'register') !!}

    <div class="single-query form-group col-sm-12">
        {!! Form::text('fullname', old('fullname'), [ 'class' => 'keyword-input', 'placeholder' => 'Nama Lengkap' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::email('email', old('email'), [ 'id' => 'email', 'class' => 'keyword-input', 'placeholder' => 'Email' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::text('mobile_phone', old('mobile_phone'), [
            'class' => 'keyword-input', 'placeholder' => 'No Handphone ( Optional )',
            'maxlength' => 12, 'minlength' => 9, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)'
        ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::password('password', [ 'class' => 'keyword-input', 'placeholder' => 'Kata Sandi' ]) !!}
    </div>

    <div class="single-query form-group col-sm-12">
        {!! Form::password('password_confirmation', [ 'class' => 'keyword-input', 'placeholder' => 'Ulangi Kata Sandi' ]) !!}
    </div>
    <div class="single-query form-group col-sm-12">
        {!! Recaptcha::render() !!}
    </div>
   @include('form._input_long_lat')
    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
        <div class="query-submit-button">
            <input type="submit" value="Buat Akun" class="btn-slide">
        </div>
    </div>

{!! Form::close() !!}