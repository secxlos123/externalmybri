<center>
<div class="btn-group" role="group" aria-label="Second group">

    @if ( isset($show) )
        <a href="{!! $show !!}" class="btn btn-default" title="Lihat Detail">
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    @endif

    @if ( isset($edit) )
        @if (isset($is_approve) && $is_approve !== true)
            <a href="{!! $edit !!}" class="btn btn-default" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i>
            </a>
        @endif
    @endif

    @if ( isset($delete) )
        <a href="javascript:void(0)" class="btn btn-default" title="Hapus">
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    @endif

    @if ( isset($edit_unit) )
        @if ($available_status_unit == "available")
            <a href="{!! $edit_unit !!}" class="btn btn-default" title="Edit">
                <i class="glyphicon glyphicon-pencil"></i>
            </a>
        @endif
    @endif
</div>
</center>