@extends('layouts.master')
@section('content')
<br>
<div class="container">
<div class="row">
  <div class="col col-md-6 reset-pass" style="margin: auto;">
    <div class="card">
      @if(session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      @include('errors.input')
      <br>
      <h3 class="card-header">Nhập Mật Khẩu Mới</h3>
      <div class="card-block">
        {!! Form::open(['url' => 'password/reset', 'method' => "POST"]) !!}

        {{ Form::hidden('token', $token) }}

        {{ Form::label('email', 'Email*') }}
        {{ Form::email('email', $email, ['class' => 'form-control']) }}<br>

        {{ Form::label('password', 'Mật khẩu*') }}
        {{ Form::password('password', ['class' => 'form-control']) }}<br>

        {{ Form::label('password_confirmation', 'Nhập lại mật khẩu*') }}
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}<br>

        {{ Form::submit('Xác nhận', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
</div>
<br>
@endsection()