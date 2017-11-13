@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section id="property" class="padding listing1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box title-calender">
                    <h4 class="m-t-0 header-title"><b>Modul Penjadwalan</b></h4>
                    <p class="text-muted m-b-30">
                        Klik pada tanggal untuk menambahkan jadwal baru atau klik pada label jadwal yg telah ada untuk merubah.
                    </p>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <!-- BEGIN MODAL -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Jadwal</h4>
                            </div>
                            <div class="modal-body p-20"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Simpan Jadwal</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Hapus Jadwal Ini</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- This is styles for this page -->
@push('styles')
    {!! Html::style('assets/css/fullcalendar.min.css') !!}
    {!! Html::style('assets/css/select2.min.css') !!}
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
    {!! Html::script('assets/js/select2.min.js') !!}
    {!! Html::script('assets/js/moment.js') !!}
    {!! Html::script('assets/js/fullcalendar.min.js') !!}
    {!! Html::script('assets/js/jquery.fullcalendar.js') !!}
@endpush
<!-- This is scripts for this page end-->