@extends('layouts.app')

@section('title', 'Manajemen Proyek')

@section('breadcrumb')
	<h1 class="text-uppercase">Manajemen Proyek</h1>
	<p>Kelola proyek anda di sini.</p>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! url('/') !!}">Dashboard</a></li>
	    <li class="active">Proyek</li>
	</ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-uppercase bottom20">Manajemen Proyek</h2>
				<div class="btn-project bottom10">
					<a class="btn btn-primary" href="#filter" role="button" data-toggle="collapse">
						<i class="fa fa-filter"></i> Filter
					</a>
					<a class="btn btn-primary" href="{!! route('developer.proyek.create') !!}" role="button">
						<i class="fa fa-plus"></i> Tambah Proyek
					</a>
				</div>
				<div id="filter" class="collapse bottom20 top20">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Kota :</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('cities', ['' => ''], old('cities'), [
                                                    'class' => 'select2 cities',
                                                    'data-placeholder' => '-- Pilih Kota --',
                                                    'style' => 'width: 100%'
                                                ]) !!}
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
	                <table class="table table-striped table-bordered project-list" id="datatable">
	                    <thead class="bg-blue">
	                        <tr>
	                            <th>Nama Proyek</th>
	                            <th>Kota</th>
	                            <th>Jumlah Tipe</th>
	                            <th>Jumlah Unit</th>
	                            <th>PIC</th>
	                            <th>Telepon</th>
	                            <th>Aksi</th>
	                        </tr>
	                    </thead>
	                </table>
                </div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('styles')
	{!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/dataTables.bootstrap.js') !!}
    {!! Html::script('assets/js/select2.min.js') !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script('js/dropdown.min.js') !!}

    
    <!-- @todo waiting to move this script to resource/asset/js/property.js -->
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

                    d.city = $('.cities').val();
                }
            },
            aoColumns : [
                { data: 'prop_name', name: 'prop_name' },
                { data: 'prop_city_name', name: 'prop_city_name' },
                { data: 'prop_types', name: 'prop_types' },
                { data: 'prop_items', name: 'prop_items' },
                { data: 'prop_pic_name', name: 'prop_pic_name' },
                { data: 'prop_pic_phone', name: 'prop_pic_phone' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });

        $('#btn-filter').on('click', function () {
        	table.fnDraw();
        });

        // Init dropdown.js
        $('.cities').dropdown('cities');
    </script>
@endpush