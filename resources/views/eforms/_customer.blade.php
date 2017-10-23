@if ( session('authenticate.role') == 'developer-sales' )
	@include('eforms._from-agent')
@else
	@include('eforms._from-customer')
@endif