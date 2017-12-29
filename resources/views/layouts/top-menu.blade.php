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
			<a href="{{('developer' == session('authenticate.role')) ? url('dev/profile/personal') : url('profile/personal')}}">
				<i class="fa fa-user"></i> {!! session('authenticate.fullname') !!}
			</a>
		</li>
	@endif
	<!-- This menu is hidden cause this fiture not present -->
</ul>