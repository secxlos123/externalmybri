<div class="row bottom30">
    @foreach($results['data'] as $property)
        @include('property._list-property', $property)
    @endforeach
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
        var page = $(this).data('id');
        var dev = $('.developer').val();
        var city = $('.city_id').val();
        var id = $('ul.pager li[class=active]').text();
        // console.log(id);
        $('ul.pager li#'+id).removeClass('active');
        loadData(page, dev, city);
    });
    function loadData(nextPage, dev=null, city=null)
    {
        $('.contentProperty').html("");
        $('.contentProperty').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
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
            $('.contentProperty').html("<div class=\"container hide denied\">"
                +"<div class=\"row\">"
                    +"<div class=\"col-sm-12 text-center\">"
                        +"<h2 class=\"uppercase\">Tidak dapat mencari lokasi PROPERTI terdekat</h2>"
                        +"<p class=\"heading_space\">Hidupkan GPS pada brower anda agar dapat melihat daftar PROPERTI terdekat.</p>"
                    +"</div>"
                +"</div>"
            +"</div>");
        });
    }
</script>
