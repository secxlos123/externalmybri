<?php

    function IndonesiaTgl($tanggal){
    $tgl=substr($tanggal,8,2);
    $bln=substr($tanggal,5,2);
    $thn=substr($tanggal,0,4);
    $tanggal="$bln-$tgl-$thn";
    return $tanggal;
}

 ;?>
<div class="row">
	<div class="col-md-12">
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
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['contents']['data'] as $key => $value) :?>
                    <tr>
                        <td>{{ $value["first_name"] }} {{  $value["last_name"] }}</td>
                        <td>{{ $value["email"] }}</td>
                        <td>{{ $value["mobile_phone"] }}</td>
                        <td>{{ IndonesiaTgl($value["birth_date"]) }}</td>
                        <td>{{ IndonesiaTgl($value["join_date"]) }}</td>
                        <td>{{ $value["last_login"] }}</td>
                        <td><center><a href="{{ url('dev/developer/edit/'.$value['user_id']) }}" class="btn btn-primary" role="button"><i class="fa fa-edit"></i> Edit</a></center></td>
                        <td>
                        
<!--        {!! Form::open([
            'route' => ['developer.developer.deactive', $value["user_id"]] ,
            'method' => 'PUT',
            'id'    => 'alert'     
        ]) !!} -->
        <form action="{{ url('dev/developer/banned/'.$value['user_id']) }}" id="falert{{$value['user_id']}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @if($value['is_actived'] == true)
        {!! Form::hidden('is_actived', 'f', [ 'class' => '' ]) !!}
        <center><input type="submit" class="btn btn-warning" id="alert{{ $value['user_id'] }}" value="Banned"></center>
        @elseif($value['is_actived'] == false)
        {!! Form::hidden('is_actived', 't', [ 'class' => '' ]) !!}
        <center><input type="submit" class="btn btn-success" id="reactive{{ $value['user_id'] }}" value="Reactived"></center>
        @endif
     <!--    {!! Form::close() !!} -->
        </form>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
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
    {!! Html::script('assets/js/bootbox.min.js') !!}

    <script type="text/javascript">
        $(document).ready(function() {
    $('#datatable').DataTable( {
        lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10', '25', '50', 'All' ]
            ],
        "initComplete": function () {
            var api = this.api();
        }
    } );
} );
    </script>
    <?php foreach ($data['contents']['data'] as $key => $value){ ?>
    <script type="text/javascript">
    $(document).on("click", "#alert{{ $value['user_id'] }}", function(e){
       e.preventDefault();
        bootbox.confirm("Yakin untuk Banned Agen Developer ini", function(confirmed){
                if(confirmed)
                {
                   $("form#falert{{$value['user_id']}}").submit();
                };
        
    });
});
    </script>
    <script type="text/javascript">
        $(document).on("click", "#reactive{{ $value['user_id'] }}", function(e){
            e.preventDefault();
            bootbox.confirm("Yakin untuk Mengaktifkan kembali Agen Developer ini", function(confirmed){
                if(confirmed)
                {
                    $("form#falert{{$value['user_id']}}").submit();
                }
            });
        });
    </script>
    <?php } ;?>
@endpush