<div class="col-md-12">
	<h2 class="uppercase bottom20">&nbsp;</h2>
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
								<th>Nama Sales</th>
								<th>Jumlah Pengajuan</th>
								<th>Jumlah Terjual</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($userList as $x => $data)
								<tr>
									<td> {{ $x+1 }} </td>
									<td> {{ $data['first_name'] }} {{ $data['last_name'] }} </td>
									<td> {{ $data['eform'] }} </td>
									<td> {{ $data['eform_approved'] }} </td>
									<td> 
										<button class="btn btn-sm btn-primary" title="View Detail" data-id="{{ $data['user_id'] }}" data-toggle="modal" data-target="#modalDetail" id="btnView">
											<i class="fa fa-eye"></i>
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modalDetail" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"> &times; </button>
				<h4 class="modal-title">List Properties</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Proyek</td>
                                    <td>Tipe</td>
                                    <td>Unit</td>
                                    <td>Harga</td>
                                </tr>
                            </thead>
                            <tbody class="listProperties">
                            	<!-- Data Will Appear Here -->
                            </tbody>
                        </table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>