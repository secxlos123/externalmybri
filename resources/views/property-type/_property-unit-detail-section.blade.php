@foreach ($results['data'] as $key => $units)
    @include('property-type._content-unit')
@endforeach
<input type="hidden" name="last-page" id="last-page" value="{{$results['last_page']}}">
<input type="hidden" name="cur-page" id="current-page" value="{{$results['current_page']}}">