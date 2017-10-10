<div class="row">
    <div class="col-md-12">
        <div class="add-btn bottom10 top20">
            <a href="javascript:void(0)" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Tipe Properti
            </a>
        </div>
        <table class="table table-striped table-bordered project-list" id="datatable">
            <thead class="bg-blue">
                <tr>
                    <th>Nama Tipe</th>
                    <th>Luas Tanah (m<sup>2</sup>)</th>
                    <th>Luas Bangunan (m<sup>2</sup>)</th>
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
                    ) + 1;
                }
            },
            aoColumns : [
                { data: 'name', name: 'name' },
                { data: 'building_area', name: 'building_area' },
                { data: 'surface_area', name: 'surface_area' },
                { data: 'certificate', name: 'certificate' },
                { data: 'items', name: 'items' },
                { data: 'action', name: 'action', bSortable: false },
            ],
        });
    </script>
@endpush