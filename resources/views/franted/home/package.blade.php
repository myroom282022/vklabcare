

	<div class="container">
		<div class="row ">
			<div class="col-lg">
				<div class="title my-4">
					<h2>Specialized Health Packages</h2>
				</div>
			</div>
		</div>
        <!--Slick Carousel Slider-->
        <div class="items">
			@foreach($package as $packageValue)
			<div class="col-lg-4 col-md-6">
				
					<div class="department-block mb-5">
							<a href="{{url('services/product/'.$packageValue->package_name)}}">
								<img src="{{url('storage/package/img/'.$packageValue->package_image)}}" alt="" class="img-fluid w-100">
							</a>
						<div class="content">
							<h4 class="mt-4 mb-2 title-color">{{$packageValue->package_name}}</h4>
							<div class="truhealth-packege-info-price">
								<span><span class="rupee"><span class="rupee">₹</span></span>{{$packageValue->package_price}}</span>
								<span class="text-muted"><del>₹{{$packageValue->package_discount_price}}</del></span>
							</div>
							<p class="mb-4">{{$packageValue->package_description}}</p>
							<a href="{{url('services/product/'.$packageValue->package_name)}}" class="btn btn-primary btn-sm mr-3">Book Now</a>
							<a href="department-single.html" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
						</div>
					</div>
			</div>
			@endforeach
		</div>
	</div>	
<script>
    $(document).ready(function(){
    $('.items').slick({
		dots: true,
		infinite: true,
		speed: 800,
		autoplay: true,
		autoplaySpeed: 2000,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
			{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			}
			},
			{
			breakpoint: 600,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
			},
			{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
			}

		]
		});
    });
                        
 </script>
	</div>
</section>