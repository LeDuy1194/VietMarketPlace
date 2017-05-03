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
	<div class="container my-store-custom">
		@include('utils.message')
		<div class="row mt-2">
				<ul class="nav nav-pills" id="store-tabs" role="tablist">
					<li class="nav-item nav-custom">
						<a class="nav-link active" href="#stock" name="btnStock">Tin rao bán
							<span class="badge badge-danger">{!! $stock->count() !!}</span>
						</a>
					</li>
					<li class="nav-item nav-custom">
						<a class="nav-link" href="#order" name="btnOrder">Tin tìm mua
							<span class="badge badge-danger">{!! $order->count() !!}</span>
						</a>
					</li>
				</ul>
			<div class="col-lg-12 p-0 m-0 tab-content">
				<div class="tab-pane active" id="stock" role="tabpanel">
					@foreach($stock as $item)
						<div class="card card-block listV-item">
							<div class="row">
								<div class="col-lg-4 col-sm-12">
									<div class="media">
										<div class="media-left">
											<img src="{{ asset('resources/upload/stocks/stock-'.$item->id.'/'.$item->img) }}" class="media-object img-thumbnail avatar"/>
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
									<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $item->place !!}, {!! $item->district !!}, {!! $item->city !!}</p>
								</div>
								<div class="col-lg-3 col-sm-4 text-right">
									<h3 class="price-product-item">{!! number_format($item->price,0,",",".") !!}</h3>
									<sup class="currency-price">đ</sup>
								</div>
								<div class="col-lg-2 text-right">
                                    <?php $match = $matchModel->getOrderNumber($item->id) ?>
									<a class="btn btn-success btn-block" href="{{route('getMatch',['stock',$item->id])}}"><h5>Match {!! $match !!}
										</h5></a>
									<a class="btn btn-danger btn-block" href="{{route('getDeleteProduct',['stock',$item->id])}}" name="" onclick="return confirmation('Có xóa {!! $item->name !!} không?')"><h5>Xóa</h5></a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				<div class="tab-pane" id="order" role="tabpanel">
					@foreach($order as $item)
						<div class="card card-block listV-item">
							<div class="row">
								<div class="col-lg-4 col-sm-12">
									<div class="media">
										<div class="media-left">
											<img src="{{ asset('resources/upload/orders/order-'.$item->id.'/'.$item->img) }}" class="media-object img-thumbnail avatar"/>
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
									<a class="btn btn-success btn-block" href="{{route('getMatch',['order',$item->id])}}"><h5>Match {!! $match !!}
										</h5></a>
									<a class="btn btn-danger btn-block" href="{{route('getDeleteProduct',['order',$item->id])}}" name="" onclick="return confirmation('Có xóa {!! $item->name !!} không?')"><h5>Xóa</h5></a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div><br>
@endsection

@section('scripts')
    <script src="{{asset('public/js/admin/admin.js')}}"></script>
	<script>
        $('#store-tabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
	</script>
@endsection