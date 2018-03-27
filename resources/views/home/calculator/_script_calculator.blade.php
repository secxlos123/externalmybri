<script type="text/javascript">


 $(document).on('keydown', ".numericOnly", function (e) {
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
               // Allow: Ctrl+A
               (e.keyCode == 65 && e.ctrlKey === true) ||
               // Allow: Ctrl+C
               (e.keyCode == 67 && e.ctrlKey === true) ||
               // Allow: Ctrl+X
               (e.keyCode == 88 && e.ctrlKey === true) ||
              // Allow: backspace
              (e.keyCode === 320 && e.ctrlKey === true) ||
               // Allow: home, end, left, right
               (e.keyCode >= 35 && e.keyCode <= 39)) {
                   // let it happen, don't do anything
                 return;
               }

          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
          }
  });
  var defaultJangkaWaktu = 240; 
  var defaultMinJangkaWaktu = 12;
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

      

$(document).ready(function(){
    var interest_rate_type = $("#interest_rate_type").val();
    if(interest_rate_type == 1){
        hideFloorFloat();
        showDefaultInterest();
    }else if(interest_rate_type == 2){
        hideFloorFloat();
        showDefaultInterest();
    }else if(interest_rate_type== 3){
        hideDefaultInterest();
        showOnlyFloat();
    }else if(interest_rate_type == 4){
        hideDefaultInterest();
        showFloorFloat();
    }
});

$("#dp").keyup(function(){
 $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,2})?$"});
 var dp =this.value;
 var dpPersen = dp /100;
 var price = $("#price").inputmask('unmaskedvalue');
 var priceint  = parseInt(price);
 var down_payment = hitungDP(priceint,dpPersen)
});

function hitungDP(priceint,dpPersen){
  if(dpPersen > 0.99)
  {
    alert('Dp tidak boleh lebih besar dari 99.99');
    $("#dp").val('');
    dpPersen = 0;
    priceint = 0;
  }
  var down_payment = priceint * dpPersen;
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

$("#down_payment").keyup(function(){
   var down_payment = $("#down_payment").inputmask('unmaskedvalue');
   var down_payment_int = parseInt(down_payment);
 
   var price = $("#price").inputmask('unmaskedvalue'); 
   var priceint  = parseInt(price);
    if(down_payment_int > priceint){
      alert('Dp tidak boleh lebih besar dari harga rumah');
      var persen = 0;
      $("#down_payment").val(persen);
    }else{
      var persen = (100/priceint)*down_payment_int;
      
    }
    if (isNaN(persen)) {
       persen = 0;
    }
    persen = persen.toFixed(4);
    $("#dp").val(persen);
    var price_platform = priceint - down_payment_int;
    if(price_platform <= 0 ){
        price_platform = 0;
    }
    $("#price_platform").val(price_platform);
});

//validasi nomer suku bunga
$("#rate").keyup(function(e){
    $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,4})?$"});
     var nilai = $(this).val();
     var id =  "#rate";
     // sukubunga(nilai,id,e);
});

//validasi suku bunga fixed

$("#interest_rate_efektif").keyup(function(e){
    $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,4})?$"});
     var nilai = $(this).val();
     var id =  "#interest_rate_efektif";
     // sukubunga(nilai,id,e);
}); 

$("#interest_rate_float").keyup(function(e){
    $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,4})?$"});
     var nilai = $(this).val();
     var id =  "#interest_rate_float";
     // sukubunga(nilai,id,e);
}); 


$("#interest_rate_floor").keyup(function(e){
     $(this).inputmask('Regex', {regex: "^[0-9]{1,2}(\\.\\d{1,4})?$"});
     var nilai = $(this).val();
     var id =  "#interest_rate_floor";
     // sukubunga(nilai,id,e);
}); 

function sukubunga(nilai,id,e){
  var rate = nilai;
  if(rate > 99)
  {
    alert('Suku Bunga tidak boleh lebih besar dari 100 %');
    $(id).val('');
  }
}

$("#time_period").keyup(function(e){
    var nilai = $(this).val();
    var id = "#time_period";
    validation_timeperiod(nilai,id);
});

$("#time_period_total").keyup(function(e){
    var nilai = $(this).val();
    var id = "#time_period_total";
    validation_timeperiod(nilai,id);
});

$("#time_period_fixed").keyup(function(e){
    var nilai = $(this).val();
    var id = "#time_period_fixed";
    validation_timeperiod(nilai,id);
});

$("#time_period_floor").keyup(function(e){
    var nilai = $(this).val();
    var id = "#time_period_floor";
    validation_timeperiod(nilai,id);
});

 // validsi inputan jangka waktu
function  validation_timeperiod(nilai,id){
     
    if(nilai > defaultJangkaWaktu){
       nilai = defaultJangkaWaktu;
    }
    $(id).val(nilai);
    
}

function isInteger(evt)
{
   var charCode = (evt.which) ? evt.which : event.keyCode
   if (charCode > 31 && (charCode < 48 || charCode > 57))
       return false;
   return true;
}

$('#form-calculator').on('submit', function() {      
 var interset_type = $("#interest_rate_type").val();
 var dp = $("#dp").val();

  if(dp <=  0 ){
    alert('Dp belum diisi');
    return false;
  }

  if(interset_type==1 || interset_type == 2){
    var time_period =  $('#time_period').val();
    var rate =  $('#rate').val();
    if(  time_period === ""  ){
        alert('Jangka Waktu Belum Diisi');
        $("#time_period" ).focus();
        return false;
    }else if(rate === "" ){
        alert('Suku Bunga Belum Diisi');
        $("#rate" ).focus();
        return false;
    }

    if(time_period < defaultMinJangkaWaktu){
      alert('Jangka Waktu minimal 12');
      $("#time_period" ).focus();
      return false;
    }
    else if(time_period > defaultJangkaWaktu){
      alert('Jangka Waktu tidak boleh melebihi 240');
      return false;
    }
  }else if(interset_type == 3){
    var time_period_total = $('#time_period_total').val();
    var time_period_fixed = $('#time_period_fixed').val();
    var interest_rate_efektif = $('#interest_rate_efektif').val();
    var interest_rate_float = $('#interest_rate_float').val();

    if(time_period_total === ""){
      alert('Jangka Waktu Total Belum Diisi');
       $('#time_period_total').focus();
      return false;
    }else if(time_period_fixed === ""){
      alert('Jangka Waktu Fixed Belum Diisi');
      $('#time_period_fixed').focus();
      return false;
    }else if(interest_rate_efektif === ""){
      alert('Suku Bunga Fixed Belum Diisi');
      $('#interest_rate_efektif').focus();
      return false;
    }else if(interest_rate_float ===""){
      alert('Suku Bunga Float Belum Diisi');
      $('#interest_rate_float').focus();
      return false;
    }
    
    if(time_period_total < defaultMinJangkaWaktu){
      alert('Jangka Waktu Total minimal 12');
      $('#time_period_total').focus();
      return false;
    }else if (time_period_fixed  < defaultMinJangkaWaktu){
       alert('Jangka Waktu Fixed minimal 12');
      $('#time_period_fixed').focus();
      return false;
    }

    var jwt = parseInt(time_period_total);
    var jwf = parseInt(time_period_fixed);

    if(jwf > jwt){
      alert('Jangka Waktu Fixed tidak boleh melebihi Jangka Waktu Total');
      $('#time_period_fixed').focus();
      return false;
    }else if(jwf == jwt){
      alert('Jangka Waktu Fixed tidak boleh sama dengan Jangka Waktu Total');
      $('#time_period_fixed').focus();
      return false;
    }

    if(time_period_total > defaultJangkaWaktu){
      alert('Jangka Waktu Total tidak boleh melebihi 240');
      return false;
    }

    if(time_period_fixed > defaultJangkaWaktu){
      alert('Jangka Waktu Fixed tidak boleh melebihi 240');
      return false;
    }

  }else if (interset_type == 4){
    var time_period_total = $('#time_period_total').val();
    var time_period_fixed = $('#time_period_fixed').val();
    var time_period_floor = $('#time_period_floor').val();
    var interest_rate_efektif = $('#interest_rate_efektif').val();
    var interest_rate_float = $('#interest_rate_float').val();
    var interest_rate_floor = $('#interest_rate_floor').val();

    if(time_period_total === ""){
      alert('Jangka Waktu Total Belum Diisi');
      $('#time_period_total').focus();
      return false;
    }else if(time_period_fixed === ""){
      alert('Jangka Waktu Fixed Belum Diisi');
      $('#time_period_fixed').focus();
      return false;
    }else if( time_period_floor === ""){
       alert('Jangka Waktu Floor Belum Diisi');
       $('#time_period_floor').focus();
       return false;
    }else if(interest_rate_efektif === ""){
      alert('Suku Bunga Fixed Belum Diisi');
      $('#interest_rate_efektif').focus();
      return false;
    }else if(interest_rate_float ===""){
      alert('Suku Bunga Float Belum Diisi');
      $('#interest_rate_float').focus();
      return false;
    }else if(interest_rate_floor ===""){
        alert('Suku Bunga Floor Belum Diisi');
        $('#interest_rate_floor').focus();
      return false;
    }

    if(time_period_total < defaultMinJangkaWaktu){
      alert('Jangka Waktu Total minimal 12');
      $('#time_period_total').focus();
      return false;
    }else if (time_period_fixed  < defaultMinJangkaWaktu){
       alert('Jangka Waktu Fixed minimal 12');
      $('#time_period_fixed').focus();
      return false;
    } else if (time_period_floor < defaultMinJangkaWaktu){
      alert('Jangka Waktu Floor minimal 12');
      $('#time_period_floor').focus();
      return false;
    }
    

    var jwt = parseInt(time_period_total);
    var jwf = parseInt(time_period_fixed);
    var jwfloor = parseInt(time_period_floor);

    if(jwf > jwt){
      alert('Jangka Waktu Fixed tidak boleh melebihi Jangka Waktu Total');
      $('#time_period_fixed').focus();
      return false;
    }else if (jwf == jwt){
       alert('Jangka Waktu Fixed tidak boleh sama dengan Jangka Waktu Total');
       $('#time_period_fixed').focus();
      return false;
    }
    if(jwfloor > jwt){
      alert('Jangka Waktu Floor tidak boleh melebihi Jangka Waktu Total');
       $('#time_period_floor').focus();
      return false;
    }else if(jwfloor == jwt){
      alert('Jangka Waktu Floor tidak boleh sama dengan Jangka Waktu Total');
       $('#time_period_floor').focus();
      return false;
    }
    if(time_period_total > defaultJangkaWaktu){
      alert('Jangka Waktu Total tidak boleh melebihi 240');
      return false;
    }
    if(time_period_fixed > defaultJangkaWaktu){
      alert('Jangka Waktu Fixed tidak boleh melebihi 240');
      return false;
    }
    if(time_period_floor > defaultJangkaWaktu){
      alert('Jangka Waktu Floor tidak boleh melebihi 240');
      return false;
    }
  }
});
</script>