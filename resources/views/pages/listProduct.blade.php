{{--
Created by: Nguyen Le Duy
Date: 23/03/2017
--}}

@extends('layouts.master')
@section('meta-title')
	ListProduct
@endsection
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
					<h2 class="title-section-home bd-green">Tin rao bán <span class="badge badge-danger">{!! $stock->total() !!}</span></h2>
					@foreach($stock as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
                    	$vote = $reviewModel->getAverageVote($item->user_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote])
					@endforeach
				</div>
				@if ($page->lastPage() > 1)
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
				@endif
			@elseif ($state == 'order')
				<?php $page = $order; ?>
				<div class="col-lg-12 p-0 m-0">
					<h2 class="title-section-home bd-blue">Tin tìm mua <span class="badge badge-danger">{!! $order->total() !!}</span></h2>
					@foreach($order as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
                    	$vote = $reviewModel->getAverageVote($item->user_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote])
					@endforeach
				</div>
				@if ($page->lastPage() > 1)
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
				@endif
			@else
				<div class="col-lg-12 p-0 m-0">
					<h2 class="title-section-home bd-green">Tin rao bán <span class="badge badge-danger">{!! $stock->total() !!}</span></h2>
					@foreach($stock as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
                    	$vote = $reviewModel->getAverageVote($item->user_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote])
					@endforeach
				</div>
				@if ($stock->lastPage() > 1)
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
				@endif
				<div class="col-lg-12 p-0 m-0">
					<h2 class="title-section-home bd-blue">Tin tìm mua <span class="badge badge-danger">{!! $order->total() !!}</span></h2>
					@foreach($order as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
                    	$vote = $reviewModel->getAverageVote($item->user_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote])
					@endforeach
				</div>
				@if ($order->lastPage() > 1)
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
			@endif
		</div>
	</div><br>
@endsection

@section('scripts')

@endsection