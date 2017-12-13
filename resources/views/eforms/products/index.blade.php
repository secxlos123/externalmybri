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
            whenDataExists();
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
            $select = $('.property-select, .types-select, .units-select')
            $kpr = $('.kpr_type_property, .kpr_type')
            $dp = $('#dp');

            // $kpr.addClass('hide');
            $('.kpr_type_properties, .type_property').select2({width:'100%'});

            $developers
                .dropdown('developer')
                .on('select2:unselect, change', unset_property)
                .on('select2:select', set_property);

            $year
                .on('change', function () {
                    if ( $(this).val() > 240 ) {
                        $(this).val(240);
                        return;
                    }

                    if ( $(this).val() < 12) {
                        $(this).val(12);
                        return;
                    }
                })
                .on('blur', function () {
                    if ( parseInt($year.val().replace( /[^0-9]/g, '' ) ) <= 12 ) {
                        $year.val('12');
                    } else if ( $year.val() >= 240 ) {
                        $year.val('240');
                        var val = $year.val();
                    } else if ( $year.val() == '' ){
                        $year.val('12');
                        var val = $year.val();
                    }
                });

            $down_payment
                .on('input', function() {
                    var val = $(this).val().replace(',00', '').replace(/\./g, '');
                    var static_price = $('#price').val().replace(',00', '').replace(/\./g, '');
                    var dp = $('#dp');
                    var dp_min = dp.data('min');
                    var max = parseInt(static_price) * (90/100);

                    if ( isNaN(parseInt(val)) ) {
                        val = 0;
                    }

                    if (parseInt(val) < max) {
                        payment = (val / static_price) * 100;

                    } else {
                        $(this).val(max);
                        payment = 90;

                    }

                    if ( !isNaN(payment) ) {
                        dp.val(Math.round(payment));
                        total = static_price - val;

                        if (total > 0) {
                            $request_amount.val(static_price - val);

                        } else {
                            $request_amount.val(static_price - max);

                        }
                    }
                })
                .on('blur', function() {
                    var val = $(this).val().replace(',00', '').replace(/\./g, '');
                    var static_price = $('#price').val().replace(',00', '').replace(/\./g, '');
                    var dp = $('#dp');
                    var dp_min = dp.data('min');
                    var min = parseInt(static_price) * (dp_min/100);

                    if ( isNaN(parseInt(val)) ) {
                        val = 0;
                    }

                    if (parseInt(val) < min) {
                        $(this).val(min)
                        dp.val(dp_min);
                        $request_amount.val(static_price - min);

                    } else {
                        $(this).val(real);
                        request_amount.val(static_price - real);

                    }
                });

            $dp
                .on('input', function() {
                    change_dp(this);
                })
                .on('change', function() {
                    change_dp(this);
                })
                .on('blur', function() {
                    var val = $(this).val();
                    var dp_min = $dp.data('min');
                    var down_payment = $('#down_payment');
                    var request_amount = $('#request_amount');
                    var price_without_comma = $price.val().replace(',00', '');
                    var static_price = price_without_comma.replace(/\./g, '');

                    if (val < dp_min) {
                        val = dp_min;
                        $(this).val(dp_min);
                    }

                    payment = (val / 100) * static_price;
                    down_payment.val(payment);
                    amount = static_price - payment;
                    down_payment.val(payment);
                    request_amount.val(amount);
                });

            $category.on('change', function () {
                switch ( $(this).val() ) {
                    case '1' : $active_kpr.on('change', building_area_until_70);  break;
                    case '2' : $active_kpr.on('change', calculation_for_rusun); break;
                    default  : $active_kpr.on('change', calculation_for_rumah); break;
                }
            }).trigger('change');

            function whenDataExists() {
                var address = "{{isset($param['property_item_address']) ? $param['property_item_address'] : ''}}";
                var price = "{{isset($param['property_item_price']) ? $param['property_item_price'] : ''}}";
                var dev_id = "{{isset($param['developer_id']) ? $param['developer_id'] : ''}}";
                var status = "{{isset($param['prop_status']) ? $param['prop_status'] : ''}}";
                var prop_id = "{{isset($param['property_id']) ? $param['property_id'] : ''}}";
                var prop_name = "{{isset($param['property_name']) ? $param['property_name'] : ''}}";

                if (status) {
                    if (jQuery.inArray(status, ['new', '1']) !== -1) {
                        $('.status_property').val(1).trigger('change');
                    }else if (jQuery.inArray(status, ['second', '2']) !== -1) {
                        $('.status_property').val(2).trigger('change');
                    }else if (jQuery.inArray(status, ['3', '4', '5' ,'6', '7', '8']) !== -1) {
                        $('.status_property').val(status).trigger('change');
                    }
                }

                $('#building_area').val($('#sess_building_area').val()).trigger('change');
                $('#category-hide').val($('#sess_prop_category').val()).trigger('change');
                $('#property_item_name').val(address).trigger('change');
                $('#price').val(price).trigger('change');
                $('#home_location').val(address).trigger('change');
            }
        });

        function change_dp(element) {
            var val = $(element).val();
            var down_payment = $('#down_payment');
            var request_amount = $('#request_amount');
            var price_without_comma = $price.val().replace(',00', '');
            var static_price = price_without_comma.replace(/\./g, '');

            if (parseInt(val) > 90) {
                val = 90;
                $(element).val(val);

            }

            payment = (val / 100) * static_price;
            down_payment.val(payment);
            amount = static_price - payment;
            down_payment.val(payment);
            request_amount.val(amount);
        }

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
                $('.kpr_type_property').hide();
                $price.val(0).attr('readonly', true).trigger('change');
                $building_area.val(0).attr('readonly', true).trigger('change');
                $home_location.val('').attr('readonly', true).trigger('change');
                return;
            }

            $('.kpr_type_property').show();
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

        //property status
        $('.status_property').on('change', function () {
            var value = $(this).select2('data')[0]['id'];

            if (1 == value) {
                $("div.kpr_type_property").hide();
                $("div.developer").show();
                $("div.property").show();
                $("div.property_type").show();
                $("div.property_unit").show();
                $('#price').attr('readonly', '');
                $('#home_location').attr('readonly', '');
                $('#building_area').attr('readonly', '');
            } else {
                $("div.kpr_type_property").show();
                $("div.developer").hide();
                $("div.property").hide();
                $("div.property_type").hide();
                $("div.property_unit").hide();
                $('#price').removeAttr('readonly');
                $('#home_location').removeAttr('readonly');
                $('#building_area').removeAttr('readonly');

            }
        });

    </script>
@endpush