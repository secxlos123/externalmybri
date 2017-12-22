<section class="credit-slider" style="z-index: 99999999999999999999999999999999999999999;">  
  <input type="checkbox" id="credit-toggle" checked>
  <label for="credit-toggle"></label>
  <section class="credit-wrapper">
    <div id="credit_simulation">
      <div class="container">
        <div class="row">
           <div class="col-md-12">
              <div class="header_credit">
                <center>
                  <h2 classs="simulation-tab-title">SIMULASI PERHITUNGAN KREDIT</h2>
                  <h5>Pilih Produk BRI untuk menghitung simulasi perhitungan kredit</h5>
                </center>
              </div>
            </div>
            <div class="col-md-12">
                <ul class="nav nav-pills">
                    <li>
                      <a data-toggle="pill" href="#credit1">
                        <div class="image_wrap">
                          <img src="{{ url('assets/images/product/kpr2.png') }}" class="img-credit">
                        </div>
                      </a>
                    </li>
                    <li class="hide">
                      <a data-toggle="pill" href="#credit2">
                        <div class="image_wrap">
                          <img src="{{ url('assets/images/product/kkb2.png') }}" class="img-credit">
                          </div>
                      </a>
                    </li>
                    <li class="hide">
                      <a data-toggle="pill" href="#credit3">
                        <div class="image_wrap">
                          <img src="#" class="img-credit">
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
        <input type="checkbox" id="credit-toggle" checked style="display: none;">
        <label for="credit-toggle">
          <div class="base2" id="credit-toggle">
            <div class="credit_text">SIMULASI KREDIT  &nbsp; <i id="cs_button" data-arrow-clicked=1 class="fa fa-chevron-down" aria-hidden="true"></i> 
                  
            </div>
          </div>
        </label>
    </div>
  </section>
</section>    
@push('scripts')
<script type="text/javascript">
 $("#credit-toggle").click(function(){
    if($("#cs_button").attr("data-arrow-clicked")%2){
      $("#cs_button").removeClass("fa-chevron-down");
      $("#cs_button").addClass("fa-chevron-up");
    }
    else{
      $("#cs_button").removeClass("fa-chevron-up");
      $("#cs_button").addClass("fa-chevron-down");
    }
    $("#cs_button").attr("data-arrow-clicked", parseInt($("#cs_button").attr("data-arrow-clicked")) + 1);
 })
</script>
@endpush

