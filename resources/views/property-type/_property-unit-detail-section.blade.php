@foreach ($results['data'] as $key => $units)
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
                <button type="submit" class="btn-blue border_radius">Ajukan KPR</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<input type="hidden" name="last-page" id="last-page" value="{{$results['last_page']}}">
<input type="hidden" name="cur-page" id="current-page" value="{{$results['current_page']}}">