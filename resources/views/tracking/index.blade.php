@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section id="property" class="padding listing1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content-page">
                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="datatable">
                                            <thead class="bg-blue">
                                                <tr>
                                                    <th>Nama pemohon</th>
                                                    <th>Developer</th>
                                                    <th>Property</th>
                                                    <th>AO</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
    {!! Html::style('assets/css/jquery.dataTables.min.css') !!}
    {!! Html::style('assets/css/dataTables.bootstrap.min.css') !!}
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
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
                    console.log(api);
                    d.page = Math.min(
                        Math.max(0, Math.round(d.start / api.page.len())),
                        api.page.info().pages
                    );
                }
            },
            aoColumns : [
                { data: 'nama_pemohon', name: 'nama_pemohon' },
                { data: 'developer_name', name: 'developer_name' },
                { data: 'property_name', name: 'property_name' },
                { data: 'ao', name: 'ao' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });
    </script>
@endpush