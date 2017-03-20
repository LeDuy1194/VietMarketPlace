@extends('account.master')
@section('content')
<div class="col-md-4">
	<form role="form" action="{!!route('postLogin')!!}" method="POST">
		<input type="hidden" name="_token" value="{!!csrf_token()!!}">
		<h1>Đăng nhập vào VietMarketPlace</h1>
		<h3>Kho hàng Trực tuyến Khổng lồ</h3>
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Địa chỉ Email" id="email" name="email">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Mật khẩu" id="password" name="password">
		</div>
		<div>
			<a style="color: #000;" href="{{url('reset')}}"> <em>* Quên mật khẩu ?</em></a>
		</div>
		<div>
			<CENTER>
				<button type="submit" class="btn btn-lg btn-account">
					Đăng nhập
				</button>
				Hoặc
			</CENTER>
		</div>
		<center><a style="color: #000;" href="{{url('register')}}"> <em>Tạo tài khoản mới</em></a></center>
	</form>
</div>
@endsection()