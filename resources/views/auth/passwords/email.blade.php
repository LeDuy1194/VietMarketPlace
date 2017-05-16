@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      @if(session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      @include('errors.input')
      <br>
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