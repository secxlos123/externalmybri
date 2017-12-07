<?php
$birth= date('d-m-Y', strtotime($results['userdeveloper']["birth_date"]));
$join = date('d-m-Y', strtotime($results['userdeveloper']["join_date"]));
?>
<!-- Form View Profile -->
<div class="row top20">
    <?php
    $id = $results["id"];
    ?>
    <div class="col-md-6">
        <div class="single-query form-group bottom20 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>NAME</label>
            <br>
            <b>{{ $results['name'] }}</b>
            <!-- <input type="text" class="keyword-input" name="name" value="{{ $results['name'] }}" readonly="readonly">
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif -->
        </div>
        <div class="single-query form-group bottom20 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>Email</label>
            <br>
            <b>{{ $results['email'] }}</b>
            <!-- <input type="text" class="keyword-input" name="email" value="{{ $results['email'] }}" readonly="readonly" style="background: lavender;">
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif -->
        </div>
        <div class="single-query form-group bottom20 {{ $errors->has('mobile_phone') ? ' has-error' : '' }} ">
            <label>Nomor Telepon</label>
            <br>
            <b>{{ $results['mobile_phone'] }}</b>
            <!-- <input type="text" class="keyword-inpu numerict" maxlength="12" minlength="9" name="mobile_phone" value="{{$results['mobile_phone']}}">
            @if ($errors->has('mobile_phone'))
            <span class="help-block">
                <strong>{{ $errors->first('mobile_phone') }}</strong>
            </span>
            @endif -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-query form-group bottom20 {{ $errors->has('birth_date') ? ' has-error' : '' }}">
            {!! Form::label('birth_date', 'Tanggal lahir') !!}
            <br>
            <b>{{ $birth }}</b>
            <!-- {!! Form::text('birth_date', $birth, ['class' => 'form-control datepicker-date-born','placeholder' => 'Masukkan tanggal lahir']) !!}
            @if ($errors->has('birth_date'))
            <span class="help-block">
                <strong>{{ $errors->first('birth_date') }}</strong>
            </span>
            @endif -->
        </div>

        <div class="single-query form-group bottom20 {{ $errors->has('join_date') ? ' has-error' : '' }}">
            {!! Form::label('join_date', 'Tanggal gabung') !!}
            <br>
            <b>{{ $join }}</b>
            <!-- {!! Form::text('join_date', $join, ['class' => 'form-control datepicker-date-join','placeholder' => 'Masukkan tanggal gabung']) !!}
            @if ($errors->has('join_date'))
            <span class="help-block">
                <strong>{{ $errors->first('join_date') }}</strong>
            </span>
            @endif -->
        </div>
    </div>
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{ route('dev-sales.profile.index') }}" class="btn btn-success waves-light waves-effect w-md m-b-20">Edit</a>
            <!-- <input type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20" value="Simpan">
            {!! Form::close() !!} -->
            <!-- <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a> -->
        </div>
    </div>
    <!-- </div> -->
<!-- </div> -->
</div>
