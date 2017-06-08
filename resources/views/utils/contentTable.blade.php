<!--Created by: Anh Phạm
Date: 23/03/2017
-->
<?php 
// dd($item);
?>
<div class="col-lg-12 p-0 m-0">
	<div class="card card-block listV-item p-2">
	<div class="row list-products-table">
		<div class="col-lg-4 col-sm-12">
			<div class="media">
				<div class="media-left">
					<img src="{{ asset('resources/upload/'.$type.'s/'.$type.'-'.$item->id.'/'.$item->img) }}" class="media-object img-thumbnail avatar"/>
				</div>
				<div class="media-body ml-1">
					<a href="{{route($type.'Detail',$item->id)}}"><h5 class="media-heading">{!! $item->name !!}</h5></a>
					<p>
						Danh Mục:
						<a href="{{route('listByCate',[$cate->id,'all'])}}">{!! $cate->name !!}</a>
					</p>
					<div class="badge badge-default {!! ($item->status == 0)?"new-product":"old-product" !!}">{!! ($item->status == 0)?"Hàng mới":"Hàng cũ" !!}</div>
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
					<a href="{!! url('profile', [$user->username]) !!}" >
						<h5 class="media-heading"> {!! $user->username!!}</h5>
					</a>
				</div>
			</div>
			<div class="btn-group col-lg-12 col-sm-6">
				<h5><i class="fa fa-thumbs-up" aria-hidden="true"></i> {!! number_format($vote*100,0) !!}&#37</h5>
			</div>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<p><i class="fa fa-street-view" aria-hidden="true"></i> {!! $item->place !!}, {!! $item->district !!}, {!! $item->city !!}</p>
		</div>
		<div class="col-lg-1 col-sm-2 text-right btn-favorite-product">
			@if ($fav == true)
			<a class="btn btn-warning btn-favorite xem-sau" title="Xem sau." href="{{route('favorite',[$type,$item->id])}}">
				<i class="fa fa-heart" aria-hidden="true"></i>
				<!-- <i class="fa fa-heart" aria-hidden="true"></i> -->
			</a>
			@else
			<a class="btn btn-warning btn-favorite" title="Xem sau." href="{{route('favorite',[$type,$item->id])}}">
				<i class="fa fa-heart-o" aria-hidden="true"></i>
				{{$fav}}
				<!-- <i class="fa fa-heart" aria-hidden="true"></i> -->
			</a>
			@endif
		</div>
		<div class="col-lg-2 col-sm-4 text-right pl-0">
			<h3 class="price-product-item">{!! number_format($item->price,0,",",".") !!}</h3>
			<sup class="currency-price">đ</sup>
		</div>
	</div>
</div>
</div>