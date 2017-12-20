@if ($errors->any())
    <div class="alert alert-danger">
        <ul> 
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
    @elseif(Session::has('error_flash_message'))
    <div class="alert alert-danger"><em> {!! session('error_flash_message') !!}</em></div>
@endif
