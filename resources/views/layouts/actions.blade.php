<div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Aksi <span class="caret"></span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right">

        @if ( isset($show) )
            <li>
                <a href="{!! $show !!}">Detail</a>
            </li>
        @endif

        @if ( isset($edit) )
            <li>
                <a href="{!! $edit !!}">Edit</a>
            </li>
        @endif

        @if ( isset($delete) )
            <li role="separator" class="divider"></li>
            <li>
                <a href="#">Hapus</a>
            </li>
        @endif
    </ul>
</div>