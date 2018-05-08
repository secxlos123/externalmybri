<div class="row top20">
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>NIK @if ($type != 'view')(<span title="Kolom NIK wajib diisi!">*</span>)@endif</label>
            @if ($type != 'view')
                {!! Form::text('nik', (old('nik')) ? old('nik') : @$results['personal']['nik'], [
                    'class' => 'form-control ', 'maxlength' => 16, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)', 'title' => 'Kolom NIK wajib diisi!'
                ]) !!}
            @else
                <span class="form-control" style="border: 0px;">{{isset($results['personal']['nik']) ? $results['personal']['nik'] : ''}}</span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Nama @if ($type != 'view')(<span title="Kolom Nama wajib diisi!">*</span>)@endif</label>
            @if ($type != 'view')
                {!! Form::text('name', @$results['personal']['first_name'].' '.@$results['personal']['last_name'], [
                    'class' => 'form-control',
                    'title' => 'Kolom Nama wajib diisi!'
                ]) !!}
            @else
                <span class="form-control" style="border: 0px">
                    {{isset($results['personal']['first_name']) ? $results['personal']['first_name'].' '.$results['personal']['last_name'] : ''}}
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Tempat lahir @if ($type != 'view')(<span title="Kolom Tempat Lahir wajib diisi!">*</span>)@endif</label>
            @if ($type != 'view')
            {!! Form::select('birth_place_id', [@$results['personal']['birth_place_id'] => @$results['personal']['birth_place']], old('birth_place_id'), [
                'class' => 'form-control select2 cities birth_place',
                'data-placeholder' => 'Pilih Kota',
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['birth_place']) ? $results['personal']['birth_place'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Tanggal lahir @if ($type != 'view')(<span title="Kolom Tanggal Lahir wajib diisi!">*</span>)@endif</label>
            <div>
                <div class="input-group">
                    @if ($type != 'view')
                    <?php $originalDate = $results['personal']['birth_date'];
                            $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                    {!! Form::text('birth_date', (old('birth_date')) ? old('birth_date') : @$newDate, [
                    'class' => 'form-control birth-date'
                    ,'title' => 'Kolom Tanggal Lahir wajib diisi!'
                    ]) !!}
                    <span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
                    @else
                    <span class="form-control" style="border: 0px;">
                        {{isset($results['personal']['birth_date']) ? $results['personal']['birth_date'] : ''}}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="single-query form-group bottom20">
            <label>Alamat @if ($type != 'view')(<span title="Koom Alamat wajib diisi!">*</span>)@endif</label>
            @if ($type != 'view')
                {!! Form::textarea('address', (old('address')) ? old('address') : @$results['personal']['address'], [
                    'class' => 'form-control',
                    'rows'  => 3,
                    'style' => 'resize: none',
                    'title' => 'Kolom Alamat wajib diisi!'
                ]) !!}
            @else
            <span class="form-control" style="border: 0px; word-wrap: break-word; height: auto;">
                {{isset($results['personal']['address']) ? $results['personal']['address'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Kota @if ($type != 'view')(<span title="Kolom Kota wajib diisi!">*</span>)@endif</label>
            @if ($type != 'view')
            {!! Form::select('city_id', [@$results['personal']['city_id'] => @$results['personal']['city']], old('city_id'), [
                'class' => 'form-control select2 cities city',
                'data-placeholder' => 'Pilih Kota',
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['city']) ? $results['personal']['city'] : ''}}
            </span>
            @endif
        </div>

         <div class="single-query form-group bottom20 couple-selector">
            <label>NIK Pasangan @if ($type != 'view')(<span title="Kolom NIK Pasangan wajib diisi!">*</span>)@endif</label>
            @if ($type != 'view')
                {!! Form::text('couple_nik', (old('couple_nik')) ? old('couple_nik') : @$results['personal']['couple_nik'], [
                    'class' => 'form-control ', 'maxlength' => 16, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)'
                ]) !!}
            @else
                <span class="form-control" style="border: 0px;">{{isset($results['personal']['couple_nik']) ? $results['personal']['couple_nik'] : ''}}</span>
            @endif
        </div>

        <div class="single-query form-group bottom20 couple-selector">
            <label>Nama Pasangan </label>
            @if ($type != 'view')
                {!! Form::text('couple_name', (old('couple_name')) ? old('couple_name') : @$results['personal']['couple_name'], [
                    'class' => 'form-control',
                ]) !!}
            @else
                <span class="form-control" style="border: 0px;">{{isset($results['personal']['couple_name']) ? $results['personal']['couple_name'] : ''}}</span>
            @endif
        </div>

        <div class="single-query form-group bottom20 couple-selector">
            <label>Tempat lahir Pasangan </label>
            @if ($type != 'view')
                {!! Form::select('couple_birth_place_id', [@$results['personal']['couple_birth_place_id'] => @$results['personal']['couple_birth_place']], old('couple_birth_place_id'), [
                    'class' => 'form-control select2 cities couple_birth_place',
                    'data-placeholder' => 'Pilih Kota'
                ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['couple_birth_place']) ? $results['personal']['couple_birth_place'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20 couple-selector">
            <label>Tanggal lahir Pasangan </label>
            <div>
                <div class="input-group">
                    @if ($type != 'view')
                        <?php $originalDate = $results['personal']['couple_birth_date'];
                            $newDateCouple = date("d-m-Y", strtotime($originalDate)); ?>
                        {!! Form::text('couple_birth_date', (old('couple_birth_date')) ? old('couple_birth_date') : @$newDateCouple, [
                        'class' => 'form-control datepicker-autoclose'
                        ]) !!}
                        <span class="input-group-addon b-0"><i class="fa fa-calendar"></i></span>
                    @else
                    <span class="form-control" style="border: 0px;">
                        {{isset($results['personal']['couple_birth_date']) ? $results['personal']['couple_birth_date'] : ''}}
                    </span>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="single-query form-group bottom20">
            <label>Jenis Kelamin </label>
            @if ($type != 'view')
                {!! Form::select('gender', [
                    'L' => 'Laki-laki',
                    'P' => 'Perempuan',
                ], (old('gender')) ? old('gender') : ($results['personal']['gender'] == 'Laki-laki' || $results['personal']['gender'] == 'L') ? 'L' : 'P', [
                    'class' => 'form-control select2 gender', 'id' => 'gender'
                ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['gender']) ? $results['personal']['gender'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Kewarganegaraan </label>
            @if ($type != 'view')
            {!! Form::select('citizenship_id',[$results['personal']['citizenship_id'] => $results['personal']['citizenship']], (old('citizenship_id')) ? old('citizenship_id') : '', [
                'class' => 'form-control select2 citizenships',
                'data-placeholder' => 'Pilih Negara',
            ]) !!}
            <input type="hidden" name="citizenship" id="citizenship" value="{{@$results['personal']['citizenship']}}">
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['citizenship']) ? $results['personal']['citizenship'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Status Pernikahan </label>
            @if ($type != 'view')
            {!! Form::select('status', [
                '1' => 'Belum Menikah',
                '2' => 'Menikah',
                '3' => 'Janda / Duda',
            ], (old('status')) ? old('status') : $results['personal']['status_id'], [
                'class' => 'form-control select2 status', 'id' => 'status'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['status']) ? $results['personal']['status'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Status Tempat Tinggal </label>
            @if ($type != 'view')
            {!! Form::select('address_status', [
                '0' => 'Milik Sendiri',
                '1' => 'Milik Orang Tua / Mertua atau Rumah Dinas',
                '3' => 'Tinggal di Rumah Kontrakan',
            ], (old('address_status_id')) ? old('address_status_id') : $results['personal']['address_status_id'], [
                'class' => 'form-control select2 address_status', 'id'=> 'address_status'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['address_status']) ? $results['personal']['address_status'] : ''}}
            </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            <label>Email</label>
            @if ($type != 'view')
            {!! Form::email('email', (old('email')) ? old('email') : $results['personal']['email'], [
                'class' => 'form-control', 'readonly', 'style' => 'text-transform: none;background-color: #efefef;'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['email']) ? $results['personal']['email'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>No Telepon</label>
            @if ($type != 'view')
            {!! Form::text('phone', old('phone') ? old('phone') : $results['personal']['phone'], [
                'class' => 'form-control', 'maxlength' => 12, 'minlength' => 7, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['phone']) ? $results['personal']['phone'] : ''}}
            </span>
            @endif
        </div>

         <div class="single-query form-group bottom20">
            <label>No Handphone</label>
            @if ($type != 'view')
            {!! Form::text('mobile_phone', old('mobile_phone') ? old('mobile_phone') : $results['personal']['mobile_phone'], [
                'class' => 'form-control', 'maxlength' => 12, 'minlength' => 7, 'onkeypress' => 'return goodchars(event, "1234567890 ", this)'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['mobile_phone']) ? $results['personal']['mobile_phone'] : ''}}
            </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            <label>Nama Ibu Kandung</label>
            @if ($type != 'view')
            {!! Form::text('mother_name', (old('mother_name')) ? old('mother_name') : @$results['personal']['mother_name'], [
                'class' => 'form-control'
            ]) !!}
            @else
            <span class="form-control" style="border: 0px;">
                {{isset($results['personal']['mother_name']) ? $results['personal']['mother_name'] : ''}}
            </span>
            @endif
        </div>

        <!-- Request DCE -->
        <div class="col-md-6">
        @if ($type != 'view')
        <div class="single-query form-group bottom20 has-upload-file">
            <label>Foto KTP</label>
            {!! Form::file('identity', [
                'class' => 'filestyle', 'data-target' => 'ktp_preview',
                'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
            ]) !!}
        </div>
        @endif
        <!-- LOGIC Identity -->
        @if ( isset($results['other']['identity']) && $results['other']['identity'])

            <div class="single-query form-group bottom20">
                <label>Foto KTP</label>
                @if (!(str_contains($results['other']['identity'], '.pdf')))
                {!! Html::image(image_checker($results['other']['identity']), 'KTP', [
                    'class' => 'img-responsive zoomImage', 'width' => 300, 'id' => 'ktp_preview',
                    'data-src' => asset('assets/images/no-image.jpg')
                ]) !!}
                @else
                  <a href="@if(!empty($results['other']['identity'])){{$results['other']['identity']}}@endif" target="_blank" class="img-responsive zoomImage"><img src="{{asset('assets/images/download-logo.png')}}" id="ktp_preview" class="img-responsive zoomImage" width="230"></a>
                <p>Klik Untuk Lihat Foto KTP</p>
                @endif
            </div>
        @if($type == 'view')
            
            @if((pathinfo(strtolower($results['other']['identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($results['other']['identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($results['other']['identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                 @if(strpos($results['other']['identity'], 'noimage.jpg'))
                <p>Foto KTP Kosong</p>
                 @else


        
                  @endif
            @else
                
            @endif
          
        @endif

        @else

            <div class="single-query form-group bottom20">
                <label>Foto KTP</label>
                
                <img src="{{ asset('assets/images/no-image.jpg') }}" data-src="{{ asset('assets/images/no-image.jpg') }}" class="img-responsive zoomImage" width="300" id="ktp_preview">
            </div>

        @endif
        <!-- END LOGIC -->
        </div>

        <div class="col-md-6">
        @if ($type != 'view')
        <div class="single-query form-group bottom20 has-upload-file couple-selector">
            <label>Foto KTP Pasangan</label>
            {!! Form::file('couple_identity', [
                'class' => 'filestyle', 'data-target' => 'ktppas_preview',
                'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
            ]) !!}
        </div>
        @endif
        <!-- LOGIC Couple Identity -->
        @if ( isset($results['personal']['couple_identity']) && $results['personal']['couple_identity'])

            <div class="single-query form-group bottom20 couple-selector">
                <label>Foto KTP Pasangan</label>
                @if (!(str_contains($results['personal']['couple_identity'], '.pdf')))
                {!! Html::image(image_checker($results['personal']['couple_identity']), 'KTPPASANGAN', [
                    'class' => 'img-responsive zoomImage', 'width' => 300, 'id' => 'ktppas_preview',
                    'data-src' => asset('assets/images/no-image.jpg')
                ]) !!}
                @else
                <a href="@if(!empty($results['personal']['couple_identity'])){{$results['personal']['couple_identity']}}@endif" target="_blank" class="img-responsive zoomImage"><img src="{{asset('assets/images/download-logo.png')}}" class="img-responsive zoomImage" id="ktppas_preview" width="230"></a>
                <p>Klik Untuk Lihat Foto KTP PASANGAN</p>
                @endif
            </div>

             @if($type == 'view')
             <!-- handle image or pdf -->
            @if((pathinfo(strtolower($results['personal']['couple_identity']), PATHINFO_EXTENSION) == 'jpg') || (pathinfo(strtolower($results['personal']['couple_identity']), PATHINFO_EXTENSION) == 'png') || (pathinfo((strtolower($results['personal']['couple_identity'])), PATHINFO_EXTENSION) == 'jpeg'))
                 @if(strpos($results['personal']['couple_identity'], 'noimage.jpg'))
               <!--  <p>Foto KTP Kosong</p> -->
                 @else


                <!-- <p>Foto KTP</p> -->
                  @endif
            @else
                
            @endif
            <!-- end handle -->
        @endif

        @else

            <div class="single-query form-group bottom20 couple-selector">
                <label>Foto KTP Pasangan</label>
               
                <img src="{{ asset('assets/images/no-image.jpg') }}" data-src="{{ asset('assets/images/no-image.jpg') }}" class="img-responsive zoomImage" width="300" id="ktppas_preview">
            </div>

        @endif
        <!-- End Logic -->
        </div>

        

        <!-- @if ($type != 'view')
        <div class="single-query form-group bottom20 has-upload-file couple-selector">
            <label>Foto KTP Pasangan</label>
            {!! Form::file('couple_identity', [
                'class' => 'filestyle', 'data-target' => 'ktppas_preview',
                'data-buttontext' => 'Unggah', 'data-buttonname' => 'btn-default',
                'data-iconname' => 'fa fa-cloud-upload', 'data-placeholder' => 'Tidak ada file'
            ]) !!}
        </div>
        @endif -->

        

    </div>
    @if ($type != 'view')
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/personal') : url('profile/personal')}}" class="btn btn-default waves-light waves-effect w-md m-b-20">Batalkan</a>
                <button type="submit" class="btn btn-orange waves-light waves-effect w-md m-b-20"><i class="mdi mdi-content-save"></i> Simpan</button>
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
                <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/ubah') : url('profile/ubah/personal')}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Ubah</a>
            </div>
        </div>
            @endif
        @elseif($results['is_approved'] == null)
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{(session('authenticate.role') == 'developer') ? url('dev/profile/ubah') : url('profile/ubah/personal')}}" class="btn btn-primary waves-light waves-effect w-md m-b-20">Ubah</a>
            </div>
        </div>
        @endif
    @endif
</div>