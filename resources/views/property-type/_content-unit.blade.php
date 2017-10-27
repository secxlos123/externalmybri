<div class="row bg-hover">
    <div class="my-pro-list">
        <div class="col-md-2 col-sm-2 col-xs-12">
            <img src="{{(!isset($types['photos'][0])) ? image_checker() : image_checker($types['photos'][0])}}" alt="image"/>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="feature-p-text">
                <h4>{{$units['property_type_name']}}</h4>
                <p>{{$units['address']}}</p>
                <span><b>Status:</b>  {{($units['is_available'] == 1) ? 'Available' : 'Not Available'}}</span><br>
                <div class="button-my-pro-list">
                    <a href="{{ url('rincian-property-unit/'.$units['id']) }}">Rp. {{number_format($units['price'])}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="select-pro-list text-center">
                <button type="submit" class="btn-blue border_radius">Simulasi KPR</button>
                <a href="{{ session('authenticate') ? url('eform').'?property_id='.Session::get('prop_id').'&property_name='.Session::get('prop_name').'&property_type_id='.$units['property_type_id'].'&property_type_name='.$units['property_type_name'].'&property_item_id='.$units['id'].'&developer_id='.Session::get('dev_id').'&developer_name='.Session::get('dev_name') : 'javascript:void(0)'}}" class="button-kpr check-login">Ajukan KPR</a>
            </div>
        </div>
    </div>
</div>