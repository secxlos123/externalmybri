<div class="row">
    <div class="col-md-6">
        <h4 class="m-t-0 header-title"><b>Waktu</b></h4>
        <p class="text-muted m-b-30 font-13">
            Tentukan Waktu Pertemuan
        </p>
        <div class="form-group">
            <label class="control-label col-md-4">Tanggal :</label>
            <div class="col-md-8">
                <div class="input-group">
                    {!! Form::text('appointment_date', old('appointment_date'), [
                        'class' => 'form-control datepicker-autoclose'
                    ]) !!}
                    <span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-t-0 header-title"><b>Lokasi</b></h4>
        <p class="text-muted m-b-30 font-13">
            Tentukan lokasi/tempat Pertemuan
        </p>
        <input id="searchInput" class="input-controls" type="text" placeholder="Masukkan lokasi pertemuan">

        <div class="map" id="map"></div>
        <input type="hidden" id="long" >
        <input type="hidden" id="lat" >

        <div class="form-group m-t-20">
            {!! Form::textarea('address_location', old('address_location'), [
                'class' => 'form-control', 'id' => 'location',
                'rows' => 3, 'style' => 'resize: none'
            ]) !!}

            {!! Form::hidden('latitude', old('latitude'), ['id' => 'lat']) !!}
            {!! Form::hidden('longitude', old('longitude'), ['id' => 'lng']) !!}

            @if ($errors->has('address_location'))
                <span class="help-block">
                    <strong>{{ $errors->first('address_location') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

@push( 'parent-styles' )
    {!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places') !!}
    {!! Html::script( 'assets/js/jquery.gmaps.js' ) !!}
    <style type="text/css">
        .map {
            width: 100%;
            height: 400px;
        }
    </style>
@endpush

@push( 'parent-scripts' )
    {!! Html::script('assets/js/jquery.gmaps.js') !!}
    
    <script type="text/javascript">
        $('.datepicker-autoclose').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            startDate: '0days'
        });
    </script>
@endpush
