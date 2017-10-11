<div class="row top20">
    <div class="col-md-5 col-md-offset-1">
        <div class="single-query form-group bottom20
            {{ $errors->has('property_id') ? ' has-error' : '' }}">
            {!! Form::label('property_id', 'Nama Proyek') !!}
            {!! Form::select('property_id', ['' => ''], old('property_id'), [
                'class' => 'select2 properties',
                'data-placeholder' => 'Pilih Nama Proyek'
            ]) !!}

            @if ($errors->has('property_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('property_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nama Proyek Tipe') !!}
            {!! Form::text('name', old('name'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan nama proyek tipe properti'
            ]) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Harga Proyek Tipe') !!}
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan harga proyek tipe properti'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Luas Tanah') !!}
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan luas tanah'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Luas Bangunan') !!}
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan luas bangunan'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Daya Listrik') !!}
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan daya listrik'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-5">
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Jenis Sertifikat') !!}
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan jenis sertifikat'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Jumlah Lantai') !!}
            {!! Form::text('name', old('name'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan jumlah lantai'
            ]) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Kamar Tidur') !!}
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan jumlah kamar tidur'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Kamar Mandi') !!}
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan jumlah kamar mandi'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20
            {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Garasi') !!}
            {!! Form::text('price', old('price'), [
                'class' => 'keyword-input',
                'placeholder' => 'Masukkan luas bangunan'
            ]) !!}

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>
        <div class="single-query form-group bottom20">
            {!! Form::label('price', 'Foto') !!}
            <div class="clearfix"></div>
            <span class="btn btn-success fileinput-button dz-clickable">
                <i class="glyphicon glyphicon-plus"></i>
                <span>Tambah File</span>
            </span>
            <button type="button" class="btn btn-primary start hide">
                <i class="glyphicon glyphicon-upload"></i>
                <span>Mulai Unggah</span>
            </button>
            <button type="button" class="btn btn-warning cancel hide">
                <i class="glyphicon glyphicon-ban-circle"></i>
                <span>Hapus Semua</span>
            </button>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="dropzone-thumbnail" id="previews">
            <h2 class="center-block center-row">Drag in here.....</h2>
            <div id="template" class="template">
                <div class="thumbnail dropzone-wrap">
                    <button data-dz-remove class="btn-xs pull-right bg_white">&times;</button>
                    <img class="dropzone-img" data-dz-thumbnail/>
                    <div class="caption">
                        <p class="name" data-dz-name></p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                        <p class="size" data-dz-size></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>