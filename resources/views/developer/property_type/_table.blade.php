<div class="row">
    <div class="col-md-12">
        @if(Session::has('flash_message'))
            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
            @elseif(Session::has('error_flash_message'))
            <div class="alert alert-danger"><em> {!! session('error_flash_message') !!}</em></div>
        @endif
        <div class="add-btn bottom10 top20">
            @if ( request()->is('dev/proyek-type') )
                <a class="btn btn-primary" href="#filter" role="button" data-toggle="collapse">
                    <i class="fa fa-filter"></i> Filter
                </a>
            @endif

            <a href="{!! route('developer.proyek-type.create') !!}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Tipe Properti
            </a>
        </div>

            <div id="filter" class="collapse bottom20 top20" {{(request()->is('dev/proyek-type'))? 'hidden' : ''}}>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Property :</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('property', ['' => ''], old('property'), [
                                                'class' => 'select2 properties',
                                                'data-placeholder' => 'Pilih Proyek'
                                            ]) !!}
                                            <input type="hidden" name="prop_id" id="prop_id">
                                            <input type="hidden" id="prop_id_view" value="{{isset($property) ? $property->id : "" }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Tipe :</label>
                                        <div class="col-sm-8">
                                            {!! Form::text('proyek_type', old('proyek_type'), [
                                                'class' => 'form-control', 'id' => 'proyek_type',
                                                'placeholder' => 'Masukan nama proyek'
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Sertifikat :</label>
                                        <div class="col-sm-8">
                                            {!! Form::select('certificate', [
                                                '' => '',
                                                'SHM'   => 'SHM (Sertifikat Hak Milik)',
                                                'SHGB'  => 'SHGB (Sertifikat Hak Guna Bangunan)',
                                                'SHSRS' => 'SHSRS (Sertifikat Hak Satuan Rumah Susun)'
                                            ], old('certificate'), [
                                                'class' => 'select2 form-control', 'id' => 'certificate',
                                                'data-placeholder' => 'Pilih jenis sertifikat'
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Luas Tanah :</label>
                                        <div class="col-sm-8 surface">
                                            <div class="input-group">
                                                {!! Form::text('min_surface_area', old('min_surface_area'), [
                                                    'class' => 'form-control min_surface numeric',
                                                    'maxlength'=>'5'
                                                ]) !!}
                                                <span class="input-group-addon">s/d</span>
                                                {!! Form::text('max_surface_area', old('max_surface_area'), [
                                                    'class' => 'form-control max_surface numeric',
                                                    'maxlength'=>'5'
                                                ]) !!}
                                                <span class="input-group-addon">m<sup>2</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Luas Bangunan :</label>
                                        <div class="col-sm-8 building">
                                            <div class="input-group">
                                                {!! Form::text('min_building_area', old('min_building_area'), [
                                                    'class' => 'form-control min_building numeric',
                                                    'maxlength'=>'5'
                                                ]) !!}
                                                <span class="input-group-addon">s/d</span>
                                                {!! Form::text('max_building_area', old('max_building_area'), [
                                                    'class' => 'form-control max_building numeric',
                                                    'maxlength'=>'5'
                                                ]) !!}
                                                <span class="input-group-addon">m<sup>2</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-right">
                                    <a href="javascript:void(0)" id="btn-filter" class="btn btn-primary">Filter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <table class="table table-striped table-bordered project-list" id="datatable">
            <thead class="bg-blue">
                <tr>
                    <th>Nama Tipe</th>
                    <th>Luas Bangunan (m<sup>2</sup>)</th>
                    <th>Luas Tanah (m<sup>2</sup>)</th>
                    <th>Sertifikat</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('parent-style')
    {!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
@endpush

@push('parent-script')
    {!! Html::script('assets/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables.bootstrap.js') !!}
    {!! Html::script('assets/js/select2.min.js') !!}
    {!! Html::script('js/numeric.min.js') !!}

    {!! Html::script('js/dropdown.min.js') !!}

    <script type="text/javascript">
        var value = 0
            $min_surface = $('.min_surface')
            $max_surface = $('.max_surface')
            $min_building = $('.min_building')
            $max_building = $('.max_building')
            $certificate = $('#certificate')
            $proyek_type = $('#proyek_type');

        var table = $('#datatable').dataTable({
            processing : true,
            serverSide : true,
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                url : '{{ route("developer.proyek.prop_type") }}',
                data : function(d, settings){

                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    if ($min_surface.val() != '' || $max_surface.val() != '')
                        d.surface_area  = $min_surface.val() + '|' + $max_surface.val();

                    if ($min_building.val() != '' || $max_building.val() != '')
                        d.building_area = $min_building.val() + '|' + $max_building.val();

                    if ($('#prop_id').val()) {
                        d.property_id = $('#prop_id').val();
                    }
                    if ($('#prop_id_view').val() != '') {
                        d.property_id = $('#prop_id_view').val();
                    }

                    d.certificate = $certificate.val();
                    d.proyek_type = $proyek_type.val();
                }
            },
            aoColumns : [
                { data: 'name', name: 'name', bSortable: true },
                { data: 'building_area', name: 'building_area', bSortable: true },
                { data: 'surface_area', name: 'surface_area', bSortable: true },
                { data: 'certificate', name: 'certificate', bSortable: true },
                { data: 'items', name: 'items', bSortable: true },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });

        $certificate.select2({allowClear: true, width: '100%'});
        $('#btn-filter').on('click', function (event) {
            if (filterRange('building')) {
                if (filterRange('surface')) {
                    table.fnDraw();
                }
            }
        });
        $('.properties').dropdown('property');
        $('.properties').on('change', function(){
            $('#prop_id').val($(this).select2('data')[0]['id']);
        });
        // $min_surface.numeric(null, 0).on('change', set_max);
        // $min_building.numeric(null, 0).on('change', set_max);

        // function set_max(e) {
        //     value   = parseInt($(this).val());
        //     var min = ! isNaN(value) ? value : null;
        //     $max_field = $(e.target).hasClass('min_surface') ? $max_surface : $max_building;
        //     $max_field.val(min).numeric(null, min).on('change', set_value_max);
        // }

        // function set_value_max(e) {
        //     var val = parseInt($(this).val());
        //     if (val < value) $(this).val(value).trigger('change');
        // }

        function filterRange(tag)
        {
            if (tag == 'building') {
                $min_var = $min_building;
                $max_var = $max_building;
            }else{
                $min_var = $min_surface;
                $max_var = $max_surface;
            }

            if ($min_var.val()) {
                if (!$max_var.val()) {
                    $('div.'+tag+' span.messageError').remove();
                    $('div.'+tag).append("<span style=\"color:#B0413E;\" class=\"messageError\">Nilai maksimum harus diisi.</span>");
                    return false;
                }
                else if(Math.abs($max_var.val()) >= 10001)
                {
                    $('div.'+tag+' span.messageError').remove();
                    $('div.'+tag).append("<span style=\"color:#B0413E;\" class=\"messageError\">Nilai maksimum Tidak Lebih Dari 10.0000.</span>");
                    return false;
                }
                else{
                    if (Math.abs($min_var.val()) > Math.abs($max_var.val())) {
                        $('div.'+tag+' span.messageError').remove();
                        $('div.'+tag).append("<span style=\"color:#B0413E;\" class=\"messageError\">Nilai maksimum harus lebih besar dari minimum.</span>");
                        return false;
                    }else{
                        $('div.'+tag+' span.messageError').remove();
                        return true;
                    }
                }
            }else{
                if (!$min_var.val()) {
                    $('div.'+tag+' span.messageError').remove();
                    $('div.'+tag).append("<span style=\"color:#B0413E;\" class=\"messageError\">Nilai Minimum harus diisi.</span>");
                    return false;
                }
                else if(Math.abs($min_var.val()) <= 31)
                {
                    $('div.'+tag+' span.messageError').remove();
                    $('div.'+tag).append("<span style=\"color:#B0413E;\" class=\"messageError\">Nilai Minimum Harus Lebih Atau Sama Dengan 30.</span>");
                    return false;
                }
                else{
                    if (Math.abs($min_var.val()) > Math.abs($max_var.val())) {
                        $('div.'+tag+' span.messageError').remove();
                        $('div.'+tag).append("<span style=\"color:#B0413E;\" class=\"messageError\">Nilai maksimum harus lebih besar dari minimum.</span>");
                        return false;
                    }else{
                        $('div.'+tag+' span.messageError').remove();
                        return true;
                    }
                }
            }
        }

    </script>
@endpush