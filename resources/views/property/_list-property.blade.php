@foreach($results['data'] as $key => $value)
    <div class="col-md-4 bottom30">
        <div class="property_item">
            <div class="image">
                <a href="{{ url('rincian-property/'.$value['prop_slug']) }}"><img src="{{image_checker($value['prop_photo'])}}" alt="latest property" class="img-responsive"></a>
                <div class="price clearfix">
                    <span class="tag pull-right">Rp. {{number_format($value['prop_price'], 2)}}</span>
                </div>
                <span class="tag_t">{{(isset($value['distance'])) ? $value['distance'] : '0'}} Km</span>
                <span class="tag_l" style="display: none;">PT. Gaisan Propertindo</span>
            </div>
            <div class="proerty_content">
                <div class="proerty_text">
                    <h3 class="captlize"><a href="#">{{$value['prop_name']}}</a></h3>
                    <p>{{$value['prop_city_name']}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach