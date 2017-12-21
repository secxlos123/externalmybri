<!-- Form Update -->
{!! Form::open([
    'route' => 'pihakke3.profile.requpdate',
    'class' => 'callus submit_property', 'id' => 'form-pihakke3-edit',
    'enctype' => 'multipart/form-data', 'method' => 'PUT'
]) !!}
<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20 {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>NAME (*)</label>
            @if($type != 'view')
            <input type="text" class="keyword-input" name="name" value="{{ $results['name'] }}">
            @else
            <p> {{ $results['name'] }} </p>
            @endif
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>Email (*)</label>
            @if($type != 'view')
            <input type="text" class="keyword-input" name="email" value="{{ $results['email'] }}" readonly="readonly" style="background: lavender;">
            @else
            <p>{{ $results['email'] }}</p>
            @endif
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20 {{ $errors->has('phone_number') ? ' has-error' : '' }} ">
            <label>Nomor Telepon (*)</label>
            @if($type != 'view')
            <input type="text" class="keyword-input numeric" name="phone" maxlength="12" minlength="9" value="{{$results['phone_number']}}">
            @else
            <p>{{ $results['phone_number'] }}</p>
            @endif
            @if ($errors->has('phone_number'))
            <span class="help-block">
                <strong>{{ $errors->first('phone_number') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="single-query form-group bottom20 {{ $errors->has('address') ? ' has-error' : '' }}">
            <label>Alamat (*)</label>
            @if($type != 'view')
            <textarea class="form-control" name="address" rows="3">{{ $results['address'] }}</textarea>
            @else
            <p>{{ $results['address'] }}</p>
            @endif
            @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20 {{ $errors->has('city_id') ? ' has-error' : '' }}">
            <label>Kota (*)</label>
            <div class="intro">
            @if($type != 'view')
                <select name="city_id">
                    <option value="{{ $results['city_id'] }}" selected="selected">{{ $results['city_name'] }}</option>
                    <?php foreach ($city as $key => $value):?>
                        <option value="{{ $value['id'] }}" {{ $value['id'] == $results['city_id'] ? 'selected="selected"' : '' }}>{{ $value['name'] }}</option>
                    <?php endforeach ?>
                </select>
            @else
            <p>{{ $results['city_name'] }}</p>
            @endif
                @if ($errors->has('city_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('city_id') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="pull-right">
        @if($type != 'view')
            <a href="{{ route('pihakke3.profile.edit') }}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
            <input type="submit" class="btn btn-primary waves-light waves-effect w-md m-b-20" value="Simpan">
        @else
            <a href="{{ route('pihakke3.profile.index') }}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Edit</a>
        @endif
            <!-- <a href="#" class="btn btn-success waves-light waves-effect w-md m-b-20" data-toggle="modal" data-target="#save"><i class="mdi mdi-content-save"></i> Simpan</a> -->
        </div>
    </div>
</div>
{!! Form::close() !!}
