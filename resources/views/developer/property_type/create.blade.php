@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('breadcrumb')
    <h1 class="text-uppercase">Tambah Proyek Tipe</h1>
    <p>Kelola proyek anda di sini.</p>
    <ol class="breadcrumb text-center">
        <li><a href="{!! route('developer.proyek-type.index') !!}">List Proyek Tipe</a></li>
        <li class="active">Tambah Proyek Tipe</li>
    </ol>
@endsection

@section( 'content' )
    <section id="property" class="padding listing1">
        <div class="container">
            {!! Form::open([
                'route' => 'developer.proyek.store',
                'class' => 'callus submit_property', 'id' => 'form-property',
                'enctype' => 'multipart/form-data'
            ]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase bottom40">Tambah Proyek Tipe</h2>
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <h3 class="panel-title text-uppercase">Data Proyek Tipe</h3>
                            </div>
                            <div class="panel-body">
                                @include('developer.property_type._form')

                                @foreach ($photos as $photo)
                                    {!! Html::image($photo, 'images', ['class' => 'photoable hide']) !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success waves-light waves-effect w-md m-b-20">
                                <i class="mdi mdi-content-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection

@push( 'styles' )
    {!! Html::style( 'assets/css/dropzone.min.css' ) !!}
    {!! Html::style( 'assets/css/select2.min.css' ) !!}

    <style type="text/css">
        .dropzone-thumbnail {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: flex-start;
            border: 1px solid #cecece;
            padding: 10px;
            min-height: 200px;
        }
        .dropzone-thumbnail > h2 {
            color: #cecece;
        }
        .dropzone-wrap {
            margin: 7px;
        }
        .dropzone-img {
            padding: 20px 0 0 15px;
        }
        .center-row {
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>
@endpush

@push( 'scripts' )
    {!! Html::script( 'assets/js/dropzone.min.js' ) !!}
    {!! Html::script( 'assets/js/select2.min.js' ) !!}

    <!-- You can edit this script on resouces/asset/js/dropdown.js -->
    <!-- After that you run in console or terminal or cmd "npm run production" -->
    {!! Html::script( 'js/dropdown.min.js' ) !!}

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript">        
        $(function(){
            var previewNode = document.querySelector("#template");
            previewNode.id = "";
            var previewTemplate = $('.template').html();
            previewNode.parentNode.removeChild(previewNode);

            var myDropzone = new Dropzone(document.body, {
                url: '/upload',
                paramName: 'files',
                uploadMultiple: true,
                maxFiles: 5,
                parallelUploads: 5,
                maxFilesize: 1,
                autoQueue: false,
                autoDiscover: false,
                withCredentials: true,
                previewTemplate: previewTemplate,
                previewsContainer: "#previews",
                clickable: '.fileinput-button',
                dictResponseError: 'Server not Configured',
                acceptedFiles: ".png,.jpg,.jpeg",
                params : {
                    _token : $('input[name=_token]').val()
                },
                init: function() {
                    var self = this;
                    self.on("addedfile", function (file) {
                        $('.start, .cancel').removeClass('hide');
                        disable(self, 'addedfile');
                    });

                    self.on("sending", function (file) {
                        $('.meter').show();
                    });

                    self.on("totaluploadprogress", function (progress) {
                        $('.roller').width(progress + '%');
                    });

                    self.on("queuecomplete", function (progress) {
                        $('.meter').delay(999).slideUp(999);
                    });

                    self.on("removedfile", function (file) {
                        disable(self, 'removedfile');
                    });

                    self.on("maxfilesexceeded", function (file) {
                        self.removeFile(file);
                    });
                    
                },
            });

            $('.start').on('click', function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
            });

            $('.cancel').on('click', function() {
                myDropzone.removeAllFiles(true);
                placeholderAndButton();
            });

            if ( $('.photoable').length > 0 ) {
                $('.photoable').map((i, v) => {
                    existingFiles($(v).attr('src'));
                });
            }

            function disable(self, event) {
                $('.dropzone-thumbnail h2').hide();

                if ($.isNumeric(self.options.maxFiles) && self.files.length >= self.options.maxFiles) {
                    $('.fileinput-button').addClass('disabled');
                    self.clickableElements.forEach(function (element) {
                        return element.classList.remove("dz-clickable");
                    });
                    self.removeEventListeners();
                } else if ('removedfile' == event) {

                    if (self.files.length == 0) {
                        placeholderAndButton();
                    }

                    $('.fileinput-button').removeClass('disabled');
                    self.enable();
                }
            }

            function placeholderAndButton() {
                $('.dropzone-thumbnail h2').show();
                $('.start, .cancel').addClass('hide');
            }

            function existingFiles(image) {
                // Create the mock file:
                var mockFile = { dataUrl: image, name: "Filename", size: 12345, accepted: true };
                myDropzone.files.push(mockFile);
                myDropzone.emit("addedfile", mockFile);
                myDropzone.createThumbnailFromUrl(mockFile, image, function (thumbnail) {
                    myDropzone.emit('thumbnail', image, thumbnail);
                    myDropzone.emit("complete", mockFile);
                }, "anonymous");

            }
        })

        $('.properties').dropdown('property');
    </script>
@endpush
