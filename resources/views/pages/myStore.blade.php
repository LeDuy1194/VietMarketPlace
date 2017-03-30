{{--
Created by: Nguyen Le Duy
Date: 17/02/2017
--}}

@extends('layouts.master')

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
				<a class="btn btn-primary" href="{{route('MyStore','favorite')}}" name="btnFav">Yêu thích
				<span class="badge badge-danger">{!! $fav->count() !!}</span>
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
											{!! $item->name !!}  <span class="badge badge-default new-old-product"> {!! ($item->status == 0)?"Mới":"Cũ" !!}
											</span>
										</h5>
									</a>
									<?php $cate = $cateModel->getCateById($item->cate_id); ?>
									<p>Category: {!! $cate->name !!}</p>
									<a href="{{route('getMatch',[$state,$item->id])}}">Kết quả matching.</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $item->place !!}</p>
						</div>
						<div class="col-lg-3 col-sm-4 text-right">
							<h3>{!! number_format($item->price,0,",",".")." VNĐ" !!}</h3>
						</div>
						<div class="col-lg-1 text-right">
							<a class="btn btn-warning" href="{{route('Home')}}" name=""><h3>Sửa</h3></a>
						</div>
						<div class="col-lg-1 text-right">
							<a class="btn btn-danger" href="{{route('getDeleteProduct',[$state,$item->id])}}" name="" onclick="return confirmation('Có xóa {!! $item->name !!} không?')"><h3>Xóa</h3></a>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		@elseif($state == 'order')
			<div class="btn-group-justified m-auto">
				<a class="btn btn-primary" href="{{route('MyStore','stock')}}" name="btnStock">Kho hàng 
				<span class="badge badge-danger">{!! $stock->count() !!}</span>
				</a>
				<a class="btn btn-primary active" href="{{route('MyStore','order')}}" name="btnOrder">Đơn hàng 
				<span class="badge badge-danger">{!! $order->count() !!}</span>
				</a>
				<a class="btn btn-primary" href="{{route('MyStore','favorite')}}" name="btnFav">Yêu thích
				<span class="badge badge-danger">{!! $fav->count() !!}</span>
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
											{!! $item->name !!}  <span class="badge badge-default new-old-product"> {!! ($item->status == 0)?"Mới":"Cũ" !!}
											</span>
										</h5>
									</a>
									<?php $cate = $cateModel->getCateById($item->cate_id); ?>
									<p>Category: {!! $cate->name !!}</p>
									<a href="{{route('getMatch',[$state,$item->id])}}">Kết quả matching.</a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $item->place !!}</p>
						</div>
						<div class="col-lg-3 col-sm-4 text-right">
							<h3>{!! number_format($item->price,0,",",".")." VNĐ" !!}</h3>
						</div>
						<div class="col-lg-1 text-right">
							<a class="btn btn-warning" href="{{route('Home')}}" name=""><h3>Sửa</h3></a>
						</div>
						<div class="col-lg-1 text-right">
							<a class="btn btn-danger" href="{{route('getDeleteProduct',[$state,$item->id])}}" name="" onclick="return confirmation('Có xóa {!! $item->name !!} không?')"><h3>Xóa</h3></a>
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
				<a class="btn btn-primary" href="{{route('MyStore','order')}}" name="btnOrder">Đơn hàng 
				<span class="badge badge-danger">{!! $order->count() !!}</span>
				</a>
				<a class="btn btn-primary active" href="{{route('MyStore','favorite')}}" name="btnFav">Yêu thích
				<span class="badge badge-danger">{!! $fav->count() !!}</span>
				</a>
			</div>
			<div class="col-lg-12 p-0 m-0">
				@foreach($fav as $key)
					<?php
						$item = App\Models\Stock::find($key->stock_id);
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock'])
				@endforeach
				<?php $page = $fav; ?>
				<nav aria-label="Page navigation">
					<ul class="pagination">
						@if ($page->currentPage() != 1)
						<li class="page-item"><a class="page-link" href="{!! $page->url($page->currentPage() - 1) !!}">Trước</a></li>
						@endif
						@for ($i = 1; $i <= $page->lastPage(); $i = $i + 1)
						<li class="page-item {!! ($page->currentPage() == $i)?'active':'' !!}">
							<a class="page-link" href="{!! $page->url($i) !!}">{!! $i !!}</a>
						</li>
						@endfor
						@if ($page->currentPage() != $page->lastPage())
						<li class="page-item"><a class="page-link" href="{!! $page->url($page->currentPage() + 1) !!}">Sau</a></li>
						@endif
					</ul>
				</nav>
			</div>
		@endif
		</div>
	</div><br>
@endsection

@section('scripts')
    <script src="{{asset('public/js/admin/admin.js')}}"></script>
@endsection