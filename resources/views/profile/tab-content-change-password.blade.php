@if (session('authenticate.role') != 'developer')
    {!! Form::open(['route' => 'profile.change-password', 'class' => 'callus clearfix', 'id' => 'form-change-password-store']) !!}
@else
    {!! Form::open(['route' => 'developer.profile.change-password', 'class' => 'callus clearfix', 'id' => 'form-change-password-store']) !!}
@endif
    <div class="col-md-12">
        <div class="single-query form-group bottom20">
            <label>Password Lama (*)</label>
            {!! Form::password('old_password', [ 'class' => 'keyword-input', 'placeholder' => 'Kata Sandi lama' ]) !!}
        </div>

        <div class="single-query form-group bottom20">
            <label>Password Baru (*)</label>
            {!! Form::password('password', [ 'class' => 'keyword-input', 'placeholder' => 'Kata Sandi' ]) !!}
        </div>

        <div class="single-query form-group bottom20">
            <label>Konfirmasi Password Baru (*)</label>
            {!! Form::password('password_confirmation', [ 'class' => 'keyword-input', 'placeholder' => 'Ulangi Kata Sandi' ]) !!}
        </div>
    </div>
    @include('form._input_long_lat')
    <div class="col-md-12">
        <div class="pull-right">
            <button type="submit" class="btn btn-primary waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i>Simpan</button>
        </div>
    </div>
{!! Form::close() !!}