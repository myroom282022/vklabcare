@extends('franted.layout.app')
@section('content')

<section class="section service-2">
	<div class="container">
			@if($product)
			<div class="row my-3">
				@foreach($product as $productValue)
					<div class="col-md-3 my-3">
							<div class="card ">
								<div class="image-container">
									<div class="first">
										<div class="d-flex justify-content-between align-items-center">
										<span class="discount">-25%</span>
										<span class="wishlist"><i class="fa fa-heart text-danger"></i></span>
										</div>
									</div>
									<a href="{{ route('add.to.cart', $productValue->id) }}">
										<img src="{{asset('public/storage/Product/img/'.$productValue->product_image)}}" class="img-fluid rounded thumbnail-image">
									</a>
								</div>
								<div class="product-detail-container p-2">
										<div class="d-flex justify-content-between align-items-center">
											<h5 class="dress-name">{{$productValue->product_name ?? ''}}</h5>
											<div class="d-flex flex-column mb-2">
												<span class="new-price">₹{{$productValue->product_price ?? ''}}</span>
												<small class="old-price text-right text-muted">₹{{$productValue->product_discount_price ?? ''}}</small>
											</div>
										</div>
										<div class="d-flex justify-content-between align-items-center pt-1">
											<p>{{$productValue->product_description ?? ''}} </p>
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
											<a href="{{ route('add.to.cart', $productValue->id) }}">
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
			@endif
			
		</div>
	</div>
</section>
@endsection


