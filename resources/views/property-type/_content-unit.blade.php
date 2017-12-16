<div class="row bg-hover">
    <div class="my-pro-list">
        <div class="col-md-2 col-sm-2 col-xs-12">
            <img src="{{(!isset($units['photos'][0])) ? image_checker() : image_checker($units['photos'][0])}}" alt="image"/>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="feature-p-text">
                <h4>{{$units['property_type_name']}}</h4>
                <p>{{$units['address']}}</p>
                <span><b>Status:</b>  {{($units['is_available'] == 1) ? 'Tersedia' : 'Tidak Tersedia'}}</span><br>
                <div class="button-my-pro-list">
                    <a href="{{ url('rincian-property-unit/'.$units['id']) }}">Rp. {{number_format($units['price'])}}</a>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="select-pro-list text-center">
                <button type="submit" class="btn-blue border_radius">Simulasi KPR</button>
                <a href="{{ session('authenticate') ? url('eform').'?property_id='.Session::get('property_id').'&property_name='.Session::get('property_name').'&property_type_id='.$units['property_type_id'].'&property_type_name='.$units['property_type_name'].'&property_item_id='.$units['id'].'&developer_id='.$units['developer_id'].'&developer_name='.$units['developer_name'].'&property_item_address='.$units['address'].'&property_item_price='.$units['price'].'&prop_status='.$units['status'] : 'javascript:void(0)'}}" class="button-kpr {{ session('authenticate') ? '' : 'btn-login'}}">Ajukan KPR</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.btn-login').on('click', function(){
        $('#login-register').modal('show')
    });
</script>