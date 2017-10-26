@foreach ($results['data'] as $key => $types)
    @include('property._content-type')
@endforeach
<input type="hidden" name="last-page" id="last-page" value="{{$results['last_page']}}">
<input type="hidden" name="cur-page" id="current-page" value="{{$results['current_page']}}">