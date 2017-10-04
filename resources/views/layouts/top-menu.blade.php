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
				<i class="fa fa-user"></i>Profile
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
		<a href="javascript:void(0)" onclick="document.getElementById('form-logout').submit();">
			<li class="last-icon login-pop">
				<i class="fa fa-lock"></i> Keluar
			</li>
		</a>

		{!! Form::open([
			'route' => 'auth.logout', 'method' => 'DELETE',
			'style' => 'display: none;', 'id' => 'form-logout'
		]) !!}
		{!! Form::close() !!}
	@endif
</ul>