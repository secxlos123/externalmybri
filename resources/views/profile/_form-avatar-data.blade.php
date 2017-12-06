@if (session('authenticate.role') != 'developer')
	{!! Form::open([
	    'route' => ['profile.update', 'avatar']
	    , 'class' => 'callus'
	    , 'id' => 'form-personal-data-customer-avatar'
	    , 'enctype' => 'multipart/form-data'
	    , 'method' => 'PUT'
	    , 'onsubmit' => "return confirm('Yakin akan mengganti dengan yang baru ?');"
	]) !!}
	@php ( $image = (isset($results['image'])) ? image_checker($results['image']) : image_checker() )

	@if (session('authenticate.role') != 'developer')
		@php ( $image = (isset($results['other']['image'])) ? image_checker($results['other']['image']) : image_checker() )
	@endif

	{!! Html::image($image, 'image', [
	    'class' => 'img-responsive'
	    , 'width' => 300
	    , 'id' => 'image_preview'
	    , 'style' => 'cursor: pointer'
	    , 'data-src' => asset('assets/images/no-image.jpg')
	]) !!}

	{!! Form::file('image', [
	    'class' => 'filestyle hide'
	    , 'data-target' => 'image_preview'
	    ,'data-buttontext' => 'Unggah'
	    , 'data-buttonname' => 'btn-default'
	    , 'data-iconname' => 'fa fa-cloud-upload'
	    , 'data-placeholder' => 'Tidak ada file'
	]) !!}

	{!! Form::hidden('cif_number', '-', ['class' => 'form-control']) !!}

	{!! Form::close() !!}
@else
	{!! Form::open([
	    'route' => ['developer.profile.update', 'personal']
	    , 'class' => 'callus'
	    , 'id' => 'form-personal-data-customer-avatar'
	    , 'enctype' => 'multipart/form-data'
	    , 'method' => 'PUT'
	    , 'onsubmit' => "return confirm('Yakin akan mengganti dengan yang baru ?');"
	]) !!}
	@php ( $image = (isset($results['image'])) ? image_checker($results['image']) : image_checker() )

	@if (session('authenticate.role') != 'developer')
		@php ( $image = (isset($results['other']['image'])) ? image_checker($results['other']['image']) : image_checker() )
	@endif

	{!! Html::image($image, 'image', [
	    'class' => 'img-responsive'
	    , 'width' => 300
	    , 'id' => 'image_preview'
	    , 'style' => 'cursor: pointer'
	    , 'data-src' => asset('assets/images/no-image.jpg')
	]) !!}

	{!! Form::file('image', [
	    'class' => 'filestyle hide'
	    , 'data-target' => 'image_preview'
	    , 'data-buttontext' => 'Unggah'
	    , 'data-buttonname' => 'btn-default'
	    , 'data-iconname' => 'fa fa-cloud-upload'
	    , 'data-placeholder' => 'Tidak ada file'
	]) !!}

	{!! Form::hidden('cif_number', '-', ['class' => 'form-control']) !!}

	{!! Form::close() !!}
@endif