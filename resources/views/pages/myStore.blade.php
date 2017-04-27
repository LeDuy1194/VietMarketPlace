{{--
Created by: Nguyen Le Duy
Date: 17/02/2017
--}}

@extends('layouts.master')
@section('meta-title')
	MyStore
@endsection
@section('content')
	@include('utils.advertise')
	<div class="container">
		@include('utils.message')
		<div class="row mt-2">
		@if($state == 'stock')
			<div class="btn-group-justified m-auto">
				<a class="btn btn-primary active" href="{{route('MyStore','stock')}}" name="btnStock">Kho hàng 
				<span class="badge badge-danger">{!! $stock->count() !!}</span>
				</a>
				<a class="btn btn-primary" href="{{route('MyStore','order')}}" name="btnOrder">Đơn hàng 
				<span class="badge badge-danger">{!! $order->count() !!}</span>
				</a>
			</div>
			<div class="col-lg-12 p-0 m-0">
			@foreach($stock as $item)
				<div class="card card-block listV-item">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="media">
								<div class="media-left">
									<img src="{{ asset('resources/upload/'.$state.'s/'.$state.'-'.$item->id.'/'.$item->img) }}" class="media-object img-thumbnail avatar"/>
								</div>
								<div class="media-body ml-2">
									<a href="{{route('stockDetail',$item->id)}}">
										<h5 class="media-heading">
											{!! $item->name !!}
										</h5>
									</a>
									<?php $cate = $cateModel->getCateById($item->cate_id); ?>
									<p>Category: {!! $cate->name !!}</p>
									<div class="badge badge-default {!! ($item->status == 0)?"new-product":"old-product" !!}">{!! ($item->status == 0)?"Hàng mới":"Hàng cũ" !!}</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $item->place !!},{!! $item->district !!}, {!! $item->city !!}</p>
						</div>
						<div class="col-lg-3 col-sm-4 text-right">
							<h3 class="price-product-item">{!! number_format($item->price,0,",",".") !!}</h3>
							<sup class="currency-price">đ</sup>
						</div>
						<div class="col-lg-2 text-right">
							<?php $match = $matchModel->getOrderNumber($item->id) ?>
							<a class="btn btn-success btn-block" href="{{route('getMatch',[$state,$item->id])}}"><h5>Match {!! $match !!}
							</h5></a>
							<a class="btn btn-danger btn-block" href="{{route('getDeleteProduct',[$state,$item->id])}}" name="" onclick="return confirmation('Có xóa {!! $item->name !!} không?')"><h5>Xóa</h5></a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		@else
			<div class="btn-group-justified m-auto">
				<a class="btn btn-primary" href="{{route('MyStore','stock')}}" name="btnStock">Kho hàng 
				<span class="badge badge-danger">{!! $stock->count() !!}</span>
				</a>
				<a class="btn btn-primary active" href="{{route('MyStore','order')}}" name="btnOrder">Đơn hàng 
				<span class="badge badge-danger">{!! $order->count() !!}</span>
				</a>
			</div>
			<div class="col-lg-12 p-0 m-0">
			@foreach($order as $item)
				<div class="card card-block listV-item">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="media">
								<div class="media-left">
									<img src="{{ asset('resources/upload/'.$state.'s/'.$state.'-'.$item->id.'/'.$item->img) }}" class="media-object img-thumbnail avatar"/>
								</div>
								<div class="media-body ml-2">
									<a href="{{route('orderDetail',$item->id)}}">
										<h5 class="media-heading">
											{!! $item->name !!}
										</h5>
									</a>
									<?php $cate = $cateModel->getCateById($item->cate_id); ?>
									<p>Category: {!! $cate->name !!}</p>
									<div class="badge badge-default {!! ($item->status == 0)?"new-product":"old-product" !!}">{!! ($item->status == 0)?"Hàng mới":"Hàng cũ" !!}</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $item->place !!},{!! $item->district !!}, {!! $item->city !!}</p>
						</div>
						<div class="col-lg-3 col-sm-4 text-right">
							<h3 class="price-product-item">{!! number_format($item->price,0,",",".") !!}</h3>
							<sup class="currency-price">đ</sup>
						</div>
						<div class="col-lg-2 text-right">
							<?php $match = $matchModel->getStockNumber($item->id) ?>
							<a class="btn btn-success btn-block" href="{{route('getMatch',[$state,$item->id])}}"><h5>Match {!! $match !!}
							</h5></a>
							<a class="btn btn-danger btn-block" href="{{route('getDeleteProduct',[$state,$item->id])}}" name="" onclick="return confirmation('Có xóa {!! $item->name !!} không?')"><h5>Xóa</h5></a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		@endif
		</div>
	</div><br>
@endsection

@section('scripts')
    <script src="{{asset('public/js/admin/admin.js')}}"></script>
@endsection