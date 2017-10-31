<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills m-b-30 hide">
                    <li class="active">
                        <a href="#kpr" data-toggle="tab" aria-expanded="true">KPR</a>
                    </li>

                    @if (false)
                        <li class="">
                            <a href="#kkb" data-toggle="tab" aria-expanded="false">KKB</a>
                        </li>
                        <li class="">
                            <a href="#briguna" data-toggle="tab" aria-expanded="false">BRIGUNA</a>
                        </li>
                        <li class="">
                            <a href="#britama" data-toggle="tab" aria-expanded="false">SIMPANAN</a>
                        </li>
                        <li class="">
                            <a href="#kur" data-toggle="tab" aria-expanded="false">KUR/KUPEDES</a>
                        </li>
                        <li class="">
                            <a href="#kartu" data-toggle="tab" aria-expanded="false">KARTU KREDIT</a>
                        </li>
                    @endif

                </ul>
                <div class="tab-content br-n pn">
                    <div id="kpr" class="tab-pane active">
                        @include('eforms.products._kpr')
                        {!! Form::hidden('category', 0, ['id' => 'category-hide']) !!}
                        {!! Form::hidden('product_type', 'kpr') !!}
                        {!! Form::hidden('status_property', 'new') !!}
                    </div>
                    
                    @if (false)
                        <div id="kkb" class="tab-pane">
                            @include('eforms.products._kkb')
                        </div>

                        <div id="briguna" class="tab-pane">
                            @include('eforms.products._briguna')
                        </div>

                        <div id="britama" class="tab-pane">
                            @include('eforms.products._britama')
                        </div>

                        <div id="kur" class="tab-pane">
                            @include('eforms.products._kur')
                        </div>

                        <div id="kartu" class="tab-pane">
                            @include('eforms.products._card')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push( 'parent-styles' )
@endpush

@push( 'parent-scripts' )
    {!! Html::script( 'js/numeric.min.js' ) !!}

    <script type="text/javascript">
        $(document).ready(function () {
            // declare variable
            $category   = $('#category-hide')
            $developers = $('.developers')
            $properties = $('.properties')
            $types = $('.types')
            $items = $('.items')
            $year  = $('#year')
            $price = $('#price')
            $active_kpr = $('#active_kpr')
            $building_area = $('#building_area')
            $home_location = $('#home_location')
            $down_payment = $('#down_payment')
            $request_amount = $('#request_amount')
            $select = $('.types-select, .units-select')
            $dp = $('#dp');

            $developers
                .dropdown('developer')
                .on('select2:unselect, change', unset_property)
                .on('select2:select', set_property);

            $year.on('change', function () {
                console.log('1');
                if ( $(this).val() > 240 ) {
                    $(this).val(240);
                    return;
                }

                if ( $(this).val() < 12) {
                    $(this).val(12);
                    return;
                }
            });

            $dp.on('change', function () {
                if ( $(this).val() > 100 ) {
                    $(this).val(100).trigger('change');
                    return;
                }

                if ( $(this).val() < $(this).data('min') ) {
                    $(this).val($(this).data('min')).trigger('change');
                    return;
                }
            });

            $category.on('change', function () {
                switch ( $(this).val() ) {
                    case '1' : $active_kpr.on('change', building_area_until_70);  break;
                    case '2' : $active_kpr.on('change', calculation_for_rusun); break;
                    default  : $active_kpr.on('change', calculation_for_rumah); break;
                }
            }).trigger('change');

            $('.calculate').on('change', function () {
                var dp = ! isNaN( parseInt( $dp.val() ) ) ? parseInt( $dp.val() ) : 0;
                var price = parseInt( $price.val().split('.').join('') );
                var fix_price = ! isNaN(price) ? price : 0;
                var payment = ! isNaN((dp * fix_price) / 100) ? (dp * fix_price) / 100 : 0;
                $down_payment.val(payment);
                $request_amount.val(fix_price - payment);
            });
        });

        function set_property(e) {
            var data = e.params.data;

            $('#developer_name').val(data.company_name);
            $properties
                .empty()
                .dropdown('property', { dev_id: data.dev_id })
                .on('select2:unselect, change', unset_property_type)
                .on('select2:select', set_property_type);

            if (data.bri != '1') {
                $select.removeClass('hide');
                $price.val(0).attr('readonly', true).trigger('change');
                $building_area.val(0).attr('readonly', true).trigger('change');
                $home_location.val('').attr('readonly', true).trigger('change');
                return;
            }

            $select.addClass('hide');
            $price.removeAttr('readonly');
            $building_area.removeAttr('readonly');
            $home_location.removeAttr('readonly');
        }

        function unset_property() {
            $('#developer_name').val('');
            $price.val(0).attr('readonly', true).trigger('change');
            $building_area.val(0).attr('readonly', true).trigger('change');
            $home_location.val('').attr('readonly', true).trigger('change');
            $select.removeClass('hide');
            $properties.empty().select2({width: '100%'}).trigger('change');
            unset_property_type();
        }

        function set_property_type(e) {
            var data = e.params.data;
            $('#property_name').val(data.prop_name);

            $category.val(data.prop_category).trigger('change');
            $types
                .empty()
                .dropdown('types', { prop_id: data.prop_id })
                .on('select2:unselect, change', unset_property_item)
                .on('select2:select', set_property_item);
        }

        function unset_property_type() {
            $('#property_name').val('');
            $category.val(0).trigger('change');
            $types.empty().select2({width: '100%'}).trigger('change');
            unset_property_item();
        }

        function set_property_item(e) {
            var data = e.params.data;

            $('#property_type_name').val(data.name);
            $building_area.val(data.building_area).trigger('change');
            
            $items
                .empty()
                .dropdown('items', { prop_type_id: data.id })
                .on('select2:unselect, change', unset_additional_data)
                .on('select2:select', set_additional_data);
        }

        function unset_property_item() {
            $('#property_type_name').val('');
            $building_area.val(0).trigger('change');
            $items.empty().select2({width: '100%'}).trigger('change');
        }

        function set_additional_data(e) {
            var data = e.params.data;
            $('#property_item_name').val(data.address);
            $price.val(data.price).trigger('change');
            $home_location.val(data.address).trigger('change');
        }

        function unset_additional_data() {
            $('#property_item_name').val('');
            $price.val(0).trigger('change');
            $home_location.val('').trigger('change');
        }

        function calculation_for_rumah() {
            var int_area = parseInt($building_area.val());

            if (int_area > 70) {
                building_area_more_than_70();
            } else if (int_area > 21 && int_area <= 70) {
                building_area_until_70();
            } else {
                $dp.numeric();
            }
        }

        function calculation_for_rusun() {
            var int_area = parseInt($building_area.val());

            if (int_area > 70) {
                building_area_more_than_70();
            } else {
                building_area_until_70();
            }
        }

        function building_area_more_than_70() {
            switch ( $active_kpr.val() ) {
                case '1' : $dp.data('min', 15).val(15).trigger('change'); break;
                case '2' : $dp.data('min', 20).val(20).trigger('change'); break;
                default  : $dp.data('min', 25).val(25).trigger('change'); break;
            }
        }

        function building_area_until_70() {
            switch ( $active_kpr.val() ) {
                case '1' : $dp.data('min', 10).val(10).trigger('change'); break;
                case '2' : $dp.data('min', 15).val(15).trigger('change'); break;
                default  : $dp.data('min', 20).val(20).trigger('change');
            }
        }
    </script>
@endpush