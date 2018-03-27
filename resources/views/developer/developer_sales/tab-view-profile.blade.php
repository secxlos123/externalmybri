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
        </div>
        <div class="single-query form-group bottom20 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>Email</label>
            <br>
            <b>{{ $results['email'] }}</b>
        </div>
        <div class="single-query form-group bottom20 {{ $errors->has('mobile_phone') ? ' has-error' : '' }} ">
            <label>Nomor Telepon</label>
            <br>
            <b>{{ $results['mobile_phone'] }}</b>
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-query form-group bottom20 {{ $errors->has('birth_date') ? ' has-error' : '' }}">
            {!! Form::label('birth_date', 'Tanggal lahir') !!}
            <br>
            <b>{{ $birth }}</b>
        </div>

        <div class="single-query form-group bottom20 {{ $errors->has('join_date') ? ' has-error' : '' }}">
            {!! Form::label('join_date', 'Tanggal gabung') !!}
            <br>
            <b>{{ $join }}</b>
        </div>
    </div>
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{ route('dev-sales.profile.index') }}" class="btn btn-success waves-light waves-effect w-md m-b-20">Edit</a>
        </div>
    </div>
</div>
