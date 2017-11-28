 <style type="text/css">
  .form-group {
     margin-bottom: 0px; 
}
 .bottom201 {
     margin-bottom: 0px; 
}
.top201 {
     margin-top: 0px; 
}

.wrapper .tp_overlay {
    height: 0 !important;
    -webkit-box-shadow: 0 0 3px 0 #9e9e9e;
    box-shadow: 0 0 3px 0 #9e9e9e;
    width: 40%;

} 
.tp_overlay form.callus {
    padding: 30px 30px 15px 30px;
    background: rgba(0, 82, 156, .9);
}
</style> 
<div class="tp_overlay warna"> 
  <form class="callus top201" action="#">
    <h2 class="text-uppercase t_white bottom201 text-center">Simulasi Kredit</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>KPR Aktif *:</label>       
          <select class="form-control " name="active_kpr" id="active_kpr">
            <option value="0" selected=""> Pilih </option>
            <option value="1"> 1 </option>
            <option value="2"> 2 </option>
            <option value="3"> &gt; 2 </option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">  
          <label>Harga Rumah *:</label>
          <div class="input-group">
            <span class="input-group-addon">Rp</span>
            <input type="text" class="form-control numericOnly currency " id="price" name="price" value="" maxlength="16">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">  
          <label>DP *:</label>
          <div class="input-group">
           <input type="text" class="form-control numericOnly " name="dp" value="" maxlength="2" max="90" placeholder="0" id="dp">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">  
          <label></label>
          <div class="input-group">
            <span class="input-group-addon">Rp</span>
            <input type="text" class="form-control numericOnly currency" name="down_payment" value="" maxlength="16" id="down_payment" readonly="">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Jenis Suku Bunga *:</label>
          <div class="input-group">
            <select class="form-control " name="interest" id="interest_rate_type">
              <option value="0" selected="" disabled=""> Pilih </option>
              <option value="1"> FLAT </option>
              <option value="2"> EFEKTIF </option>
              <option value="3"> EFEKTIF (Fixed - Float) </option>
              <option value="4"> EFEKTIF (Fixed - Floor - Float) </option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">  
          <label>Plafond yang diajukan *:</label>
          <div class="input-group">
            <span class="input-group-addon">Rp</span>
            <input type="text" class="form-control numericOnly currency" id="price_platform" name="price_platform" value="" maxlength="16" readonly="">
          </div>
        </div>
      </div>
  </div>
  
  <div class="row">
    <div class="col-md-6">
      <div class="form-group" id="time_period_div">  
        <label>Jangka Waktu *:</label>
        <div class="input-group"> 
          <input type="text" class="form-control numericOnly required " name="time_period" value="" maxlength="2" placeholder="0" id="year" max="20"><span class="input-group-addon">Bulan</span>
        </div>
      </div>
      <div class="form-group" id="time_period_total_div">
        <label>Jangka Waktu Total *:</label>
        <div class="input-group">
          <input type="text" class="form-control numericOnly required " name="time_period_total" value="" maxlength="2" placeholder="0" id="year" max="20">
          <span class="input-group-addon">Bulan</span>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group" id="interest_rate_div">
        <label>Suku Bunga *:</label>
        <div class="input-group">
          <input type="text" class="form-control numericOnly required " name="interest_rate" value="" maxlength="2" placeholder="0" id="interest_rate" max="20">
          <span class="input-group-addon">% per-tahun</span>
        </div>
      </div>        
      <div class="form-group" id="interest_rate_fixed_div">
        <label>Suku Bunga Fixed *:</label>                                         
        <div class="input-group">
            <input type="text" class="form-control numericOnly required " name="interest_rate_fixed" value="" maxlength="2" placeholder="0" id="interest_rate_efektif" max="20">
            <span class="input-group-addon">% per-tahun</span>
        </div>                                         
      </div>     
    </div>
    <!-- <div class="row"> -->
    <div class="col-md-6">
       <div class="form-group" id="time_period_fixed_div">
          <label>Jangka Waktu Fixed *:</label>
          <div class="input-group">
              <input type="text" class="form-control numericOnly required " name="time_period_fixed" value="" maxlength="2" placeholder="0" id="year" max="20">
              <span class="input-group-addon">Bulan Pertama</span>
          </div>                               
        </div>
    </div>    
    <div class="col-md-6">
      <div class="form-group" id="interest_rate_float_div">
        <label  >Suku Bunga Float *:</label>                                          
        <div class="input-group">
          <input type="text" class="form-control numericOnly required " name="interest_rate_float" value="" maxlength="2" placeholder="0" id="interest_rate_float" max="20">
          <span class="input-group-addon">% per-tahun</span>
        </div>                                         
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group" id="time_period_floor_div">
        <label>Jangka Waktu Floor *:</label>
        <div class="input-group">
          <input type="text" class="form-control numericOnly required " name="time_period_floor" value="" maxlength="2" placeholder="0" id="year" max="20">
          <span class="input-group-addon">Bulan Pertama</span>
        </div>                                   
      </div>
    </div> 
    <div class="col-md-6">
      <div class="form-group" id="interest_rate_floor_div">
        <label>Suku Bunga Floor *:</label>
        <div class="input-group">
          <input type="text" class="form-control numericOnly required " name="interest_rate_floor" value="" maxlength="2" placeholder="0" id="interest_rate_floor" max="20">
          <span class="input-group-addon">% per-tahun</span>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <button type="submit" class="border_radius btn-yellow text-uppercase">Hitung</button>
      </div>
    </div>
  </div>
</form>
</div>
 </div>
    @push('scripts')

<script type="text/javascript">
$(document).ready(function(){
       var interest_rate = $('#interest_rate_div');
        var interest_rate_floor = $('#interest_rate_floor_div');
        var interest_rate_float = $('#interest_rate_float_div');
        var interest_rate_fixed = $('#interest_rate_fixed_div');
        var time_period = $('#time_period_div');
        var time_period_floor = $('#time_period_floor_div');
        var time_period_total = $('#time_period_total_div');
        var time_period_fixed = $('#time_period_fixed_div');

        function hideFloorFloat(){
            interest_rate_floor.addClass('hidden');
            interest_rate_float.addClass('hidden');
            interest_rate_fixed.addClass('hidden');
            time_period_floor.addClass('hidden');
            time_period_total.addClass('hidden');
            time_period_fixed.addClass('hidden'); 
        }

        function hideDefaultInterest(){
            interest_rate.addClass('hidden');
            time_period.addClass('hidden');
        }

        function showDefaultInterest(){
            interest_rate.removeClass('hidden');
            time_period.removeClass('hidden');
        }

        function showFloorFloat(){
            interest_rate_float.removeClass('hidden');
            interest_rate_fixed.removeClass('hidden');
            interest_rate_floor.removeClass('hidden');
            time_period_total.removeClass('hidden');
            time_period_fixed.removeClass('hidden');
            time_period_floor.removeClass('hidden');
        }

        function showOnlyFloat(){
            interest_rate_floor.addClass('hidden');
            time_period_floor.addClass('hidden');
            interest_rate_float.removeClass('hidden');
            interest_rate_fixed.removeClass('hidden');
            time_period_total.removeClass('hidden');
            time_period_fixed.removeClass('hidden');
        }

        hideFloorFloat();
        hideDefaultInterest();
        showDefaultInterest();

        $('#interest_rate_type').on('change', function() {
          console.log($(this).val());
            if($(this).val() == 1){
                hideFloorFloat();
                showDefaultInterest();
            }else if($(this).val() == 2){
                hideFloorFloat();
                showDefaultInterest();
            }else if($(this).val() == 3){
                hideDefaultInterest();
                showOnlyFloat();
            }else if($(this).val() == 4){
                hideDefaultInterest();
                showFloorFloat();
            }
        });
});

$("#dp").keyup(function(){
 var dp =this.value;
 var dpPersen = dp /100;
 var price = $("#price").inputmask('unmaskedvalue');
 var priceint  = parseInt(price);
 var down_payment = hitungDP(priceint,dpPersen);
});

 

function hitungDP(priceint,dpPersen){
  var down_payment = priceint *   dpPersen;
  var price_platform = priceint - down_payment;
  $("#down_payment").val(down_payment);
  $("#price_platform").val(price_platform);
}

$("#price").keyup(function(){
  var price = $("#price").inputmask('unmaskedvalue'); 
  var priceint  = parseInt(price);
  var dp = $("#dp").val();
  var dpPersen = dp /100;
  var down_payment = hitungDP(priceint,dpPersen);
});

</script>
    @endpush