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
							<label class="col-md-4 control-label">NIK *:</label>
							<div class="col-md-8">
								{!! Form::text('nik', old('nik'), [
									'class' => 'form-control', 'maxlength' => 16, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)',
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nama Depan *:</label>
							<div class="col-md-8">
								{!! Form::text('first_name', old('first_name'), [
									'class' => 'form-control'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nama Belakang :</label>
							<div class="col-md-8">
								{!! Form::text('last_name', old('last_name'), [
									'class' => 'form-control'
								]) !!}
							</div>
						</div>

						<div class="form-group birth_place_id">
							<label class="col-md-4 control-label">Tempat Lahir *:</label>
							<div class="col-md-8">
								{!! Form::select('birth_place_id', ['' => ''] + [
									$customer->birth_place_id ?: old('birth_place_id') => $customer->birth_place ?: old('birth_place'),
								], old('birth_place_id'), [
									'class' => 'form-control select2 birth_place',
									'data-option' => $customer->birth_place_id ?: old('birth_place_id'),
									'data-placeholder' => 'Pilih Kota',
									'id' => 'birth_place_id',
									'data-id' => 'birth_place_id'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tanggal Lahir *:</label>
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
							<label class="col-md-4 control-label">Alamat KTP *:</label>
							<div class="col-md-8">
								{!! Form::textarea('address', old('address'), [
									'class' => 'form-control address',
									'rows'  => 3,
									'style' => 'resize: none'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							      <label class="col-md-4 control-label"></label>
							      <div class="col-md-8">
							      <input id="myCheckBox" type="checkbox" />
							      <label for="myCheckBox">Alamat Domisili Sesuai Dengan Alamat KTP</label>
							  	</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Alamat Domisili *:</label>
							<div class="col-md-8">
								{!! Form::textarea('current_address', old('current_address'), [
									'class' => 'form-control current_address',
									'rows'  => 3,
									'style' => 'resize: none'
								]) !!}
							</div>
						</div>

						<div class="form-group city_id">
							<label class="col-md-4 control-label">Kota *:</label>
							<div class="col-md-8">
								{!! Form::select('city_id', ['' => ''] + [
									$customer->city_id ?: old('city_id') => $customer->city ?: old('city_name')
								], old('city_id'), [
									'class' => 'form-control select2 cities',
									'data-option' => $customer->city_id ?: old('city_id'),
									'data-placeholder' => 'Pilih Kota',
									'id' => 'city_id',
									'data-id' => 'city_id'
								]) !!}
							</div>
						</div>
					</div>

					<div class="col-md-6">

						<div class="form-group">
							<label class="col-md-5 control-label">Jenis Kelamin *:</label>
							<div class="col-md-7">
								{!! Form::select('gender', [
									'' => '',
									'L' => 'Laki-laki',
									'P' => 'Perempuan',
								], old('gender'), [
									'class' => 'form-control select2',
									'data-placeholder' => 'Pilih Jenis Kelamin',
								]) !!}
							</div>
						</div>

						<div class="form-group citizenship_id">
							<label class="col-md-5 control-label">Kewarganegaraan *:</label>
							<div class="col-md-7">
								{!! Form::select('citizenship_id', ['' => ''] + [
									$customer->citizenship_id ?: old('citizenship_id') => $customer->citizenship ?: old('citizenship')
								], old('citizenship_id'), [
									'class' => 'form-control select2 citizenships',
									'data-option' => $customer->citizenship_id ?: old('citizenship_id'),
									'data-placeholder' => 'Pilih Negara',
									'id' => 'citizenship_id',
									'data-id' => 'citizenship_id'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Status Pernikahan *:</label>
							<div class="col-md-7">
								{!! Form::select('status', [
									'' => '',
									'1' => 'Belum Menikah',
									'2' => 'Menikah',
									'3' => 'Janda / Duda',
								], (isset($customer->status_id) ? $customer->status_id : old('status')), [
									'class' => 'form-control select2', 'data-placeholder' => 'Pilih Status Pernikahan', 'id' => 'status'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Status Tempat Tinggal *:</label>
							<div class="col-md-7">
								{!! Form::select('address_status', [
									'' => '',
									'0' => 'Milik Sendiri',
									'1' => 'Milik Orang Tua / Mertua atau Rumah Dinas',
									'3' => 'Tinggal di Rumah Kontrakan',
								], (isset($customer->address_status_id) ? $customer->address_status_id : old('address_status')), [
									'class' => 'form-control select2',
									'data-placeholder' => 'Pilih Status Tempat Tinggal',
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Email :</label>
							<div class="col-md-7">
								{!! Form::email('email', old('email'), [
									'class' => 'form-control', 'readonly'
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">No Telepon:</label>
							<div class="col-md-7">
								{!! Form::text('phone', old('phone'), [
									'class' => 'form-control', 'maxlength' => 12, 'minlength' => 9, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)',
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">No Handphone *:</label>
							<div class="col-md-7">
								{!! Form::text('mobile_phone', old('mobile_phone'), [
									'class' => 'form-control', 'maxlength' => 12, 'minlength' => 9, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)',
								]) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-5 control-label">Nama Gadis Ibu Kandung *:</label>
							<div class="col-md-7">
								{!! Form::text('mother_name', old('mother_name'), [
									'class' => 'form-control',
									'onkeypress' => 'return goodchars(event, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", this)'
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
	                            <input type="file" class="filestyle" data-buttontext="Unggah" data-buttonname="btn-default" data-iconname="fa fa-cloud-upload" data-placeholder="Tidak ada file" name="identity" accept="image/png,image/jpeg,image/gif/pdf" id="personalKTP">
	                        </div>
	                    </div>
					</div>

					@if ( isset($customer->identity) )

						@if (str_contains($customer->identity, '.pdf'))

		                    <div class="col-md-6">
								<div class="form-group ktp_preview">
			                    	<div class="col-md-12 col-md-offset-2">
										<iframe src="{{$customer->identity}}" title="your_title" align="top" height="620" width="100%" frameborder="0" scrolling="auto" target="Message">
										</iframe>
									</div>
								</div>
							</div>

						@else
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
						@endif

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