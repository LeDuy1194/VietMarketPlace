{{--
Created by: Nguyen Le Duy
Date: 30/03/2017
--}}

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	<div class="container">
		@include('utils.message')
		<div class="row p-0 mt-2">
			@if ($state == 'stock')
				<h2 class="title-section-home bd-green">Kho hàng</h2>
			@else
				<h2 class="title-section-home bd-blue">Đơn hàng</h2>
			@endif
			<div class="card card-block listV-item">
				<div class="row">
					<div class="col-lg-4 col-sm-12">
						<div class="media">
							<div class="media-left">
								<img src="{{ asset('resources/upload/'.$state.'s/'.$state.'-'.$base->id.'/'.$base->img) }}" class="media-object img-thumbnail avatar"/>
							</div>
							<div class="media-body ml-2">
								<a href="{{route($state.'Detail',$base->id)}}">
									<h5 class="media-heading">
										{!! $base->name !!}  <span class="badge badge-default new-old-product"> {!! ($base->status == 0)?"Mới":"Cũ" !!}
										</span>
									</h5>
								</a>
								<?php $cate = $cateModel->getCateById($base->cate_id); ?>
								<p>Category: {!! $cate->name !!}
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-7">
						<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $base->place !!}</p>
					</div>
					<div class="col-lg-4 col-sm-3 text-right">
						<h3>{!! number_format($base->price,0,",",".")." VNĐ" !!}</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row ml-2">
			<?php
				if ($state == 'stock') {
					$result_type = 'order';
				}
				elseif ($state == 'order') {
					$result_type = 'stock';
				}
			?>
			<h2 class="title-section-home">Matching <span class="badge badge-danger">{!! $data->count() !!}</span></h2>
			@foreach($data as $item)
				<?php
					$user = $userModel->getDetailUserByUserID($item->user_id);
					$cate = $cateModel->getCateById($item->cate_id);
                	$vote = $reviewModel->getAverageVote($item->user_id);
				?>
				@include('utils.contentTable',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => $result_type,'vote' => $vote])
			@endforeach
		</div>
		
		<?php $page = $data; ?>
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
	</div><br>
@endsection

@section('scripts')

@endsection