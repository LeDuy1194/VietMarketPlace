{{--
Created by: Nguyen Le Duy
Date: 17/02/2017
--}}

@extends('layouts.master')
@section('meta-title')
	MyStore
@endsection
@section('content')
	@include('utils.advertise')
	<div class="container my-store-custom">
		@include('utils.message')
		<ul class="nav nav-pills" id="store-tabs" role="tablist">
			<li class="nav-item nav-custom">
				<a class="nav-link active" href="#stock" name="btnStock">Tin rao bán
					<span class="badge badge-danger">{!! $stock->count() !!}</span>
				</a>
			</li>
			<li class="nav-item nav-custom">
				<a class="nav-link" href="#order" name="btnOrder">Tin tìm mua
					<span class="badge badge-danger">{!! $order->count() !!}</span>
				</a>
			</li>
		</ul>
		<div class="tab-content tab-content-custom">
			<div class="row tab-pane active" id="stock" role="tabpanel">
				@if ($stock->count() == 0)
					<div class="alert alert-danger msg-custom" role="alert">
						<strong>Oh no!</strong> Hình như bạn chưa có bài đăng tin rao vặt hoặc tin tìm mua nào cả. Bạn có thể tới trang <a href="{{route('getupload')}}" class="link-home-custom">đăng tin</a> và đăng tin rao vặt hoặc tin tìm mua nha! Tất cả đều MIỄN PHÍ nha!!!
					</div>
				@endif
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
						@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'stock','vote' => $vote,'fav' => $favCheck, 'matchModel' => $matchModel])
					@endforeach
			</div>
			<div class="row tab-pane" id="order" role="tabpanel">
				@if ($order->count() == 0)
					<div class="alert alert-danger msg-custom" role="alert">
						<strong>Oh no!</strong> Hình như bạn chưa có bài đăng tin rao vặt hoặc tin tìm mua nào cả. Bạn có thể tới trang <a href="{{route('getupload')}}" class="link-home-custom">đăng tin</a> và đăng tin rao vặt hoặc tin tìm mua nha! Tất cả đều MIỄN PHÍ nha!!!
					</div>
				@endif
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
						@include('utils.contentGrid',['item' => json_decode($item),'user' => json_decode($user),'cate' => json_decode($cate),'type' => 'order','vote' => $vote,'fav' => $favCheck, 'matchModel' => $matchModel])
					@endforeach
			</div>
		</div>
		{{--
		<div id="modal-matching" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Matching</h3>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
		--}}
	</div><br>
@endsection

@section('scripts')
	<script src="{{asset('public/js/admin/admin.js')}}"></script>
	<script>
		$('#store-tabs a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		})
	</script>
	<script type="text/javascript">
		// $('.btn-delete').click(function (e) {
		//	 e.stopPropagation();
		//	 var baseUrl = '<?php //echo url('/'); ?>',

		//		 url = baseUrl+'/delete/'+

		//	 var xhttp = new XMLHttpRequest();
		//	 xhttp.onreadystatechange = function() {
		//		 if (this.readyState == 4 && this.status == 200) {
		//			 document.getElementById("sugestPriceResult").innerHTML = this.responseText;
		//			 $('.btn-price').click(function(){
		//				 $('input[name="price"]').val(parseInt(this.value));
		//			 });
		//		 }
		//	 };
		//	 xhttp.open("GET", url, true);
		//	 xhttp.send();
		// });
	</script>
@endsection