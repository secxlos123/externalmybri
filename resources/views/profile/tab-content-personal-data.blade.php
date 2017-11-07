<ul class="nav nav-tabs tabs-bordered">
    <li class="active">
        <a href="#home-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-home"></i></span>
            <span class="hidden-xs">Data Pribadi</span>
        </a>
    </li>
    <li class="">
        <a href="#profile-b1" data-toggle="tab" aria-expanded="true">
            <span class="visible-xs"><i class="fa fa-user"></i></span>
            <span class="hidden-xs">Data Pekerjaan</span>
        </a>
    </li>
    <li class="">
        <a href="#messages-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
            <span class="hidden-xs">Data Finansial</span>
        </a>
    </li>
    @if (session('authenticate.role') != 'developer')
    <li class="">
        <a href="#contact-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Data Contact Person</span>
        </a>
    </li>
    <li class="">
        <a href="#support-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Data Pendukung</span>
        </a>
    </li>
    @endif
    <!-- <li class="">
        <a href="#settings-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Histori Pengajuan</span>
        </a>
    </li> -->
</ul>

@if (session('authenticate.role') == 'developer')
    {!! Form::model($results, [
        'route' => ['developer.profile.update'],
        'class' => 'callus', 'id' => 'form-personal-data-developer',
        'enctype' => 'multipart/form-data'
    ]) !!}
@else
    {!! Form::model($results, [
        'route' => ['profile.update'],
        'class' => 'callus', 'id' => 'form-personal-data-customer',
        'enctype' => 'multipart/form-data'
    ]) !!}
@endif
<div class="tab-content no-padding">
    <div class="tab-pane active" id="home-b1">
        @include('profile._form-personal-data')
    </div>
    <div class="tab-pane" id="profile-b1">
        @include('profile._form-work-data')
    </div>
    <div class="tab-pane" id="messages-b1">
        @include('profile._form-financial-data')
    </div>
    @if (session('authenticate.role') != 'developer')
    <div class="tab-pane" id="contact-b1">
        @include('profile._form-contact-person')
    </div>
    <div class="tab-pane" id="support-b1">
        @include('profile._form-supporting-data')
    </div>
    @endif
    <!-- <div class="tab-pane" id="settings-b1">
        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
    </div> -->
</div>
{!! Form::close() !!}

@push( 'parent-scripts' )
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\BaseRequest::class, '#form-personal-data-customer') !!}
@endpush