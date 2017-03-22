<!--
Created by: Nguyen Le Duy
Date: 17/02/2017
-->

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	@include('utils.searchForm')
	<div class="container">
		<div class="row mt-2">
			@if($state == 'stock')
			<div class="btn-group-justified m-auto">
				<a class="btn btn-primary active" href="{{route('MyStore','stock')}}" name="btnStock">Kho hàng</a>
				<a class="btn btn-primary" href="{{route('MyStore','order')}}" name="btnOrder">Đơn hàng</a>
				<a class="btn btn-primary" href="{{route('MyStore','favorite')}}" name="btnFav">Yêu thích</a>
			</div>
			<div class="col-lg-12 p-0 m-0">
				@foreach($stock as $item)
				<div class="card card-block listV-item">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="media">
								<div class="media-left">
									<img src="../resources/upload/{{$item->img}}" class="media-object img-thumbnail avatar"/>
								</div>
								<div class="media-body">
									<h4 class="media-heading">{!! $item->name !!}</h4>
									<a href="{{route('StockDetail',$item->id)}}">Chi tiết sản phẩm</a>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-sm-6">
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">Đánh giá</h4>
									<ul class="list-inline" name="rating">
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-4 text-right">
							<h3>{!! number_format($item->price,0,",",".")." VNĐ" !!}</h3>
						</div>
						<div class="col-lg-1 text-right">
							<a class="btn" href="{{route('Home')}}" name="">Sửa</a>
						</div>
						<div class="col-lg-1 text-right">
							<a class="btn" href="{{route('Home')}}" name="">Xóa</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@elseif($state == 'order')
			<div class="btn-group-justified m-auto">
				<a class="btn btn-primary" href="{{route('MyStore','stock')}}" name="btnStock">Kho hàng</a>
				<a class="btn btn-primary active" href="{{route('MyStore','order')}}" name="btnOrder">Đơn hàng</a>
				<a class="btn btn-primary" href="{{route('MyStore','favorite')}}" name="btnFav">Yêu thích</a>
			</div>
			<div class="col-lg-12 p-0 m-0">
				@foreach($order as $item)
				<div class="card card-block listV-item">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="media">
								<div class="media-left">
									<img src="../resources/upload/{{$item->img}}" class="media-object img-thumbnail avatar"/>
								</div>
								<div class="media-body">
									<h4 class="media-heading">{!! $item->name !!}</h4>
									<a href="{{route('OrderDetail',$item->id)}}">Chi tiết sản phẩm</a>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-sm-6">
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">Đánh giá</h4>
									<ul class="list-inline" name="rating">
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-sm-4 text-right">
							<h3>{!! number_format($item->priceMin,0,",",".")." - ".number_format($item->priceMax,0,",",".")." VNĐ" !!}</h3>
						</div>
						<div class="col-lg-1 text-right">
							<a class="btn" href="{{route('Home')}}" name="">Sửa</a>
						</div>
						<div class="col-lg-1 text-right">
							<a class="btn" href="{{route('Home')}}" name="">Xóa</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@else
			<div class="btn-group-justified m-auto">
				<a class="btn btn-primary" href="{{route('MyStore','stock')}}" name="btnStock">Kho hàng</a>
				<a class="btn btn-primary" href="{{route('MyStore','order')}}" name="btnOrder">Đơn hàng</a>
				<a class="btn btn-primary active" href="{{route('MyStore','favorite')}}" name="btnFav">Yêu thích</a>
			</div>
			<h1>Lỗi</h1>
			@endif
		</div>
	</div><br>
@endsection

@section('scripts')

@endsection