@if ( count($properties) != 0 )
    <div class="row">
        <div class="col-sm-12 text-center">
            <h2 class="uppercase">DAFTAR PROPERTI TERDEKAT</h2>
            <p class="heading_space">Kami Memiliki Beberapa Properti terdekat di Area ini.</p>
        </div>
    </div>
@endif

<div class="row">

    @foreach ($properties as $property)
        @include('property._list-property', $property)
    @endforeach

</div>

@if ( count($properties) != 0 )
    <div class="col-sm-12 text-center">
        <a href="{!! route('all-properties') !!}" class="btn-dark uppercase">Lihat Semua Properti</a>
    </div>
@endif

@if ( count($properties) == 0 )
    <div class="col-sm-12 text-center bottom30">
    	<h2 class="uppercase">PROPERTI TERDEKAT TIDAK TERSEDIA</h2>
    </div>
@endif