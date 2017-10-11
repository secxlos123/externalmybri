<div class="row">
	<div class="col-md-12">
		<h2 class="text-uppercase bottom20">Manajemen Developer</h2>
		<div class="btn-project bottom10">
			<a class="btn btn-primary" href="{!! route('developer.developer.create') !!}" role="button">
				<i class="fa fa-plus"></i> Tambah Developer
			</a>
		</div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered unit-list" id="datatable">
                <thead class="bg-blue">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
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

@push('parent-style')
	{!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
@endpush

@push('parent-script')
    {!! Html::script('assets/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables.bootstrap.js') !!}

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
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'price', name: 'price' },
                { data: 'is_available', name: 'is_available' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });
    </script>
@endpush