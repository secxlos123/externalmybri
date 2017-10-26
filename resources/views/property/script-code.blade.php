<script type="text/javascript">
    $( document ).ready(function() {
        loadDataPropType(1);
        $("#button-left").on('click', function(){
            var curPage = $("#current-page").val();
            if (curPage > 1) {
                curPage--;
                loadDataPropType(curPage);
            }
        });

        $("#button-right").on('click', function(){
            var curPage = $("#current-page").val();
            var total = $("#last-page").val();
            if (curPage < total) {
                curPage++;
                loadDataPropType(curPage);
            }
        });

        function loadDataPropType(nextPage)
        {
            $('.content-type').html("");
            $('.content-type').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
            $.ajax({
                url: '/get-tipe-property',
                data:   {
                    property_id: "{{$property->id}}",
                    limit: 3,
                    page:nextPage
                }
            })
            .done(function (response) {
                // console.log(response);
                $('.content-type').html("");
                $('.content-type').html(response);
            })
            .fail(function (response) {

            });
        }
    });
</script>