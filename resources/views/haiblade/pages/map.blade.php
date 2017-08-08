@extends('layouts.master')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    <div class="container-fluid">
        <div id="map" style="height:570px; width: auto;"></div>
        <div id="legend" class="menu-filter-map-custom">
            <div class="menu-select-map">
                <div class="title-menu-filter">
                    <h4 class="title-filter-text"><p class="text-center title-filter-custom">Chọn Icon để lọc</p></h4>
                </div>
                <div class="filter-all-custom">
                    <button class="btn btn-danger btn-select-all-filter cursor-pointer-class" alt="showall" onclick="clickAll()">Tất cả</button>
                </div>
                <div class="row list-filter-map">
                    <div class="filter-item-map col-md-2">
                        <span class="img-filter">
                            <img class="cursor-pointer-class" src="http://vietmarketplace.dev/public/img/bookStock.png" alt="bookStock" onclick="clickBookStock()">
                        </span>
                        <span class="outer-div-custom">
                            <div class="middle-div-custom">
                                <div class="inner-div-custom">
                                    <div class="content-div-custom">
                                        Sách rao bán
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="filter-item-map col-md-2">
                        <span class="img-filter">
                            <img class="cursor-pointer-class" src="{{ asset('public/img/bookOrder.png') }}" alt="bookOrder" onclick="clickBookOrder()">
                        </span>
                        <span class="outer-div-custom">
                            <div class="middle-div-custom">
                                <div class="inner-div-custom">
                                    <div class="content-div-custom">
                                        Sách tìm mua
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="filter-item-map col-md-2">
                        <span class="img-filter">
                            <img class="cursor-pointer-class" src="{{ asset('public/img/computerStock.png') }}" alt="computerStock" onclick="clickComputerStock()">
                        </span>
                        <span class="outer-div-custom">
                            <div class="middle-div-custom">
                                <div class="inner-div-custom">
                                    <div class="content-div-custom">
                                        Máy tính rao bán
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="filter-item-map col-md-2">
                        <span class="img-filter">
                            <img class="cursor-pointer-class" src="{{ asset('public/img/computerOrder.png') }}" alt="computerOrder" onclick="clickComputerOrder()">
                        </span>
                        <span class="outer-div-custom">
                            <div class="middle-div-custom">
                                <div class="inner-div-custom">
                                    <div class="content-div-custom">
                                        Máy tính tìm mua
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="filter-item-map col-md-2">
                        <span class="img-filter">
                            <img class="cursor-pointer-class" src="{{ asset('public/img/smartphoneStock.png') }}" alt="smartphoneStock" onclick="clickSmartPhoneStock()">
                        </span>
                        <span class="outer-div-custom">
                            <div class="middle-div-custom">
                                <div class="inner-div-custom">
                                    <div class="content-div-custom">
                                        Điện thoại rao bán
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="filter-item-map col-md-2">
                        <span class="img-filter">
                            <img class="cursor-pointer-class" src="{{ asset('public/img/smartphoneOrder.png') }}" alt="smartphoneOrder" onclick="clickSmartPhoneOrder()">
                        </span>
                        <span class="outer-div-custom">
                            <div class="middle-div-custom">
                                <div class="inner-div-custom">
                                    <div class="content-div-custom">
                                        Điện thoại tìm mua
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card product-item hidden-class" id="info">
            <div class="card-top-thumbnail">
                <div class="feature-img-custom">
                    <img class="card-img-top img-feature-product" src="" alt="VietMarketPlace">
                </div>
            </div>
            <div class="card-block card-body-product">
                <span class="name-product">
                    <a class="link-product" href="">
                        <h4 class="card-title title-product"></h4>
                    </a>
                </span>
                <span class="card-price-product card-left-text full-width-custom">
                    <h3 class="price-product-item"></h3>
                    <sup class="currency-price">đ</sup>
                </span>
                <span class="card-status-custom card-left-text full-width-custom">
                    <span class="status-tag-custom badge badge-default"></span>
                </span>
            </div>
            <div class="card-footer card-footer-product">
                <button class="btn btn-success btn-detail-custom">
                    <a class="link-product" href="">
                        Chi tiết
                    </a>
                </button>
            </div>
        </div>
    </div>
@endsection()
@section('scripts')
    <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.
        var productStocks = <?php print_r(json_encode($productStock)); ?>;
        var productOrders = <?php print_r(json_encode($productOrder)); ?>;
        var author = <?php print_r(json_encode($author)); ?>;
        var map, infoWindow, marker;
        var markers = [];
        var smartphoneStockMarkers = [];
        var smartphoneOrderMarkers = [];
        var computerStockMarkers = [];
        var computerOrderMarkers = [];
        var bookStockMarkers = [];
        var bookOrderMarkers = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 10.772846, lng: 106.660016},
                zoom: 13
            });
            var infowindow = new google.maps.InfoWindow({
                content: info
            });
            var legend = document.getElementById('legend');
            map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(legend);
            jQuery.each( productStocks, function( i, product ) {
                LatLng = {lat: product.lat, lng: product.lng};
                if (product.cate_id == 1) {
                    var img = '../public/img/smartphoneStock.png';
                } else if (product.cate_id == 2) {
                    var img = '../public/img/computerStock.png';
                } else {
                    var img = '../public/img/bookStock.png';
                }
                var marker = new google.maps.Marker({
                    map: map,
                    animation: google.maps.Animation.DROP,
                    position: LatLng,
                    title: product.name,
                    icon: img
                });
                markers.push(marker);
                if (product.cate_id == 1) {
                    smartphoneStockMarkers.push(marker);
                } else if (product.cate_id == 2) {
                    computerStockMarkers.push(marker);
                } else {
                    bookStockMarkers.push(marker);
                }

                var baseUrl = '<?php echo url('/'); ?>',
                    url = baseUrl + '/stock-detail/' + product.id;
                var ajaxUrl = baseUrl + '/mapStockInfoDetail/' + product.id;
                var img_feature = baseUrl + '/resources/upload/stocks/stock-' + product.id + '/' + product.img;
                google.maps.event.addListener(marker, 'click', function() {
                    console.log(ajaxUrl);
                    $.ajax({
                        type: "GET",
                        url: ajaxUrl,
                        dataType: "json",
                        success: function (data) {
                            $("#info").removeClass('hidden-class');
                            infowindow.open(map, marker);
                            $("img.img-feature-product").attr('src', img_feature);
                            $(".link-product").attr('href', url);
                            $(".title-product").html(product.name);
                            $(".card-addr-text").html(product.place + ', ' + product.district + ', ' + product.city);
                            $(".price-product-item").html(data.price);
                            if (product.status != 0) {
                                $(".status-tag-custom").removeClass('new-product');
                                $(".status-tag-custom").addClass('old-product');
                                $(".status-tag-custom").html('HÀNG CŨ');
                            }
                            else {
                                $(".status-tag-custom").removeClass('old-product');
                                $(".status-tag-custom").addClass('new-product');
                                $(".status-tag-custom").html('HÀNG MỚI');
                            }
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
            });

            jQuery.each( productOrders, function( i, product ) {
                LatLng = {lat: product.lat, lng: product.lng};
                if (product.cate_id == 1) {
                    var img = '../public/img/smartphoneOrder.png';
                } else if (product.cate_id == 2) {
                    var img = '../public/img/computerOrder.png';
                } else {
                    var img = '../public/img/bookOrder.png';
                }
                var marker = new google.maps.Marker({
                    map: map,
                    animation: google.maps.Animation.DROP,
                    position: LatLng,
                    title: product.name,
                    icon: img
                });
                markers.push(marker);
                if (product.cate_id == 1) {
                    smartphoneOrderMarkers.push(marker);
                } else if (product.cate_id == 2) {
                    computerOrderMarkers.push(marker);
                } else {
                    bookOrderMarkers.push(marker);
                }

                var baseUrl = '<?php echo url('/'); ?>',
                    url = baseUrl + '/order-detail/' + product.id;
                var ajaxUrl = baseUrl + '/mapOrderInfoDetail/' + product.id;
                var img_feature = baseUrl + '/resources/upload/orders/order-' + product.id + '/' + product.img;
                google.maps.event.addListener(marker, 'click', function() {
                    console.log(ajaxUrl);
                    $.ajax({
                        type: "GET",
                        url: ajaxUrl,
                        dataType: "json",
                        success: function (data) {
                            $("#info").removeClass('hidden-class');
                            infowindow.open(map, marker);
                            $("img.img-feature-product").attr('src', img_feature);
                            $(".link-product").attr('href', url);
                            $(".title-product").html(product.name);
                            $(".card-addr-text").html(product.place + ', ' + product.district);
                            $(".price-product-item").html(data.price);
                            if (product.status != 0) {
                                $(".status-tag-custom").removeClass('new-product');
                                $(".status-tag-custom").addClass('old-product');
                                $(".status-tag-custom").html('HÀNG CŨ');
                            }
                            else {
                                $(".status-tag-custom").removeClass('old-product');
                                $(".status-tag-custom").addClass('new-product');
                                $(".status-tag-custom").html('HÀNG MỚI');
                            }
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
            });

        }
        jQuery('.mark').click(function() {
            infowindow.open(map, $this);
        });


        function clearMap(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clickAll() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clickBookStock() {
            clearMap(null);
            for (var i = 0; i < bookStockMarkers.length; i++) {
                bookStockMarkers[i].setMap(map);
            }
        }
        function clickBookOrder() {
            clearMap(null);
            for (var i = 0; i < bookOrderMarkers.length; i++) {
                bookOrderMarkers[i].setMap(map);
            }
        }
        function clickComputerStock() {
            clearMap(null);
            for (var i = 0; i < computerStockMarkers.length; i++) {
                computerStockMarkers[i].setMap(map);
            }
        }
        function clickComputerOrder() {
            clearMap(null);
            for (var i = 0; i < computerOrderMarkers.length; i++) {
                computerOrderMarkers[i].setMap(map);
            }
        }
        function clickSmartPhoneStock() {
            clearMap(null);
            for (var i = 0; i < smartphoneStockMarkers.length; i++) {
                smartphoneStockMarkers[i].setMap(map);
            }
        }
        function clickSmartPhoneOrder() {
            clearMap(null);
            for (var i = 0; i < smartphoneOrderMarkers.length; i++) {
                smartphoneOrderMarkers[i].setMap(map);
            }
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

    </script>
    <script async defer
            src="{{url('https://maps.googleapis.com/maps/api/js?key=AIzaSyA9WOBv_HjdT4h03JtNFLoPHxdaMrP1Dyk&callback=initMap')}}">
    </script>
@endsection