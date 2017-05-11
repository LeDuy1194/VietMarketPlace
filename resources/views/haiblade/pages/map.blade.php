@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<ul class="nav justify-content-center">
				<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mặt Hàng</a>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Sách</a>
      <a class="dropdown-item" href="#">Máy tính</a>
      <a class="dropdown-item" href="#">Điện thoại</a>
    </div>
  </li>
				<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Nơi Tìm</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Tin rao bán</a>
      <a class="dropdown-item" href="#">Tin tìm mua</a>
    </div>
  </li>
				<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tình Trạng</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Mới</a>
      <a class="dropdown-item" href="#">Cũ</a>
    </div>
  </li>
			</ul>
		</div>
	</div>

</div>
<div id="map" style="height:600px; width: auto;"></div>
<div id="legend" style="background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;">
            <img src="{{ asset('public/img/bookStock.png') }}" alt="bookStock"> Sách rao bán
            <img src="{{ asset('public/img/bookOrder.png') }}" alt="bookOrder"> Sách tìm mua
            <img src="{{ asset('public/img/computerStock.png') }}" alt="computerStock"> Máy tính rao bán
            <img src="{{ asset('public/img/computerOrder.png') }}" alt="computerOrder"> Máy tính tìm mua
            <img src="{{ asset('public/img/smartphoneStock.png') }}" alt="smartphoneStock"> Điện thoại rao bán
            <img src="{{ asset('public/img/smartphoneOrder.png') }}" alt="smartphoneOrder"> Điện thoại tìm mua
        </div>
<div class="card mb-3 text-center" id="info">
  <!--<img class="card-img-top rounded-circle" src="..." alt="Card image cap" id="productImage">-->
  <div class="card-block">
    <h4 class="card-title" id="productTitle"></h4>
    <h5 class="card-text" id="productPrice"></h5>
    <p class="card-text" id="productPlace"></p>
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
                    } else
                        var img = '../public/img/bookStock.png';
                    var marker = new google.maps.Marker({
                        map: map,
                        animation: google.maps.Animation.DROP,
                        position: LatLng,
                        title: product.name,
                        icon: img
                    });
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
                    } else
                        var img = '../public/img/bookOrder.png';
                    var marker = new google.maps.Marker({
                        map: map,
                        animation: google.maps.Animation.DROP,
                        position: LatLng,
                        title: product.name,
                        icon: img                        
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                    document.getElementById("productTitle").innerHTML = product.name;
                    document.getElementById("productPlace").innerHTML = product.place;
                    document.getElementById("productPrice").innerHTML = product.price;
                    infowindow.open(map, marker);
                    });
                });
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