@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section id="property" class="padding listing1">
    <div class="container">

        <div class="row">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <h3 class="panel-title text-uppercase">Profil Saya</h3>
                </div>
                <div class="panel-body fMessage">
                    <h4>&nbsp;</h4>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
                    @elseif(Session::has('error_flash_message'))
                        <div class="alert alert-danger"><em> {!! session('error_flash_message') !!}</em></div>
                    @endif
                    <div class="col-md-12 text-center">
                        <div class="agent_wrap profile-saya">
                            <div class="image img-thumbnail">
                                @if ($type != 'view')
                                    @include('profile._form-avatar-data')

                                @else
                                    @if (session('authenticate.role') != 'developer')
                                        <img src="{{(isset($results['other']['image'])) ? image_checker($results['other']['image']) : image_checker()}}" alt="Agents">
                                    @else
                                        <img src="{{(isset($results['image'])) ? image_checker($results['image']) : image_checker()}}" alt="Agents">
                                    @endif

                                @endif
                            </div>
                        </div>
                        <h3>{!! @$results['personal']['name'] !!}</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12 top20">
                            <ul class="nav nav-pills nav-justified nav-centered m-b-30">
                                <li class="{{ $active != 'password' ? 'active' : '' }}">
                                    <a href="#data-pribadi" data-toggle="tab" aria-expanded="true">DATA PRIBADI</a>
                                </li>
                                <li class="{{ $active == 'password' ? 'active' : '' }}">
                                    <a href="#change-password" data-toggle="tab" aria-expanded="false">UBAH KATA SANDI</a>
                                </li>
                            </ul>
                            <div class="tab-content br-n pn">
                                <div id="data-pribadi" class="tab-pane {{ $active != 'password' ? 'active' : '' }}">
                                    <div>
                                        @include('profile.tab-content-personal-data')
                                    </div>
                                </div>

                                <div id="change-password" class="tab-pane {{ $active == 'password' ? 'active' : '' }}">
                                    @include('profile.tab-content-change-password')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
    {!! Html::style('assets/css/bootstrap-datepicker.min.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}
    {!! Html::script('assets/js/bootstrap-datepicker.min.js') !!}
    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script('js/dropdown.min.js') !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\ChangePasswordRequest::class, '#form-change-password-store') !!}

    <script type="text/javascript">
        $('#status').select2();
        $('.datepicker-autoclose').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        });

        if ($("#status").select2('data')[0]['id'] != 1) {
            console.log($("#status").select2('data')[0]['id']);
            $('.datepicker-autoclose').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                endDate: '-20y'
            });
        }else{
            console.log($("#status").select2('data')[0]['id']);
            $('.datepicker-autoclose').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            });
        }

        $('.address_status, .status, .gender').select2();
        $('.cities').dropdown('cities');
        $('.citizenships').dropdown('citizenships');
        $('.work_type').dropdown('job-types');
        $('.positions').dropdown('positions');
        $('.jobs').dropdown('jobs');
        $('.jobFields').dropdown('job-fields');
    </script>

    <script type="text/javascript">
        $(document).on('click', '#image_preview', function(){
            $("input[name='image']").click();
        });

        $(document).on('change', 'input[name="image"]', function(){
            $("#form-personal-data-customer-avatar").submit();
        });

        $(document).on('input', "input[name='work_duration']", function(){
            if ($(this).val() > 100) {
                $(this).val("99");
            }
        })

        $(document).on('input', "input[name='work_duration_month']", function(){
            if ($(this).val() > 11) {
                $(this).val("11");
            }
        })
    </script>
    @stack('parent-scripts')
@endpush
<!-- This is scripts for this page end-->