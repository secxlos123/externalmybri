<div class="row">
    <div class="col-sm-12 text-center">
        <h2 class="uppercase">Rekan Kami</h2>
    </div>
</div>
<div class="row">
    <div id="partners" class="owl-carousel">
        @foreach ($developers as $developer)
            <div class="item">
                {!! Html::image($developer['image'], $developer['company_name'], ['title' => $developer['company_name']]) !!}
            </div>
        @endforeach
    </div>
</div>