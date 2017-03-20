@extends('account.master')
@section('content')
<div class="col-md-4">
	<form role="form" action="{!!route('postRegister')!!}" method="POST">
		<input type="hidden" name="_token" value="{!!csrf_token()!!}">
		<h1>Tạo Tài khoản Mới</h1>
		<h3>Cam kết miễn phí trọn đời</h3>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Tài khoản" id="name" name="username">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Địa chỉ Email" id="email" name="email">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Mật khẩu" id="password" name="password">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Nhập lại Mật khẩu" id="password" name="password">
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" required> Tôi đã đọc và đồng ý với các khoản <em>Điều lệ Sử dụng</em> and <em>Quyền Riêng tư</em>
			</label>
		</div>
		<CENTER><button type="submit" class="btn btn-lg btn-account">
			Tạo tài khoản
		</button></CENTER>

		<div>
			<center>
				Bạn đã có tài khoản?
				<a style="color: #000; font-weight: bold;" href="{{url('login')}}">Đăng nhập</a>
			</center>
		</div>
	</form>
</div>
@endsection()