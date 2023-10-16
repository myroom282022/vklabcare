<link rel="stylesheet" href="{{asset('public/front_assets/css/slider.css')}}" >
<section class="">
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			@foreach($slider as $sliderValue)
				<div class="carousel-item @if($loop->first) active @endif">
					<img src="{{url('storage/slider/img/'.$sliderValue->slider_image)}}" class="d-block w-100 slider-image" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5>{{$sliderValue->title}}</h5>
						<p>{{$sliderValue->description}}</p>
					</div>
				</div>
			@endforeach
		</div>
		<button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</button>
	</div>
</section>


