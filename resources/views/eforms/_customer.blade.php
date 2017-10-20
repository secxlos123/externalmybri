<div class="row">
	<div class="col-md-12">
		<div class="panel panel-blue">
			<div class="panel-heading" data-toggle="collapse" data-target="#demo">
				<h3 class="panel-title text-uppercase">Pengisian Kelengkapan Data : <b class="btn-pilih"></b></h3>
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

									<div class="row for-charginG-data">
										<ul>
											<li style="display: inline-block;">
												<input type="radio" id="full" name="selector" class="options">
												<label for="full">Isi data sendiri</label>
												<div class="radiobutton"></div>
											</li>

											<li style="display: inline-block;">
												<input type="radio" id="medium" name="selector" class="options">
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

<fieldset id="simple-data" hidden>
	<div class="row">
		@include('customer.profile.form.personal')
	</div>

	<div class="row">
		@include('customer.profile.form.couple')
	</div>
</fieldset>

<fieldset id="complete-data" hidden>
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
	{!! Html::style('assets/css/bootstrap-datepicker.min.css') !!}
	<style type="text/css">
		.panel-heading.collapsed {
			cursor: pointer;
		}
		.options {
			display: inline-block !important;
		}
	</style>
@endpush

@push( 'parent-scripts' )
	{!! Html::script('assets/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('assets/js/bootstrap-filestyle.min.js') !!}

	<script type="text/javascript">
		$('.cities').dropdown('cities');
		$('.citizenships').dropdown('citizenships');
		$('.job-fields').dropdown('job-fields');
		$('.job-types').dropdown('job-types');
		$('.jobs').dropdown('jobs');

		$('.options').on('click', function () {
			var text = $(this).next().text().toLocaleUpperCase();
			$('.btn-pilih').removeClass('hide').text(text);
			$('#demo').collapse('hide');
			$('#simple-data, #complete-data').attr('hidden', true);

			if ($(this).attr('id') == 'full') {
				$('#simple-data, #complete-data').removeAttr('hidden');
			} else {
				$('#simple-data').removeAttr('hidden');
			}
		});

		$('#status').on('change', function (e) {
			if ($(this).val() == '2') {
				$('#couple_content, #joint-income').removeAttr('disabled hidden');
			} else {
				$('#checkbox1').attr('checked', false);
				$('#couple_content, #joint-income, #couple-financial').attr('disabled', true).attr('hidden', true);
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

		function read_url(input, target) {
			let reader = new FileReader();
			reader.onload = function (e) {
				$(target).attr('src', e.target.result);
			}
			reader.readAsDataURL(input);
		}

	</script>
@endpush
