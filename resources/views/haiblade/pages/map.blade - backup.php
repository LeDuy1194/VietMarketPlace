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
<!-- MAP -->
<div style='overflow:hidden;height:auto;width:auto; padding-top: auto;'>
	<div id='gmap_canvas' style='height:600px;width:auto;'></div>
	<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
</div>

<script src="{{url('https://maps.googleapis.com/maps/api/js?v=3.exp')}}"></script>

<script type='text/javascript'>
	function init_map() {
		var myOptions = {zoom:16,center:new google.maps.LatLng(10.790737,106.65612799999997),mapTypeId: google.maps.MapTypeId.ROADMAP};
		map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
		marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(10.790737,106.65612799999997)});
		infowindow = new google.maps.InfoWindow({content:'<strong>My Map</strong><br>1025 Cach Mang Thang 8, Tan Binh,Ho Chi Minh City<br>'});
		google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
		infowindow.open(map,marker);
	}
	google.maps.event.addDomListener(window, 'load', init_map);
</script>
<!-- MAP -->
@endsection()