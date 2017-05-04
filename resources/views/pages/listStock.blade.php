<!--
Created by: Anh Pham
Date: 21/02/2017
-->

@extends('layouts.master')
@section('meta-title')
	StockDetail
@endsection
@section('css')

	<!-- basic stylesheet -->
	<link rel="stylesheet"  href="{{asset('public/libs/royalslider/royalslider.css')}}">

	<!-- skin stylesheet (change it if you use another) -->
	<link rel="stylesheet" href="{{asset('public/libs/royalslider/skins/default/rs-default.css')}}">

	<link rel="stylesheet" href="{{asset('public/css/client/stockDetail.css')}}">

	<link rel="stylesheet" href="{{asset('public/libs/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">

	<!-- Optional - Adds useful class to manipulate icon font display -->
	<link rel="stylesheet" href="{{asset('public/libs/pe-icon-7-stroke/css/helper.css')}}">

    <?php
			if ($cate->id == 1) {
                $bg = array('bg-01.jpg', 'bg-02.jpg');
			}
			elseif ($cate->id == 2) {
                $bg = array('bg-03.jpg', 'bg-04.jpg'); // array of filenames
			}
			elseif ($cate->id == 3) {
				$bg = array('bg-05.jpg', 'bg-06.jpg', 'bg-07.jpg', 'bg-08.jpg' );
			}

    $i = rand(0, count($bg)-1); // generate random number size of the array
    $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
    ?>
	<style type="text/css">
		<!--
		.header-product {
			background: url(/public/img/header/<?php echo $selectedBg; ?>);
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		-->
	</style>

@endsection

@section('content')
	@include('utils.message')
	<?php 
// dd($author); 
?>
	<div class="container-fluid content-product-detail">
		<div class="row header-product">
			<div class="breadcrumb-header">
				<div class="content-breadcrumb-header">
					<h2 class="title-post">{!!  $data->name !!}</h2>
					<ol class="breadcrumb" id="path">
						<li class="breadcrumb-item"><a href="{{route('Home')}}">Trang Chủ</a></li>
						<li class="breadcrumb-item"><a href="{{route('listByCate',[0,'stock'])}}">Tin rao bán</a></li>
						<li class="breadcrumb-item"><a href="{{route('listByCate',[$cate->id,'all'])}}">{!! $cate->name !!}</a></li>
					<!-- 					<li class="breadcrumb-item active">{!!  $data->name !!}</li> -->
					</ol>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1 hidden-sm-down"></div>
			<div class="col-lg-7 col-sm-12">
				<div class="slider-product-detail">
					<center>
						<div id="product-detail-gallery" class="royalSlider rsDefault">
							@if($stockImages && count($stockImages)>0)
								@foreach($stockImages as $stockImage)
									<a id="product-detail-gallery-id" class="rsImg bugaga" data-rsbigimg="../resources/upload/stocks/stock-{!!  $data->id !!}/{{$stockImage}}" href="../resources/upload/stocks/stock-{!!  $data->id !!}/{{$stockImage}}">
										<img class="rsTmb" src="../resources/upload/stocks/stock-{!!  $data->id !!}/{{$stockImage}}" >
									</a>
								@endforeach
							@endif
						</div>
					</center>
				</div>
				<div class="detail-desc-product-custom">
					<ul class="nav nav-pills" id="detail-tabs" role="tablist">
						<li class="nav-item nav-custom">
							<a class="nav-link active" href="#descProduct" name="btnDesc" role="tab">Miêu tả</a>
						</li>
						<li class="nav-item nav-custom">
							<a class="nav-link" href="#map" name="btnMap" role="tab">Vị trí giao dịch</a>

						</li>

					</ul>
					<div id="map" style="height: 300px;width: auto"></div>
					<div class="tab-content detail-product-content-tab">
						<div class="tab-pane active" id="descProduct" role="tabpanel">
							{!! $data->description !!}
						</div>
						<div class="tab-pane" id="map" role="tabpanel">

						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-12">
			    <div class="price-product-detail">
			        <h3 class="price-product-item">{!! number_format($data->price,0,",",".") !!}</h3>
			        <sup class="currency-price">đ</sup>
			    </div>
			    <div class="add-favorite-detail btn-action-product">
				    <a title="Xem sau." href="{{route('favorite',['stock',$data->id])}}">
						<i class="fa fa-heart-o" aria-hidden="true"></i>
						<h3 class="add-favorite-product">Xem sau</h3>
					</a>
			    </div>
			    <div class="report-product btn-action-product">
				    <a title="Báo cáo tin xấu" href="{{route('favorite',['stock',$data->id])}}">
						<i class="fa fa-flag" aria-hidden="true"></i>
						<h3 class="report-product-title">Báo tin xấu</h3>
					</a>
			    </div>
				<div class="card author-info">
					<div class="card-header header-author-info">
						<a class="fontItem" data-toggle="collapse" href="#collapseProductInfo" aria-expanded="true" aria-controls="collapseProductInfo"><h5>Thông tin sản phẩm</h5></a>
					</div>
					<div class="collapse show card-block" id="collapseProductInfo">
						<ul class="product-info" id="productInfo">
							<li>
								<div class="title-info-detail">Tình trạng: </div>
								<div class="badge badge-default {!! ($data->status == 0)?"new-product":"old-product" !!}">{!! ($data->status == 0)?"Hàng mới":"Hàng cũ" !!}</div>
							</li>
							<li>
								<div class="title-info-detail">Địa chỉ: </div>
								<div class="info-detail">{!! $data->place !!}, {!! $data->district !!}, {!! $data->city !!}</div>
							</li>
							<li>
								<div class="title-info-detail">Ngày đăng: </div>
								<div class="info-detail">{!! date_format($data->created_at,"d/m/Y") !!}</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="card author-info">
					<div class="card-header header-author-info">
						<a class="fontItem" data-toggle="collapse" href="#authorInfomation" aria-expanded="true" aria-controls="collapseInfo"><h5>Thông tin người đăng</h5></a>
					</div>
					<div class="card-block collapse show" id="authorInfomation">
						<div class="basic-info-author">
							<span class="avatar-author">
								<img src="../resources/upload/user/{!! $author->avatar !!}" class="rounded-circle author-avatar">
							</span>
							<span class="list-info-author">
								<span class="name-author">
									<h3 class="text-center author-name">
										<a href="{!! url('profile', [$author->username]) !!}" >{!! $author->username !!}</a>
									</h3>
								</span>
								<span class="socials-author">
									<a href="#" class="facebook-author">
										<span class="fa-stack fa-lg facebook-social">
										  <i class="fa fa-circle fa-stack-2x fa-circle-custom"></i>
										  <i class="fa fa-facebook fa-stack-1x fa-icon-custom"></i>
										</span>
									</a>
									<a href="#" class="ggplus-author">
										<span class="fa-stack fa-lg ggplus-social">
										  <i class="fa fa-circle fa-stack-2x fa-circle-custom"></i>
										  <i class="fa fa-google-plus fa-stack-1x fa-icon-custom"></i>
										</span>
									</a>
								</span>
							</span>
						</div>	
						<ul class="detail-info-author" id="detailInfoAuthor">
							<!-- <li><i class="fa fa-map-marker" aria-hidden="true"></i> {!! $author->address !!}</li> -->
							<?php if ($author->phone != ''): ?>
								<li><h4><i class="fa fa-phone" aria-hidden="true"></i> {!! $author->phone !!}</h4></li>
							<?php endif; ?>
							<?php if ($author->email != ''): ?>
								<li><i class="fa fa-envelope" aria-hidden="true"></i> {!! $author->email !!}</li>
							<?php endif; ?>
<!-- 							<li>
								<div class="title-register-author">Ngày đăng ký: </div>
								<div class="info-register-author">{!! date_format($author->created_at,"d/m/Y") !!}</div>
							</li> -->
						</ul>
					</div>
				</div>
				@if(Auth::id()!=$author->id)
				<div class="card report-product-area">
					<div class="card-header header-report-product">
						<a class="fontItem" data-toggle="collapse" href="#reportProduct" aria-expanded="true" aria-controls="collapseInfo"><h5>Đánh giá người đăng</h5></a>
					</div>
					<div class="card-block collapse show" id="reportProduct">
						<form role="form" action="{!!route('postReview',[$data->id])!!}" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{!!csrf_token()!!}">
							<div class="form-group">
								<textarea name="comment" id="comment" rows="4" cols="30" maxlength="100" class="form-control" placeholder="Nội dung đánh giá" style="resize: none;"></textarea>
							</div>
							<select class="form-control" name="vote" id="vote">
								<option value="1">Người đăng uy tín</option>
								<option value="0">Người đăng không uy tín</option>
							</select>
							<hr>
							<button type="submit" class="btn btn-block btn-success">
								Gửi
							</button>
						</form>
					</div>
				</div>
				@endif
			</div>
			<div class="col-lg-1 hidden-sm-down"></div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>

        var map, infoWindow, messagewindow;
        function initMap() {
        	LatLng = {lat: {{ $data['lat'] }}, lng: {{ $data['lng'] }}};
        	map = new google.maps.Map(document.getElementById('map'), {
        		center: LatLng,
        		zoom: 16,
        		scrollwheel: false
        	});
        	var marker = new google.maps.Marker({
        		map: map,
        		animation: google.maps.Animation.DROP,
        		position: LatLng,
        		icon: 'http://maps.google.com/mapfiles/kml/paddle/red-circle.png',
        		title: '{{ $data['title'] }}'
        	});
        	marker.addListener('click', toggleBounce);
        	infoWindow = new google.maps.InfoWindow({
        		content: document.getElementById('form')
        	});

        	messagewindow = new google.maps.InfoWindow({
        		content: document.getElementById('message')
        	});
        }
        function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
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

    <script async defer src="{{url('https://maps.googleapis.com/maps/api/js?key=AIzaSyA9WOBv_HjdT4h03JtNFLoPHxdaMrP1Dyk&callback=initMap')}}">
    	
    </script>
	<!-- Main slider JS script file -->
	<!-- Create it with slider online build tool for better performance. -->
	<script src="{{asset('public/libs/royalslider/jquery.royalslider.min.js')}}"></script>

	<script>
        jQuery(document).ready(function($) {
            $(".royalSlider").royalSlider({
                // options go here
                // as an example, enable keyboard arrows nav
                autoScaleSlider: true,
                imageAlignCenter: true,
                autoScaleSliderHeight: 500,
                keyboardNavEnabled: true,
				// general options go gere
                fullscreen: {
                    // fullscreen options go gere
                    enabled: true,
                    nativeFS: false
                },
                controlNavigation: 'thumbnails',
					thumbs: {
                        autoCenter:	true,
					// thumbnails options go gere
						spacing: 10,
						arrowsAutoHide: true
				}
            });
            $('#detail-tabs a').click(function (e) {
                e.preventDefault()
                $(this).tab('show')
            })
        });
	</script>

@endsection