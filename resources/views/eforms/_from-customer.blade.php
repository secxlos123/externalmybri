@if ( null !== old('selector') )
	@php( $checked = old('selector') )
@else
	@php( $checked = 1 )
@endif

<fieldset id="simple-data">
	<div class="row">
		@include('customer.profile.form.personal')
	</div>

	<div class="row">
		@include('customer.profile.form.couple')
	</div>
</fieldset>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-blue">
			<div class="panel-heading" data-toggle="collapse" data-target="#demo">
				<h3 class="panel-title text-uppercase">
					Pengisian Kelengkapan Data : <b class="btn-pilih">{{ $checked == 1 ? 'Isi data dibantu oleh petugas' : 'Isi data sendiri' }}</b>

					<div class="pull-right">
						<i class="fa fa-chevron-down" aria-hidden="true"></i>
					</div>
				</h3>
			</div>
			<div id="demo" class="panel-collapse collapse in">
				<div class="panel-body">
					<div class="container text-center">
						<div class="row">
							<div class="col-xs-12">
								<div class="error-image bottom40 personal-data">
									{!! Html::image('assets/images/404-other.png', 'image', ['class' => 'img-responsive']) !!}
								</div>
							</div>
							<div class="col-xs-12">
								<div class="error-text custom-desc">
									<h2 class="bottom10">Pengisian Kelengkapan Data</h2>
									<p>Pilih opsi untuk mengisi data lengkap Anda :</p>

									<div class="row for-charginG-data form-group">
										<ul>
											<li style="display: inline-block;">
												<input type="radio" id="full" value="0" name="selector" class="options" {{ $checked == 0 ? 'checked' : '' }} >
												<label for="full">Isi data sendiri</label>
												<div class="radiobutton"></div>
											</li>

											<li style="display: inline-block;">
												<input type="radio" id="medium" value="1" name="selector" class="options" {{ $checked == 1 ? 'checked' : '' }}>
												<label for="medium">Isi data dibantu oleh petugas</label>
												<div class="radiobutton"></div>
											</li>
										</ul>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<fieldset id="complete-data" {{ $checked == 1 ? 'hidden' : '' }} disabled>
	<div class="row">
		@include('customer.profile.form.employee')
	</div>

	<div class="row">
		@include('customer.profile.form.financial')
	</div>

	<div class="row">
		@include('customer.profile.form.contact')
	</div>
</fieldset>

@push( 'parent-styles' )
	<style type="text/css">
		.panel-heading {
			cursor: pointer;
		}
		.options {
			display: inline-block !important;
		}
	</style>
@endpush

@push( 'parent-scripts' )
    {!! Html::script('assets/js/bootstrap-filestyle.min.js') !!}

	<script type="text/javascript">

		var dropdowns = [
			{class: '.birth_place', endpoint: 'cities', hidden: '#birth_place'},
			{class: '.cities', endpoint: 'cities', hidden: '#city_name'},
			{class: '.couple_birth', endpoint: 'cities', hidden: '#couple_birth_place'},
			{class: '.citizenships', endpoint: 'citizenships', hidden: '#citizenship'},
			{class: '.job-fields', endpoint: 'job-fields', hidden: '#work_field_name'},
			{class: '.job-types', endpoint: 'job-types', hidden: '#work_type_name'},
			{class: '.jobs', endpoint: 'jobs', hidden: '#work_name'},
			{class: '.positions', endpoint: 'positions', hidden: '#position_name'},
		];

		dropdowns.map(init_dropdown);
		current_status_customer();

		$(".current_address").on('keyup', function(){
			if ($(this).val().toLowerCase() == $(".address").val().toLowerCase()) {
				$("#myCheckBox").prop("checked", true);
			}else{
				$("#myCheckBox").prop("checked", false);
			}
		});

		$('.date-birth').datepicker({
			format: 'dd-mm-yyyy',
	        autoclose: true,
		});

		$('.couple-date-birth').datepicker({
			format: 'dd-mm-yyyy',
	        autoclose: true,
		});

		$('.collapse').on('hidden.bs.collapse', toggle_icon);
		$('.collapse').on('shown.bs.collapse', toggle_icon);

		$('.options').on('click', function () {
			var text = $(this).next().text().toLocaleUpperCase();
			$('.btn-pilih').removeClass('hide').text(text);
			$('#demo').collapse('hide');
			$('#complete-data').attr('hidden', true).attr('disabled', true);

			if ($(this).attr('id') == 'full') {
				$('#complete-data').removeAttr('hidden disabled');
			}
		});

		@if ($checked == 0)
			$('#complete-data').removeAttr('hidden disabled');
		@endif

		$('#status').on('change', current_status_customer);

		$('#work_mount').on('change', function () {
			if ($(this).val() > 11) {
				$(this).val(11);
			}
		});

		$('#checkbox1').on('change', function () {
			if ($(this).is(':checked')) {
				$('#couple-financial').removeAttr('disabled hidden');
			} else {
				$('#couple-financial').attr('disabled', true).attr('hidden', true);
			}
		});

		if ($("#status").select2('data')[0]['id'] == 1) {
			$('.date-birth').datepicker({
				format: 'dd-mm-yyyy',
		        autoclose: true,
		        endDate: '-20y'
			});
		}else{
			$('.date-birth').datepicker({
				format: 'dd-mm-yyyy',
		        autoclose: true,
			});
		}

		$("#status").on('change', function(){
    		$(".date-birth").datepicker("destroy");
			if ($(this).select2('data')[0]['id'] == 1) {
				$('.date-birth').datepicker({
					format: 'dd-mm-yyyy',
			        autoclose: true,
			        endDate: '-20y'
				});
			}else{
				$('.date-birth').datepicker({
					format: 'dd-mm-yyyy',
			        autoclose: true,
				});
			}
    		$(".date-birth").datepicker("refresh");
		});

		function current_status_customer() {
			if ($('#status').val() == '2') {
				$('#couple_content, #joint-income').removeAttr('disabled hidden');
			} else {
				$('#checkbox1').attr('checked', false);
				$('#couple_content, #joint-income, #couple-financial').attr('disabled', true).attr('hidden', true);
			}
		}

		function init_dropdown(value, index) {
			var opt = $(`${value.class}`).data('option');
			$(`${value.class}`).dropdown(`${value.endpoint}`)
				.on('select2:select', function (e) {
					var data = e.params.data;
					console.log(value.hidden, data);
					$(`${value.hidden}`).val(data.name);
				})
				.on('select2:unselect', function (e) {
					var data = e.params.data;
					console.log(value.hidden, data);
					$(`${value.hidden}`).val('');
				})
				.val(opt)
				.trigger('change');
		}

		function toggle_icon(e) {
			$(e.target)
				.prev('.panel-heading')
				.find(".fa")
				.toggleClass('fa-chevron-down fa-chevron-left');
		}

		$('#birth_place_id, #city_id, #citizenship_id, #position, #work, #work_type, #work_field').on('change', function() {
            if ($('.'+ $(this).data('id')).hasClass('has-error')) {
                $('.'+ $(this).data('id')).removeClass('has-error');
                $('.'+ $(this).data('id')).addClass('has-success');
                $('#'+ $(this).data('id')+'-error').hide();
            }
        });

	</script>
@endpush
