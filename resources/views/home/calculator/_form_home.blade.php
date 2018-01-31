@include('home.calculator._error_validation') 
{!! Form::open(['route' => 'kalkulator.post','id' => 'form-calculator']) !!}  
<h2 class="text-uppercase t_white bottom201 text-center">Simulasi Kredit</h2>
<div class="row">
   <div class="col-md-3">
      <div class="form-group">
        <label>Jenis Suku Bunga *:</label>
        <div class="input-group col-md-12">
          {{Form::select('interest_rate_type',[1=>'FLAT',2=>'EFEKTIF','3'=>'EFEKTIF (Fixed - Float)'],null,['class'=>'form-control' ,'id'=>'interest_rate_type'])}}
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">  
        <label>Harga Rumah *:</label>
        <div class="input-group col-md-12">
          <span class="input-group-addon">Rp</span> 
           {!! Form::text('price', '', ['class' => 'form-control numericOnly currency','placeholder' => '','id'=>'price','required'=>'']) !!}
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">  
        <label>DP *:</label>
        <div class="input-group col-md-12">
         {!! Form::text('dp', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'dp','required'=>'','maxlength'=>'7','step'=>'0.4']) !!}
          <span class="input-group-addon">%</span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">  
        <label>Hasil DP *:</label>
        <div class="input-group col-md-12">
          <span class="input-group-addon">Rp</span>
          {!! Form::text('down_payment', '', ['class' => 'form-control numericOnly currency','placeholder' => '','id'=>'down_payment']) !!}
        </div>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-md-3">
    <div class="form-group">  
      <label>Plafond yang diajukan *:</label>
      <div class="input-group col-md-12">
        <span class="input-group-addon ">Rp</span>
         {!! Form::text('price_platform', '', ['class' => 'form-control numericOnly currency','placeholder' => '','id'=>'price_platform','readonly'=>'']) !!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group" id="time_period_div">  
      <label>Jangka Waktu *:</label>
      <div class="input-group col-md-12"> 
         {!! Form::text('time_period', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period','maxlength'=>'3']) !!}
        <span class="input-group-addon">Bulan</span>
      </div>
    </div>
    <div class="form-group" id="time_period_total_div">
      <label>Jangka Waktu Total *:</label>
      <div class="input-group col-md-12">
       {!! Form::text('time_period_total', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_total','maxlength'=>'3']) !!}
        <span class="input-group-addon">Bulan</span>
      </div>
    </div>
  </div>
  <div class="col-md-3">
      <div class="form-group col-md-12 padding0" id="interest_rate_div">
        <label>Suku Bunga *:</label>
        <div class="input-group col-md-12">
         {!! Form::text('rate', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'rate','maxlength'=>'7','step'=>'0.4']) !!}
          <span class="input-group-addon">% per-tahun</span>
        </div>
      </div>        

      <div class="form-group col-md-12 padding0" id="interest_rate_fixed_div">
        <label>Suku Bunga Fixed *:</label>                                         
        <div class="input-group">
            {!! Form::text('interest_rate_fixed', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'interest_rate_efektif','maxlength'=>'7','step'=>'0.4']) !!}
            <span class="input-group-addon">% per-tahun</span>
        </div>                                         
      </div>     
  </div>
  <div class="col-md-3">
     <div class="form-group col-md-12 padding0" id="time_period_fixed_div">
        <label>Jangka Waktu Fixed *:</label>
        <div class="input-group">
          {!! Form::text('time_period_fixed', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_fixed','maxlength'=>'3']) !!}
          <span class="input-group-addon">Bulan Pertama</span>
        </div>                               
      </div>
  </div>    
</div>
<div class="row">
  <div class="col-md-3">
    <div class="form-group" id="interest_rate_float_div">
      <label  >Suku Bunga Float *:</label>                                          
      <div class="input-group col-md-12">
         {!! Form::text('interest_rate_float', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'interest_rate_float','maxlength'=>'7','step'=>'0.4']) !!}
        <span class="input-group-addon">% per-tahun</span>
      </div>                                         
    </div>
  </div> 
  <div class="col-md-3">
    <div class="form-group" id="time_period_floor_div">
      <label>Jangka Waktu Floor *:</label>
      <div class="input-group col-md-12">
         {!! Form::text('time_period_floor', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'time_period_floor','maxlength'=>'3']) !!}
        <span class="input-group-addon">Bulan Pertama</span>
      </div>                                   
    </div>
  </div>   
  <div class="col-md-3">
    <div class="form-group" id="interest_rate_floor_div">
      <label>Suku Bunga Floor *:</label>
      <div class="input-group col-md-12">
         {!! Form::text('interest_rate_floor', '', ['class' => 'form-control numericOnly ','placeholder' => '0','id'=>'interest_rate_floor','maxlength'=>'7','step'=>'0.4']) !!}
        <span class="input-group-addon">% per-tahun</span>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <button type="submit" class="border_radius btn-yellow text-uppercase">Hitung Simulasi</button>
    </div>
  </div>
</div>
{!!  Form::close()  !!}
@push('scripts')
 @include('home.calculator._script_calculator') 
@endpush