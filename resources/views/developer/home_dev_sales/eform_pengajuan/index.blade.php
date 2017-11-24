@extends('layouts.app')

@section('title', 'Manajemen Proyek')

@section('breadcrumb')
	<h1 class="text-uppercase">Manajemen Data Pengajuan Eform</h1>
	<p>Kelola Data anda di sini.</p>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! url('/') !!}">Dashboard</a></li>
	    <li class="active">Pengajuan</li>
	</ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-project bottom10">
					<a class="btn btn-primary" href="#filter" role="button" data-toggle="collapse">
						<i class="fa fa-filter"></i> Filter
					</a>
					<a class="btn btn-primary" href="{!! route('eform.index') !!}" role="button">
						<i class="fa fa-plus"></i>  Tambah Pengajuan Baru
					</a>
				</div>
				<div id="filter" class="collapse bottom20 top20">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">No Ref :</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('noref', ['' => ''], old('noref'), [
                                                    'class' => 'select2 cities',
                                                    'data-placeholder' => '-- Pilih Noref --',
                                                    'style' => 'width: 100%'
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Leads :</label>
                                            <div class="col-sm-8">
                                                {!! Form::text('leads', old('leads'), [
                                                    'class' => 'form-control', 'id' => 'leads',
                                                    'placeholder' => 'Masukan nama Leads'
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status Pengajuan :</label>
                                            <div class="col-sm-8">
                                                {!! Form::text('stat_pengajuan', old('stat_pengajuan'), [
                                                    'class' => 'form-control', 'id' => 'stat_pengajuan',
                                                    'placeholder' => 'Masukan nama agent / sales'
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
	                            <th>No Ref</th>
	                            <th>Leads</th>
	                            <th>Nominal</th>
	                            <th>Status Pengajuan</th>
	                            <th>Produk</th>
	                            <th>AO</th>
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

                    d.city = $('.noref').val();
                    d.name_proyek = $('#leads').val();
                    d.agent = $('#stat_pengajuan').val();
                }
            },
            aoColumns : [
                { data: 'no_ref', name: 'no_ref' },
                { data: 'leads', name: 'leads' },
                { data: 'nominal', name: 'nominal' },
                { data: 'stat_pengajuan', name: 'stat_pengajuan' },
                { data: 'product', name: 'product' },
                { data: 'ao', name: 'ao' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });

        $('#btn-filter').on('click', function () {
        	table.fnDraw();
        });

        // Init dropdown.js
        $('.cities').dropdown('noref');
    </script>
@endpush