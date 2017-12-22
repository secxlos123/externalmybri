<div class="row">
    @if(Session::has('flash_message'))
    <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
    @elseif(Session::has('error_flash_message'))
    <div class="alert alert-danger"><em> {!! session('error_flash_message') !!}</em></div>
    @endif
	<div class="col-md-12">
		<div class="btn-project bottom10">
            @if ( request()->is('dev/proyek-item') )
                <a class="btn btn-primary" href="#filter" role="button" data-toggle="collapse">
                    <i class="fa fa-filter"></i> Filter
                </a>
            @endif
			<a class="btn btn-primary" href="{!! route('developer.proyek-item.create') !!}" role="button">
				<i class="fa fa-plus"></i> Tambah Unit
			</a>
		</div>

        <div id="filter" class="collapse bottom20 top20" {{(request()->is('dev/proyek-type'))? 'hidden' : ''}}>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Proyek :</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('property', ['' => ''], old('property'), [
                                            'class' => 'select2 properties',
                                            'data-placeholder' => 'Pilih Proyek'
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tipe Proyek :</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('property_type_id', ['' => ''], old('property_type_id'), [
                                            'class' => 'select2 property_type',
                                            'data-placeholder' => 'Pilih Tipe Proyek'
                                        ]) !!}
                                        <input type="hidden" name="value_prop_type" id="value_prop_type">
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


        <div class="table-responsive">
            <table class="table table-striped table-bordered unit-list" id="datatable">
                <thead class="bg-blue">
                    <tr>
                        <th>Tipe Proyek</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Available</th>
                        <th>Status Property</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
	</div>
</div>

@push('parent-style')
	{!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
@endpush



@push('parent-script')
    {!! Html::script('assets/js/select2.min.js') !!}
    {!! Html::script('assets/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables.bootstrap.js') !!}
    {!! Html::script('js/dropdown.min.js') !!}

    <script type="text/javascript">
        $('.property_type').select2({width: '100%'});

        var prop_type = $('.property_type').select2('data')[0]['id'];

        var table = $('#datatable').dataTable({
            processing : true,
            serverSide : true,
            order : [[3, 'asc']],
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
            language : {
                infoFiltered : '(disaring dari _MAX_ data keseluruhan)'
            },
            ajax : {
                data : function(d, settings){

                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    if ($('#value_prop_type').val()) {
                        d.property_type_id = $('#value_prop_type').val();
                    }
                }
            },
            aoColumns : [
                { data: 'property_type_name', name: 'property_type_name' },
                { data: 'address', name: 'address' },
                { data: 'price', name: 'price' },
                { data: 'is_available', name: 'is_available' },
                { data: 'prop_status', name: 'prop_status' },
                { data: 'available_status', name: 'available_status' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });


        $('.properties').dropdown('property')
            .on('select2:select', set_property_type)
            .on('select2:unselect', unset_property_type);

        function set_property_type(e) {
            var id = $(this).val();
            $('.property_type').empty().dropdown('types', {prop_id : id});
        }

        function unset_property_type(e) {
            $('.property_type').empty().select2({width: '100%'});
        }

        $('.property_type').on('change', function(){
            $('#value_prop_type').val($(this).select2('data')[0]['id']);
        });

        $('#btn-filter').on('click', function (event) {
            table.fnDraw();
        });
         $('#datatable_next').on( 'click', function (event) {
                 table.page( 'next' ).fnDraw( 'page' );
                } );
 
               $('#datatable_previous').on( 'click', function (event) {
                 table.page( 'previous' ).fnDraw( 'page' );
             } );
    </script>
@endpush