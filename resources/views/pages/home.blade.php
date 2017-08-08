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
				<div class="list-products-thumbnail">
					<h2 class="title-section-home bd-green">Tin rao bán</h2>
					<div class="row list-products-thumbnail">
					@foreach($stock as $item)
						<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
						$vote = $reviewModel->getAverageVote($item->user_id);
						if ($author != NULL) {
							$fav = $favModel->getFav($author->id,$item->id);
							$fav != NULL ? $favCheck = true : $favCheck = false;
						}
						else {
							$favCheck = false;
						}
						?>
						@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote, 'fav' => $favCheck])
					@endforeach
					</div>
				</div>
			<div class="show-more">
				<button type="button" class="btn btn-success btn-show-more-custom"><a href="{{route('listByCate',[0])}}" class="text-center"><h3>Xem thêm</h3></a></button>
			</div>


				<div class="list-products-thumbnail">
					<h2 class="title-section-home bd-blue">Tin tìm mua</h2>
					<div class="row list-products-thumbnail">
					@foreach($order as $item)
						<?php
						$user = $userModel->getDetailUserByUserID($item->user_id);
						$cate = $cateModel->getCateById($item->cate_id);
						$vote = $reviewModel->getAverageVote($item->user_id);
						if ($author != NULL) {
							$favO = $favOModel->getFav($author->id,$item->id);
							$favO != NULL ? $favCheck = true : $favCheck = false;
						}
						else {
							$favCheck = false;
						}
						?>
						@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote,'fav' => $favCheck])
					@endforeach
					</div>
				</div>
			<div class="show-more">
				<button type="button" class="btn btn-primary btn-show-more-custom"><a href="{{route('listByCate',[0])}}" class="text-center title-show-more"><h3>Xem thêm</h3></a></button>
			</div>
	</div>
@endsection

@section('scripts')

@endsection