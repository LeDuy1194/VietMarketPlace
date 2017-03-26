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
				<h1>Kho hàng</h1>
				<div class="col-lg-12 p-0 m-0">
					@foreach($stock as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Stock"])
					@endforeach
				</div>
			@elseif ($state == 'order')
				<h1>Đơn hàng</h1>
				<div class="col-lg-12 p-0 m-0">
					@foreach($order as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Order"])
					@endforeach
				</div>
			@else
				<h1>Kho hàng</h1>
				<div class="col-lg-12 p-0 m-0">
					@foreach($stock as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Stock"])
					@endforeach
				</div>
				<h1>Đơn hàng</h1>
				<div class="col-lg-12 p-0 m-0">
					@foreach($order as $item)
					<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
					?>
					@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'state' => "Order"])
					@endforeach
				</div>
			@endif
		</div>
	</div><br>
@endsection

@section('scripts')

@endsection