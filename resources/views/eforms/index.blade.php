@extends('layouts.app')

@section('title', 'Pengajuan Kredit')

@section('breadcrumb')
<h1 class="text-uppercase">Pengajuan Kredit</h1>
<p>Isilah data Anda dengan benar.</p>
<ol class="breadcrumb text-center">
    <li><a href="{!! url('/') !!}">Home</a></li>
    <li class="active">Pengajuan Kredit</li>
</ol>
@endsection

@section('content')
<section id="proses-reg" class="padding">
    <div class="pengajuan-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card-box">
                        @if ( $errors->any() )
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="card-box">
                        {!! Form::model($customer, [
                            'route' => 'eform.store', 'id' => 'app-eform',
                            'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'
                        ]) !!}
                        {{$customer->couple_identity}}

                            <fieldset hidden>
                                <input type="text" name="sess_prop_category" id="sess_prop_category" value="{{@Session::get('prop_id_bri')}}">
                                <input type="text" name="sess_bri" id="sess_bri" value="{{Session::get('category')}}">
                                <input type="text" name="sess_building_area" id="sess_building_area" value="{{Session::get('building_area')}}">

                                {!! Form::text('is_simple', old('is_simple')) !!}
                                @if ( isset($customer->couple_identity) && str_contains($customer->couple_identity,"noimage.jpg") )
                                    <input type="text" name="couple_identity_flag" id="couple_identity_flag" value="0">
                                @else
                                    <input type="text" name="couple_identity_flag" id="couple_identity_flag" value="1">
                                @endif
                                @if ( isset($customer->identity) && str_contains($customer->identity,"noimage.jpg") )
                                    <input type="text" name="identity_flag" id="identity_flag" value="0">
                                @else
                                    <input type="text" name="identity_flag" id="identity_flag" value="1">
                                @endif
                                {!! Form::text('developer_name', old('developer_name'), [
                                    'id' => 'developer_name'
                                ]) !!}
                                {!! Form::text('property_name', old('property_name'), [
                                    'id' => 'property_name'
                                ]) !!}
                                {!! Form::text('property_type_name', old('property_type_name'), [
                                    'id' => 'property_type_name'
                                ]) !!}
                                {!! Form::text('property_item_name', old('property_item_name'), [
                                    'id' => 'property_item_name'
                                ]) !!}

                                {!! Form::text('work_field_name', old('work_field_name'), ['id' => 'work_field_name']) !!}
                                {!! Form::text('work_type_name', old('work_type_name'), ['id' => 'work_type_name']) !!}
                                {!! Form::text('work_name', old('work_name'), ['id' => 'work_name']) !!}
                                {!! Form::text('position_name', old('position_name'), ['id' => 'position_name']) !!}
                                {!! Form::text('birth_place', old('birth_place'), ['id' => 'birth_place']) !!}
                                {!! Form::text('city_name', old('city_name'), ['id' => 'city_name']) !!}
                                {!! Form::text('citizenship', old('citizenship'), ['id' => 'citizenship']) !!}
                                {!! Form::text('couple_birth_place', old('couple_birth_place'), [
                                    'id' => 'couple_birth_place'
                                ]) !!}
                            </fieldset>
                            <div>
                                <h3>Produk</h3>
                                <section>
                                    @include('eforms.products.index')
                                </section>

                                <h3>Nasabah</h3>
                                <section>
                                    @include('eforms._customer')
                                </section>

                                <h3>Penjadwalan</h3>
                                <section>
                                    @include('eforms._appointment')
                                </section>

                                <h3>Kantor Cabang</h3>
                                <section>
                                    @include('eforms._branch-office')
                                </section>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
    {!! Html::style('assets/css/jquery.steps.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
    {!! Html::style('assets/css/bootstrap-datepicker.min.css') !!}
    @stack('parent-styles')
@endpush

@push('scripts')
    {!! Html::script('assets/js/jquery.steps.js') !!}
    {!! Html::script('assets/js/bootstrap-datepicker.min.js') !!}
    <!-- This script for init jquery steps you can replace this script with your logic -->
    {!! Html::script('assets/js/select2.min.js') !!}
    {!! Html::script('js/dropdown.min.js') !!}
    {!! JsValidator::formRequest(App\Http\Requests\EformRequest::class, '#app-eform') !!}

    <script type="text/javascript">
        $form_container = $('#app-eform');

        $form_container.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function (event, currentIndex, newIndex) {
                return currentIndex > newIndex ? true : $form_container.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                // reinit gmaps
                google.maps.event.trigger(map, 'resize');
            },
            onFinishing: function (event, currentIndex) {
                return $form_container.valid();
            },
            onFinished: function (event, currentIndex) {
               $form_container.submit();
            }
        });

        $('.select2').select2({width: '100%'});

        $(document).on('change', '#myCheckBox', function(){
            checked = $(this).prop("checked");
            current_address = $("textarea[name='current_address']");
            address = $("textarea[name='address']").val();

            current_address.attr('readonly', checked);

            if ( checked ) {
                current_address.val(address).html(address);
            }
        });

        $(document).on('input', "textarea[name='address']", function(){
            checked = $('#myCheckBox').prop("checked");
            address = $(this).val();

            if ( checked ) {
                current_address.val(address).html(address);
            }
        });

        $(document).on('submit', '#app-eform', function(e){
            var status = $("#status").select2('data')[0]['id'];
            var dob = new Date($("input[name='birth_date']").val());
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

            if (age < 21 && status == 1) {
                e.preventDefault();
                $("#steps-uid-0-t-1").trigger('click');
                $("div.card-box").append("<div class=\"alert alert-danger\"><ul><li>Umur anda "+age+" tahun kurang memenuhi persyaratan yaitu minimum 21 tahun</li></ul></div>");
            }
        });
    </script>
    @stack('parent-scripts')
@endpush