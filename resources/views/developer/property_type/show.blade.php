@extends('layouts.app')

@section('title', 'Detail Proyek Tipe')

@section('breadcrumb')
	<h1 class="text-uppercase">Detail Proyek Tipe</h1>
	<ol class="breadcrumb text-center">
	    <li><a href="{!! route('developer.proyek-type.index') !!}">List Proyek Tipe</a></li>
	    <li class="active">Detail Proyek Tipe</li>
	</ol>
@endsection

@section('content')
<section id="property" class="padding bg_white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 listing1 property-details">
                <div class="row title-box">
                    <div class="col-md-6 p-0 b-r-1">
                        <h2 class="text-uppercase">{!! sprintf('%s | %s', $type->property_name, $type->name) !!}</h2>
                        <p><i class="fa fa-map-marker"></i> {!! $type->property_address !!}</p>
                    </div>
                    <div class="col-md-3 dev-logo text-right">
                        {!! Html::image($type->developer_logo, 'image', ['class' => 'img-thumbnail img-responsive']) !!}
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="dev pull-right">
                            <p>Oleh:</p>
                            <h2>
                                <a href="javascript:void(0)">{!! $type->developer_name !!}</a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="property-d-1" class="owl-carousel single">
                            @foreach ($type->photos as $photo)
                                <div class="item">
                                    {!! Html::image($photo, 'image') !!}
                                </div>
                            @endforeach
                        </div>
                        <div id="property-d-1-2" class="owl-carousel single">
                            @foreach ($type->photos as $photo)
                                <div class="item">
                                    {!! Html::image($photo, 'image') !!}
                                </div>
                            @endforeach
                        </div>

                        <div class="property_meta bg-black bottom40">
                            <!-- @todo change to have items -->
                            <span>Stock <b>{!! $type->items_count !!}</b> Unit</span>

                            <!-- @todo change to have price -->
                            <span>Mulai Dari : <b>Rp. {!! number_format($type->price, 0, '.', ',') !!}</b></span>
                        </div>

                        <h2 class="text-uppercase bottom20">Fasilitas (Dari table project)</h2>
                        <p class="bottom20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum, bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt. Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat. Sed ac turpis nisl. Mauris at ante mauris. Aliquam posuere fermentum lorem, a aliquam mauris rutrum a. Curabitur sit amet pretium lectus, nec consequat orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et metus in libero sollicitudin venenatis eu sed enim. Nam felis lorem, suscipit ac nisl ac, iaculis dapibus tellus. Cras ante justo, aliquet quis placerat nec, molestie id turpis. </p>
                        <div class="text-it-p bottom20 top-inherit">
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
                        </div>

                        <!--About Us -->
                        <section id="about" class="bottom40">
                            <div class="container text-center">
                                <div class="row number-counters text-center">
                                    <!-- first count item -->
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Luas Tanah (m<sup>2</sup>)</p>
                                        <!-- Set Your Number here. i,e. data-to="56" -->
                                        <strong data-to="{!! $type->surface_area !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Luas Bangunan (m<sup>2</sup>)</p>
                                        <strong data-to="{!! $type->building_area !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Jumlah Lantai</p>
                                        <strong data-to="{!! $type->floors !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Daya Listrik (watt)</p>
                                        <strong data-to="{!! $type->electrical_power !!}">0</strong>
                                    </div>
                                </div>

                                <div class="row number-counters text-center">
                                    <!-- first count item -->
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Kamar Mandi</p>
                                        <!-- Set Your Number here. i,e. data-to="56" -->
                                        <strong data-to="{!! $type->bathroom !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Kamar Tidur</p>
                                        <strong data-to="{!! $type->bedroom !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa fa-check"></i>
                                        <p>Garasi</p>
                                        <strong data-to="{!! $type->carport !!}">0</strong>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 counters-item heading_space">
                                        <i class="fa {!! $type->certificate ? 'fa-check' : 'fa-times' !!}"></i>
                                        <p>{!! $type->certificate !!}</p>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <!--About & Counters-->

                        <h2 class="text-uppercase bottom20">PIC</h2>
                        <div class="row">
                            <div class="col-sm-4 bottom40">
                                <div class="agent_wrap">
                                    <div class="image">
                                        {!! Html::image('assets/images/agen/agent-one.jpg', 'Agents') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 bottom40">
                                <div class="agent_wrap">
                                    <h3>John Doe</h3>
                                    <p class="bottom30">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer adipiscing eleifend option congue nihil imperdiet doming…</p>
                                    <table class="agent_contact table">
                                        <tbody>
                                            <tr class="bottom10">
                                                <td><strong>Telepon:</strong></td>
                                                <td class="text-right">022 75023456</td>
                                            </tr>
                                            <tr class="bottom10">
                                                <td><strong>HP:</strong></td>
                                                <td class="text-right">0812 3456 7890</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Alamat Email:</strong></td>
                                                <td class="text-right"><a href="#.">johndoe@domain.com</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-blue">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-uppercase">List Unit Properti</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="add-btn bottom10 top20">
                                                    <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Unit Properti</a>
                                                </div>
                                                <table class="table table-striped table-bordered project-list">
                                                    <thead class="bg-blue">
                                                        <tr>
                                                            <th>No </th>
                                                            <th>Alamat </th>
                                                            <th>Harga </th>
                                                            <th>Status </th>
                                                            <th>Foto </th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Blok D/24</td>
                                                            <td>Rp. 200.000.000</td>
                                                            <td>Available</td>
                                                            <td><img src="images/property-details/house-3-s.jpg" class="img-responsive"></td>
                                                            <td>
                                                                <a href="#" class="btn btn-default">Detail</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
    @stack('parent-style')
@endpush

@push('scripts')
    @stack('parent-script')
@endpush