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
					<li class="breadcrumb-item"><a href="#">{!! $cate->name !!}</a></li>
					<li class="breadcrumb-item active">{!!  $data->name !!}</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-1 hidden-sm-down"></div>
			<div class="col-lg-7 col-sm-12">
				<div class="card card-block">
					<img src="resources/upload/{{$data->img}}"/>
				</div>
				<a class="card card-block fontItem" data-toggle="collapse" href="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo"><h5>Thông tin sản phẩm</h5></a>
				<div class="collapse show" id="collapseInfo">
					<div class="card card-block" id="productInfo">
						<h5>Địa điểm: {!! $data->place !!}</h5>
						<h5>Tình trạng: {!! ($data->status=="new")?"Mới":"Đồ cũ" !!}</h5>
						<h5>Giá: {!! number_format($data->priceMin,0,",",".")." - ".number_format($data->priceMax,0,",",".")." VNĐ" !!}</h5>
						<h5>Thời gian: </h5>
					</div>
				</div>
				<a class="card card-block fontItem" data-toggle="collapse" href="#collapseDesc" aria-expanded="false" aria-controls="collapseDesc"><h5>Miêu tả</h5></a>
				<div class="collapse" id="collapseDesc">
					<div class="card card-block" id="productDesc">
						<p>
							{!! $data->description !!}
						</p>
					</div>
				</div>
				<!-- <a class="card card-block fontItem" data-toggle="collapse" href="#collapseRate" aria-expanded="false" aria-controls="collapseRate"><h5>Nhận xét, đánh giá</h5></a>
				<div class="collapse" id="collapseRate">
					<div class="card card-block" id="productRate">
						@include('utils.rate')
					</div>
					<div class="card card-block">
						<form action="" method="">
							<textarea class="form-control" name="comment" rows="5" cols="50" style="resize: none;">
							</textarea>
							<input type="submit" name="" value="Nhận xét"/>
						</form>
					</div>
				</div> -->
			</div>
			<div class="col-lg-3 col-sm-12">
				<div class="card card-block">
					@include('utils.userProfile')
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