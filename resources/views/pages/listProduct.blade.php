{{--
Created by: Nguyen Le Duy
Date: 23/03/2017
--}}

@extends('layouts.master')
@section('meta-title')
	ListProduct
@endsection
@section('content')
	<?php $cate = $cateModel->getCateById($id); ?>
	@include('utils.advertise', ['cate' => json_decode($cate), 'id' => $id])
	@include('utils.searchForm')
	<div class="container mt-2">
		@include('utils.message')
		<ul class="nav nav-pills list-tab-custom" id="list-cate-tabs" role="tablist">
				<li class="nav-item nav-custom">
					<a class="nav-link active" href="#listStock" name="btnStock">Tin rao bán
						<span class="badge badge-danger">{!! $stock->total() !!}</span>
					</a>
				</li>
				<li class="nav-item nav-custom">
					<a class="nav-link" href="#listOrder" name="btnOrder">Tin tìm mua
						<span class="badge badge-danger">{!! $order->total() !!}</span>
					</a>
				</li>
			</ul>
		<div class="tab-content tab-content-custom">
				<div class="row tab-pane active" id="listStock" role="tabpanel">
					<?php $page = $stock; ?>
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
						@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote,'fav' => $favCheck])
					@endforeach
						@if ($page->lastPage() > 1)
							<nav class="pagination-custom" aria-label="Page navigation">
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
				</div>
				<div class="row tab-pane" id="listOrder" role="tabpanel">
					<?php $page = $order;?>
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
					@if ($page->lastPage() > 1)
						<nav class="pagination-custom" aria-label="Page navigation">
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
				</div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection