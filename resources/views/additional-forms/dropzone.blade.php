@if ( isset($btn) )
    {!! Form::label('price', 'Foto') !!}
    <div class="clearfix"></div>
    <span class="btn btn-orange fileinput-button dz-clickable">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Tambah File</span>
    </span>

    @if (false)
        <button type="button" class="btn btn-primary start hide">
            <i class="glyphicon glyphicon-upload"></i>
            <span>Mulai Unggah</span>
        </button>
    @endif

    <button type="button" class="btn btn-warning cancel hide">
        <i class="glyphicon glyphicon-ban-circle"></i>
        <span>Hapus Semua</span>
    </button>
@endif

@if ( isset($form) )
    <div class="dropzone-thumbnail" id="previews">
        <h2 class="center-block center-row">drag in here maximal 5 photo</h2>
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
@endif