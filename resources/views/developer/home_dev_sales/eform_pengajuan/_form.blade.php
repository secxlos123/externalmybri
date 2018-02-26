<div class="row top20">
    <div class="col-md-5 col-md-offset-1">
        <div class="single-query form-group bottom20
            {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nama Proyek') !!}
            {!! Form::text('name', old('name'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan nama proyek properti'
            ]) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('city_id') ? ' has-error' : '' }}">
            {!! Form::label('city_id', 'Kota') !!}
            {!! Form::select('city_id', ['' => ''] + [
                isset($property->city_id) ? $property->city_id : old('city_id') =>
                isset($property->city_name) ? $property->city_name : old('city_name')
            ], old('cities'), [
                'class' => 'select2 cities',
                'data-option' => isset($property->city_id) ? $property->city_id : old('city_id'),
                'data-placeholder' => '-- Pilih Kota --',
            ]) !!}
            {!! Form::hidden('city_name', old('city_name'), ['id' => 'city_name']) !!}

            @if ($errors->has('city_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('city_id') }}</strong>
                </span>
            @endif
        </div>

        <div class="single-query form-group bottom20
            {{ $errors->has('category') ? ' has-error' : '' }}">
            {!! Form::label('category', 'Kategori') !!}
            {!! Form::select('category', [
                '' => '', "1" => "Rumah Tapak", "2" => "Rumah Susun/Apartment", "3" => "Rumah Toko"
            ], old('category'), [
                'class' => 'select2',
                'data-placeholder' => '-- Pilih Kategori --'
            ]) !!}

            @if ($errors->has('category'))
                <span class="help-block">
                    <strong>{{ $errors->first('category') }}</strong>
                </span>
            @endif
        </div>
         <div class="single-query form-group bottom20
            {{ $errors->has('pks_number') ? ' has-error' : '' }}">
           {!! Form::label('pks_number', 'Nomor PKS') !!}
            {!! Form::text('pks_number', old('pks_number'), [
                'class' => 'keyword-input',
                'placeholder' => 'Nomor PKS'
            ]) !!}

            @if ($errors->has('pks_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('pks_number') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('kanwil') ? ' has-error' : '' }}">
           {!! Form::label('kanwil', 'Kantor Wilayah BRI *') !!}
            {!! Form::select('kanwil', ['' => ''] + [
                    old('kanwil_id') => old('kanwil_name')
                ], old('kanwil_id'), [
                'class' => 'keyword-input select2',
                'data-option'   => old('kanwil_id'),
                'data-placeholder' => 'Pilih Kantor Wilayah'
            ]) !!}

            @if ($errors->has('kanwil'))
                <span class="help-block">
                    <strong>{{ $errors->first('kanwil') }}</strong>
                </span>
            @endif
        </div>
        <!--  <p class="m-t-0 header-title"><b>Kantor Cabang</b></p>
        <p class="text-muted m-b-30 font-13">
            Pilih kantor cabang terdekat
        </p>
        <div class="form-group col-md-12">
            <label class="control-label">Jarak Kantor Terdekat : <b id="distance-office"></b> (kilometer)</label>
            <div class="clearfix"></div>
            <div class="col-md-10" style="padding-left: unset;">
                <input type="range" min="1" max="20" value="10" class="slider" id="range">
            </div>
            <div class="col-md-2" style="padding-left: unset; top: -3px;">
                <a href="javascript:void(0)" class="btn-xs btn-orange btn-find">
                    <i class="fa fa-search"></i> CARI
                </a>
            </div>
        </div>

        <div id="office-area" {!! null !== old('branch_name') ? '' : '' !!}>
            {!! Form::hidden('branch_name', old('branch_name'), ['id' => 'branch_name']) !!}
            <div class="form-group col-md-12">
                <label class="control-label">Kantor Cabang BRI *</label>
                {!! Form::select('branch_id', ['' => ''] + [
                    old('branch_id') => old('branch_name')
                ], old('branch_id'), [
                    'class' => 'form-control select2 offices',
                    'data-option' => old('branch_id'),
                    'data-placeholder' => 'Pilih Kota'
                ]) !!}
            </div>

            <div class="form-group col-md-12">
                <label class="control-label">Alamat Kantor Cabang BRI</label>
                {!! Form::textarea('branch_office_address', old('branch_office_address'), [
                    'class' => 'form-control', 'rows' => 3, 'style' => 'resize: none', 'readonly', 'id' => 'branch_office_address'
                ]) !!}
            </div>
        </div> -->
    </div>
    <div class="col-md-5">
        <div class="single-query form-group bottom20
            {{ $errors->has('pic_name') ? ' has-error' : '' }}">
            {!! Form::label('pic_name', 'Nama PIC Project') !!}
            {!! Form::text('pic_name', old('pic_name'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan nama PIC Project'
            ]) !!}

            @if ($errors->has('pic_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('pic_name') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('pic_phone') ? ' has-error' : '' }}">
            {!! Form::label('pic_phone', 'Nomor HP PIC Project') !!}
            {!! Form::text('pic_phone', old('pic_phone'), [
                'class' => 'keyword-input numeric',
                'placeholder' => 'Masukkan nomor hp PIC Project',
                'maxlength' => 12,
                'minlength' => 9
            ]) !!}

            @if ($errors->has('pic_phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('pic_phone') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('photo', 'Foto') !!}
            {!! Form::file('photo', [
                'class' => 'filestyle', 'data-target' => 'ktp_preview',
                'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
            ]) !!}

            @if ($errors->has('photo'))
                <span class="help-block">
                    <strong>{{ $errors->first('photo') }}</strong>
                </span>
            @endif
        </div>

        @if ( isset($property->photo) )

            <div class="form-group ktp_preview">
                {!! Html::image($property->photo ?: 'assets/images/no-image.jpg', 'KTP', [
                    'class' => 'img-responsive', 'id' => 'ktp_preview', 'style' => 'max-height: 300px; width: 100%',
                    'data-src' => asset('assets/images/no-image.jpg')
                ]) !!}
            </div>

        @else

            <div class="form-group ktp_preview">
                {!! Html::image('assets/images/no-image.jpg', 'KTP', [
                    'class' => 'img-responsive', 'id' => 'ktp_preview', 'style' => 'max-height: 300px; width: 100%',
                    'data-src' => asset('assets/images/no-image.jpg')
                ]) !!}
            </div>

        @endif

    </div>
</div>

<div class="row bottom20">
    <div class="col-md-10 col-md-offset-1 {{ $errors->has('address') ? ' has-error' : '' }}">
        <h3 class="bottom10">Alamat Proyek</h3>
        <input id="searchInput" class="input-controls" type="text" placeholder="Masukkan lokasi properti">

        <div class="map" id="map"></div>

        <div class="form-group m-t-20">
            {!! Form::textarea('address', old('address'), [
                'class' => 'form-control', 'id' => 'location',
                'rows' => 3, 'style' => 'resize: none'
            ]) !!}

            {!! Form::hidden('latitude', old('latitude'), ['id' => 'lat']) !!}
            {!! Form::hidden('longitude', old('longitude'), ['id' => 'lng']) !!}

            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row bottom40">
    <div class="col-md-1"></div>
    <div class="col-md-10 {{ $errors->has('description') ? ' has-error' : '' }}">
        <h3 class="bottom10">Deskripsi Properti</h3>
        {!! Form::textarea('description', old('description'), [
            'id' => 'txtEditor', 'class' => 'editor'
        ]) !!}

        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-1"></div>
</div>

<div class="row bottom40">
    <div class="col-md-1"></div>
    <div class="col-md-10 {{ $errors->has('facilities') ? ' has-error' : '' }}">
        <h3 class="bottom10">Fasilitas</h3>
        {!! Form::textarea('facilities', old('facilities'), [
            'id' => 'txtEditor2', 'class' => 'editor'
        ]) !!}

        @if ($errors->has('facilities'))
            <span class="help-block">
                <strong>{{ $errors->first('facilities') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-1"></div>
</div>

@push( 'styles' )
    {!! Html::style( 'assets/css/select2.min.css' ) !!}
    {!! Html::script( 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places' ) !!}

    <style type="text/css">
        .map {
            width: 100%;
            height: 400px;
        }
        label.btn.btn-default {
            padding: 11px;
        }
    </style>

    <style type="text/css">
        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 15px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #4CAF50;
            cursor: pointer;
        }
    </style>

@endpush

@push( 'scripts' )
    {!! Html::script( 'assets/js/jquery.gmaps.js' ) !!}
    {!! Html::script( 'assets/js/ckeditor/ckeditor.js' ) !!}
    {!! Html::script( 'assets/js/select2.min.js' ) !!}
    {!! Html::script( 'assets/js/bootstrap-filestyle.min.js' ) !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script( 'js/dropdown.min.js' ) !!}
    {!! JsValidator::formRequest($validation, '#form-property') !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">
        CKEDITOR.replace( 'txtEditor' );
        CKEDITOR.replace( 'txtEditor2' );
        $('select').select2({allowClear: true});

        $('.cities').dropdown('cities')
            .on('select2:select', function(e) {
                var data = e.params.data;
                $('#city_name').val(data.name);
            })
            .on('select2:unselect', function (e) {
                $('#city_name').val('');
            })
            .val($('.cities').data('option'))
            .trigger('change');
    </script>
    <script type="text/javascript">
        $lat = $('#lat');
        $long = $('#lng');
        $range = $('#range');
        $offices = $('.offices');
        $office_area = $('#office-area');
        $distance_office = $('#distance-office');
        $distance_office.html($range.val());

        $range.on('input change', function () {
            $offices.empty().select2({width : '100%'}).trigger('select2:unselect');
            $distance_office.html($(this).val());
            $office_area.attr('hidden', true);
        });

        $('.btn-find').on('click', function () {
            $office_area.removeAttr('hidden');

            $offices.dropdown('offices', {
                lat  : $lat.val(),
                long : $long.val(),
                distance : $distance_office.text(),
            })
            .on('select2:select', function (e) {
                var data = e.params.data;
                $('#branch_name').val(data.unit);
                $('#branch_office_address').val(data.address);
            })
            .on('select2:unselect', function (e) {
                $('#branch_office_address, #branch_name').val('');
            });
        });
    </script>
@endpush


