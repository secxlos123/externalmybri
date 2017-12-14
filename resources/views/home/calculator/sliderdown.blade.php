<div class="base" id="base">
    <div class="credit_text">SIMULASI KREDIT</div>
</div>
<div id="credit_simulation">
  <div class="col-md-12">
      <button type="button" class="close"aria-label="Close" id="base"><span aria-hidden="true" style="color: white; font-size: 20pt;">×</span></button>
  </div>
<div class="container">
  <div class="row">     
    <div class="col-md-12">
        <div class="header_credit">
          <center>
            <h2>SIMULASI PERHITUNGAN KREDIT</h2>
            <h5>Pilih Produk BRI untuk menghitung simulasi perhitungan kredit</h5>
          </center>
        </div>
      </div>
      <div class="col-md-12">
          <ul class="nav nav-pills">
              <li>
                <a data-toggle="pill" href="#credit1">
                  <div class="image_wrap">
                    <img src="{{url('assets/images/product/kpr2.png')}}" class="img-credit">    
                  </div> 
                </a>
              </li>
              <li>
                <a data-toggle="pill" href="#credit2"> 
                  <div class="image_wrap">
                    <img src="{{url('assets/images/product/kkb2.png')}}" class="img-credit">    
                    </div> 
                </a>
              </li>
              <li>
                <a data-toggle="pill" href="#credit3"> 
                  <div class="image_wrap">
                    <img src="{{url('assets/images/product/kkb2.png')}}" class="img-credit">    
                    </div> 
                </a>
              </li>
            </ul>
      </div>
      <div class="col-md-12">
          <div class="tab-content">
              <div id="credit1" class="tab-pane fade in active bordered-pane">
                  @include('home.calculator._form_home')   
              </div>
              <div id="credit2" class="tab-pane fade">           
              </div>
              <div id="credit3" class="tab-pane fade">
                                
              </div>  
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script type="text/javascript">
      $('#credit_simulation').hide()
  var i = 0; 
    $( "body" ).on("click","#base",function() {   
     i++;
     if(i%2==0){
      $('#credit_simulation').hide().css({
    
       });
     }
     else{
      $('#credit_simulation').show().css({
    
       });
     }        
});
 
  $('#base').click(function() {
  $('#credit_simulation').slideToggle('slow');
});

 
</script>
@endpush      

