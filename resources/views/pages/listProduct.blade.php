<!--
Created by: Nguyen Le Duy
Date: 23/03/2017
-->

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	@include('utils.searchForm')
	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-12">
				@if ($id != 0)
				<ol class="breadcrumb" id="path">
					<li class="breadcrumb-item"><a href="{{route('Home')}}">Trang Chủ</a></li>
					<?php 
						$cate = $cateModel->getCateById($id);
						echo "<li class=\"breadcrumb-item active\">$cate->name</li>"
					?>
				</ol>
				@endif
			</div>
		</div>
		<div class="row mt-2">
			@if ($state == 'stock')
				<?php $page = $stock; ?>
				<div class="col-lg-12 p-0 m-0">
					<h1>Kho hàng</h1>
					@foreach($stock as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Stock",'type' => 'stock'])
					@endforeach
				</div>
			@elseif ($state == 'order')
				<?php $page = $order; ?>
				<div class="col-lg-12 p-0 m-0">
					<h1>Đơn hàng</h1>
					@foreach($order as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Order",'type' => 'order'])
					@endforeach
				</div>
			@else
				<?php
					if ($stock->lastPage() > $order->lastPage()) {
						$page = $stock;
					}
					else {
						$page = $order;
					}
				?>
				<div class="col-lg-12 p-0 m-0">
					<h1>Kho hàng</h1>
					@foreach($stock as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Stock",'type' => 'stock'])
					@endforeach
				</div>
				<div class="col-lg-12 p-0 m-0">
					<h1>Đơn hàng</h1>
					@foreach($order as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Order",'type' => 'order'])
					@endforeach
				</div>
			@endif
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
	</div><br>
@endsection

@section('scripts')

@endsection