{{--
Created by: Lê Duy
Date: 10/04/2017
--}}
@extends('layouts.master')
@section('meta-title')
	MyMark
@endsection
@section('content')
	@include('utils.advertise')
	<div class="container my-wish-page">
		@include('utils.message')
		<ul class="nav nav-pills list-tab-custom" id="wish-list-tabs" role="tablist">
			<li class="nav-item nav-custom">
				<a class="nav-link active" href="#wishStock" name="btnStock">Tin rao bán
					<span class="badge badge-danger">{!! $fav->total() !!}</span>
				</a>
			</li>
			<li class="nav-item nav-custom">
				<a class="nav-link" href="#wishOrder" name="btnOrder">Tin tìm mua
					<span class="badge badge-danger">{!! $favO->total() !!}</span>
				</a>
			</li>
		</ul>
		<div class="tab-content tab-content-custom">
			<div class="row tab-pane active" id="wishStock" role="tabpanel">
				@if ($fav->total() == 0)
					<div class="alert alert-danger msg-custom" role="alert">
						<strong>Oh no!</strong> Hình như bạn chưa quan tâm sản phẩm nào cả. Bạn có thể quay lại <a href="/" class="link-home-custom">trang chủ</a> và thêm các sản phẩm quan tâm vào danh sách sau nha!
					</div>
				@endif
				@foreach($fav as $key)
                    <?php
                    $item = App\Models\Stock::find($key->stock_id);
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    $vote = $reviewModel->getAverageVote($item->user_id);
                    ?>
					@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote,'fav' => true])
				@endforeach
				@if ($fav->lastPage() > 1)
					<nav aria-label="Page navigation">
						<ul class="pagination">
							@if ($fav->currentPage() != 1)
								<li class="page-item"><a class="page-link" href="{!! $fav->appends(['order' => $favO->currentPage()])->url($fav->currentPage() - 1) !!}">Trước</a></li>
							@endif
							@for ($i = 1; $i <= $fav->lastPage(); $i = $i + 1)
								<li class="page-item {!! ($fav->currentPage() == $i)?'active':'' !!}">
									<a class="page-link" href="{!! $fav->appends(['order' => $favO->currentPage()])->url($i) !!}">{!! $i !!}</a>
								</li>
							@endfor
							@if ($fav->currentPage() != $fav->lastPage())
								<li class="page-item"><a class="page-link" href="{!! $fav->appends(['order' => $favO->currentPage()])->url($fav->currentPage() + 1) !!}">Sau</a></li>
							@endif
						</ul>
					</nav>
				@endif
			</div>
			<div class="row tab-pane" id="wishOrder" role="tabpanel">
				@if ($favO->total() == 0)
					<div class="alert alert-danger msg-custom" role="alert">
						<strong>Oh no!</strong> Hình như bạn chưa quan tâm sản phẩm nào cả. Bạn có thể quay lại <a href="/" class="link-home-custom">trang chủ</a> và thêm các sản phẩm quan tâm vào danh sách sau nha!
					</div>
				@endif
				@foreach($favO as $key)
                    <?php
                    $item = App\Models\Order::find($key->order_id);
                    $user = $userModel->getDetailUserByUserID($item->user_id);
                    $cate = $cateModel->getCateById($item->cate_id);
                    $vote = $reviewModel->getAverageVote($item->user_id);
                    ?>
					@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote,'fav' => true])
				@endforeach
				@if ($favO->lastPage() > 1)
					<nav aria-label="Page navigation">
						<ul class="pagination">
							@if ($favO->currentPage() != 1)
								<li class="page-item"><a class="page-link" href="{!! $favO->appends(['stock' => $fav->currentPage()])->url($favO->currentPage() - 1) !!}">Trước</a></li>
							@endif
							@for ($i = 1; $i <= $favO->lastPage(); $i = $i + 1)
								<li class="page-item {!! ($favO->currentPage() == $i)?'active':'' !!}">
									<a class="page-link" href="{!! $favO->appends(['stock' => $fav->currentPage()])->url($i) !!}">{!! $i !!}</a>
								</li>
							@endfor
							@if ($favO->currentPage() != $favO->lastPage())
								<li class="page-item"><a class="page-link" href="{!! $favO->appends(['stock' => $fav->currentPage()])->url($favO->currentPage() + 1) !!}">Sau</a></li>
							@endif
						</ul>
					</nav>
				@endif
			</div>
		</div>
@endsection

@section('scripts')

@endsection