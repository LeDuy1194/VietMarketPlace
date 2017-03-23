<!--
Created by: Nguyen Le Duy
Date: 21/02/2017
-->

@extends('layouts.master')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<ol class="breadcrumb" id="path">
					<li class="breadcrumb-item"><a href="{{route('Home')}}">Trang Chủ</a></li>
					<li class="breadcrumb-item"><a href="{{route('listByCate',$cate->id)}}">{!! $cate->name !!}</a></li>
					<li class="breadcrumb-item active">{!!  $data->name !!}</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-1 hidden-sm-down"></div>
			<div class="col-lg-7 col-sm-12">
				<h2 class="title-post">{!!  $data->name !!}</h2>
				<div class="card card-block">
					<img src="../resources/upload/{{$data->img}}"/>
				</div>
				<div class="card description-product">
					<div class="card-header header-description-product">
						<a class="fontItem" data-toggle="collapse" href="#collapseProductDesc" aria-expanded="false" aria-controls="collapseProductDesc"><h5>Miêu tả</h5></a>
					</div>
					<div class="card-block collapse" id="collapseProductDesc">
						<p>
							{!! $data->description !!}
						</p>
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
							<li><span class="badge badge-default new-old-product"> {!! ($data->status=="new")?"Mới":"Đồ cũ" !!}</span></li>
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
								{!! $author->username !!}
							</h3>
						</center>
						<ul class="detail-info-author" id="detailInfoAuthor">
							<li><i class="fa fa-map-marker" aria-hidden="true"></i> {!! $author->address !!}</li>
							<li><i class="fa fa-phone" aria-hidden="true"></i> {!! $author->phone !!}</li>
							<li><i class="fa fa-envelope" aria-hidden="true"></i> {!! $author->email !!}</li>
						</ul>
					</div>
				</div>
				<div class="card card-block">
					<div class="btn-group">
						<button id="btnFav" class="btn btn-primary" type="button" onclick="">Thích</button>
						<button id="btnReport" class="btn btn-block btn-lg">Báo cáo tin ảo</button>
					</div>
				</div>
			</div>
			<div class="col-lg-1 hidden-sm-down"></div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection