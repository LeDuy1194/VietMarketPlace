<!--
Created by: Nguyen Le Duy
Date: 17/02/2017
-->

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	<div class="container">
		<div class="row mt-2">
			<div class="col-lg-12 p-0 m-0">
				<a class="btn" href="#"><h1>Kho hàng</h1></a>
				@foreach($stock as $item)
				<div class="card card-block listV-item">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="media">
								<div class="media-left">
									<img src="resources/upload/{{$item->img}}" class="media-object img-thumbnail avatar"/>
								</div>
								<div class="media-body">
									<h4 class="media-heading">{!! $item->name !!}</h4>
									<a href="{{route('StockDetail',$item->id)}}">Chi tiết sản phẩm</a>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-sm-12">
							<div class="row">
							<div class="media col-lg-12 col-sm-8">
								<?php
        							$user = $userModel->getDetailUserByUserID($item->user_id);
        						?>
								<div class="media-left">
									<img src="resources/upload/user/{{$user->avatar}}" class="media-object rounded-circle user-avatar"/>
								</div>
								<div class="media-body">
									<h5 class="media-heading">
									<?php echo $user->username; ?>
									</h5>
								</div>
							</div>
							<div class="btn-group col-lg-12 col-sm-4">
								<button type="button" class="btn"><i class="fa fa-comments-o" aria-hidden="true"></i> 100</button>
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
						<div class="col-lg-1 col-sm-2 text-right">
							<button type="button" class="btn btn-warning"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
						</div>
						<div class="col-lg-3 col-sm-4 text-right">
							<h3>{!! number_format($item->price,0,",",".")." VNĐ" !!}</h3>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="col-lg-12 p-0 m-0">
				<a class="btn" href="#"><h1>Đơn hàng</h1></a>
				@foreach($order as $item)
				<div class="card card-block listV-item">
					<div class="row">
						<div class="col-lg-4 col-sm-12">
							<div class="media">
								<div class="media-left">
									<img src="resources/upload/{{$item->img}}" class="media-object img-thumbnail avatar"/>
								</div>
								<div class="media-body">
									<h4 class="media-heading">{!! $item->name !!}</h4>
									<a href="{{route('OrderDetail',$item->id)}}">Chi tiết sản phẩm</a>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-sm-12">
							<div class="row">
							<div class="media col-lg-12 col-sm-8">
								<?php 
									$user = $userModel->getDetailUserByUserID($item->user_id);
        						?>
								<div class="media-left">
									<img src="resources/upload/user/{{$user->avatar}}" class="media-object rounded-circle user-avatar"/>
								</div>
								<div class="media-body">
									<h5 class="media-heading">
									<?php echo $user->username; ?>
									</h5>
								</div>
							</div>
							<div class="btn-group col-lg-12 col-sm-4">
								<button type="button" class="btn"><i class="fa fa-comments-o" aria-hidden="true"></i> 100</button>
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
						<div class="col-lg-1 col-sm-2 text-right">
							<button type="button" class="btn btn-warning"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
						</div>
						<div class="col-lg-3 col-sm-4 text-right">
							<h3>{!! number_format($item->priceMin,0,",",".")." - ".number_format($item->priceMax,0,",",".")." VNĐ" !!}</h3>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			
			<!-- <div class="col-lg-10">
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
					</ul>
				</nav>
			</div> -->
		</div>
	</div>
@endsection

@section('scripts')

@endsection