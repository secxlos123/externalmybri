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
    <h4 class="m-t-0 header-title"><b>Customer</b></h4>
    <p class="text-muted m-b-30 font-13">
        Cari NIK Customer atau tambah Customer baru
    </p>
    <div class="row">
        <div class="col-md-6">
            <div role="form">
                <div class="form-group nik {!! $errors->has('nik') ? 'has-error' : '' !!}">
                    <label class="control-label">Cari NIK Customer *</label>
                    <div class="input-group">
                        {!! Form::select('nik2', ['' => ''], old('nik'), [
                                'class' => 'select2 nikSelect',
                                'data-placeholder' => 'NIK',
                                'id' => 'nik',
                                'maximumInputLength' => 16
                            ]) !!}
                            <input type="hidden" name="nik" id="nikSelect">
                        <span class="input-group-btn">
                        <a href="#" class="btn waves-effect waves-light btn-primary" id="search"><i class="fa fa-search"></i> Cari</a>
                        </span>
                    </div>
                            @if ($errors->has('nik')) <p class="help-block">{{ $errors->first('nik') }}</p> @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-inline m-t-27" role="form">
                <div class="form-group">
                    Atau
                </div>
                <a href="javascript:void(0);" class="btn btn-primary waves-effect waves-light m-l-10 btn-md" id="btn-leads" ><i class="fa fa-plus-circle"></i> Tambah Leads Baru</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="" id="detail">
                <!-- <h4 class="m-t-0 header-title"><b>Data Leads</b></h4>
-->
                <!-- ============================================== -->
                <!-- Space untuk Detail Leads -->
               <!--  <p class="text-muted font-13 m-t-20" >
                    <code>Space ini nantinya berisi detail Leads (seperti yang ada di dalam modul Leads / detail), dan akan terisi jika NIK yang diisikan pada field Cari NIK di atas ditemukan.</code>
                </p> -->
                <!-- End Detail Leads -->
                <!-- ============================================== -->

            </div>
        </div>
    </div>
</section>

                                <h3>Penjadwalan</h3>
                                <section>
                                    @include('eforms._appointment')
                                </section>

                                <h3>Kantor Cabang</h3>
                                <section>
                                    @include('eforms._branch-office')
                                </section>
                                <input type="hidden" name="sales_dev_id" value="{{ $results['id'] }}">
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('eforms.eform-modal')
@include('eforms._form-modal-new-leads')
@endsection

@push('styles')
    {!! Html::style('assets/css/jquery.steps.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
    {!! Html::style('assets/css/bootstrap-datepicker.min.css') !!}
        <style type="text/css">
        #wizard-validation-form label.error{
            font-family: 'Varela Round', sans-serif;
        }
        #search {
            padding: 11px;
        }
        #btn-leads {
            padding: 11px;
        }
        .form-inline.m-t-27 .form-group {
            padding: 19px 45px;
        }
    </style>
    @stack('parent-styles')
@endpush

@push('scripts')
    {!! Html::script('assets/js/jquery.steps.js') !!}
    {!! Html::script('assets/js/bootstrap-datepicker.min.js') !!}
    <!-- This script for init jquery steps you can replace this script with your logic -->
    {!! Html::script('assets/js/select2.min.js') !!}
    {!! Html::script('js/dropdown.min.js') !!}

     <script src="{{asset('assets/js/HoldOn.min.js')}}"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
   {!! JsValidator::formRequest(App\Http\Requests\Customer\CustomerRequest::class, '#form_data_personal') !!}
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
               // $form_container.submit();
             var request_amount = $('#request_amount').val();
             var year   = $('#year').val();
             var offices = $('#offices').val();
             var appointment_date = $('#appointment_date').val();

             var nik = $('#nikSelect').val();

             $.ajax({
                dataType:'json',
                type:'GET',
                url:'{{route("eform.get-cust")}}',
                data: {nik:nik},
                success: function(result, data){
                   // console.log(result);
                 var nik = result.data.nik;
                 var first_name = (result.data.first_name ? result.data.first_name : '');
                 var full_name = (result.data.first_name ? result.data.first_name : '')+' '+(result.data.last_name ? result.data.last_name : '');
                 var email = result.data.email;
                 var birth_place = result.data.birth_place;
                 var birth_date = result.data.birth_date;
                 var mother_name = result.data.mother_name;
                 var mobile_phone = result.data.mobile_phone;
                 var couple_nik = result.data.couple_nik;
                 var couple_name = result.data.couple_name;
                 var couple_birth_place = result.data.couple_birth_place;
                 var couple_birth_date = result.data.couple_birth_date;
                 var couple_identity = result.data.couple_identity;
                 var identity = result.data.identity;
                // var status = result.data.status;

                 if(result.data.status == 1)
                 {
                    var status ='Belum Menikah';
                    $('#view-modal #couple1').hide();
                    $('#view-modal #couple2').hide();
                    $('#view-modal #couple3').hide();
                    $('#view-modal #couple4').hide();
                    $('#view-modal #couple5').hide();
                 }
                 else if(result.data.status == 2)
                 {
                    var status = 'Menikah';
                    $('#view-modal #couple1').show();
                    $('#view-modal #couple2').show();
                    $('#view-modal #couple3').show();
                    $('#view-modal #couple4').show();
                    $('#view-modal #couple5').show();
                 }
                 else
                 {
                    var status = 'Janda/Duda';
                    $('#view-modal #couple1').hide();
                    $('#view-modal #couple2').hide();
                    $('#view-modal #couple3').hide();
                    $('#view-modal #couple4').hide();
                    $('#view-modal #couple5').hide();
                 }

                $('#view-modal #couple_birth_place').html(couple_birth_place);
                $('#view-modal').modal('show');
                $('#view-modal #request_amount').html('Rp.'+request_amount);
                $('#view-modal #year').html(year+' bulan');
                $('#view-modal #office').html(offices);
                $('#view-modal #appointment_date').html(appointment_date);
                $('#view-modal #cust_nik').html(nik);
                $('#view-modal #customer_name').html(first_name);
                $('#view-modal #customer_fullname').html(full_name);
                $('#view-modal #mobile_phone').html(mobile_phone);
                $('#view-modal #couple_nik').html(couple_nik);
                $('#view-modal #couple_name').html(couple_name);
                $('#view-modal #email').html(email);
                $('#view-modal #status').html(status);
                $('#view-modal #couple_birth_date').html(couple_birth_date);
                $('#view-modal #mother_name').html(mother_name);
                //$("#view-modal #couple_identity").html('<img src="'+couple_identity+'" class="img-responsive">');
                //$("#view-modal #identity").html('<img src="'+identity+'" class="img-responsive">');
                var extension_couple = couple_identity.substr((couple_identity.lastIndexOf('.') +1));
                        if(extension_couple == 'pdf'){
                            $("#view-modal #couple_identity").html('<a href="'+couple_identity+'" target="_blank" class="img-responsive"><img src="{{asset("assets/images/download-logo.png")}}" class="img-responsive"></a><p>Klik Untuk Lihat Foto KTP Pasangan</p> ');
                        }else{
                            $("#view-modal #couple_identity").html('<img src="'+couple_identity+'" class="img-responsive"><p>Foto KTP Pasangan</p>');
                        }

                var extension = identity.substr( (identity.lastIndexOf('.') +1) );
                        if(extension == 'pdf'){
                            $("#view-modal #identity").html('<a href="'+identity+'" target="_blank" class="img-responsive"><img src="{{asset("assets/images/download-logo.png")}}" class="img-responsive"></a><p>Klik Untuk Lihat Foto KTP</p>');
                        }else{
                            $("#view-modal #identity").html('<img src="'+identity+'" class="img-responsive"><p>Foto KTP</p>');
                        }
                },
                 error: function(result, data){
                        console.log('error');
                    }
             });
             return false;
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

        // $(document).on('submit', '#app-eform', function(e){
        //     var status = $("#status").select2('data')[0]['id'];
        //     var dob = new Date($("input[name='birth_date']").val());
        //     var today = new Date();
        //     var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));

        //     if (age < 21 && status == 1) {
        //         e.preventDefault();
        //         $("#steps-uid-0-t-1").trigger('click');
        //         $("div.card-box").append("<div class=\"alert alert-danger\"><ul><li>Umur anda "+age+" tahun kurang memenuhi persyaratan yaitu minimum 21 tahun</li></ul></div>");
        //     }
        // });
    </script>
    <!-- This Jquery Eform Agent Dev -->
    {!! Html::script('assets/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('assets/js/bootstrap-filestyle.min.js') !!}

    <script type="text/javascript">
        $('#btn-leads').on('click', function() {
           $('#leads-modal').modal('show');
        });

     $('#view-modal').on('click', '#agree', function() {
          // HoldOn.open(options);
            // console.log('ini ini ini');
       $("#app-eform").submit();
    });

        $('.nikSelect').select2({
            maximumInputLength : 16,
            width : '100%',
            allowClear: true,
            ajax: {
                url: '/eform/list-customer',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        name: params.term,
                        page: params.page || 1,
                        eform : false
                    };
                },
                processResults: function (data, params) {
                    $('.select2-search__field').attr('maxlength', 16);
                    $(".select2-search__field").keydown(function (e) {
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
                    // console.log(data);
                    if((data.customers.data.length) == 0){
                        // $('#search').addClass('disabled');
                        // $('#btn-leads').removeClass('disabled');
                        return {
                            results: '',
                        };
                    }else{
                        // $('#search').removeClass('disabled');
                        // $('#btn-leads').addClass('disabled');
                        params.page = params.page || 1;
                        return {
                            results: data.customers.data,
                            pagination: {
                                more: (params.page * data.customers.per_page) < data.customers.total
                            }
                        };

                        var text = $(this).find("option:selected").text();
                       // console.log(text);
                    }
                },
                cache: true
            },
        });

            $('.nikSelect').on('select2:unselecting', function (e) {
            $('#search').addClass('disabled');
            $('#btn-leads').removeClass('disabled');
        });

        $('.nikSelect').on('select2:select', function (e) {
            $('#search').removeClass('disabled');
            $('#btn-leads').addClass('disabled');
        });

        $('.nikSelect').on('change', function () {
            var id = $(this).val();
            var text = $(this).find("option:selected").text();
            $('#nikSelect').val(text);
             $('#nik_customer').val(text);
            // console.log(text);
        });

        //search customer by nik
        $('#search').on('click', function(e) {
           // var id = $('#nik').val();
           var nik = $('#nik').val();
            e.preventDefault();

            $.ajax({
                dataType: 'json',
                type: 'GET',
                url: '{{route("eform.detail-customer")}}',
                data: { nik : nik }
            }).done(function(data){
                console.log(data);
                $('#detail').html(data['view']);


            }).fail(function(errors) {

            });
        });

           //showing modal create leads
    $(document).on('click', '#btn-leads', function(){
      // console.log("salah masuk");
       $('#leads-modal').modal('show');
    })

     var options = {
     theme:"sk-cube-grid",
     message:'some cool message for your user here ! Or where the logo is ! Your skills are the only limit. ',
     textColor:"white"
          };

   // $('#btn-save').on('click', function() {
   //     HoldOn.open(options);
   //   });

      //storing leads

        $('#btn-save').on('click', function(e){
            $("#form_data_personal").submit();
            console.log("masuklah");
        });

        $("#form_data_personal").submit(function(){

            var formData = new FormData(this);

            console.log("=========Ngirim Data Gak Yaa============");
             console.log(formData);

             $.ajax({
                 url: "{{route('eform.save-customer')}}",
                 type: 'POST',
                 data: formData,
                 success: function (data) {
                      console.log("=========Data Ajax============");
                      console.log(data);
                     //toastr["success"]("Data Berhasil disimpan");
                      $('#divForm').removeClass('alert alert-success');
                      $('#divForm').html("");

                    if ( data.code != 422 ) {
                        $('#leads-modal').modal('toggle');

                        nik = $('.nikStep2').val();
                        $('#nikSelect').val(nik);
                        console.log(nik);

                        $("#nik").html('<option value="'+nik+'">'+nik+'</option>');
                        $("#select2-nik-container").replaceWith('<span class="select2-selection__rendered" id="select2-nik-container" title="'+nik+'"><span class="select2-selection__clear">×</span>'+nik+'</span>');
                        $("#search").click();
                        //$('body').addClass('modal-open');
                        //$("a[href='#finish']").click();

                        $('#divForm').addClass('alert alert-success');
                        $('#divForm').html('Data Berhasil Ditambahkan');

                    } else {
                        setTimeout(
                            function(){
                                $.each(data.contents, function(key, value) {
                                    // console.log(key);
                                    $("#form_data_personal").find(".form-group." + key).eq(0).addClass('has-error');

                                    if (key == 'nik') {
                                        $('div.nik div span#nik_customer-error').html(value);
                                    }else if(key == 'email'){
                                        $("#form_data_personal").find("span#"+key+"-error").eq(0).html('Email sudah pernah digunakan.');
                                    }else{
                                        $("#form_data_personal").find("span#"+key+"-error").eq(0).html(value);
                                    }
                                });
                            }
                        , 2000);
                    }

                  //  HoldOn.close();
                    $('#divForm').addClass('alert alert-success');
                    $('#divForm').append('Data Berhasil Ditambahkan');
                 },
                 error: function (response) {
                      console.log(response)
                     //  toastr["error"]("Data Gagal disimpan");
                     // HoldOn.close();
                 },
                 cache: false,
                 contentType: false,
                 processData: false
             });


            return false;
        });


        $('#leads-modal #status').on('change', function(){
            if ($(this).val() == 2)
            {
                $('#data_couple').show();
            }
            else if($(this).val() == 3)
            {
                $('#data_couple').hide();
            }
            else
            {
                $('#data_couple').hide();
            }
        });

        //$('.cities').dropdown('cities');

         $('.cities').select2({
            dropdownParent: $('#leads-modal #data_personal'),
            maximumInputLength : 25,
            witdh : '100%',
            allowClear: true,
            ajax : {
                url:'{{ url("dropdown/cities") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {

                     return {
                         name: params.term,
                         page: params.page || 1
                     };
                 },
                 processResults: function (data, params) {
                         params.page = params.page || 1;
                         console.log(data);
                         return {
                             results: data.results.data,
                             pagination: {
                                 more: (params.page * data.results.per_page) < data.results.total
                             }
                         };

                    var text = $(this).find("option:selected").text();
                    var id = $(this).find("option:selected").data('id');

                         console.log(text);
                 },
                 cache: true
             }
         });

         $('.cities_couple').select2({
            dropdownParent: $('#leads-modal #data_couple'),
            maximumInputLength : 25,
            witdh : '100%',
            allowClear: true,
            ajax : {
                url:'{{ url("dropdown/cities") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {

                     return {
                         name: params.term,
                         page: params.page || 1
                     };
                 },
                 processResults: function (data, params) {
                         params.page = params.page || 1;
                         console.log(data);
                         return {
                             results: data.results.data,
                             pagination: {
                                 more: (params.page * data.results.per_page) < data.results.total
                             }
                         };

                    var text = $(this).find("option:selected").text();
                    var id = $(this).find("option:selected").data('id');

                         console.log(text);
                 },
                 cache: true
             }
         });



        $('#datepicker-date').datepicker({
            format: "yyyy-mm-dd",
            clearBtn: true,
            autoclose: true,
            endDate: new Date(),
            todayHighlight: true
        });

        $('#datepicker-autoclose').datepicker({
            format: "yyyy-mm-dd",
            clearBtn: true,
            autoclose: true,
            endDate: new Date(),
            todayHighlight: true
        });

        $('#datepicker-date').datepicker("setDate",  "{{date('Y-m-d', strtotime('-21 years'))}}");
        $('#datepicker-autoclose').datepicker("setDate",  "{{date('Y-m-d', strtotime('-21 years'))}}");

        // $( "#datepicker-date" ).datepicker({
        //     format: 'dd-mm-yyyy',
        //     endDate: '-17y'
        //     });
    </script>
    <!-- End Script for Agent Dev -->
    @stack('parent-scripts')
@endpush