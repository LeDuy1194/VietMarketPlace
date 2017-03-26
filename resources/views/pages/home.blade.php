<!--
Author: Nguyen Le Duy
Create_at: 17/02/2017
Update_at: 23/03/2017
-->

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	@include('utils.searchForm')
	<div class="container">
		<div class="row mt-2">
			<div class="col-lg-12 p-0 m-0">
				<h2>Kho hàng</h2>
				@foreach($stock as $item)
				<?php
					$user = $userModel->getDetailUserByUserID($item->user_id);
					$cate = $cateModel->getCateById($item->cate_id);
				?>
				@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Stock"])
				@endforeach
				<a href="{{route('listByCate',[0,'stock'])}}" class="text-center"><h3>Xem thêm...</h3></a>
			</div>
			<div class="col-lg-12 p-0 m-0">
				<h2>Đơn hàng</h2>
				@foreach($order as $item)
				<?php
					$user = $userModel->getDetailUserByUserID($item->user_id);
					$cate = $cateModel->getCateById($item->cate_id);
				?>
				@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Order"])
				@endforeach
				<a href="{{route('listByCate',[0,'order'])}}" class="text-center"><h3>Xem thêm...</h3></a>
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