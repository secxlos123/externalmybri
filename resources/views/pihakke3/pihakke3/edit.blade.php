@extends('layouts.app')

@section('title', 'Edit Profile')

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
                <li class="active">
                  <a href="#data-pribadi" data-toggle="tab" aria-expanded="true">DATA PRIBADI</a>
                </li>
                <li class="">
                  <a href="#change-password" data-toggle="tab" aria-expanded="false">CHANGE PASSWORD</a>
                </li>
              </ul>
              @include('pihakke3.pihakke3._form')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('scripts')
{!! JsValidator::formRequest(App\Http\Requests\Pihakke3\Profile\CreateRequest::class, '#form-pihakke3-edit') !!}
@endpush