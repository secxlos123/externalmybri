<!-- Slider -->
<div class="rev_slider_wrapper">
    <div class="base" id="base">
    <div class="credit_text">SIMULASI KREDIT &nbsp; <i class="fa fa-chevron-down" aria-hidden="true"></i></div>
</div>
    <div id="rev_overlaped" class="rev_slider"  data-version="5.0">

         @include('home.slider')
    </div>
</div>
<!-- Slider end -->

<div id="mainMenuBarAnchor"></div>
  @include('home.calculator.sliderdown')    
<a href="javascript:void(0)" data-toggle="modal" data-target="#login-register" class="btn form_opener"><i class="fa fa-bars"></i></a>
<div class="tp_overlay">

    <!-- Top menu -->
    <div class="topbar clearfix homePage">
        @include('layouts.top-menu')
    </div>
    <!-- Top menu end -->

    <!-- Credit Simulation -->
    @if (false)
    	@include('home.credit-simulation')
    @endif
    <!-- Credit Simulation end -->
</div>