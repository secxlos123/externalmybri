<div class="col-md-4 bottom30">
    <div class="property_item">
        <a href="{{ url('properti-developer/'.$value['dev_id']) }}">
            <div class="image">
                <img src="{{image_checker($value['image'])}}" alt="developer" class="img-responsive">
                <div class="price clearfix">
                    <span class="tag pull-right" style="display: none;"></span>
                </div>
                <span class="tag_t" style="display: none;"></span>
                <span class="tag_l">{{($value['phone_number']) ? $value['phone_number'] : ''}}</span>
            </div>
            <div class="proerty_content">
                <div class="proerty_text">
                    <h3 class="captlize">{{($value['company_name']) ? $value['company_name'] : ''}}</h3>
                    <p>{{($value['city_name']) ? $value['city_name'] : ''}}</p>
                </div>
            </div>
        </a>
    </div>
</div>