<!--Created by: Nguyen Le Duy
Date: 17/02/2017
Update: 03-05-2017 by Bi Pham
-->

<!--Slide quang cao-->
{{--<div class="container advertise-custom">--}}
	{{--<div class="row banner-slider-custom">--}}
		{{--<div class="carousel slide" id="banner">--}}
			{{--<ol class="carousel-indicators">--}}
				{{--<li data-slide-to="0" data-target="#banner" class="active"></li>--}}
				{{--<li data-slide-to="1" data-target="#banner"></li>--}}
				{{--<li data-slide-to="2" data-target="#banner"></li>--}}
			{{--</ol>--}}

			{{--<div class="carousel-inner" role="listbox">--}}
				{{--<div class="carousel-item active">--}}
					{{--<img class="d-block img-fluid mx-auto" alt="Carousel Bootstrap First" src="{{url('public/img/1.png')}}">--}}
					{{--<div class="carousel-caption d-none d-md-block">--}}
						{{--<h4 class="sr-only">First Thumbnail label</h4>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class="carousel-item">--}}
					{{--<img class="d-block img-fluid mx-auto" alt="Carousel Bootstrap Second" src="{{url('public/img/2.jpg')}}">--}}
					{{--<div class="carousel-caption d-none d-md-block">--}}
						{{--<h4 class="sr-only">Second Thumbnail label</h4>--}}
					{{--</div>--}}
				{{--</div>--}}
				{{--<div class="carousel-item">--}}
					{{--<img class="d-block img-fluid mx-auto" alt="Carousel Bootstrap Third" src="{{url('public/img/3.jpg')}}">--}}
					{{--<div class="carousel-caption d-none d-md-block">--}}
						{{--<h4 class="sr-only">Third Thumbnail label</h4>--}}
					{{--</div>--}}
				{{--</div>--}}
			{{--</div>--}}
			{{--<a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">--}}
				{{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
				{{--<span class="sr-only">Previous</span>--}}
			{{--</a>--}}
			{{--<a class="carousel-control-next" href="#banner" role="button" data-slide="next">--}}
				{{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
				{{--<span class="sr-only">Previous</span>--}}
			{{--</a>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}
@if(Route::current()->getName() == '')
	<div class="row-fluid img-banner-home-custom parallax">
		{{--	<img class="banner-home-custom" src="{{url('/public/img/header/14.jpg')}}" alt="">--}}
		<div class="welcome-web-custom">
			<div class="title-welcome">
				CHÀO MỪNG BẠN ĐẾN VỚI
			</div>
			<div class="name-website-welcome">
				VIỆT MARKETPLACE
			</div>
			<div class="content-welcome">
				Website đăng tin rao vặt miễn phí, đảm bảo bán được hàng nhanh nhất!
			</div>
		</div>
	</div>
@endif

@if(Route::current()->getName() == 'MyStore')
	<div class="row-fluid img-banner-store-custom parallax">
		{{--	<img class="banner-home-custom" src="{{url('/public/img/header/14.jpg')}}" alt="">--}}
		<div class="welcome-store-custom">
			<div class="title-welcome">
				CHÀO MỪNG BẠN ĐẾN VỚI
			</div>
			<div class="name-store-welcome">
				CỬA HÀNG - VIỆT MARKETPLACE
			</div>
			<div class="content-store">
				Đây là nơi bạn có thể quản lý tất cả các tin rao vặt mua hoặc bán của bạn một cách dễ dàng và trực quan!
			</div>
		</div>
	</div>
@endif
