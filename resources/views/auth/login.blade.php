@extends('auth.master')
@section('meta-title', 'Đăng nhập')
@section('top-information')
@stop
@section('content')
<div class="container-fluid">
	<div class="row align-items-center">
		<div class="col-md-4 offset-md-4">
			<form action="{{url('login')}}" method="POST" role="form" id="form-login">
				<legend>Đăng nhập</legend>
				@if($errors->has('errorLogin'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					{{$errors->first('errorLogin')}}
				</div>
				
				@endif
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" id="email" placeholder="Email" name="email">
					@if($errors->has('email'))
					<p style="color: red">{{$errors->first('email')}}</p>
					@endif
				</div>
				
				<div class="form-group">
					<label for="">Mật khẩu</label>
					<input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password">
					@if($errors->has('password'))
					<p style="color: red">{{$errors->first('password')}}</p>
					@endif
				</div>
				
				<!-- <div class="form-group">
					<input type="checkbox" name="remember-token"> Ghi nhớ đăng nhập
				</div> -->

				{!! csrf_field() !!}
				<button type="submit" class="btn btn-primary">Đăng nhập</button>
			</form>
			<div>
				<a style="color: #000;" href="forgotten.html"> <em>* Quên mật khẩu ?</em></a>
			</div>
		</div>
	</div>
</div>

@stop
@section('scripts')
	<script src="{{asset('public/js/client/myscripts.js')}}"></script>
@stop