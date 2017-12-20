<div class="col-md-12">
					<h2 class="uppercase bottom20">Top 5 Projects</h2>
				</div>
<div class="panel panel-default">
	<div class="panel-body">
  		{!! Form::open(['url' => 'dev/pengajuan-aplikasi','class' => 'callus top201', 'id' => 'form-table']) !!}
	  		<div class="col-md-4">
	        	<label class="col-sm-4 control-label">Mulai Dari :</label>     
	           {!! Form::text('start_date', null, ['class' => 'col-sm-8','id' => 'start_date_table']) !!}
	    	</div>
	    	<div class="col-md-4">
	        	<label class="col-sm-4 control-label">Hingga :</label>     
	               {!! Form::text('start_date', null, ['class' => 'col-sm-8','id' => 'end_date_table']) !!}
	    	</div>
	    	<button type="submit" class="btn btn-primary">
	                    <i class="mdi mdi-content-save"></i> filter
	        </button>
        </form>
        <br/>
        <br/>
    <div class="col-md-12">   
	 <div class="table-responsive">
    	<div id="table_user">           
		                <table class="table table-striped table-bordered project-list" id="datatable">
		                    <thead class="bg-blue">
					<tr>
						<th>No</th>
						<th>Nama Proyek</th>
						<th>Tipe Property</th>
						<th>Unit</th>
						<th>Harga Unit</th>
						<th>Nama Pemohon</th>
						<th>Status Pengajuan</th>
					</tr>
				</thead>
				<tbody>
					@foreach($userList as $key => $value)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$value['property_name']}}</td>
							<td>{{$value['unit_type']}}</td>
							<td>{{$value['address']}}</td>
							<td>{{$value['unit_price']}}</td>
							<td>{{$value['name']}}</td>
							<td>{{$value['approved_status']}}</td>
							 
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		</div>
</div>
</div>
</div>
 