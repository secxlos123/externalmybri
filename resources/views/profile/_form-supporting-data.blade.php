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
        <div class="single-query form-group bottom20">
            @if ($type != 'view')
                <label>Foto Kartu Keluarga</label>
                {!! Form::file('family_card', [
                    'class' => 'filestyle', 'data-target' => 'family_card_preview',
                    'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                    'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
                ]) !!}
            @endif

            @if ( isset($results['other']['family_card']) && $results['other']['family_card'])

                <div class="single-query form-group bottom20">
                    <label>Foto Kartu Keluarga</label>
                    {!! Html::image(image_checker($results['other']['family_card']), 'family_card', [
                        'class' => 'img-responsive', 'width' => 300, 'id' => 'family_card_preview',
                        'data-src' => asset('assets/images/no-image.jpg')
                    ]) !!}
                </div>

            @else

                <div class="single-query form-group bottom20">
                    <label>Foto Kartu Keluarga</label>
                    {!! Html::image(image_checker(), 'family_card', [
                        'class' => 'img-responsive', 'width' => 300, 'id' => 'family_card_preview',
                        'data-src' => asset('assets/images/no-image.jpg')
                    ]) !!}
                </div>

            @endif
        </div>
    </div>
</div>

@if ($results['personal']['status_id'] == 2)
    <div class="row">
        <div class="col-md-6">
            <div class="single-query form-group bottom20">
                @if ($type != 'view')
                    <label>Foto KTP Pasangan</label>
                    {!! Form::file('couple_identity', [
                        'class' => 'filestyle', 'data-target' => 'couple_identity_preview',
                        'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                        'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
                    ]) !!}
                @endif

                @if ( isset($results['personal']['couple_identity']) && $results['personal']['couple_identity'])

                    <div class="single-query form-group bottom20">
                        <label>Foto KTP Pasangan</label>
                        {!! Html::image(image_checker($results['personal']['couple_identity']), 'couple_identity', [
                            'class' => 'img-responsive', 'width' => 300, 'id' => 'couple_identity_preview',
                            'data-src' => asset('assets/images/no-image.jpg')
                        ]) !!}
                    </div>

                @else

                    <div class="single-query form-group bottom20">
                        <label>Foto KTP Pasangan</label>
                        {!! Html::image(image_checker(), 'couple_identity', [
                            'class' => 'img-responsive', 'width' => 300, 'id' => 'couple_identity_preview',
                            'data-src' => asset('assets/images/no-image.jpg')
                        ]) !!}
                    </div>

                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="single-query form-group bottom20">
                @if ($type != 'view')
                    <label>Foto Surat Nikah</label>
                    {!! Form::file('marrital_certificate', [
                        'class' => 'filestyle', 'data-target' => 'marrital_certificate_preview',
                        'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                        'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
                    ]) !!}
                @endif

                @if ( isset($results['other']['marrital_certificate']) && $results['other']['marrital_certificate'])

                    <div class="single-query form-group bottom20">
                        <label>Foto Surat Nikah</label>
                        {!! Html::image(image_checker($results['other']['marrital_certificate']), 'marrital_certificate', [
                            'class' => 'img-responsive', 'width' => 300, 'id' => 'marrital_certificate_preview',
                            'data-src' => asset('assets/images/no-image.jpg')
                        ]) !!}
                    </div>

                @else

                    <div class="single-query form-group bottom20">
                        <label>Foto Surat Nikah</label>
                        {!! Html::image(image_checker(), 'marrital_certificate', [
                            'class' => 'img-responsive', 'width' => 300, 'id' => 'marrital_certificate_preview',
                            'data-src' => asset('assets/images/no-image.jpg')
                        ]) !!}
                    </div>

                @endif
            </div>
        </div>
    </div>

@elseif ($results['personal']['status_id'] == 3)
    <div class="row">
        <div class="col-md-6">
            <div class="single-query form-group bottom20">
                @if ($type != 'view')
                    <label>Foto Surat Cerai</label>
                    {!! Form::file('diforce_certificate', [
                        'class' => 'filestyle', 'data-target' => 'diforce_certificate_preview',
                        'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                        'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
                    ]) !!}
                @endif

                @if ( isset($results['other']['diforce_certificate']) && $results['other']['diforce_certificate'])

                    <div class="single-query form-group bottom20">
                        <label>Foto Surat Cerai</label>
                        {!! Html::image(image_checker($results['other']['diforce_certificate']), 'diforce_certificate', [
                            'class' => 'img-responsive', 'width' => 300, 'id' => 'diforce_certificate_preview',
                            'data-src' => asset('assets/images/no-image.jpg')
                        ]) !!}
                    </div>

                @else

                    <div class="single-query form-group bottom20">
                        <label>Foto Surat Cerai</label>
                        {!! Html::image(image_checker(), 'diforce_certificate', [
                            'class' => 'img-responsive', 'width' => 300, 'id' => 'diforce_certificate_preview',
                            'data-src' => asset('assets/images/no-image.jpg')
                        ]) !!}
                    </div>

                @endif
            </div>
        </div>
    </div>

@endif

@if ($type != 'view')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile') : url('profile/other')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
                <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
                {!! Form::hidden('cif_number', '-', ['class' => 'form-control']) !!}
                {!! Form::hidden('status_id', $results['personal']['status_id'], ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
@else
    @if(!empty($results['is_approved']['status']))
        @if($results['is_approved']['status'] == false)
    <div class="col-md-12">
        <div class="pull-right">
            <button class="btn btn-primary waves-light waves-effect w-md m m-b-20" disabled="disabled">Ubah</button>
        </div>
    </div>
        @elseif($results['is_approved']['status'] == true)
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/ubah') : url('profile/ubah/other')}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Ubah</a>
        </div>
    </div>
        @endif
    @elseif($results['is_approved'] == null)
    <div class="col-md-12">
        <div class="pull-right">
            <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/ubah') : url('profile/ubah/other')}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Ubah</a>
        </div>
    </div>
    @endif
@endif