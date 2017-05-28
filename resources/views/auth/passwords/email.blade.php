@extends('layouts.master')
@section('content')
<br>
<div class="container">
<div class="row">
  <div class="col col-md-5 forget-pass" style="margin: auto; min-height: 350px;">
    <div class="card">
      @if(session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      @include('errors.input')
      <br>
      <h3 class="card-header">Khôi phục Mật khẩu</h3>
      <div class="card-block">
        {!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, ['class' => 'form-control']) }}
        <br>
        {{ Form::submit('Gửi', ['class' => 'btn btn-primary']) }}

        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
</div>
<br>
@endsection()