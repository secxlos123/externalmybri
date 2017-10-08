@if ( ! request()->is('/') )
    <!-- This is present if not in homepage -->
    <div class="topbar default_clr">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>BRI Melayani dengan Sepenuh Hati</p>
                </div>
                <div class="col-md-8 text-right">
                    @include('layouts.top-menu')
                </div>
            </div>
        </div>
    </div>
    <!-- This is present if not in homepage -->
    <nav class="navbar navbar-default navbar-sticky bootsnav">
@else
    <nav class="navbar navbar-default bootsnav">
@endif

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="attr-nav">
                    <div class="upper-column info-box first">
                        <div class="icons">
                            {!! Html::image('assets/images/logo/callbri.png') !!}
                        </div>
                    </div>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{!! request()->is('/') || request()->is('dev/dashboard') ? '#' : url('/') !!}">
                        {!! Html::image('assets/images/logo/my_rbi_logo_square_blue.png', '', [
                            'class' => 'logo'
                        ]) !!}
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav" data-in="fadeIn" data-out="fadeOut">
                        @include('layouts.main-menu')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>