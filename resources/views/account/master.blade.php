<!--***********************
Truong Trieu Hai
23/02/2017
***************************-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>VietMarketPlace</title>

	<meta name="description" content="Login Page">
	<meta name="author" content="ChouTruong">

	<link href="{{url('public/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('public/css/bootstrap-theme.min.css')}}" rel="stylesheet">
	<link href="{{url('public/css/client/accountstyle.css')}}" rel="stylesheet">
</head>

<header id="header" class="">
	<div class="row">
			<div class="">
				<nav class="navbar navbar-account" role="navigation">
					<div class="navbar-header">

						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{route('Home')}}">VietMarketPlace</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								
							</li>
						</ul>
					</div>

				</nav>
			</div>
		</div>
</header><!-- /header -->

<body>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-1">
					</div>
					<div class="col-md-5">
						<div class="carousel slide" id="carousel-222156">
							<ol class="carousel-indicators">
								<li class="active" data-slide-to="0" data-target="#carousel-222156">
								</li>
								<li data-slide-to="1" data-target="#carousel-222156">
								</li>
								<li data-slide-to="2" data-target="#carousel-222156">
								</li>
							</ol>
							<div class="carousel-inner carousel-account">
								<div class="item active">
									<img alt="Carousel Bootstrap First" src="{{url('public/img/1.png')}}">
								</div>
								<div class="item">
									<img alt="Carousel Bootstrap Second" src="{{url('public/img/2.jpg')}}">
								</div>
								<div class="item">
									<img alt="Carousel Bootstrap Third" src="{{url('public/img/3.jpg')}}">
								</div>
							</div> <a class="left carousel-control" href="#carousel-222156" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-222156" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
						</div>
					</div>
					<div class="col-md-1">
					</div>


					<!-- Body div class="col-md-4" -->
					@yield('content')
					<!-- End -->


					<div class="col-md-1">
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{url('public/js/jquery.min.js')}}"></script>
	<script src="{{url('public/js/bootstrap.min.js')}}"></script>
	<script src="{{url('public/js/starscripts.js')}}"></script>
	<script src="{{asset('public/js/register.js')}}"></script>
</body>

<footer class="navbar-fixed-bottom panel-footer navbar-account">
	<div class="row text-center">
		<tr>
			<td> <a href="{{route('Home')}}">Trang chủ</a></td>
			<span>|</span>
			<td> <a href="#">Riêng tư</a></td>
			<span>|</span>
			<td> <a href="#">Điều lệ</a></td>
			<span>|</span>
			<td> <a href="#">Thông tin</a></td>
		</tr>
	</div>
</footer>

</html>