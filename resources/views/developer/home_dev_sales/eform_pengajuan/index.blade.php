@extends('layouts.app')

@section('title', 'Manajemen Data Pengajuan Eform')

@section('breadcrumb')
	<h1 class="text-uppercase">Manajemen Data Pengajuan Eform</h1>
	<p>Kelola Data anda di sini.</p>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! url('dev-sales/dashboard') !!}">Dashboard</a></li>
	    <li class="active">Pengajuan</li>
	</ol>
@endsection

@section('content')
<section id="agent-2-peperty" class="profile padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-project bottom10">
					<!-- <a class="btn btn-primary" href="#filter" role="button" data-toggle="collapse">
						<i class="fa fa-filter"></i> Filter
					</a> -->
					<a class="btn btn-primary" href="{!! route('eform.eform-agen') !!}" role="button">
						<i class="fa fa-plus"></i>  Tambah Pengajuan Baru
					</a>
				</div>
				<!-- <div id="filter" class="collapse bottom20 top20">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">No Ref :</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('ref_number', ['' => ''], old('ref_number'), [
                                                    'class' => 'select2 ref_number',
                                                    'data-placeholder' => '-- Pilih Noref --',
                                                    'style' => 'width: 100%'
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Leads :</label>
                                            <div class="col-sm-8">
                                                {!! Form::select('nik',  ['' => ''], old('nik'), [
                                                    'class' => 'select2 nik', 'id' => 'nik',
                                                    'data-placeholder' => 'Masukan/ Cari nomor Leads atau nik'
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status Pengajuan :</label>
                                            <div class="col-sm-8">
                                                {!! Form::text('stat_pengajuan', old('stat_pengajuan'), [
                                                    'class' => 'form-control', 'id' => 'stat_pengajuan',
                                                    'placeholder' => 'Status Pengajuan'
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
                </div> -->
                 <div class="table-responsive">
                    <table class="table table-striped table-bordered project-list" id="datatable">
                        <thead class="bg-blue">
                        
                            <tr>
                                <th>No Ref</th>
                                <th>Leads</th>
                                <th>Nominal</th>
                                <th>Status Pengajuan</th>
                                <th>Produk</th>
                                <!-- <th>AO</th> -->
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
             //   url:'/datatable/eforms',
                data : function(d, settings){

                    var api = new $.fn.dataTable.Api(settings);

                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );

                    d.ref_number = $('.ref_number').val();
                    d.nik = $('.nik').val();
                    d.status = $('#status').val();
                }
            },
            aoColumns : [
                { data: 'ref_number', name: 'ref_number' },
                { data: 'customer_name', name: 'customer_name' },
                { data: 'nominal', name: 'nominal' },
                { data: 'status', name: 'status' },
                { data: 'product_type', name: 'product_type' },
                // { data: 'ao_name', name: 'ao_name' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });

        $('#btn-filter').on('click', function () {
        	table.fnDraw();
        });

        // Init dropdown.js
        $('.ref_number').dropdown('ref_number');
        $('.nik').select2({
            maximumInputLength : 25,
            witdh : '100%',
            allowClear: true,
            ajax : {
                url:'{{ route("eform.get-list-ustomer") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        nik: params.term,
                        page: params.page || 1
                    };
                },
                processResults: function (data, params) {
                    $('.select2-search__field').attr('maxlength', 16);
                    $(".select2-search__field").keydown(function (e) {
                        // Allow: backspace, delete, tab, escape, enter and .
                        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                             // Allow: Ctrl+A
                            (e.keyCode == 65 && e.ctrlKey === true) ||
                             // Allow: Ctrl+C
                            (e.keyCode == 67 && e.ctrlKey === true) ||
                             // Allow: Ctrl+X
                            (e.keyCode == 88 && e.ctrlKey === true) ||
                            // Allow: backspace
                            (e.keyCode === 320 && e.ctrlKey === true) ||
                             // Allow: home, end, left, right
                            (e.keyCode >= 35 && e.keyCode <= 39)) {
                                 // let it happen, don't do anything
                                 return;
                        }
                        // Ensure that it is a number and stop the keypress
                          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                e.preventDefault();
                        }
                    });
                    if( (data.customers.data.length) == 0 ){
                        return {
                            results: '',
                        };

                    } else {
                        params.page = params.page || 1;
                        return {
                            results: data.customers.data,
                            pagination: {
                                more: (params.page * data.customers.per_page) < data.customers.total
                            }
                        };
                    }

                    var text = $(this).find("option:selected").text();
                        
                        console.log(text);
                },
                cache: true
            }
        });
    </script>
@endpush