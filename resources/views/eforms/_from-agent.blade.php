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
                        {!! Form::select('nik', ['' => ''], old('nik'), [
                                'class' => 'select2 nikSelect',
                                'data-placeholder' => 'NIK',
                                'id' => 'nik',
                                'maximumInputLength' => 16
                            ]) !!}
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
@include('eforms._form-modal-new-leads')
@push( 'parent-styles' )
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
@endpush

@push( 'parent-scripts' )
    {!! Html::script('assets/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('assets/js/bootstrap-filestyle.min.js') !!}

    <script type="text/javascript">
        $('#btn-leads').on('click', function() {
           $('#leads-modal').modal('show');
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
                        page: params.page || 1
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
                    }
                },
                cache: true
            },
        });

        //search customer by nik
        $('#search').on('click', function(e) {
            var id = $('#nik').val();
            e.preventDefault();

            $.ajax({
                dataType: 'json',
                type: 'GET',
                url: '{{route("eform.detail-customer")}}',
                data: { id : id }
            }).done(function(data){
                // console.log(data);
                $('#detail').html(data['view']);
            }).fail(function(errors) {

            });
        });

        //storing leads
        $("#form_data_personal").submit(function(e){
        // $('#btn-save').on('click', function(e){
            console.log('masukkkkkkkkkkkkkkkkkkkkkkk');
            var formData = new FormData(this);
            // var nik = $("#nik").val();
            // var full_name = $("#full_name").val();
            // var birth_place_id = $("#birth_place_id").select2('data')[0]['id'];
            // var birth_place = $("#birth_place_id").select2('data')[0]['name'];
            // var gender = $("#gender").val();
            // var birth_date = $("#birth_date").val();
            // var status = $("#status").val();
            // var email = $("#email").val();
            // var mobile_phone = $("#mobile_phone").val();
            // var phone = $("#phone").val();
            // var mother_name = $("#mother_name").val();
            // var identity = $("input[type='file']").val();
            // console.log(identity);
            // e.preventDefault();

            // $.ajax({
            //     url: "{{route('eform.save-customer')}}",
            //     type: 'POST',
            //     data: formData,
            //     async: false,
            //     success: function (data) {
            //         // console.log(data)
            //         // toastr["success"]("Data Berhasil disimpan");
            //         if ( data.code != 422 ) {
            //             $('#leads-modal').modal('toggle');
            //         } else {
            //             setTimeout(
            //                 function(){
            //                     $.each(data.contents, function(key, value) {
            //                         // console.log(key);
            //                         $("#form_data_personal").find(".form-group." + key).eq(0).addClass('has-error');
            //                         $("#form_data_personal").find("span#"+key+"-error").eq(0).html(value);
            //                     });
            //                 }
            //             , 2000);
            //         }

            //         HoldOn.close();
            //         // $('#divForm').addClass('alert alert-success');
            //         // $('#divForm').append('Data Berhasil Ditambahkan');
            //     },
            //     error: function (response) {
            //         // console.log(response)
            //         // toastr["error"]("Data Gagal disimpan");
            //         HoldOn.close();
            //     },
            //     cache: false,
            //     contentType: false,
            //     processData: false
            // });

            $.ajax({
                url: "{{route('eform.save-customer')}}",
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                    // console.log(data)
                    // toastr["success"]("Data Berhasil disimpan");
                    $('#divForm').removeClass('alert alert-success');
                    $('#divForm').html("");

                    if ( data.code != 422 ) {
                        $('#leads-modal').modal('toggle');

                        nik = $("input[name='nik']").val();

                        $("#nik").html('<option value="'+nik+'">'+nik+'</option>');
                        $("#select2-nik-container").replaceWith('<span class="select2-selection__rendered" id="select2-nik-container" title="'+nik+'"><span class="select2-selection__clear">×</span>'+nik+'</span>');
                        $("#search").click();
                        $("a[href='#finish']").click();

                        $('#divForm').addClass('alert alert-success');
                        $('#divForm').html('Data Berhasil Ditambahkan');

                    } else {
                        setTimeout(
                            function(){
                                $.each(data.contents, function(key, value) {
                                    // console.log(key);
                                    $("#form_data_personal").find(".form-group." + key).eq(0).addClass('has-error');
                                    $("#form_data_personal").find("span#"+key+"-error").eq(0).html(value);
                                });
                            }
                        , 2000);
                    }

                    HoldOn.close();
                },
                error: function (response) {
                    // console.log(response)
                    // toastr["error"]("Data Gagal disimpan");
                    HoldOn.close();
                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        });


        $('.cities').dropdown('cities');

        $('#status').on('change', function(){
            if ($(this).val() == 2) {
                $('#couple_data').show();
            }else{
                $('#couple_data').hide();
            }
        });

        $('#datepicker-date').datepicker({
            format: "yyyy-mm-dd",
            clearBtn: true,
            autoclose: true,
            endDate: new Date(),
            todayHighlight: true
        });

        $('#datepicker-date').datepicker("setDate",  "{{date('Y-m-d', strtotime('-21 years'))}}");
    </script>
@endpush