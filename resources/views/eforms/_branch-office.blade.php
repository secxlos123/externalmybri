<div class="row">
    <div class="col-md-6">
        <h4 class="m-t-0 header-title"><b>Kantor Cabang</b></h4>
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
                <a href="javascript:void(0)" class="btn-xs btn-success btn-find">
                    <i class="fa fa-search"></i> CARI
                </a>
            </div>
        </div>

        <div id="office-area" {!! $errors->has('branch_id') ? '' : 'hidden' !!}>
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
                    'class' => 'form-control', 'rows' => 3, 'style' => 'resize: none', 'disabled', 'id' => 'branch_office_address'
                ]) !!}
            </div>
        </div>
    </div>
</div>


@push( 'parent-styles' )
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

@push( 'parent-scripts' )
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