<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Foto NPWP</label>
            <img src="{{isset($results['other']['npwp']) ? image_checker($results['other']['npwp']) : image_checker()}}" class="img-responsive" alt="">
        </div>
    </div>
    <div class="col-md-6">
    </div>
    @if ($type != 'view'  || session('authenticate.role') != 'developer')
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile') : url('profile')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
            <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
        </div>
    </div>
    @endif
</div>