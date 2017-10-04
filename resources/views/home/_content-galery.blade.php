@foreach ($properties as $property)
    <div class="col-md-4 bottom30">
        <div class="property_item">
            <div class="image">

                <a href="javascript:void(0)">
                    {!! Html::image($property['prop_photo'], $property['prop_name'], [
                        'class' => 'img-responsive'
                    ]) !!}
                </a>

                <div class="price clearfix">
                    <span class="tag pull-right">Rp. {!! number_format($property['prop_price'], 0, ',', '.') !!},-</span>
                </div>

                <span class="tag_t">24m</span>
                <span class="tag_l">{!! $property['prop_developer_name'] !!}</span>

            </div>
            <div class="proerty_content">
                <div class="proerty_text">
                    <h3 class="captlize">
                        <a href="javascript:void(0)">{!! $property['prop_name'] !!}</a>
                    </h3>
                    <p>{!! $property['prop_city_name'] !!}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

@if ( count($properties) == 0 )
    <div class="col-sm-12 text-center bottom30">
    	<h2 class="uppercase">PROPERTI TERDEKAT TIDAK TERSEDIA</h2>
    </div>
@endif