<!-- Slider -->
<div class="rev_slider_wrapper">
    <div id="rev_overlaped" class="rev_slider"  data-version="5.0">
        @include('home.slider')
    </div>
</div>
<!-- Slider end -->

<div id="mainMenuBarAnchor"></div>

<button type="button" class="form_opener"><i class="fa fa-bars"></i></button>
<div class="tp_overlay">

    <!-- Top menu -->
    <div class="topbar clearfix">
        @include('layouts.top-menu')
    </div>
    <!-- Top menu end -->

    <!-- Credit Simulation -->
    @if (false)
    	@include('home.credit-simulation')
    @endif
    <!-- Credit Simulation end -->
</div>