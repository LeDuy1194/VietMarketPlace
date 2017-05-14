@extends('layouts.master')
@section('content')
<div class="container-fluid">
<div id="map" style="height:600px; width: auto;"></div>
<div id="legend" style="background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;">
        <h4><p class="text-center">Chọn Icon để lọc</p></h4>
            <img src="{{ asset('public/img/bookStock.png') }}" alt="bookStock" onclick="clickBookStock()"> Sách rao bán
            <img src="{{ asset('public/img/bookOrder.png') }}" alt="bookOrder" onclick="clickBookOrder()"> Sách tìm mua
            <img src="{{ asset('public/img/computerStock.png') }}" alt="computerStock" onclick="clickComputerStock()"> Máy tính rao bán
            <img src="{{ asset('public/img/computerOrder.png') }}" alt="computerOrder" onclick="clickComputerOrder()"> Máy tính tìm mua
            <img src="{{ asset('public/img/smartphoneStock.png') }}" alt="smartphoneStock" onclick="clickSmartPhoneStock()"> Điện thoại rao bán
            <img src="{{ asset('public/img/smartphoneOrder.png') }}" alt="smartphoneOrder" onclick="clickSmartPhoneOrder()"> Điện thoại tìm mua
        </div>
<div class="card mb-3 text-center" id="info">
  <!--<img class="card-img-top rounded-circle" src="..." alt="Card image cap" id="productImage">-->
  <div class="card-block">
    <h4 class="card-title" id="productTitle"></h4>
    <h5 class="card-text" id="productPrice"></h5>
    <p class="card-text" id="productPlace"></p>
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
            //console.log(productLocations);
            var map, infoWindow;
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
                    google.maps.event.addListener(marker, 'click', function() {
                    document.getElementById("productTitle").innerHTML = product.name;
                    document.getElementById("productPlace").innerHTML = product.place;
                    document.getElementById("productPrice").innerHTML = product.price;
                    infowindow.open(map, marker);
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
                    google.maps.event.addListener(marker, 'click', function() {
                    document.getElementById("productTitle").innerHTML = product.name;
                    document.getElementById("productPlace").innerHTML = product.place;
                    document.getElementById("productPrice").innerHTML = product.price;
                    infowindow.open(map, marker);
                    });
                });
            }
            function clearMap(map) {
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