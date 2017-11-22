@extends('layouts.app')

@section('title', 'Edit Profile')
@section('breadcrumb')
  <h1 class="text-uppercase">Manajemen Agen Developer</h1>
  <p>Kelola Akun anda di sini.</p>
  <ol class="breadcrumb text-center">
      <li><a href="{!! url('/') !!}">Dashboard</a></li>
      <li class="active">Profile</li>
  </ol>
@endsection

@section('content')
<section id="property" class="padding listing1">
  <div class="container">   
    <div class="row">
    @if(Session::has('flash_message'))
                        <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
                    @elseif(Session::has('error_flash_message'))
                        <div class="alert alert-danger"><em> {!! session('error_flash_message') !!}</em></div>
          @endif
      <div class="panel panel-blue">
        <div class="panel-heading">
          <h3 class="panel-title text-uppercase">Profil Saya</h3>
        </div>
        <div class="panel-body">
        <h4>&nbsp;</h4>
          <div class="row">
            <div class="col-md-12 top20">
              <ul class="nav nav-pills nav-justified nav-centered m-b-30">
                <li class="">
                  <a href="#data-pribadi" data-toggle="tab" aria-expanded="true">DATA PRIBADI</a>
                </li>
                <li class="active">
                  <a href="#change-password" data-toggle="tab" aria-expanded="false">CHANGE PASSWORD</a>
                </li>
              </ul>
              <div class="tab-content br-n pn">
                                <div id="data-pribadi" class="tab-pane">
                                    <div>
                                        @include('developer.developer_sales.tab-profile')
                                    </div>
                                </div>

                                <div id="change-password" class="tab-pane active">
                                <div>
                                   @include('developer.developer_sales.tab-change-password')
                                   </div>
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
@push('scripts')

    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.date-pickers.init.js')}}"></script>
    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Agent\CreateRequest::class, '#form-property') !!}

    <!-- Laravel Javascript Validation -->
      <script type="text/javascript">
    $( ".datepicker-date-born" ).datepicker({dateFormat: 'yyyy-mm-dd', endDate: '-17y'});
    </script>
    <script type="text/javascript">
    $( "#join_date" ).datepicker({dateFormat: 'yyyy-mm-dd'});
    </script>
{!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\ChangePasswordRequest::class, '#form-change-password-store') !!}
@endpush