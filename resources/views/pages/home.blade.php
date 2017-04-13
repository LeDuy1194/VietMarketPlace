<!--
Author: Anh Phạm
Create_at: 17/02/2017
Update_at: 27/03/2017 by Anh Pham
-->

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	@include('utils.searchForm')
	<div class="container">
				<div class="row list-products-thumbnail">
					<h2 class="title-section-home bd-green">Kho hàng</h2>
				@foreach($stock as $item)
                    <?php
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    $vote = $reviewModel->getAverageVote($item->user_id);
                    ?>
					@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote])
				@endforeach
				</div>
			<div class="show-more">
				<a href="{{route('listByCate',[0,'stock'])}}" class="text-center"><h3>Xem thêm...</h3></a>
			</div>


				<div class="row list-products-thumbnail">
					<h2 class="title-section-home bd-blue">Đơn hàng</h2>
				@foreach($order as $item)
                    <?php
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    $vote = $reviewModel->getAverageVote($item->user_id);
                    ?>
					@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote])
				@endforeach
				</div>
			<div class="show-more">
				<a href="{{route('listByCate',[0,'order'])}}" class="text-center title-show-more"><h3>Xem thêm...</h3></a>
			</div>
	</div>
@endsection

@section('scripts')

@endsection