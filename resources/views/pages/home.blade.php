<!--
Author: Nguyen Le Duy
Create_at: 17/02/2017
Update_at: 27/03/2017 by Anh Pham
-->

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	@include('utils.searchForm')
	<div class="container-fluid page-custom page-home">
		<div class="row mt-2 list-content-home">
			<div class="col-list-products">
				@include('utils.message')
				<h2>Kho hàng</h2>
				@foreach($stock as $item)
                    <?php
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    ?>
					@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock'])
				@endforeach
			</div>
			<div class="show-more">
				<a href="{{route('listByCate',[0,'stock'])}}" class="text-center"><h3>Xem thêm...</h3></a>
			</div>

			<div class="col-list-products">
				<h2>Đơn hàng</h2>
				@foreach($order as $item)
                    <?php
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    ?>
					@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order'])
				@endforeach
			</div>
			<div class="show-more">
				<a href="{{route('listByCate',[0,'order'])}}" class="text-center"><h3>Xem thêm...</h3></a>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection