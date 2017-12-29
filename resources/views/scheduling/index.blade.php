@extends('layouts.app')

@section('title', 'Halaman Utama')

@section('content')
<section id="property" class="padding listing1">
    <div class="container">
        <div class="row">
        <label id="label" class="col-md-12"></label>
            <div class="col-md-12">
                <div class="card-box title-calender">
                    <h4 class="m-t-0 header-title"><b>Modul Penjadwalan</b></h4>

                    <!-- <div class='map' id='map' style='width: 100%; height: 200px;'></div> -->
                    <p class="text-muted m-b-30">
                        Klik pada label jadwal yg telah ada untuk dirubah.
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
                            <div class="modal-body p-20">
                                <div class="form">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tanggal</label>
                                                    <input class="form-control appointment_date" readonly="" name="date" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Title</label>
                                                    <input class="form-control" id="title" name="title" type="text">
                                                    <input class="form-control" id="lng" name="lng" type="hidden">
                                                    <input class="form-control" id="lat" name="lat" type="hidden">
                                                    <input class="form-control" id="id_schedule" name="id_schedule" type="hidden">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">No. Referensi</label>
                                                    <input class="form-control reference" readonly="" name="reference" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Guest</label>
                                                    <input class="form-control" name="guest" readonly="" value="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label class="control-label">Deskripsi</label>
                                                <textarea name="description" class="form-control" rows="3" style="resize: none;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <input type="text" name="" id="searchInput" class="form-control">
                                <div class='map' id='map' style='width: 100%; height: 200px;'></div>
                            </div>
                            <div class="modal-footer">
                                <div class="approval" hidden>
                                    <button type="button" class="btn btn-default waves-effect">Setuju</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Tidak Setuju</button>
                                </div>
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light" id="updateSchedule">Update Jadwal</button>
                                <!-- <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Hapus Jadwal Ini</button> -->
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
    <style type="text/css">
        .approval{
            float: left;
        }
    </style>
@endpush
<!-- This is styles for this page end -->

<!-- This is scripts for this page -->
@push('scripts')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIijm1ewAfeBNX3Np3mlTDZnsCl1u9dtE&libraries=places"></script>
    {!! Html::script( 'assets/js/jquery.gmaps.js' ) !!}
    {!! Html::script('assets/js/moment.js') !!}
    {!! Html::script('assets/js/fullcalendar.min.js') !!}
    {!! Html::script('assets/js/jquery.fullcalendar.js') !!}
    {!! Html::script('assets/js/jquery.slimscroll.js') !!}
    {!! Html::script('assets/js/jquery.scrollTo.min.js') !!}

    <script type="text/javascript">
        var map, marker;
$( document ).ready(function() {
    // $('.fc-time').hide();

function initialize() {
    var lng = $('#lng').val();
    var lat = $('#lat').val();
    var latlng = new google.maps.LatLng('-6.9032739','107.5729448');
    map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 7,
      disableDefaultUI: true
    });
    marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true
      // anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(7);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);

    });
    // this function will work on marker move event into map
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}

   $('#event-modal').on('shown.bs.modal', function(event){
                setTimeout(function () {
                    // google.maps.event.addDomListener(window, 'load', initialize);
                    initialize();
                    google.maps.event.trigger(map, "resize");
                }, 2000);
            });
            $('#event-modal').on('hidden.bs.modal', function(event){
                $('#searchInput').val('');
            });

        function initializeMapPosition (event) {
            // console.log(event.latitude);
            setTimeout(function () {
                marker.position = new google.maps.LatLng(event.lat, event.long);
                marker.setMap(map);
                map.setCenter(new google.maps.LatLng(event.lat, event.long), 5);
            }, 1000);
        }

        function bindDataToForm(lat, lng) {
            $('#lng').val(lng);
            $('#lat').val(lat);
        }

         google.maps.event.addDomListener(window, 'load', initialize);
     });

        $('#updateSchedule').on('click', function(){
            var title = $("input[name='title']").val();
            var desc= $("textarea[name='description']").val();
            var long= $("input[name='lng']").val();
            var lat= $("input[name='lat']").val();
            var date= $("input[name='date']").val();
            var id= $("input[name='id_schedule']").val();
            console.log(id);
            $.ajax({
                url: "/schedule/update",
                dataType: "JSON",
                type: 'GET',
                data: {
                    title: title,
                    desc: desc,
                    long: long,
                    lat: lat,
                    date: date,
                    id: id
                },
                success: function(response){
                    console.log(response);
                    title = $('#id_schedule').val();
                    console.log(title);
                       $('#label').addClass('alert alert-success');
                       $('#label').text('Jadwal Berhasil di Update');

                },
                error: function(response){
                    console.log('error');
                }
            });
            $('#event-modal').modal('hide');
            content_title = $('#title').val(); 
            $('.fc-title').text(content_title);
            setTimeout(location.reload.bind(location), 1500);
        });
    </script>
@endpush
<!-- This is scripts for this page end-->