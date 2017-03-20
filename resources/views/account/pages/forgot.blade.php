@extends('account.master')
@section('content')
<div class="col-md-4">
	<form role="form" action="{!!route('postForgot')!!}" method="POST">
		<input type="hidden" name="_token" value="{!!csrf_token()!!}">
		<h3>Khôi phục Mật khẩu</h3>
		<div class="form-group">
			<input type="email" class="form-control" placeholder="Địa chỉ Email" id="email" name="email">
		</div>
		<div>
			<CENTER>
				<button type="submit" class="btn btn-lg btn-account">
					Gửi
				</button>
			</CENTER>
		</div>
		<div>
			<center>
				Bạn đã có Tài khoản?
				<a style="color: #000; font-weight: bold;" href="{{url('login')}}">Đăng nhập</a>
			</center>
		</div>
	</form>
</div>
@endsection()