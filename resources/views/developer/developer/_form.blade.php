@if(!empty($id))
<?php
$id       = $data['contents']['userdeveloper']['user_id'];
$result   = $data['contents'];
$result2  = $data['contents']['userdeveloper'];
$name     = $result['first_name']." ".$result['last_name'];
?>
<?php
  function IndonesiaTgl($tanggal){
    $hari=substr($tanggal,8,2);
    $bln=substr($tanggal,5,2);
    $thn=substr($tanggal,0,4);
    $tanggal="$hari-$bln-$thn";
    return $tanggal;
}
?>
<div class="row top20">
    <div class="col-md-5 col-md-offset-1">
        <div class="single-query form-group bottom20
            {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nama') !!}
        @if($type != 'view') 
            {!! Form::text('name', $name, [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan nama developer'
            ]) !!}
        @else
            <p>{{ $name }}</p>
        @endif

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'Email') !!}
        @if($type != 'view')
            {!! Form::text('email', $result['email'], [
                'class' => 'form-control valid',
                'readonly' => 'readonly',
                'style' => 'background:lavender'
            ]) !!}
        @else
            <p>{{ $result['email'] }}</p>
        @endif
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('mobile_phone') ? ' has-error' : '' }}">
            {!! Form::label('mobile_phone', 'No Handphone') !!}
        @if($type != 'view')
            {!! Form::text('mobile_phone', $result['mobile_phone'], [
                'class' => 'keyword-input',
                'maxlength' => 12, 'minlength' => 9,
                'placeholder' => 'Masukkan No Handphone developer',
                'onkeypress' => 'return goodchars(event, "1234567890 ", this)'
            ]) !!}
        @else
            <p>{{ $result['mobile_phone'] }}</p>
        @endif

            @if ($errors->has('mobile_phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('mobile_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="single-query form-group bottom20
            {{ $errors->has('birth_date') ? ' has-error' : '' }}">
            {!! Form::label('birth_date', 'Tanggal lahir') !!}
        @if($type != 'view')
            {!! Form::text('birth_date', IndonesiaTgl($result2['birth_date']), [
                'class' => 'form-control datepicker-date-born',
                'placeholder' => 'Masukkan tanggal lahir'
            ]) !!}
        @else
            <p>{{ IndonesiaTgl($result2['birth_date']) }}</p>
        @endif
            @if ($errors->has('birth_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('birth_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('join_date') ? ' has-error' : '' }}">
            {!! Form::label('join_date', 'Tanggal gabung') !!}
        @if($type != 'view')
            {!! Form::text('join_date', IndonesiaTgl($result2['join_date']), [
                'class' => 'form-control datepicker-date-join',
                'placeholder' => 'Masukkan tanggal gabung'
            ]) !!}
        @else
            <p>{{ IndonesiaTgl($result2['join_date']) }}</p>
        @endif

            @if ($errors->has('join_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('join_date') }}</strong>
                </span>
            @endif
        </div>
        @if($type != 'view')
        <label>Tipe Agen Developer</label>
        <p></p>
            <label class="radio-inline">
            <input type="radio" name="bound_project" value="1" @if($result2['bound_project'] == TRUE ) checked="checked" @endif  >Terikat Proyek
            </label>
            <label class="radio-inline">
            <input type="radio" name="bound_project" value="0"  @if($result2['bound_project'] == FALSE ) checked="checked" @endif>Tidak Terikat Proyek
            </label>
        @else
        <div class="single-query form-group bottom20
            {{ $errors->has('bound_project') ? ' has-error' : '' }}">
            {!! Form::label('bound_project', 'Tipe Agen Developer') !!}
        <p>@if($result2['bound_project'] == TRUE )Terikat Proyek @else Tidak Terikat Proyek @endif</p>
        </div>
        @endif
    </div>
</div>
@else
<div class="row top20">
    <div class="col-md-5 col-md-offset-1">
        <div class="single-query form-group bottom20
            {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nama') !!}
            {!! Form::text('name', old('name'), [
                'class' => 'keyword-input ',
                'placeholder' => 'Masukkan nama agen developer',
                'onKeyPress' => 'return goodchars(event, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ", this)'
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
                'placeholder' => 'Masukkan email agen developer'
            ]) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
         <div class="single-query form-group bottom20
            {{ $errors->has('mobile_phone') ? ' has-error' : '' }}">
            {!! Form::label('mobile_phone', 'No Handphone') !!}
            {!! Form::text('mobile_phone', old('mobile_phone'), [
                'class' => 'keyword-input',
                'maxlength' => 12, 'minlength' => 9,
                'placeholder' => 'Masukkan No Handphone agen developer',
                'onkeypress' => 'return goodchars(event, "1234567890 ", this)'
            ]) !!}

            @if ($errors->has('mobile_phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('mobile_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="single-query form-group bottom20
            {{ $errors->has('birth_date') ? ' has-error' : '' }}">
            {!! Form::label('birth_date', 'Tanggal lahir') !!}
            {!! Form::text('birth_date', old('birth_date'), [
                'class' => 'form-control datepicker-date-born',
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
                'class' => 'form-control datepicker-date-join',
                'placeholder' => 'Masukkan tanggal gabung'
            ]) !!}

            @if ($errors->has('join_date'))
                <span class="help-block">
                    <strong>{{ $errors->first('join_date') }}</strong>
                </span>
            @endif
        </div>
        <br>
        <p>Tipe Agen Developer</p>
            <label class="radio-inline">
            <input type="radio" name="bound_project" value="1">Terikat Proyek
            </label>
            <label class="radio-inline">
            <input type="radio" name="bound_project" value="0">Tidak Terikat Proyek
            </label>
    </div>
</div>
@endif
@include('form._input_long_lat')