@extends('franted.layout.app')
@section('content')

<!-- portfolio -->
<section class="my-3 doctors">
  <div class="container-fluit mx-3">
	<div class="row">
		<div class="col-sm-2">
			<div class="col-12 text-center  mb-5">
				<div class="btn-group btn-group-toggle " data-toggle="buttons" style="display:inline-grid;">
				  <label class="btn active ">
					<input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department
				  </label>
				  @foreach($product as $iteam)
				  <label class="btn ">
					<input type="radio" name="shuffle-filter" value="{{$iteam->package_name}}" />{{$iteam->package_name}}
				  </label>
				  @endforeach
				</div>
		  </div>
		</div>
		<div class="col-sm-10">
			<div class="row shuffle-wrapper portfolio-gallery">
				@if($product)
					@foreach($product as $productIteam)
					@foreach($productIteam->getProduct as $productValue)
		
						<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item my-5" data-groups="[&quot;{{$productValue->package_name}}&quot;]">
							<div class="card ">
								<div class="image-container">
									<div class="first">
										<div class="d-flex justify-content-between align-items-center">
										<span class="discount">-25%</span>
										<span class="wishlist"><i class="fa fa-heart text-danger"></i></span>
										</div>
									</div>
									<a href="{{ route('add.to.cart', $productValue->id) }}">
										<img src="{{url('storage/Product/img/'.$productValue->product_image)}}" class="img-fluid rounded thumbnail-image">
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
					@endforeach
					@else
					<h1>Not Any Package Add</h1>
				@endif
			  </div>
		</div>
	</div>
      

   
</section>
<!-- /portfolio -->
@endsection