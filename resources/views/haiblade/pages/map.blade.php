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

<script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 10.772846, lng: 106.660016},
          zoom: 15,
          scrollwheel: false
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Vị Trí Hiện Tại');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
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

<!--
<script>
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;

        function initMap() {
          var bku = {lat: 10.772846, lng: 106.660016};
          map = new google.maps.Map(document.getElementById('map'), {
            center: bku,
            zoom: 15,
            mapTypeId: 'roadmap',
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });
          infoWindow = new google.maps.InfoWindow();
          searchLocations();
        }

          function searchLocations() {
         
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode(function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(' not found');
           }
         });
       }
       /*function searchLocations() {
         var address = document.getElementById("addressInput").value;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' not found');
           }
         });
       }*/

       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;

         var option = document.createElement("option");
         option.value = "none";
         option.innerHTML = "See all results:";
       }

       function searchLocationsNear(center) {
         clearLocations();
         var searchUrl = 'storelocator.php?lat=' + center.lat() + '&lng=' + center.lng();
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {
             var id = markerNodes[i].getAttribute("id");
             var name = markerNodes[i].getAttribute("name");
             var status = markerNodes[i].getAttribute("status");
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));
             var cate = markerNodes[i].getAttribute("cate_id");
             
             createMarker(latlng, name);
             bounds.extend(latlng);
           }
           map.fitBounds(bounds);
         });
       }

       function createMarker(latlng, name) {
          var html = "<b>" + name + "</b>";
          var marker = new google.maps.Marker({
            map: map,
            position: latlng
          });
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          markers.push(marker);
        }

       function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
       }

       function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
       }

       function doNothing() {}
  </script>
-->
<script async defer
            src="{{url('https://maps.googleapis.com/maps/api/js?key=AIzaSyA9WOBv_HjdT4h03JtNFLoPHxdaMrP1Dyk&callback=initMap')}}">
    </script>

@endsection()