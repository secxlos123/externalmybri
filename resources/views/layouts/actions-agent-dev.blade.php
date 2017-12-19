<center>
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


        @if ( isset($banned) )
        
             @if ( $is_banned == false )
                <a href="{!! $banned !!}" class="btn btn-default" id="btn-banned{{ $user_id }}" title="Banned">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                </a>
            @else
                <a href="{!! $banned !!}" class="btn btn-default" id="btn-unbanned{{ $user_id }}" title="Unbanned">
                    <i class="glyphicon glyphicon-repeat"></i>
                </a>
            @endif
            
        @endif
</div>
</center>
<!-- JS For Modal Confirmation Banned -->
<script type="text/javascript">
// Banned Function
$(document).ready(function(){
    $('#btn-banned{{ $user_id }}').on('click', function(event){
      
                   event.preventDefault();
        bootbox.confirm("Anda yakin untuk Banned Agen Developer ini ?", function(result) {
            if (result) {
                 //include the href duplication link here?;
                 window.location = ('{{ url("dev/developer/banned/".$user_id) }}');
            
              console.log({{ $user_id }});

                //showProgressAnimation();
             
            } else {
               
            }
        });
    });
});

// Unbanned Function
$(document).ready(function(){
    $('#btn-unbanned{{ $user_id }}').on('click', function(event){
      
                   event.preventDefault();
        bootbox.confirm("Anda yakin untuk Unbanned Agen Developer ini ?", function(result) {
            if (result) {
                 //include the href duplication link here?;
                 window.location = ('{{ url("dev/developer/banned/".$user_id) }}');
            
              console.log({{ $user_id }});

                //showProgressAnimation();
             
            } else {
               
            }
        });
    });
});
</script>
  <!-- End JS For Modal Confirmation -->