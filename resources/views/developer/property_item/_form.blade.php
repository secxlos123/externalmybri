{!! Form::hidden('disk', 'property-item') !!}

<div class="row top20">
    <div class="col-md-5 col-md-offset-1">

         <div class="single-query form-group bottom20 {{ $errors->has('property') ? ' has-error' : '' }}">
            {!! Form::label('property', 'Proyek') !!}

            @if ( ! isset($unit->property_id) )
                {!! Form::select('property', ['' => ''], old('property'), [
                    'class' => 'select2 properties',
                    'data-placeholder' => 'Pilih Proyek'
                ]) !!}
            @else
                {!! Form::text('property_name', old('property_name'), ['class' => 'keyword-input', 'disabled']) !!}
                {!! Form::hidden('property', @$unit->property_id ,old('property_id')) !!}
            @endif


            @if ($errors->has('property'))
                <span class="help-block">
                    <strong>{{ $errors->first('property') }}</strong>
                </span>
            @endif
        </div>

        <div class="single-query form-group bottom20 {{ $errors->has('property_type_id') ? ' has-error' : '' }}">
            {!! Form::label('property_type_id', 'Tipe Proyek') !!}

            @if ( ! isset($unit->property_type_id) )
                {!! Form::select('property_type_id', ['' => ''], old('property_type_id'), [
                    'class' => 'select2 property_type',
                    'data-placeholder' => 'Pilih Tipe Proyek'
                ]) !!}
            @else
                {!! Form::text('property_type_name', old('property_type_name'), ['class' => 'keyword-input', 'disabled']) !!}
                {!! Form::hidden('property_type_id') !!}
            @endif


            @if ($errors->has('property_type_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('property_type_id') }}</strong>
                </span>
            @endif
        </div>

    </div>

    <div class="col-md-5">
        <div class="single-query form-group bottom20 {{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Harga') !!}

            <div class="input-group">
                <span class="input-group-addon">Rp</span>
                {!! Form::text('price', old('price'), [
                    'class' => 'form-control numericOnly currency',
                    'placeholder' => 'Masukkan harga properti',
                    'maxlength' => 15
                ]) !!}
            </div>

            @if ($errors->has('price'))
                <span class="help-block">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif
        </div>

         <div class="single-query">
            <div class="form-group bottom20 col-xs-6 col-sm-4 {{ $errors->has('first_unit') ? ' has-error' : '' }}"
                style="padding-left: unset;">

                {!! Form::label('first_unit', 'No Unit Pertama') !!}
                <div class="input-group">
                    {!! Form::text('first_unit', old('first_unit'), [
                        'class' => 'form-control numericOnly',
                        'placeholder' => 'No Unit Pertama',
                        'maxlength' => 3,
                        'id'=> 'first_unit'
                    ]) !!}
                </div>

                @if ($errors->has('first_unit'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_unit') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group bottom20 col-xs-6 col-sm-4 {{ $errors->has('last_unit') ? ' has-error' : '' }}"
                style="padding-left:unset;">
                {!! Form::label('last_unit', 'No Unit Terakhir') !!}
                <div class="input-group">
                    {!! Form::text('last_unit', old('last_unit'), [
                        'class' => 'form-control numericOnly',
                        'placeholder' => 'No Unit Terakhir',
                        'maxlength' => 4,
                        'id'=> 'last_unit'
                    ]) !!}
                </div>

                @if ($errors->has('last_unit'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_unit') }}</strong>
                    </span>
                @endif
            </div>

             <div class="form-group bottom20 col-xs-6 col-sm-4 {{ $errors->has('unit_size') ? ' has-error' : '' }}"
                style="padding-right:unset;">
                {!! Form::label('unit_size', 'Jumlah Unit') !!}
                <div class="input-group">
                    {!! Form::text('unit_size', old('unit_size'), [
                        'class' => 'form-control numericOnly',
                        'placeholder' => 'Jumlah',
                        'maxlength' => 4,
                        'id'=> 'unit_size',
                        'readonly'=> true
                    ]) !!}
                    <span class="input-group-addon">Unit</span>
                </div>

                @if ($errors->has('unit_size'))
                    <span class="help-block">
                        <strong>{{ $errors->first('unit_size') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        <div hidden class="single-query form-group bottom20 {{ $errors->has('status') ? ' has-error' : '' }}">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', [
                'new' => 'Baru'
            ], old('status')) !!}

            @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>

        @if ( isset($unit->id) )
            <div class="single-query form-group bottom20 {{ $errors->has('is_available') ? ' has-error' : '' }}">
                {!! Form::label('is_available', 'Is Avaliable') !!}
                {!! Form::select('is_available', [
                    '0' => 'Not Avaliable',
                    '1' => 'Avaliable'
                ], old('is_available'), [
                    'class' => 'select2 is_available',
                ]) !!}

                @if ($errors->has('is_available'))
                    <span class="help-block">
                        <strong>{{ $errors->first('is_available') }}</strong>
                    </span>
                @endif
            </div>

            <div class="single-query form-group bottom20 {{ $errors->has('is_available') ? 'has-error' : '' }}">
            {!! Form::label('available_status', 'Status') !!}
            {!! Form::select('available_status', [
                'available' => 'Available',
                'book' => 'Booked',
                'sold' => 'Sold'
            ], old('available_status'), [
                'class' => 'select2 available_status',
            ]) !!}

            @if ($errors->has('is_available'))
                <span class="help-block">
                    <strong>{{ $errors->first('is_available') }}</strong>
                </span>
            @endif
            </div>
        @endif
    </div>

    <div class="col-md-10 col-md-offset-1">
        <div class="single-query form-group bottom20 {{ $errors->has('address') ? ' has-error' : '' }}">
            {!! Form::label('address', 'Alamat') !!}
            {!! Form::textarea('address', old('address'), [
                'class' => 'form-control keyword-input', 'rows' => 3,
                'placeholder' => 'Masukkan alamat properti'
            ]) !!}

            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>

        <div class="single-query form-group bottom20">
            @include('additional-forms.dropzone', ['btn' => true])
        </div>

        @include('additional-forms.dropzone', ['form' => true])
    </div>
</div>
  @include('form._input_long_lat')
@push( 'styles' )
    {!! Html::style( 'assets/css/dropzone.min.css' ) !!}
    {!! Html::style( 'assets/css/select2.min.css' ) !!}
    {!! Html::style( 'css/style-dropzone.min.css' ) !!}
@endpush

@push( 'scripts' )
    {!! Html::script( 'assets/js/dropzone.min.js' ) !!}
    {!! Html::script( 'assets/js/select2.min.js' ) !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script( 'js/dropdown.min.js' ) !!}
    {!! Html::script( 'js/main-dropzone.min.js' ) !!}
    {!! JsValidator::formRequest(App\Http\Requests\Developer\PropertyItem\CreateRequest::class, '#form-proyek-item') !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">

        $(document).on('keydown', ".numericOnly", function (e) {
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
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
        $('.select2').select2({width: '100%'});

        $('.properties').dropdown('property?is_approved=true')
            .on('select2:select', set_property_type)
            .on('select2:unselect', unset_property_type);

        function set_property_type(e) {
            var id = $(this).val();
            $('.property_type').empty().dropdown('types', {prop_id : id});
        }

        function unset_property_type(e) {
            $('.property_type').empty().select2({width: '100%'});
        }
        $('#first_unit').on('input', function()
        {
            var first = $('#first_unit').val();
            var last = $('#last_unit').val();
            console.log(last);
            console.log(first);
            if( Math.abs(last) < 1 ){
                last = first;
            }
            if ( Math.abs(last) < Math.abs(first)){
                alert('No Pertama Tidak Boleh Lebih Dari No Terakhir');
                $('#first_unit').val($('#last_unit').val());
                 $('#unit_size').val(1);
            }
            else{
                var size  =  last - first;
                $('#unit_size').val(size+1);
                }
        });
        $('#last_unit').on('change', function()
        {
            var last = $('#last_unit').val();
            var first = $('#first_unit').val();
            if( Math.abs(last) < Math.abs(first)) {
                alert('No Terakhir Tidak Boleh Kurang Dari No Pertama');
                $('#last_unit').val($('#first_unit').val());
                $('#unit_size').val(1);
                }
            else{
                var size  =  last - first;
                if(Math.abs(size+1) < 1){
                    alert('No Terakhir Tidak Boleh Kurang Dari No Pertama');
                    $('#last_unit').val($('#first_unit').val());
                    $('#unit_size').val(1);
                }else{
                $('#unit_size').val(size+1);
                }
                }
        });
    </script>
@endpush