@extends('layouts.app')

@section('title', 'Lengkapi Data Diri')

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
    {!! JsValidator::formRequest(App\Http\Requests\Auth\RegisterRequest::class, '#form-register-full') !!}

	<script type="text/javascript">
		$(document).ready(function () {
			$('#status').trigger('change');
			cities();
		});

		$('#status').on('change', function (e) {
			if ($(this).val() == 1) {
				$('#couple_content').removeAttr('disabled hidden');
			} else {
				$('#couple_content').attr('disabled', true).attr('hidden', true);
			}
			cities();
		});

		$('.datepicker-date').datepicker({
			format: 'dd-mm-yyyy',
	        autoclose: true,
	        endDate: '-20y'
		});

		function cities() {
			$('.cities').select2({
	            witdh : '100%',
	            allowClear: true,
	            ajax: {
	                url: '/dropdown/cities',
	                dataType: 'json',
	                delay: 250,
	                data: function (params) {
	                    return {
	                        name: params.term,
	                        page: params.page || 1
	                    };
	                },
	                processResults: results,
	                cache: true
	            },
	        });
		}


		$('.citizenships').select2({
            witdh : '100%',
            allowClear: true,
            ajax: {
                url: '/dropdown/citizenships',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1
                    };
                },
                processResults: results,
                cache: true
            },
        });

        function results(data, params) {
        	params.page = params.page || 1;

        	return {
        		results: data.results.data,
        		pagination: {
        			more: (params.page * data.results.per_page) < data.results.total
        		}
        	};
        }
	</script>
@endpush