<div class="row bottom30">
    @foreach($results['data'] as $key => $value)
        @if ($id == 'dev')
            @include('list-developer._content-list-developer')
        @else
            @include('property._content-list-property')
        @endif
    @endforeach
</div>

@if (!$results['last_page'])
<div class="padding_bottom text-center">
    <ul class="pager">
        @if ($results['last_page'] > 1)
        <?php for ($i=1; $i <= $results['last_page']; $i++) { ?>
            <li id="{{$i}}" class="{{($i == $results['current_page']) ? 'active' : ''}}"><a href="javascript:;" id="buttonPage" data-id="{{$i}}">{{$i}}</a></li>
        <?php } ?>
        @endif
    </ul>
</div>
@endif

<div class="padding_bottom text-center">
    <ul class="pager">
    @if ($results['last_page'] > 1)
        @if ($results['current_page'] > 1 && $results['last_page'] > 10)
        <li id="1" class="{{($results['current_page'] == 1) ? 'active' : ''}}"><a href="javascript:;" id="buttonPage" data-id="1"><< Halaman awal</a></li>
        @endif

        @if ($results['last_page'] <= 10)
        <?php for ($i=1; $i <= $results['last_page']; $i++) { ?>
            <li id="{{$i}}" class="{{($i == $results['current_page']) ? 'active' : ''}}"><a href="javascript:;" id="buttonPage" data-id="{{$i}}">{{$i}}</a></li>
        <?php } ?>
        @endif

        @if ($results['last_page'] > 10)
            @if (($results['current_page'] - 2) >= 1)
            <li id="{{$results['current_page'] - 2}}" class=""><a href="javascript:;" id="buttonPage" data-id="{{$results['current_page'] - 2}}">{{$results['current_page'] - 2}}</a></li>
            @endif
            @if (($results['current_page'] - 1) >= 1)
            <li id="{{$results['current_page'] - 1}}" class=""><a href="javascript:;" id="buttonPage" data-id="{{$results['current_page'] - 1}}">{{$results['current_page'] - 1}}</a></li>
            @endif

            <li class="active"><a href="javascript:;">{{$results['current_page']}}</a></li>

            @if (($results['current_page'] + 1) < $results['last_page'])
            <li id="{{$results['current_page'] + 1}}" class=""><a href="javascript:;" id="buttonPage" data-id="{{$results['current_page'] + 1}}">{{$results['current_page'] + 1}}</a></li>
            @endif
            @if (($results['current_page'] + 2) < $results['last_page'])
            <li id="{{$results['current_page'] + 2}}" class=""><a href="javascript:;" id="buttonPage" data-id="{{$results['current_page'] + 2}}">{{$results['current_page'] + 2}}</a></li>
            @endif

            @if (($results['last_page'] - 3) > $results['current_page'])
            <li><span class="dot_pagination">....</span></li>
            @endif

            @if ($results['current_page'] != $results['last_page'])
            <li id="{{$results['last_page']}}" class="{{($results['current_page'] == $results['last_page']) ? 'active' : ''}}"><a href="javascript:;" id="buttonPage" data-id="{{$results['last_page']}}">{{$results['last_page']}}</a></li>
            @endif
        @endif
    @endif
    </ul>
</div>

<script type="text/javascript">
    $('a#buttonPage').on('click', function(){
        var page = $(this).data('id');
        var id = $('ul.pager li[class=active]').text();
        $('ul.pager li#'+id).removeClass('active');
        loadDataPage(page);
    });
    function loadDataPage(nextPage)
    {
        $('.contentDev').html("");
        $('.contentDev').append("<div style=\"height: 60px;margin: auto;padding: 10px;\"><div class=\"loader-page\" id=\"loader-page\"></div></div>");
        @if ($id != 'dev')
            var url = '/get-properti-developer';
            var id = "{{$dev_id}}";
            var $data = {
                    limit: 6,
                    page: nextPage,
                    dev_id: id
                };
        @else
            var url = '/get-all-developer';
            var $data = {
                    limit: 6,
                    page: nextPage
                };
        @endif
        $.ajax({
            url: url,
            data: $data
        })
        .done(function (response) {
            $('.contentDev').html("");
            $('.contentDev').html(response);
        })
        .fail(function (response) {
            $('.contentDev').html("<div class=\"container hide denied\">"
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
