
	<div class="container mt-5">
    	<div class="row items">
			@foreach($package as $packageValue)
				<div class="col-md-3">
						<div class="card">
							<div class="image-container">
								<div class="first">
									<div class="d-flex justify-content-between align-items-center">
									<span class="discount">-25%</span>
									<span class="wishlist"><i class="fa fa-heart text-danger"></i></span>
									</div>
								</div>
								<a href="{{url('services/product/'.$packageValue->package_name)}}">
									<img src="{{url('storage/package/img/'.$packageValue->package_image)}}" class="img-fluid rounded thumbnail-image">
								</a>
							</div>
							<div class="product-detail-container p-2">
									<div class="d-flex justify-content-between align-items-center">
										<h5 class="dress-name">{{$packageValue->package_name ?? ''}}</h5>
										<div class="d-flex flex-column mb-2">
											<span class="new-price">₹{{$packageValue->package_price ?? ''}}</span>
											<small class="old-price text-right text-muted">₹{{$packageValue->package_discount_price ?? ''}}</small>
										</div>
									</div>
									<div class="d-flex justify-content-between align-items-center pt-1">
										<p>{{$packageValue->package_description ?? ''}} </p>
									</div>
									<div class="d-flex justify-content-between align-items-center pt-1 my-3">
										<div>
											<i class="fa fa-star text-warning" aria-hidden="true"></i>
											<i class="fa fa-star text-warning" aria-hidden="true"></i>
											<i class="fa fa-star text-warning" aria-hidden="true"></i>
											<i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
											<i class="fa fa-star " aria-hidden="true"></i>
											<br/>
											<span class="rating-number">4.8</span>
										</div>
										<a href="{{url('services/product/'.$packageValue->package_name)}}">
											<button class="btn btn-outline-info btn-sm">Book Now </button>
										</a>
								</div>
							</div>
						</div>
						<div class="mt-3">
							<div class="card voutchers">
								<div class="voutcher-divider">
									<div class="voutcher-left text-center">
										<span class="voutcher-name">Monday Happy</span>
										<h5 class="voutcher-code">#MONHPY</h5>
									</div>
									<div class="voutcher-right text-center border-left">
										<h5 class="discount-percent">20%</h5>
										<span class="off">Off</span>
									</div>
								</div>
							</div>
						</div>
				</div>
			@endforeach
    	</div>
		<div class="row ">
			<div class="col-lg">
				<div class="title my-4">
					<h2>Specialized Health Packages</h2>
				</div>
			</div>
		</div>
		<div class="row my-3">
			@foreach($package as $packageValue)
				<div class="col-md-3 my-3">
						<div class="card ">
							<div class="image-container">
								<div class="first">
									<div class="d-flex justify-content-between align-items-center">
									<span class="discount">-25%</span>
									<span class="wishlist"><i class="fa fa-heart text-danger"></i></span>
									</div>
								</div>
								<a href="{{url('services/product/'.$packageValue->package_name)}}">
									<img src="{{url('storage/package/img/'.$packageValue->package_image)}}" class="img-fluid rounded thumbnail-image">
								</a>
							</div>
							<div class="product-detail-container p-2">
									<div class="d-flex justify-content-between align-items-center">
										<h5 class="dress-name">{{$packageValue->package_name ?? ''}}</h5>
										<div class="d-flex flex-column mb-2">
											<span class="new-price">₹{{$packageValue->package_price ?? ''}}</span>
											<small class="old-price text-right text-muted">₹{{$packageValue->package_discount_price ?? ''}}</small>
										</div>
									</div>
									<div class="d-flex justify-content-between align-items-center pt-1">
										<p>{{$packageValue->package_description ?? ''}} </p>
									</div>
									<div class="d-flex justify-content-between align-items-center pt-1 my-3">
										<div>
											<i class="fa fa-star text-warning" aria-hidden="true"></i>
											<i class="fa fa-star text-warning" aria-hidden="true"></i>
											<i class="fa fa-star text-warning" aria-hidden="true"></i>
											<i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
											<i class="fa fa-star " aria-hidden="true"></i>
											<br/>
											<span class="rating-number">4.8</span>
										</div>
										<a href="{{url('services/product/'.$packageValue->package_name)}}">
											<button class="btn btn-outline-info btn-sm">Book Now </button>
										</a>
								</div>
							</div>
						</div>
						<div class="mt-3">
							<div class="card voutchers">
								<div class="voutcher-divider">
									<div class="voutcher-left text-center">
										<span class="voutcher-name">Monday Happy</span>
										<h5 class="voutcher-code">#MONHPY</h5>
									</div>
									<div class="voutcher-right text-center border-left">
										<h5 class="discount-percent">20%</h5>
										<span class="off">Off</span>
									</div>
								</div>
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