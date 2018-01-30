
  <h2 class="text-uppercase t_white bottom201 text-center">Simulasi Kredit</h2>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group  {{ $errors->has('price') ? ' has-error' : '' }}">
        <label>Harga Rumah *:</label>
        <div class="input-group">
          <span class="input-group-addon">Rp</span>
           {!! Form::text('price', $price, ['class' => 'form-control numericOnly currency','placeholder' => '','id'=>'price','required'=>'']) !!}
        </div>
            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group {{ $errors->has('dp') ? ' has-error' : '' }}">
        <label>DP *:</label>
        <div class="input-group">
         {!! Form::text('dp', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'dp','maxlength'=>'7','required'=>'','step'=>'0.4']) !!}
          <span class="input-group-addon">%</span>
        </div>
         @if ($errors->has('dp'))
                <span class="help-block">
                    <strong>{{ $errors->first('dp') }}</strong>
                </span>
          @endif
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group {{ $errors->has('down_payment') ? ' has-error' : '' }}">
        <label></label>
        <div class="input-group">
          <span class="input-group-addon">Rp</span>
          {!! Form::text('down_payment', '', ['class' => 'form-control numericOnly currency','placeholder' => '','id'=>'down_payment']) !!}
        </div>
        @if ($errors->has('down_payment'))
          <span class="help-block">
            <strong>{{ $errors->first('down_payment') }}</strong>
          </span>
        @endif
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label>Jenis Suku Bunga *:</label>
        <div class="input-group">
          {{Form::select('interest_rate_type',[1=>'FLAT',2=>'EFEKTIF','3'=>'EFEKTIF (Fixed - Float)'],null,['class'=>'form-control' ,'id'=>'interest_rate_type'])}}
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group {{ $errors->has('price_platform') ? ' has-error' : '' }}">
        <label>Plafond yang diajukan *:</label>
        <div class="input-group">
          <span class="input-group-addon">Rp</span>
           {!! Form::text('price_platform', '', ['class' => 'form-control numericOnly currency','placeholder' => '','id'=>'price_platform','readonly'=>'']) !!}
        </div>
        @if ($errors->has('price_platform'))
          <span class="help-block">
            <strong>{{ $errors->first('price_platform') }}</strong>
          </span>
        @endif
      </div>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('time_period') ? ' has-error' : '' }}" id="time_period_div">
      <label>Jangka Waktu *:</label>
      <div class="input-group">
         {!! Form::text('time_period', '', ['class' => 'form-control' ,'placeholder' => '0','id'=>'time_period','maxlength'=>'3']) !!}
        <span class="input-group-addon">Bulan</span>
      </div>
       @if ($errors->has('time_period'))
          <span class="help-block">
            <strong>{{ $errors->first('time_period') }}</strong>
          </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('time_period_total') ? ' has-error' : '' }}" id="time_period_total_div">
      <label>Jangka Waktu Total *:</label>
      <div class="input-group">
       {!! Form::text('time_period_total', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_total','maxlength'=>'3']) !!}
        <span class="input-group-addon">Bulan</span>
      </div>
      @if ($errors->has('time_period'))
        <span class="help-block">
          <strong>{{ $errors->first('time_period') }}</strong>
        </span>
      @endif
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group" id="interest_rate_div">
      <label>Suku Bunga *:</label>
      <div class="input-group">
       {!! Form::text('rate', '', ['class' => 'form-control numericOnly','placeholder' => '0','id'=>'rate','maxlength'=>'7']) !!}
        <span class="input-group-addon">% per-tahun</span>
      </div>
    </div>
    <div class="form-group {{ $errors->has('time_period_fixed') ? ' has-error' : '' }}" id="interest_rate_fixed_div">
      <label>Jangka Waktu Fixed *:</label>
      <div class="input-group">
        {!! Form::text('time_period_fixed', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_fixed','maxlength'=>'3']) !!}
        <span class="input-group-addon">Bulan Pertama</span>
      </div>
      @if ($errors->has('time_period_fixed'))
        <span class="help-block">
          <strong>{{ $errors->first('time_period_fixed') }}</strong>
        </span>
      @endif
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('time_period_fixed') ? ' has-error' : '' }}" id="time_period_floor_div">
      <label>Jangka Waktu Floor *:</label>
      <div class="input-group">
         {!! Form::text('time_period_floor', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_floor','maxlength'=>'3']) !!}
        <span class="input-group-addon">Bulan Pertama</span>
      </div>
        @if ($errors->has('time_period_floor'))
        <span class="help-block">
          <strong>{{ $errors->first('time_period_floor') }}</strong>
        </span>
      @endif
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('interest_rate_fixed') ? ' has-error' : '' }}" id="time_period_fixed_div">
      <label>Suku Bunga Fixed *:</label>
      <div class="input-group">
        {!! Form::text('interest_rate_fixed', '', ['class' => 'form-control','placeholder' => '0','id'=>'interest_rate_efektif','maxlength'=>'7']) !!}
        <span class="input-group-addon">% per-tahun</span>
      </div>
      @if ($errors->has('interest_rate_fixed'))
        <span class="help-block">
          <strong>{{ $errors->first('interest_rate_fixed') }}</strong>
        </span>
      @endif
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('interest_rate_fixed') ? ' has-error' : '' }}" id="interest_rate_float_div">
      <label  >Suku Bunga Float *:</label>
      <div class="input-group">
         {!! Form::text('interest_rate_float', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'interest_rate_float','maxlength'=>'7']) !!}
        <span class="input-group-addon">% per-tahun</span>
      </div>
       @if ($errors->has('interest_rate_float'))
        <span class="help-block">
          <strong>{{ $errors->first('interest_rate_float') }}</strong>
        </span>
      @endif
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group {{ $errors->has('interest_rate_floor') ? ' has-error' : '' }}" id="interest_rate_floor_div">
        <label>Suku Bunga Floor *:</label>
        <div class="input-group">
           {!! Form::text('interest_rate_floor', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'interest_rate_floor','maxlength'=>'7']) !!}
          <span class="input-group-addon">% per-tahun</span>
        </div>
         @if ($errors->has('interest_rate_floor'))
        <span class="help-block">
          <strong>{{ $errors->first('interest_rate_floor') }}</strong>
        </span>
      @endif
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <button type="submit" class="border_radius btn-yellow text-uppercase colWhite">Hitung Simulasi</button>
      </div>
    </div>
  </div>

@push ( 'styles' )
  <style type="text/css">
    .colWhite {
      color: white;
    }
  </style>
@endpush
@push('scripts')
 @include('home.calculator._script_calculator')
@endpush