@foreach ($results['data'] as $key => $types)
<div class="col-md-4 col-sm-6 col-xs-12 heading_space">
    <div class="sim-lar-p">
        <div class="image bottom20"><img src="{{(!isset($types['photos'][0])) ? image_checker() : image_checker($types['photos'][0])}}" alt="image"></div>
        <div class="sim-lar-text">
            <h3 class="bottom10"><a href="#.">{{$types['name']}}</a></h3>
            <p><span>Tersedia:</span>{{ $types['items']}} Unit <span>|</span> <span>Harga:</span> Rp {{number_format($types['price'], 2)}}</p>
            <p class="bottom20"></p>
            <a class="btn-more" href="{{ url('rincian-property-type/'.$types['slug']) }}">
                <i>{!! Html::image('assets/images/arrowl.png', 'arrow') !!}</i><span>Lihat Detail</span><i>{!! Html::image('assets/images/arrowr.png', 'arrow') !!}</i>
            </a>
        </div>
    </div>
</div>
@endforeach
<input type="hidden" name="last-page" id="last-page" value="{{$results['last_page']}}">
<input type="hidden" name="cur-page" id="current-page" value="{{$results['current_page']}}">