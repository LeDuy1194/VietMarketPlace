{{--
Created by: Nguyen Le Duy
Date: 30/03/2017
--}}

@extends('layouts.master')

@section('content')
	@include('utils.advertise')
	<div class="container">
		@include('utils.message')
		<div class="row mt-2">
		@foreach($data as $item)
			<div class="card card-block listV-item">
				<div class="row">
					<div class="col-lg-4 col-sm-12">
						<div class="media">
							<div class="media-left">
								<img src="{{ asset('resources/upload/'.$state.'s/'.$state.'-'.$item->id.'/'.$item->img) }}" class="media-object img-thumbnail avatar"/>
							</div>
							<div class="media-body ml-2">
								<a href="{{route($state.'Detail',$item->id)}}">
									<h5 class="media-heading">
										{!! $item->name !!}  <span class="badge badge-default new-old-product"> {!! ($item->status == 0)?"Mới":"Cũ" !!}
										</span>
									</h5>
								</a>
								<?php $cate = $cateModel->getCateById($item->cate_id); ?>
								<p>Category: {!! $cate->name !!}</p>
								<a href="{{route('getMatch',[$state,$item->id])}}">Kết quả matching.</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $item->place !!}</p>
					</div>
					<div class="col-lg-3 col-sm-4 text-right">
						<h3>{!! number_format($item->price,0,",",".")." VNĐ" !!}</h3>
					</div>
					<div class="col-lg-1 text-right">
						<a class="btn btn-warning" href="{{route('Home')}}" name=""><h3>Sửa</h3></a>
					</div>
					<div class="col-lg-1 text-right">
						<a class="btn btn-danger" href="{{route('getDeleteProduct',[$state,$item->id])}}" name="" onclick="return confirmation('Có xóa {!! $item->name !!} không?')"><h3>Xóa</h3></a>
					</div>
				</div>
			</div>
		@endforeach
		</div>
	</div><br>
@endsection

@section('scripts')

@endsection