@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      {{--<form role="form" action="{!!url('password/reset')!!}" method="POST">
        <input type="hidden" name="_token" value="{!!csrf_token()!!}"/>
        <input type="hidden" name="token" value="{!! $token !!}"/>
        <h3 class="card-header">Khôi phục Mật khẩu</h3>
        <div class="card-block">
          <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" class="form-control" placeholder="Địa chỉ Email" id="email" name="email" value="{!! $email !!}" />
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu: </label>
            <input type="password" class="form-control" placeholder="Mật khẩu ít nhất 6 ký tự" id="password" name="password" />
          </div>
          <div class="form-group">
            <label for="password-confirmation">Nhập lại mật khẩu: </label>
            <input type="password" class="form-control" placeholder="Địa chỉ Email" id="password-confirmation" name="password-confirmation" />
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-account">Khôi phục mật khẩu.</button>
          </div>
        </div>
      </form>--}}

      <h3 class="card-header">Reset Password - Confirmation</h3>
      <div class="card-block">
        {!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}

        {{ Form::hidden('token', $token) }}

        {{ Form::label('email', 'Email:') }}
        {{ Form::email('email', $email, ['class' => 'form-control']) }}

        {{ Form::label('password', 'Mật khẩu:') }}
        {{ Form::password('password', ['class' => 'form-control']) }}

		{{ Form::label('password_confirmation', 'Nhập lại mật khẩu:') }}
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

        {{ Form::submit('Xác nhận', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endsection()