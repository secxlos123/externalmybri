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
                        {!! Form::model($customer, [
                            'route' => 'eform.store', 'id' => 'app-eform',
                            'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'
                        ]) !!}
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
                return $form_container.valid();
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
    </script>
    @stack('parent-scripts')
@endpush