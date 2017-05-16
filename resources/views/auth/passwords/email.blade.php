@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="card">
			{{-- <form role="form" action="{!!url('password/email')!!}" method="POST">
				<input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
				<h3 class="card-header">Khôi phục Mật khẩu</h3>
				<div class="card-block">
					<div class="form-group">
						<label for="email">Email: </label>
						<input type="email" class="form-control" placeholder="Địa chỉ Email" id="email" name="email"/>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-lg btn-account">Khôi phục mật khẩu.</button>
					</div>
				</div>
			</form> --}}

			<h3 class="card-header">Reset Password</h3>
			<div class="card-block">
				{!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}
				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}
				{{ Form::submit('Gửi', ['class' => 'btn btn-primary']) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@endsection()