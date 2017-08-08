@extends('layouts.master')
@section('content')
<div class="col-md-4">
	<form role="form" action="{!!route('postReset')!!}" method="POST">
		<input type="hidden" name="_token" value="{!!csrf_token()!!}">
		<h3>Mật khẩu Mới</h3>
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Địa chỉ Email" id="email" name="email">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Mật khẩu" id="password" name="password">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Nhập lại Mật khẩu" id="password" name="password">
		</div>
		<div>
			<CENTER>
				<button type="submit" class="btn btn-lg btn-account">
					Gửi
				</button>
			</CENTER>
		</div>
		<!-- <div>
			<center>
				Bạn đã có Tài khoản?
				<a style="color: #000; font-weight: bold;" href="{{url('login')}}">Đăng nhập</a>
			</center>
		</div> -->
	</form>
</div>
@endsection()