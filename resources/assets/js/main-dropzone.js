/**
 * This file for handling select2 ajax and this require select2.min.js before u call this file
 * 
 * @author Candra Sudirman <candra.s@smooets.com>
 */
(function( $ ){

    // This is get template for dropzone area
    var previewNode = document.querySelector("#template");
    previewNode.id = "";

    // This is for initial template Dropzone
    var previewTemplate = $('.template').html();
    previewNode.parentNode.removeChild(previewNode);

    // This is for initial Dropzone
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
            _token : $('input[name=_token]').val(),
            removed : []
        },
        init: function() {
            var self = this;

            // This is handling event after file add or drag
            self.on("addedfile", function (file) {
                $('.start, .cancel').removeClass('hide');
                disable(self, 'addedfile');
            });

            self.on('successmultiple', function (file, xhr) {
                xhr.files.map((v, i) => {
                    self.files[i].upload_name = v.name;
                    var id = v.name.split('.')[0];
                    $('#previews').parents('form').append(
                        `<input type="hidden" name="uploaded[]" id="${id}" value="${v.name}">`
                    );
                });
                self.options.params.removed = [];
            });

            // This is handling event if file on deleted
            self.on("removedfile", function (file) {

                if (file.upload_name) {
                    var id = file.upload_name.split('.')[0];
                    self.options.params.removed.push(file.upload_name);
                    $(`#${id}`).remove();
                }

                disable(self, 'removedfile');

                if ('old' == file.status) {
                    // This is logic for get key of exists photos
                    var removed = file.name.substring(5);

                    // This is logic for append removed_photos[] on form
                    $('#previews').parents('form').append(
                        `<input type="hidden" name="removed_photos[]" value="${removed}">`
                    );
                }
            });

            // This is handling event if maxFiles on limit 
            self.on("maxfilesexceeded", function (file) {
                self.removeFile(file);
            });

        },
    });

    // This is trigger for upload file 
    $('.start').on('click', function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    });

    // This is trigger for cancel upload file 
    $('.cancel').on('click', function() {
        myDropzone.removeAllFiles(true);
        placeholderAndButton();
    });

    // This is logic for handling edit and show current photo
    if ( $('.photoable').length > 0 ) {
        $('.photoable').map((i, v) => {
            existingFiles($(v).attr('src'), $(v).data('name'));
        });
    }

    /**
     * This fuction for handling disable dropzone
     * 
     * @param  myDropzone self  
     * @param  string event 
     * @return void
     */
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

    /**
     * This fuction for handling show and hide button
     * 
     * @return void
     */
    function placeholderAndButton() {
        $('.dropzone-thumbnail h2').show();
        $('.start, .cancel').addClass('hide');
    }

    /**
     * This fuction for handling existing
     * 
     * @return void
     */
    function existingFiles(image, name = 'Filename') {
        var mockFile = { 
            dataUrl: image,
            name: name,
            size: 12345,
            accepted: true,
            thumbnailMethod: 'crop',
            status: 'old'

        };
        
        myDropzone.files.push(mockFile);
        myDropzone.emit("addedfile", mockFile);
        myDropzone.emit('thumbnail', mockFile, image);
        myDropzone.emit("complete", mockFile);
    }
})( jQuery );