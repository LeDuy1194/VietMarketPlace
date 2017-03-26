<!--Created by: Nguyen Le Duy
Date: 23/03/2017
-->
<div class="card card-block listV-item p-2">
	<div class="row">
		<div class="col-lg-4 col-sm-12">
			<div class="media">
				<div class="media-left">
					<img src="{{ asset('resources/upload/'.$item->img) }}" class="media-object img-thumbnail avatar"/>
				</div>
				<div class="media-body ml-1">
					<a href="{{route($state.'Detail',$item->id)}}"><h5 class="media-heading">{!! $item->name !!}</h5></a>
					<p>
						Danh Mục:
						<a href="{{route('listByCate',[$cate->id,'all'])}}">{!! $cate->name !!}</a>
					</p>
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
		<div class="col-lg-1 col-sm-2 text-right">
		@if (($state == 'stock')||($state == 'Stock'))
			<button type="button" class="btn btn-warning" title="Thêm vào danh sách yêu thích."><i class="fa fa-heart-o" aria-hidden="true"></i></button>
		@endif
		</div>
		<div class="col-lg-2 col-sm-4 text-right pl-0">
			<h3>{!! number_format($item->price,0,",",".")." VNĐ" !!}</h3>
		</div>
	</div>
</div>