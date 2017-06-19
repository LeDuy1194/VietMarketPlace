<!--**************************
Created by: Anh Pham
Date: 23/02/2017
Version: 01
***************************-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>@yield('meta-title', 'VietMarket') - VietMarketPlace</title>
	<link rel="stylesheet" href="{{asset('public/libs/bootstrap/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('public/css/client/responsive.css')}}"/>
	<link rel="stylesheet" href="{{asset('public/libs/font-awesome/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('public/css/client/mystyle.css')}}"/>
	<link rel="stylesheet" href="{{asset('public/css/client/homepage.css')}}"/>
	<link rel="stylesheet" href="{{asset('public/css/client/map.css')}}"/>
	<link rel="icon" type="image/png" href="{{asset('public/img/original/fav.png')}}">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<style>
		#map {
        height: 100%;
      }
	</style>
	@yield('css')
</head>
<body>
	@include('layouts.header')
	<div role="main" class="main main-page">
		@if(Auth::check())
			<input type="hidden" data-user-id-socket="{{ Auth::user()->id }}" id="auth_id_socket">
		@endif
		@yield('top-information')

		@yield('content')

	</div>

	@include('layouts.footer')
	{{--<script src="{{asset('public/js/script.js')}}"></script>--}}
	{{--<script src="{{asset('public/libs/jquery/starscripts.js')}}"></script>--}}
	<script src="{{asset('public/libs/tether/tether.min.js')}}"></script>
	<script src="{{asset('public/libs/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('public/libs/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>
	<script src="{{asset('public/js/client/myscripts.js')}}"></script>
	<script src="{{asset('Client_socket/socketClient.js')}}"></script>
	@yield('scripts')
</body>
</html>