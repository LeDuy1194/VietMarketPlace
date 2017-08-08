@extends('layouts.master')
@section('css')	
	<link rel="stylesheet" href="{{asset('public/css/client/accountstyle.css')}}"/>
@endsection
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('utils.message')
				@include('errors.input')
				<br>
				<div class="row">
					<div class="col-md-4">
						<div class="card @if($data->level == 1) card-vip-avatar-user @endif">
							<div class="card-block">
								<center>
									<div class="img-avatar-profile-page">
										<img alt="{!! $data->username !!}" src="../resources/upload/user/{!! $data->avatar !!}" class="img-circle">
									</div>
									@if($data->level == 1)
										<div class="img-vip-user-profile">
											<img alt="VIP" src="../public/img/original/vip.png" class="img-vip-user">
										</div>
									@endif
									<h3 class="text-center">
										{!! $data->usernname !!}
									</h3>
								</center>
								<div class="row text-center">
									<div class="col-md-6">
										<dl>
											<dt>
												Họ &amp tên
											</dt>
											<dd>
												{!! $data->fullname !!}
											</dd>
											<dt>
												Email
											</dt>
											<dd>
												{!! $data->email !!}
											</dd>
										</dl>
									</div>
									<div class="col-md-6">
										<dl>
											<dt>
												Danh tiếng
											</dt>
											<dd>
												<i class="fa fa-thumbs-up" aria-hidden="true"></i> {!! number_format($vote*100,0) !!}&#37
											</dd>
											<dt>
												Điện thoại
											</dt>
											<dd>
												{!! $data->phone !!}
											</dd>
										</dl>
									</div>
								</div>
								<div class="row text-center">
									<div class="col-md-12">
										<dl class="dl">
											<dt>
												Địa chỉ
											</dt>
											<dd>
												{!! $data->address !!}
											</dd>
										</dl>
									</div>
								</div>

								@if(Auth::id()==$data->id)
									@if($data->level == 0)
									<div class="upgrade-account-custom">
										<button class="btn btn-primary btn-show-upgrade-info" data-toggle="modal" data-target=".modal-info-vip">Nâng cấp tài khoản</button>
										<div class="modal fade modal-info-vip" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="modal-info-vip-itle">Quyền lợi VIP</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<ul class="vip-detail-info">
															<li>Số lượng bài đăng: 10</li>
															<li>Bài đăng nằm trong Danh sách các tin nổi bật (Trang chủ)</li>
															{{--<li>Tăng thời lượng tự động xóa tin lên 30 ngày</li>--}}
															<li>Tài khoản có khung riêng biệt: Viền Avatar màu vàng,  sau tên tài khoản ở các trang có chữ VIP</li>
														</ul>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
														<form action="{{url('payment')}}" method="POST" role="form">
															{{csrf_field()}}
															<button type="submit" class="btn btn-primary btn-upgrade-vip">Nâng cấp tài khoản</button>
														</form>
														{{--<button type="button" class="btn btn-primary">Save changes</button>--}}
													</div>
												</div>
											</div>
										</div>

									</div>
									@endif
									<div class="change-info-custom">
										<a href="#" class="btn btn-block btn-pf" type="button" data-toggle="modal" data-target="#editProfile">Sửa thông tin</a>
										<!-- Modal -->
										<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<!-- Modal content-->
												<div class="modal-content">

													<div class="modal-header">
														<h4 class="modal-title" id="exampleModalLabel">Thông tin của bạn</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-body">
														<form role="form" id="update_profile_form" action="{{route('editProfile', $data->id)}}" method="POST" enctype="multipart/form-data">
															<input type="hidden" name="_token" value="{!!csrf_token()!!}">
															<div class="input-group">
																<span class="input-group-addon" id="addon-fullname">Họ &amp tên</span>
																<input type="text" class="form-control" value="{!! $data->fullname !!}" placeholder="Họ tên" id="fullname" name="fullname" aria-describedby="addon-fullname">
															</div>
															<br />
															<div class="input-group">
																<span class="input-group-addon" id="addon-username">Nickname</span>
																<input type="text" class="form-control" value="{!! $data->username !!}" id="username" name="username" aria-describedby="addon-username">
															</div>
															<br />
															<div class="input-group">
																<span class="input-group-addon" id="addon-phone">Điện thoại</span>
																<input type="text" class="form-control" value="{!! $data->phone !!}" id="phone" name="phone" aria-describedby="addon-phone">
															</div>
															<br />
															<div class="input-group">
																<span class="input-group-addon" id="addon-email">Email</span>
																<input type="text" class="form-control" value="{!! $data->email !!}" id="email" aria-describedby="addon-email" readonly>
															</div>
															<br />
															<div class="input-group">
																<span class="input-group-addon" id="addon-address">Địa chỉ</span>
																<input type="text" class="form-control" value="{!! $data->address !!}" id="address" name="address" aria-describedby="addon-address">
															</div>
															<br />
															<div class="input-group">
																<span class="input-group-addon" id="addon-avatar">Ảnh đại diện</span>
																<input type="file" class="form-control" id="avatar" name="avatar" value="{!! old('avatar', isset($data) ? $data->avatar : null) !!}" onchange="readURL(this);" aria-describedby="addon-avatar"/>
															</div>
															<div class="input-group form-upload-img-custom">
                                    							<img id="avatar-preview" class="img-circle" src="../resources/upload/user/{!! $data->avatar !!}" alt="Ảnh đại diện" />
															</div>
															<br />
														</form>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-success" form="update_profile_form">Lưu &amp Thoát</button>
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
													</div>
												</div>

											</div>
										</div>
									</div>
									{{--<a href="#" class="btn btn-block btn-pf" type="button" data-toggle="modal" data-target="#editpw">Đổi Mật Khẩu</a>
									<!-- Modal -->
									<div id="editpw" class="modal fade" role="dialog">
										<div class="modal-dialog">

											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title text-center">Đổi Mật Khẩu</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>

												</div>
												<div class="modal-body">
													<div class="form-group">
														<input type="password" class="form-control" placeholder="Mật Khẩu Hiện Tại" id="password">
													</div>
													<div class="form-group">
														<input type="password" class="form-control" placeholder="Mật Khẩu Mới" id="password">
													</div>
													<div class="form-group">
														<input type="password" class="form-control" placeholder="Nhập Lại Mật Khẩu Mới" id="password">
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-success" data-dismiss="modal">Lưu &amp Thoát</button>
												</div>
											</div>

										</div>
									</div>--}}
								@endif
							</div>
						</div>
						<br>
						{{--<div class="">
							<div class="list-group">
								<a href="#" class="list-group-item active">
									Đánh Giá
								</a>
								<a href="#" class="list-group-item list-group-item-action">Nháp</a>
							</div>
						</div>--}}
					</div>

					<div class="col-md-8">
						<div class="card">
							<div class="card-block">
								<h4>
									Đánh Giá
								</h4>
							</div>
						</div>
						<br>
						@foreach($review as $info)
							<div class="card">
								<div class="card-block">
									<div class="media">
                                        <?php $guest=$userModel->getDetailUserByUserID($info->voting_user_id) ?>
										<img class="d-flex mr-3 img-circle" src="../resources/upload/user/{{$guest->avatar}}" alt="Generic placeholder image">
										<div class="media-body">
											<blockquote>
												@if($info->vote == 1)
													<h4><i class="fa fa-thumbs-up" aria-hidden="true"> {!! $info->comment !!}</i></h4>
												@else
													<h4><i class="fa fa-thumbs-down" aria-hidden="true"> {!! $info->comment !!}</i></h4>
												@endif
												<small>{!! $guest->username !!} <br>
													<em>
														<time datetime="">{!! $info->created_at !!}</time>
													</em>
												</small>
											</blockquote>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#" + input.name + "-preview")
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection