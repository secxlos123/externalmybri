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
                @if(session('authenticate'))
                <ul class="attr-nav csm-attr no-bg">
                    <li class="dropdown">
                        <a href="{{('developer' == session('authenticate.role')) ? url('dev/profile') : url('profile')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {!! session('authenticate.fullname') !!} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> Favorit</a></li> -->
                            <li><a href="{{('developer' == session('authenticate.role')) ? url('dev/profile') : url('profile')}}"><i class="fa fa-edit"></i> Edit Profile</a></li>
                            <li><a href="javascript:void(0)" onclick="document.getElementById('form-logout').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>

                {!! Form::open([
                    'route' => 'auth.logout', 'method' => 'DELETE',
                    'style' => 'display: none;', 'id' => 'form-logout'
                ]) !!}
                {!! Form::close() !!}
                @endif
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav" data-in="fadeIn" data-out="fadeOut">
                        @include('layouts.main-menu')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>