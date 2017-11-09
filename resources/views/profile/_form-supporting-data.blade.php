<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            @if ($type != 'view')
            <label>Foto NPWP</label>
                {!! Form::file('npwp', [
                    'class' => 'filestyle', 'data-target' => 'npwp_preview',
                    'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                    'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
                ]) !!}
            @endif

            @if ( isset($results['other']['npwp']) && $results['other']['npwp'])

                <div class="single-query form-group bottom20">
                    <label>Foto NPWP</label>
                    {!! Html::image(image_checker($results['other']['npwp']), 'npwp', [
                        'class' => 'img-responsive', 'width' => 300, 'id' => 'npwp_preview',
                        'data-src' => asset('assets/images/no-image.jpg')
                    ]) !!}
                </div>

            @else

                <div class="single-query form-group bottom20">
                    <label>Foto NPWP</label>
                    {!! Html::image(image_checker(), 'npwp', [
                        'class' => 'img-responsive', 'width' => 300, 'id' => 'npwp_preview',
                        'data-src' => asset('assets/images/no-image.jpg')
                    ]) !!}
                </div>

            @endif
        </div>
    </div>
    <div class="col-md-6">
    </div>
    @if ($type != 'view')
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile') : url('profile')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
            <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
        </div>
    </div>
    @endif

    {!! Form::hidden('cif_number', '-', ['class' => 'form-control']) !!}
</div>