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
								<p>Category: {!! $cate->name !!}<br>
								Kết quả matching: {!! $data->count() !!}
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
			@foreach($data as $item)
			<div class="card card-block listV-item">
				<div class="row">
					<div class="col-lg-4 col-sm-12">
						<div class="media">
							<div class="media-left">
								<img src="{{ asset('resources/upload/'.$result_type.'s/'.$result_type.'-'.$item->id.'/'.$item->img) }}" class="media-object img-thumbnail avatar"/>
							</div>
							<div class="media-body ml-2">
								<a href="{{route($result_type.'Detail',$item->id)}}">
									<h5 class="media-heading">
										{!! $item->name !!}  <span class="badge badge-default new-old-product"> {!! ($item->status == 0)?"Mới":"Cũ" !!}
										</span>
									</h5>
								</a>
								<?php
									$user = $userModel->getDetailUserByUserID($item->user_id);
									$cate = $cateModel->getCateById($item->cate_id);
								?>
								<p>Category: {!! $cate->name !!}</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-sm-12">
						<div class="row">
						<div class="media col-lg-12 col-sm-6">
							<div class="media-left">
								<img src="{{ asset('resources/upload/user/'.$user->avatar) }}" class="media-object rounded-circle user-avatar"/>
							</div>
							<div class="media-body">
								<h5 class="media-heading"> {!! $user->username!!}</h5>
							</div>
						</div>
						<div class="btn-group col-lg-12 col-sm-6">
							<ul class="list-inline" name="rating">
								<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li class="list-inline-item"><a class=""><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $item->place !!}</p>
					</div>
					<div class="col-lg-3 col-sm-6 text-right">
						<h3>{!! number_format($item->price,0,",",".")." VNĐ" !!}</h3>
					</div>
				</div>
			</div>
			@endforeach
			<?php $page = $data; ?>
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
		</div>
	</div><br>
@endsection

@section('scripts')

@endsection