<div class="col-md-12">
	<div class="panel panel-blue">
		<div class="panel-heading" data-toggle="collapse" data-target="#profile-customer">
			<h3 class="panel-title text-uppercase">
				Data Pribadi

				<div class="pull-right">
					<i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
			</h3>
		</div>
		<div id="profile-customer" class="panel-collapse collapse in">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">

						<div class="form-group">
							<label class="col-md-4 control-label">NIK *</label>
							<div class="col-md-8">
								{!! Form::text('nik', old('nik'), [
									'class' => 'form-control numeric', 'maxlength' => 16
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nama Depan *</label>
							<div class="col-md-8">
								{!! Form::text('first_name', old('first_name'), [
									'class' => 'form-control'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nama Belakang </label>
							<div class="col-md-8">
								{!! Form::text('last_name', old('last_name'), [
									'class' => 'form-control'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tempat Lahir *</label>
							<div class="col-md-8">
								{!! Form::select('birth_place_id', ['' => ''] + [
									$customer->birth_place_id ?: old('birth_place_id') => $customer->birth_place ?: old('birth_place'),
								], old('birth_place_id'), [
									'class' => 'form-control select2 birth_place',
									'data-option' => $customer->birth_place_id ?: old('birth_place_id'),
									'data-placeholder' => 'Pilih Kota'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tanggal Lahir *</label>
							<div class="col-md-8">
								<div class="input-group">
									{!! Form::text('birth_date', old('birth_date'), [
										'class' => 'form-control date-birth'
									]) !!}
									<span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Alamat *</label>
							<div class="col-md-8">
								{!! Form::textarea('address', old('address'), [
									'class' => 'form-control',
									'rows'  => 3,
									'style' => 'resize: none'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Kota *</label>
							<div class="col-md-8">
								{!! Form::select('city_id', ['' => ''] + [
									$customer->city_id ?: old('city_id') => $customer->city ?: old('city_name')
								], old('city_id'), [
									'class' => 'form-control select2 cities',
									'data-option' => $customer->city_id ?: old('city_id'),
									'data-placeholder' => 'Pilih Kota',
								]) !!}
							</div>
						</div>
					</div>

					<div class="col-md-6">

						<div class="form-group">
							<label class="col-md-5 control-label">Jenis Kelamin *</label>
							<div class="col-md-7">
								{!! Form::select('gender', [
									'L' => 'Laki-laki',
									'P' => 'Perempuan',
								], old('gender'), [
									'class' => 'form-control select2',
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Kewarganegaraan *</label>
							<div class="col-md-7">
								{!! Form::select('citizenship_id', ['' => ''] + [
									$customer->citizenship_id ?: old('citizenship_id') => $customer->citizenship ?: old('citizenship')
								], old('citizenship_id'), [
									'class' => 'form-control select2 citizenships',
									'data-option' => $customer->citizenship_id ?: old('citizenship_id'),
									'data-placeholder' => 'Pilih Negara',
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Status Pernikahan *</label>
							<div class="col-md-7">
								{!! Form::select('status', [
									'1' => 'Belum Menikah',
									'2' => 'Menikah',
									'3' => 'Janda / Duda',
								], (isset($customer->status_id) ? $customer->status_id : old('status')), [
									'class' => 'form-control select2', 'id' => 'status'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Status Tempat Tinggal *</label>
							<div class="col-md-7">
								{!! Form::select('address_status', [
									'0' => 'Milik Sendiri',
									'1' => 'Milik Orang Tua / Mertua atau Rumah Dinas',
									'3' => 'Tinggal di Rumah Kontrakan',
								], (isset($customer->address_status_id) ? $customer->address_status_id : old('address_status')), [
									'class' => 'form-control select2',
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Email </label>
							<div class="col-md-7">
								{!! Form::email('email', old('email'), [
									'class' => 'form-control', 'readonly'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">No Telepon *</label>
							<div class="col-md-7">
								{!! Form::text('phone', old('phone'), [
									'class' => 'form-control numeric', 'maxlength' => 16, 'minlength' => 7
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">No Handphone *</label>
							<div class="col-md-7">
								{!! Form::text('mobile_phone', old('mobile_phone'), [
									'class' => 'form-control numeric', 'maxlength' => 16, 'minlength' => 9
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Nama Gadis Ibu Kandung *</label>
							<div class="col-md-7">
								{!! Form::text('mother_name', old('mother_name'), [
									'class' => 'form-control'
								]) !!}
							</div>
						</div>

					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
	                        <label class="col-md-4 control-label">Foto KTP :</label>
	                        <div class="col-md-8">
	                        	{!! Form::file('identity', [
	                                'class' => 'filestyle', 'data-target' => 'ktp_preview',
	                                'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
	                                'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
	                            ]) !!}
	                        </div>
	                    </div>
					</div>

					@if ( isset($customer->identity) )

	                    <div class="col-md-6">
							<div class="form-group ktp_preview">
		                    	<div class="col-md-12 col-md-offset-2">
		                    		{!! Html::image($customer->identity ? $customer->identity : 'assets/images/no-image.jpg', 'KTP', [
		                                'class' => 'img-responsive', 'width' => 300, 'id' => 'ktp_preview',
		                                'data-src' => asset('assets/images/no-image.jpg')
		                            ]) !!}
		                            @if ( null !== old('nik') )
		                            	<br/>Harap Upload Ulang Foto KTP
		                            @endif
		                    	</div>
		                    </div>
						</div>

	                @else

	                    <div class="col-md-6">
							<div class="form-group hide ktp_preview">
		                    	<div class="col-md-12 col-md-offset-2">
		                    		{!! Html::image('assets/images/no-image.jpg', 'KTP', [
		                                'class' => 'img-responsive', 'width' => 300, 'id' => 'ktp_preview',
		                                'data-src' => asset('assets/images/no-image.jpg')
		                            ]) !!}
		                            @if ( null !== old('nik') )
		                            	<br/>Harap Upload Ulang Foto KTP
		                            @endif
		                    	</div>
		                    </div>
						</div>

	                @endif

				</div>
			</div>
		</div>
	</div>
</div>