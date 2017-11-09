<script type="text/javascript">
    $( document ).ready(function() {
        loadDataPropUnit(1);
        $("#button-left").on('click', function(){
            var curPage = $("#current-page").val();
            if (curPage > 1) {
                curPage--;
                loadDataPropUnit(curPage);
            }
        });

        $("#button-right").on('click', function(){
            var curPage = $("#current-page").val();
            var total = $("#last-page").val();
            if (curPage < total) {
                curPage++;
                loadDataPropUnit(curPage);
            }
        });
        function loadDataPropUnit(nextPage)
        {
            $('#content-unit').html("");
            $('#content-unit').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
            $.ajax({
                url: '/get-unit-property',
                data:   {
                    property_type_id: "{{$type->id}}",
                    limit: 5,
                    page:nextPage
                }
            })
            .done(function (response) {
                $('#content-unit').html("");
                $('#content-unit').html(response);
            })
            .fail(function (response) {

            });
        }
        $('.btn-sign').on('click', function(){
            $('#login-register').modal('show');
        });
    });
</script>