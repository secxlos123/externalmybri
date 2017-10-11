@extends('layouts.app')

@section('title', 'Lengkapi Data Diri')

@section('breadcrumb')
	<h1 class="text-uppercase">Form Registrasi</h1>
	<p>Isilah data valid Anda untuk melanjutkan proses pendaftaran.</p>
	<ol class="breadcrumb text-center">
	    <li><a href="#">Pengajuan Kredit</a></li>
	    <li class="active">Registrasi</li>
	</ol>
@endsection

@section('content')

{!! Form::open([
	'route'	  => 'auth.register.store',
	'enctype' => 'multipart/form-data',
	'class'	  => 'form-horizontal',
	'role'	  => 'form',
	'method'  => 'POST',
	'id'	  => 'form-register-full'
]) !!}

	<section id="registration" class="padding bg_light">
		<div class="container">

			@yield('_form-register')

			<div class="row">
				<div class="col-md-12">
					<div class="pull-right">

						@yield('btn-action')

						<i class="mdi mdi-content-save">
							<button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20">
								Simpan
							</button>
						</i>
					</div>
				</div>
			</div>
		</div>
	</section>

{!! Form::close() !!}
@endsection

@push('styles')
	{!! Html::style('assets/css/bootstrap-datepicker.min.css') !!}
	{!! Html::style('assets/css/select2.min.css') !!}
@endpush

@push('scripts')
	{!! Html::script('assets/js/bootstrap-datepicker.min.js') !!}
	{!! Html::script('assets/js/select2.min.js') !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script('js/dropdown.min.js') !!}
    {!! JsValidator::formRequest(App\Http\Requests\Auth\RegisterRequest::class, '#form-register-full') !!}

	<script type="text/javascript">
		$(document).ready(function () {
			$('#status').trigger('change');
			$(".numericOnly").keydown(function (e) {
	            // Allow: backspace, delete, tab, escape, enter and .
	            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	                 // Allow: Ctrl+A
	                (e.keyCode == 65 && e.ctrlKey === true) ||
	                 // Allow: Ctrl+C
	                (e.keyCode == 67 && e.ctrlKey === true) ||
	                 // Allow: Ctrl+X
	                (e.keyCode == 88 && e.ctrlKey === true) ||
	                // Allow: backspace
	                (e.keyCode === 320 && e.ctrlKey === true) ||
	                 // Allow: home, end, left, right
	                (e.keyCode >= 35 && e.keyCode <= 39)) {
	                     // let it happen, don't do anything
	                     return;
	            }
	            // Ensure that it is a number and stop the keypress
	            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	                    e.preventDefault();
	            }
	        });
	        Inputmask.extendAliases({
                rupiah: {
                    // prefix: "Rp ",
                    radixPoint: ",",
                    groupSeparator: ".",
                    alias: "numeric",
                    placeholder: "0",
                    autoGroup: !0,
                    digits: 2,
                    digitsOptional: !1,
                    clearMaskOnLostFocus: !1,
                    rightAlign: false
                }
            });
            $(document).ready(function() {
                $('.currency-rp').inputmask({ alias : "rupiah" });
            });
		});

		$('#status').on('change', function (e) {
			if ($(this).val() == 1) {
				$('#couple_content').removeAttr('disabled hidden');
			} else {
				$('#couple_content').attr('disabled', true).attr('hidden', true);
			}
			$('.cities').dropdown('cities');
		});

		$('.datepicker-date').datepicker({
			format: 'dd-mm-yyyy',
	        autoclose: true,
	        endDate: '-20y'
		});

		$('.cities').dropdown('cities');
		$('.citizenships').dropdown('citizenships');
		$('.job_type').dropdown('jobTypes');

	</script>
@endpush