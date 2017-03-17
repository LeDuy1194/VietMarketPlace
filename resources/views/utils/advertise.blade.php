<!--Created by: Nguyen Le Duy
Date: 17/02/2017
-->

<!--Slide quang cao-->
<div class="carousel slide" id="banner">
	<ol class="carousel-indicators">
		<li data-slide-to="0" data-target="#banner" class="active"></li>
		<li data-slide-to="1" data-target="#banner"></li>
		<li data-slide-to="2" data-target="#banner"></li>
	</ol>
	
	<div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
			<img class="d-block img-fluid mx-auto" alt="Carousel Bootstrap First" src="{{url('public/img/1.png')}}">
			<div class="carousel-caption d-none d-md-block">
				<h4>First Thumbnail label</h4>
				<p>
				</p>
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block img-fluid mx-auto" alt="Carousel Bootstrap Second" src="{{url('public/img/2.jpg')}}">
			<div class="carousel-caption d-none d-md-block">
				<h4>Second Thumbnail label</h4>
				<p>
				</p>
			</div>
		</div>
		<div class="carousel-item">
			<img class="d-block img-fluid mx-auto" alt="Carousel Bootstrap Third" src="{{url('public/img/3.jpg')}}">
			<div class="carousel-caption d-none d-md-block">
				<h4>Third Thumbnail label</h4>
				<p>
				</p>
			</div>
		</div>
	</div>
	<a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#banner" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
</div>