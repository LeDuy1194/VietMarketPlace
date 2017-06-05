<?php
/**
 * Created by PhpStorm.
 * User: nobikun1412
 * Date: 04-Jun-17
 * Time: 17:17
 */
?>
@extends('mails.layout.master')
@section('meta-title')
    Home
@endsection
@section('content')
<h1>Chào {{ $dataUser['username'] }}!</h1>
<p>Bạn có 1 tin rao bán <a href="http://vietmarketplace.dev/stock-detail/{{ $dataPost->id }}"><strong>{{ $dataPost->name }}</strong></a> sắp hết hạn!</p>

@endsection

@section('scripts')

@endsection