{{--
Created by: Nguyen Le Duy
Date: 23/03/2017
--}}

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	@include('utils.searchForm')
	<div class="container mt-2">
		@include('utils.message')
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
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock'])
					@endforeach
				</div>
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
			@elseif ($state == 'order')
				<?php $page = $order; ?>
				<div class="col-lg-12 p-0 m-0">
					<h1>Đơn hàng</h1>
					@foreach($order as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order'])
					@endforeach
				</div>
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
			@else
				<div class="col-lg-12 p-0 m-0">
					<h1>Kho hàng</h1>
					@foreach($stock as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock'])
					@endforeach
				</div>
				<nav aria-label="Page navigation">
					<ul class="pagination">
						@if ($stock->currentPage() != 1)
						<li class="page-item"><a class="page-link" href="{!! $stock->appends(['order' => $order->currentPage()])->url($stock->currentPage() - 1) !!}">Trước</a></li>
						@endif
						@for ($i = 1; $i <= $stock->lastPage(); $i = $i + 1)
						<li class="page-item {!! ($stock->currentPage() == $i)?'active':'' !!}">
							<a class="page-link" href="{!! $stock->appends(['order' => $order->currentPage()])->url($i) !!}">{!! $i !!}</a>
						</li>
						@endfor
						@if ($stock->currentPage() != $stock->lastPage())
						<li class="page-item"><a class="page-link" href="{!! $stock->appends(['order' => $order->currentPage()])->url($stock->currentPage() + 1) !!}">Sau</a></li>
						@endif
					</ul>
				</nav>

				<div class="col-lg-12 p-0 m-0">
					<h1>Đơn hàng</h1>
					@foreach($order as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order'])
					@endforeach
				</div>
				<nav aria-label="Page navigation">
					<ul class="pagination">
						@if ($order->currentPage() != 1)
						<li class="page-item"><a class="page-link" href="{!! $order->appends(['stock' => $stock->currentPage()])->url($order->currentPage() - 1) !!}">Trước</a></li>
						@endif
						@for ($i = 1; $i <= $order->lastPage(); $i = $i + 1)
						<li class="page-item {!! ($order->currentPage() == $i)?'active':'' !!}">
							<a class="page-link" href="{!! $order->appends(['stock' => $stock->currentPage()])->url($i) !!}">{!! $i !!}</a>
						</li>
						@endfor
						@if ($order->currentPage() != $order->lastPage())
						<li class="page-item"><a class="page-link" href="{!! $order->appends(['stock' => $stock->currentPage()])->url($order->currentPage() + 1) !!}">Sau</a></li>
						@endif
					</ul>
				</nav>
			@endif
			
		</div>
	</div><br>
@endsection

@section('scripts')

@endsection