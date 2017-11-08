<ul class="nav nav-tabs tabs-bordered">
    <li class="active">
        <a href="#home-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-home"></i></span>
            <span class="hidden-xs">Data Pribadi</span>
        </a>
    </li>
    @if (session('authenticate.role') != 'developer')
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

<div class="tab-content no-padding">
    @if (session('authenticate.role') != 'developer')
    <div class="tab-pane active" id="home-b1">
        {!! Form::open([
            'route' => ['profile.update', 'personal'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-personal',
            'enctype' => 'multipart/form-data', 'method' => 'PUT'
        ]) !!}
            @include('profile._form-personal-data')
        {!! Form::close() !!}
    </div>
    <div class="tab-pane" id="profile-b1">
        {!! Form::open([
            'route' => ['profile.update', 'work'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-work',
            'enctype' => 'multipart/form-data', 'method' => 'PUT'
        ]) !!}
            @include('profile._form-work-data')
        {!! Form::close() !!}
    </div>
    <div class="tab-pane" id="messages-b1">
        {!! Form::open([
            'route' => ['profile.update', 'financial'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-financial',
            'method' => 'PUT'
        ]) !!}
            @include('profile._form-financial-data')
        {!! Form::close() !!}
    </div>
    <div class="tab-pane" id="contact-b1">
        {!! Form::open([
            'route' => ['profile.update', 'contact'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-contact',
            'method' => 'PUT'
        ]) !!}
            @include('profile._form-contact-person')
        {!! Form::close() !!}
    </div>
    <div class="tab-pane" id="support-b1">
        {!! Form::open([
            'route' => ['profile.update', 'support'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-support',
            'enctype' => 'multipart/form-data', 'method' => 'PUT'
        ]) !!}
            @include('profile._form-supporting-data')
        {!! Form::close() !!}
    </div>
    @else
    <div class="tab-pane active" id="home-b1">
        {!! Form::model($results, [
            'route' => ['developer.profile.update', 'personal'],
            'class' => 'callus', 'id' => 'form-personal-data-developer-personal',
            'enctype' => 'multipart/form-data', 'method' => 'PUT'
        ]) !!}
            @include('profile.developer._form-personal-data')
        {!! Form::close() !!}
    </div>
    @endif
    <!-- <div class="tab-pane" id="settings-b1">
        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
    </div> -->
</div>
{!! Form::close() !!}

@push( 'parent-scripts' )
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\PersonalRequest::class, '#form-personal-data-customer-personal') !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\WorkRequest::class, '#form-personal-data-customer-work') !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\FinancialRequest::class, '#form-personal-data-customer-financial') !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\ContactRequest::class, '#form-personal-data-customer-contact') !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\SupportRequest::class, '#form-personal-data-customer-support') !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Profile\Developer\PersonalRequest::class, '#form-personal-data-developer-personal') !!}
@endpush