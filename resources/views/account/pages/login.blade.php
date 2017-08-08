@extends('layouts.master')
@section('content')
<br>
<div class="container">
	<div class="row">
		<div class="col col-md-4 text-center">
			@include('utils.message')
			@include('errors.input')

			<form role="form" action="{!!route('postLogin')!!}" method="POST">
				<input type="hidden" name="_token" value="{!!csrf_token()!!}">
				<h2>Đăng nhập vào VietMarketPlace</h2>
				<h4>Kho hàng Trực tuyến Khổng lồ</h4>
				<br>
				<div class="form-group">
					<input type="email" class="form-control" placeholder="Địa chỉ Email" id="email" name="email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Mật khẩu" id="password" name="password">
				</div>
				<div>
					<a style="color: #000;" href="{{url('password/reset')}}"> <em>* Quên mật khẩu ?</em></a>
				</div>
				<div>
					<CENTER>
						<button type="submit" class="btn btn-lg btn-primary">
							Đăng nhập
						</button>
						Hoặc
					</CENTER>
				</div>
				<center><a style="color: #000;" href="{{url('register')}}"> <em>Tạo tài khoản mới</em></a></center>
			</form>
		</div>
		<div class="col col-md-8">
			<figure class="figure">
  				<img src="../public/img/imglogin.png" class="figure-img img-fluid rounded" alt="guide">
			</figure>
		</div>
	</div>
</div> <br>
@endsection()