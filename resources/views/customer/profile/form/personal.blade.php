<div class="col-md-12">
	<div class="panel panel-blue">
		<div class="panel-heading">
			<h3 class="panel-title text-uppercase">Data Pribadi</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">

					<div class="form-group">
						<label class="col-md-3 control-label">NIK *</label>
						<div class="col-md-9">
							{!! Form::text('personal[nik]', $personal['nik'], [
								'class' => 'form-control', 'maxlength' => 16
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Nama Depan *</label>
						<div class="col-md-9">
							{!! Form::text('personal[first_name]', $personal['first_name'], [
								'class' => 'form-control'
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Nama Belakang </label>
						<div class="col-md-9">
							{!! Form::text('personal[last_name]', $personal['last_name'], [
								'class' => 'form-control'
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Tempat Lahir *</label>
						<div class="col-md-9">

							@if ( $personal['birth_place_id'] )

								{!! Form::text('personal[birth_place_id]', $personal['birth_place_id'], [
									'class' => 'form-control', 'disabled'
								]) !!}
								{!! Form::hidden('personal[birth_place_id]', $personal['birth_place_id']) !!}

							@else

								{!! Form::select('personal[birth_place_id]', ['' => ''], old('personal[birth_place_id]'), [
									'class' => 'form-control select2 cities',
									'data-placeholder' => 'Pilih Kota'
								]) !!}

							@endif
							<input type="hidden" name="birth_place" id="birth_place" value="{{$personal['birth_place_id']}}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Tanggal Lahir *</label>
						<div class="col-md-9">
							<div class="input-group">
								{!! Form::text('personal[birth_date]', $personal['birth_date'], [
									'class' => 'form-control datepicker-date'
								]) !!}
								<span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Alamat *</label>
						<div class="col-md-9">
							{!! Form::textarea('personal[address]', $personal['address'], [
								'class' => 'form-control',
								'rows'  => 3,
								'style' => 'resize: none'
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Kota *</label>
						<div class="col-md-9">

							@if ( $personal['city_id'] )

								{!! Form::text('personal[city_id]', $personal['city'], [
									'class' => 'form-control', 'disabled'
								]) !!}
								{!! Form::hidden('personal[city_id]', $personal['city_id']) !!}

							@else

								{!! Form::select('personal[city_id]', ['' => ''], old('personal[city_id]'), [
									'class' => 'form-control select2 cities',
									'data-placeholder' => 'Pilih Kota',
								]) !!}

							@endif
							<input type="hidden" name="city" id="city" value="{{$personal['city_id']}}">
						</div>
					</div>
				</div>

				<div class="col-md-6">

					<div class="form-group">
						<label class="col-md-5 control-label">Jenis Kelamin *</label>
						<div class="col-md-7">
							{!! Form::select('personal[gender]', [
								''  => '-- Pilih --',
								'L' => 'Laki-laki',
								'P' => 'Perempuan',
							], $personal['gender'] == 'Laki-laki' ? 'L' : 'P', [
								'class' => 'form-control',
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-5 control-label">Kewarganegaraan *</label>
						<div class="col-md-7">

							@if ( $personal['citizenship_id'] )

								{!! Form::text('personal[citizenship_id]', $personal['citizenship'], [
									'class' => 'form-control', 'disabled'
								]) !!}
								{!! Form::hidden('personal[citizenship_id]', $personal['citizenship_id']) !!}

							@else

								{!! Form::select('personal[citizenship_id]', ['' => ''], old('personal[citizenship_id]'), [
									'class' => 'form-control select2 citizenships',
									'data-placeholder' => 'Pilih Negara',
								]) !!}

							@endif
							<input type="hidden" name="citizenship" id="citizenship" value="{{$personal['citizenship_id']}}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-5 control-label">Status Pernikahan *</label>
						<div class="col-md-7">
							{!! Form::select('personal[status]', [
								''  => '-- Pilih --',
								'0' => 'Belum Menikah',
								'1' => 'Menikah',
								'2' => 'Janda / Duda',
							], $personal['status'], [
								'class' => 'form-control', 'id' => 'status'
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-5 control-label">Status Tempat Tinggal *</label>
						<div class="col-md-7">
							{!! Form::select('personal[address_status]', [
								''  => '-- Pilih --',
								'menetap' => 'Permanen',
								'sementara' => 'Sementara',
							], $personal['address_status'], [
								'class' => 'form-control',
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-5 control-label">Email </label>
						<div class="col-md-7">
							{!! Form::email('personal[email]', $personal['email'], [
								'class' => 'form-control', 'disabled'
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-5 control-label">No Telepon *</label>
						<div class="col-md-7">
							{!! Form::text('personal[mobile_phone]', $personal['mobile_phone'], [
								'class' => 'form-control', 'maxlength' => 12
							]) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-5 control-label">Nama Gadis Ibu Kandung *</label>
						<div class="col-md-7">
							{!! Form::text('personal[mother_name]', $personal['mother_name'], [
								'class' => 'form-control'
							]) !!}
						</div>
					</div>

					<div class="form-group identity">
						<label class="col-md-5 control-label">Foto KTP *</label>
						<div class="col-md-7">
							<input name="personal[identity]" type="file" data-placeholder="Tidak ada file">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>