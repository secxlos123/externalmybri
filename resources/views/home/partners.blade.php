<div class="row">
    <div class="col-sm-12 text-center">
        <h2 class="uppercase">Rekan Kami</h2>
        <p class="heading_space">Lorem Ipsum Dolor Sit Amet.</p>
    </div>
</div>
<div class="row">
    <div id="partners" class="owl-carousel">
        @for ($i = 1; $i <= 10; $i++)
            <div class="item">
                {!! Html::image('assets/images/partner/acuityprimary-png.png', 'Featured Partner') !!}
            </div>
        @endfor
    </div>
</div>