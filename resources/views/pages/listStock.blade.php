<!--
Created by: Nguyen Le Duy
Date: 21/02/2017
-->

@extends('layouts.master')

@section('css')

	<!-- basic stylesheet -->
	<link rel="stylesheet"  href="{{asset('public/libs/royalslider/royalslider.css')}}">

	<!-- skin stylesheet (change it if you use another) -->
	<link rel="stylesheet" href="{{asset('public/libs/royalslider/skins/default/rs-default.css')}}">

	<link rel="stylesheet" href="{{asset('public/css/client/stockDetail.css')}}">

@endsection

@section('content')
	@include('utils.message')
	<div class="container-fluid content-product-detail">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb" id="path">
					<li class="breadcrumb-item"><a href="{{route('Home')}}">Trang Chủ</a></li>
					<li class="breadcrumb-item"><a href="{{route('listByCate',[$cate->id,'all'])}}">{!! $cate->name !!}</a></li>
					<li class="breadcrumb-item active">{!!  $data->name !!}</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-1 hidden-sm-down"></div>
			<div class="col-lg-7 col-sm-12">
				<h2 class="title-post">{!!  $data->name !!}</h2>
				{{--<div class="card card-block">--}}
					{{--<img src="../resources/upload/{{$data->img}}"/>--}}
				{{--</div>--}}
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

				<div class="card description-product">
					<div class="card-header header-description-product">
						<a class="fontItem" data-toggle="collapse" href="#collapseProductDesc" aria-expanded="true" aria-controls="collapseProductDesc"><h5>Miêu tả</h5></a>
					</div>
					<div class="card-block show collapse" id="collapseProductDesc">
						<div>
							{!! $data->description !!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-12">
				<div class="card author-info">
					<div class="card-header header-author-info">
						<a class="fontItem" data-toggle="collapse" href="#collapseProductInfo" aria-expanded="true" aria-controls="collapseProductInfo"><h5>Thông tin sản phẩm</h5></a>
					</div>
					<div class="collapse show card-block" id="collapseProductInfo">
						<ul class="product-info" id="productInfo">
							<li class="price-product"><i class="fa fa-money" aria-hidden="true"></i> {!! number_format($data->price,0,",",".")." VNĐ" !!}</li>
							<li><span class="badge badge-default new-old-product"> {!! ($data->status == 0)?"Mới":"Cũ" !!}</span></li>
							<li><i class="fa fa-street-view" aria-hidden="true"></i> {!! $data->place !!}</li>
						</ul>
					</div>
				</div>
				<div class="card author-info">
					<div class="card-header header-author-info">
						<a class="fontItem" data-toggle="collapse" href="#authorInfomation" aria-expanded="true" aria-controls="collapseInfo"><h5>Thông tin người đăng</h5></a>
					</div>
					<div class="card-body collapse show" id="authorInfomation">
						<center>
							<img src="../resources/upload/user/{!! $author->avatar !!}" class="rounded-circle author-avatar">
							<!--<input type="file" value="upload avatar" name="avatarUploadImg" id="avatarUploadImg">-->
							<h3 class="text-center author-name">
								<a href="{!! url('profile', [$author->username]) !!}" >{!! $author->username !!}</a>
							</h3>
						</center>
						<ul class="detail-info-author" id="detailInfoAuthor">
							<!-- <li><i class="fa fa-map-marker" aria-hidden="true"></i> {!! $author->address !!}</li> -->
							<li><h4><i class="fa fa-phone" aria-hidden="true"></i> {!! $author->phone !!}</h4></li>
							<!-- <li><i class="fa fa-envelope" aria-hidden="true"></i> {!! $author->email !!}</li> -->
						</ul>
					</div>
				</div>
				<div class="card card-block">
					<div class="btn-group">
						<a id="btnFav" class="btn btn-primary" href="{{route('favorite',$data->id)}}">Thích</a>
						<button id="btnReport" class="btn btn-block btn-lg">Báo cáo tin ảo</button>
					</div>
				</div>
			</div>
			<div class="col-lg-1 hidden-sm-down"></div>
		</div>
	</div>
@endsection

@section('scripts')

	<!-- Plugin requires jQuery 1.8+  -->
	<!-- If you already have jQuery on your page, you shouldn't include it second time. -->
	<script src="{{asset('public/libs/royalslider/jquery-1.8.3.min.js')}}"></script>

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
        });
	</script>

@endsection