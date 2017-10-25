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
					Pengisian Kelengkapan Data : <b class="btn-pilih"></b>

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
												<input type="radio" id="full" value="0" name="selector" class="options">
												<label for="full">Isi data sendiri</label>
												<div class="radiobutton"></div>
											</li>

											<li style="display: inline-block;">
												<input type="radio" id="medium" checked="checked" value="1" name="selector" class="options">
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

<fieldset id="complete-data" hidden disabled>
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
			{class: '.cities', endpoint: 'cities'},
			{class: '.citizenships', endpoint: 'citizenships'},
			{class: '.job-fields', endpoint: 'job-fields'},
			{class: '.job-types', endpoint: 'job-types'},
			{class: '.jobs', endpoint: 'jobs'},
			{class: '.positions', endpoint: 'positions'},
		];

		dropdowns.map(init_dropdown);
		current_status_customer();

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
		}).trigger('click');

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

		$('.date-birth').datepicker({
			format: 'dd-mm-yyyy',
	        autoclose: true,
	        endDate: '-20y'
		});

		$('.filestyle').on('change', function () {
			var target = $(this).data('target');
			$(`.${target}`).removeClass('hide');

			if ($(this).val() != '') {
				read_url($(this).prop('files')[0], `#${target}`);
			} else {
				$(`#${target}`).attr('src', $(`#${target}`).data('src'));
			}
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
			$(`${value.class}`).dropdown(`${value.endpoint}`).select2('val', 0);
		}

		function read_url(input, target) {
			let reader = new FileReader();
			reader.onload = function (e) {
				$(target).attr('src', e.target.result);
			}
			reader.readAsDataURL(input);
		}

		function toggle_icon(e) {
			$(e.target)
				.prev('.panel-heading')
				.find(".fa")
				.toggleClass('fa-chevron-down fa-chevron-left');
		}

	</script>
@endpush
