<div class="btn-group" role="group" aria-label="Second group">

    @if ( isset($show) )
        <a href="{!! $show !!}" class="btn btn-default" title="Lihat Detail">
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    @endif

    @if ( isset($edit) )
        <a href="{!! $edit !!}" class="btn btn-default" title="Edit">
            <i class="glyphicon glyphicon-pencil"></i>
        </a>
    @endif

    @if ( isset($delete) )
        <a href="javascript:void(0)" class="btn btn-default" title="Hapus">
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    @endif

</div>