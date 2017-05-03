<!--
Author: Anh Phạm
Create_at: 17/02/2017
Update_at: 27/03/2017 by Anh Pham
-->

@extends('layouts.master')
@section('meta-title')
	Home
@endsection
@section('content')
	@include('utils.advertise')
	@include('utils.searchForm')

	<div class="container homepage-custom">
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
				<button type="button" class="btn btn-success btn-show-more-custom"><a href="{{route('listByCate',[0,'stock'])}}" class="text-center"><h3>Xem thêm...</h3></a></button>
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
				<button type="button" class="btn btn-primary btn-show-more-custom"><a href="{{route('listByCate',[0,'order'])}}" class="text-center title-show-more"><h3>Xem thêm...</h3></a></button>
			</div>
	</div>
@endsection

@section('scripts')

@endsection