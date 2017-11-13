@if ( ! request()->is('/') )
    <!-- This is present if not in homepage -->
    <div class="topbar default_clr">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>BRI Melayani dengan Setulus Hati</p>
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
                @if ( ! session('authenticate') )
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#login-register" class="attr-nav csm-attr">
                        <div class="upper-column info-box first">
                            <i class="fa fa-lock"></i> Masuk / Daftar
                        </div>
                    </a>
                @endif
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{!! request()->is('/') || request()->is('dev/dashboard') ? '#' : url('/') !!}">
                        {!! Html::image('assets/images/logo/Logo-Website.png', '', [
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