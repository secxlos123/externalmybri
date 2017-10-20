<div class="row">
    <div class="col-md-6">
        <h4 class="m-t-0 header-title"><b>Waktu</b></h4>
        <p class="text-muted m-b-30 font-13">
            Tentukan Waktu Pertemuan
        </p>
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="control-label col-md-4">Tanggal :</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" id="datepicker-autoclose">
                        <span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Pukul :</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" id="timepicker2">
                        <span class="input-group-addon b-0"><i class="fa fa-clock-o"></i></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-t-0 header-title"><b>Lokasi</b></h4>
        <p class="text-muted m-b-30 font-13">
            Tentukan lokasi/tempat Pertemuan
        </p>
        <input id="searchInput" class="input-controls" type="text" placeholder="Masukkan nama tempat atau nama jalan untuk lokasi pertemuan">
        <div class="map" id="map" style="width: 100%; height: 400px;"></div>
        <div class="form-group m-t-20">
            <div class="col-md-6">
                <label class="control-label">Lokasi</label>
                <textarea name="location" id="location" class="form-control" readonly="" rows="3"></textarea>
            </div>
            <div class="col-md-3">
                <label class="control-label">Latitude</label>
                <input type="text" name="lat" id="lat" class="form-control" readonly="">
            </div>
            <div class="col-md-3">
                <label class="control-label">Longitude</label>
                <input type="text" name="lng" id="lng" class="form-control" readonly="">
            </div>
        </div>
    </div>
</div>