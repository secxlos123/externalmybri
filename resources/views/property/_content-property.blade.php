<div class="row bottom30">
@include('property._list-property')
</div>

<div class="padding_bottom text-center">
    <ul class="pager">
        <?php for ($i=1; $i <= $results['last_page']; $i++) { ?>
            <li id="{{$i}}" class="{{($i == $results['current_page']) ? 'active' : ''}}"><a href="javascript:;" id="buttonPage" data-id="{{$i}}">{{$i}}</a></li>
        <?php } ?>
    </ul>
</div>

<script type="text/javascript">
    $('a#buttonPage').on('click', function(){
        // console.log($(this).data('id'));
        var page = $(this).data('id');
        var dev = $('.developer').val();
        var city = $('.city_id').val();
        var id = $('ul.pager li[class=active]').text();
        console.log(id);
        $('ul.pager li#'+id).removeClass('active');
        loadData(page, dev, city);
    });
    function loadData(nextPage, dev=null, city=null)
    {
        $.ajax({
            url: '/get-all-properties',
            data: {
                    limit: 6,
                    page: nextPage,
                    dev_id: dev,
                    prop_city_id: city
                }
        })
        .done(function (response) {
            $('.contentProperty').html("");
            $('.contentProperty').html(response);
        })
        .fail(function (response) {
            $('.error-server').removeClass('hide');
        });
    }
</script>
