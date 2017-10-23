<div class="row bottom30">
@foreach($results['data'] as $key => $value)
    <div class="col-md-4 bottom30">
        <div class="property_item">
            <div class="image">
                <a href="#"><img src="{{image_checker($value['prop_photo'])}}" alt="latest property" cl)ass="img-responsive"></a>
                <div class="price clearfix">
                    <span class="tag pull-right">Rp. {{$value['prop_price']}},-</span>
                </div>
                <span class="tag_t">24m</span>
                <span class="tag_l">PT. Gaisan Propertindo</span>
            </div>
            <div class="proerty_content">
                <div class="proerty_text">
                    <h3 class="captlize"><a href="#">{{$value['prop_name']}}</a></h3>
                    <p>{{$value['prop_city_name']}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>

<div class="padding_bottom text-center">
    <ul class="pager">
        <?php for ($i=1; $i <= $results['last_page']; $i++) { ?>
            <li id="{{$i}}" class=""><a href="javascript:;" id="buttonPage" data-id="{{$i}}">{{$i}}</a></li>
        <?php } ?>
    </ul>
</div>

<script type="text/javascript">
    $('a#buttonPage').on('click', function(){
        console.log($(this).data('id'));
        var page = $(this).data('id');
        var dev = $('.developer').val();
        var city = $('.city_id').val();
        loadData(page, dev, city);
    });
    function loadData(nextPage, dev=null, city=null)
    {
        $('ul.pager li').removeClass('active');
        $('ul.pager li#'+nextPage).addClass('active');

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
