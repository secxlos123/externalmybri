<ul class="breadcrumb_top">

	<!-- This menu is hidden cause this fiture not present -->
	@if (false)
		<li>
			<a href="javascript:void(0)">
				<i class="fa fa-heart-o"></i>Favorit
			</a>
		</li>

		<li>
			<a href="javascript:void(0)">
				<i class="fa fa-building-o"></i>Properti Saya
			</a>
		</li>

		<li>
			<a href="javascript:void(0)">
				<i class="fa fa-user"></i> {!! session('authenticate.fullname') ?: 'Profile' !!}
			</a>
		</li>
		<li>
			<a href="{{('developer' == session('authenticate.role')) ? url('dev/profile') : url('profile')}}">
				<i class="fa fa-user"></i> {!! session('authenticate.fullname') !!}
			</a>
		</li>
	@endif
	<!-- This menu is hidden cause this fiture not present -->

	@if ( ! session('authenticate') )
		<a href="javascript:void(0)" data-toggle="modal" data-target="#login-register">
			<li class="last-icon login-pop">
				<i class="fa fa-lock"></i> Masuk / Daftar
			</li>
		</a>
	@else
		<li class="has-dropdown">
			<a href="{{('developer' == session('authenticate.role')) ? url('dev/profile') : url('profile')}}"><i class="fa fa-user"></i> {!! session('authenticate.fullname') !!}</a>
			<div class="has-dropdown-content">
				<ul>
					<!-- <li><a href="#"><i class="fa fa-heart"></i> Favorit</a></li> -->
					<li><a href="{{('developer' == session('authenticate.role')) ? url('dev/profile/ubah') : url('profile/ubah')}}""><i class="fa fa-edit"></i> Edit Profile</a></li>
					<li><a href="javascript:void(0)" onclick="document.getElementById('form-logout').submit();"><i class="fa fa-sign-out"></i> Keluar</a></li>
				</ul>
			</div>
		</li>

		{!! Form::open([
			'route' => 'auth.logout', 'method' => 'DELETE',
			'style' => 'display: none;', 'id' => 'form-logout'
		]) !!}
		{!! Form::close() !!}
	@endif
</ul>