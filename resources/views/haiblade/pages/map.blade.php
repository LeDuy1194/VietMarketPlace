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
@endsection()
@section('scripts')
    <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.
            var productLocations = <?php print_r(json_encode($product)); ?>;
            //console.log(productLocations);
            var map, infoWindow;
            var markers = [];
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 10.772846, lng: 106.660016},
                    zoom: 13
                });
                jQuery.each( productLocations, function( i, product ) {
                    LatLng = {lat: product.lat, lng: product.lng};
                    var marker = new google.maps.Marker({
                        map: map,
                        animation: google.maps.Animation.DROP,
                        position: LatLng,
                        icon: 'http://maps.google.com/mapfiles/kml/paddle/red-circle.png'
                    });
                });

                infoWindow = new google.maps.InfoWindow;

//                if (navigator.geolocation) {
//                    navigator.geolocation.getCurrentPosition(function(position) {
//                        var pos = {
//                            lat: position.coords.latitude,
//                            lng: position.coords.longitude
//                        };
//
//                        infoWindow.setPosition(pos);
//                        infoWindow.setContent('Vị Trí Hiện Tại');
//                        infoWindow.open(map);
//                        map.setCenter(pos);
//                    }, function() {
//                        handleLocationError(true, infoWindow, map.getCenter());
//                    });
//                } else {
//                    handleLocationError(false, infoWindow, map.getCenter());
//                }
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