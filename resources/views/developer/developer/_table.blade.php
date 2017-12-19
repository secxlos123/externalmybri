<div class="row">
	<div class="col-md-12">
        @if(Session::has('flash_message'))
            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
            @elseif(Session::has('error_flash_message'))
            <div class="alert alert-danger"><em> {!! session('error_flash_message') !!}</em></div>
            @endif
		<h2 class="text-uppercase bottom20">Manajemen Agen Developer</h2>
		<div class="btn-project bottom10">
			<a class="btn btn-primary" href="{!! route('developer.developer.create') !!}" role="button">
				<i class="fa fa-plus"></i> Tambah Agen Developer
			</a>
		</div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered unit-list" id="datatable">
                <thead class="bg-blue">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Handphone</th>
                        <th>Tgl lahir</th>
                        <th>Tgl gabung</th>
                        <th>Riwayat login</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
	</div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirmation Action
            </div>
            <div class="modal-body">
                Anda yakin untuk Banned Agen Developer ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Confrim</a>
            </div>
        </div>
    </div>
</div>

@push('parent-style')
	{!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
@endpush

@push('parent-script')
    {!! Html::script('assets/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables.bootstrap.js') !!}
    {!! Html::script('assets/js/bootbox.min.js') !!}

    <script type="text/javascript">
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
           
                data : function(d, settings){

                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                }
            },
            aoColumns : [
                { data: 'first_name', name: 'first_name' },
                { data: 'email', name: 'email' },
                { data: 'mobile_phone', name: 'mobile_phone' },
                { data: 'birth_date', name: 'birth_date' },
                { data: 'join_date', name: 'join_date' },
                { data: 'last_login', name: 'last_login' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });

    </script>
   
@endpush