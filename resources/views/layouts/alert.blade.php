@if( session('error') )
	<div class="alert alert-danger">
		{!! session('error') !!}
	</div>
@endif

@if( session('error-login') )
	<div class="alert alert-danger">
		{!! session('error-login') !!}
	</div>
@endif

@if( session('error-register') )
	<div class="alert alert-danger">
		{!! session('error-register') !!}
	</div>				
@endif

@if (false)
	<div class="alert alert-success">
	  <strong>Success!</strong> Indicates a successful or positive action.
	</div>

	<div class="alert alert-info">
	  <strong>Info!</strong> Indicates a neutral informative change or action.
	</div>

	<div class="alert alert-warning">
	  <strong>Warning!</strong> Indicates a warning that might need attention.
	</div>
@endif