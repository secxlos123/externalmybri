<ul class="nav nav-tabs tabs-bordered">
    <li class="{{ $active == 'personal' || $active == 'password' ? 'active' : '' }}">
        <a href="#home-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-home"></i></span>
            <span class="hidden-xs">Data Pribadi</span>
        </a>
    </li>
    @if (session('authenticate.role') != 'developer')
    <li class="{{ $active == 'work' ? 'active' : '' }}">
        <a href="#profile-b1" data-toggle="tab" aria-expanded="true">
            <span class="visible-xs"><i class="fa fa-user"></i></span>
            <span class="hidden-xs">Data Pekerjaan</span>
        </a>
    </li>
    <li class="{{ $active == 'financial' ? 'active' : '' }}">
        <a href="#messages-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
            <span class="hidden-xs">Data Finansial</span>
        </a>
    </li>
    <li class="{{ $active == 'contact' ? 'active' : '' }}">
        <a href="#contact-b1" data-toggle="tab" aria-expanded="false">
            <span class="visible-xs"><i class="fa fa-cog"></i></span>
            <span class="hidden-xs">Data Contact Person</span>
        </a>
    </li>
    <li class="{{ $active == 'support' ? 'active' : '' }}">
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
    <div class="tab-pane {{ $active == 'personal' || $active == 'password' ? 'active' : '' }}" id="home-b1">
        {!! Form::open([
            'route' => ['profile.update', 'personal'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-personal',
            'enctype' => 'multipart/form-data', 'method' => 'PUT'
        ]) !!}
            @include('profile._form-personal-data')
        {!! Form::close() !!}
    </div>
    <div class="tab-pane {{ $active == 'work' ? 'active' : '' }}" id="profile-b1">
        {!! Form::open([
            'route' => ['profile.update', 'work'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-work',
            'enctype' => 'multipart/form-data', 'method' => 'PUT'
        ]) !!}
            @include('profile._form-work-data')
        {!! Form::close() !!}
    </div>
    <div class="tab-pane {{ $active == 'financial' ? 'active' : '' }}" id="messages-b1">
        {!! Form::open([
            'route' => ['profile.update', 'financial'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-financial',
            'method' => 'PUT'
        ]) !!}
            @include('profile._form-financial-data')
        {!! Form::close() !!}
    </div>
    <div class="tab-pane {{ $active == 'contact' ? 'active' : '' }}" id="contact-b1">
        {!! Form::open([
            'route' => ['profile.update', 'contact'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-contact',
            'method' => 'PUT'
        ]) !!}
            @include('profile._form-contact-person')
        {!! Form::close() !!}
    </div>
    <div class="tab-pane {{ $active == 'support' ? 'active' : '' }}" id="support-b1">
        {!! Form::open([
            'route' => ['profile.update', 'other'],
            'class' => 'callus', 'id' => 'form-personal-data-customer-support',
            'enctype' => 'multipart/form-data', 'method' => 'PUT'
        ]) !!}
            @include('profile._form-supporting-data')
        {!! Form::close() !!}
    </div>
    @else
    <div class="tab-pane {{ $active == 'personal' ? 'active' : '' }}" id="home-b1">
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
    <script type="text/javascript">
        $('.jobFields').on('change', function () {
            var value = $(this).select2('data')[0]['name'];
            $('#work_field').attr('value', value);
        });
        $('.work_type').on('change', function () {
            var value = $(this).select2('data')[0]['name'];
            $('#work_type').attr('value', value);
        });
        $('.jobs').on('change', function () {
            var value = $(this).select2('data')[0]['name'];
            $('#work_job').attr('value', value);
        });
        $('.positions').on('change', function () {
            var value = $(this).select2('data')[0]['name'];
            $('#position').attr('value', value);
        });

        $('.birth_place').on('change', function () {
            var value = $(this).select2('data')[0]['name'];
            $('#birth_place').attr('value', value);
        });
        $('.city').on('change', function () {
            var value = $(this).select2('data')[0]['name'];
            $('#city_text').attr('value', value);
        });
        $('.citizenships').on('change', function () {
            var value = $(this).select2('data')[0]['name'];
            $('#citizenship').attr('value', value);
        });
        $('.status').on('change', function () {
            var value = $(this).select2('data')[0]['text'];
            $('#status').attr('value', value);

            val = $(this).val();
            if (val == 2) {
                $('.couple-selector').removeClass('hide');

            } else {
                $('.couple-selector').addClass('hide');

            }
        });
        $('.address_status').on('change', function () {
            var value = $(this).select2('data')[0]['text'];
            $('#address_status').attr('value', value);
        });




    </script>
    @if(session('authenticate.role') != 'developer')
    <script type="text/javascript">
        $( document ).ready(function() {
            @php( $status = old('status') ? old('status') : $results['personal']['status_id']);

            @if($status == 2)
                $('.couple-selector').removeClass('hide');

            @else
                $('.couple-selector').addClass('hide');

            @endif
        });
    </script>
    @endif
@endpush