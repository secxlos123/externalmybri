@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('breadcrumb')
    <h1 class="text-uppercase">Tambah Proyek</h1>
    <p>Kelola proyek anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek.index') !!}">List Proyek</a></li>
        <li class="active">Tambah Proyek</li>
    </ol>
@endsection

@section( 'content' )
    <section id="property" class="padding listing1">
        <div class="container">
            {!! Form::open([
                'route' => 'developer.proyek.store-item',
                'class' => 'callus submit_property', 'id' => 'form-property-item',
                'enctype' => 'multipart/form-data'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Tambah Proyek Properti</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Proyek</h3>
                            </div>
                            <div class="panel-body">
                                @include('developer.property_item._form')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20">
                                <i class="mdi mdi-content-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push( 'styles' )
    {!! Html::style( 'assets/css/select2.min.css' ) !!}
@endpush

@push( 'scripts' )
    {!! Html::script( 'assets/js/select2.min.js' ) !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! JsValidator::formRequest(App\Http\Requests\Developer\Property\CreateRequest::class, '#form-property-item') !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">
        $('.status').select2({});

        $('.cities').dropdown('cities');
        $(".numericOnly").keydown(function (e) {
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
        $(document).ready(function() {
            $('.property_type').select2({});
        $('.property').select2({
            // width : '100%',
            allowClear: true,
            ajax: {
                url: '/dropdown/property',
                dataType: 'json',
                delay: 250,
                processResults: function (data, params) {
                    params.page = params.page || 1;
                    // console.log(data);
                    return {
                        results: data.results.data,
                        pagination: {
                            more: (params.page * data.results.per_page) < data.results.total
                        }
                    };
                },
                cache: true
            },
        });

        $('.property').on('change', function(){
            var prop = $(this).val();
            $('.property_type').select2({
                // width : '100%',
                allowClear: true,
                ajax: {
                    url: '/dropdown/types',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            prop_id : prop,
                            name: params.term,
                            page: params.page || 1
                        };
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 1;
                        // console.log(data);
                        return {
                            results: data.results.data,
                            pagination: {
                                more: (params.page * data.results.per_page) < data.results.total
                            }
                        };
                    },
                    cache: true
                },
            });
        });

        });
    </script>
@endpush
