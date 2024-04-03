@extends('franted.layout.app')
@section('content')

<!-- portfolio -->
<section class="my-3 doctors">
  <div class="container-fluit mx-3">
	<div class="row">
		<div class="col-sm-2 mt-5 card">
			{{-- <div class="col-12 text-center  mb-5"> --}}
				<div class="btn-group btn-group-toggle pt-4" data-toggle="buttons" style="display:inline-grid;">
				  <label class="btn active ">
					<input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department <i class="icofont-simple-right ml-2 text-info "></i>
				  </label>
				  @foreach($package as $iteam)
				  <label class="btn ">
					<input type="radio" name="shuffle-filter" value="{{$iteam->package_category_name ?? ''}}" />{{$iteam->package_category_name ?? ''}} <i class="icofont-simple-right ml-2  text-info"></i>
				  </label>
				  @endforeach
				</div>
		  {{-- </div> --}}
		</div>
		<div class="col-sm-9 mx-5">
			<div class="row shuffle-wrapper portfolio-gallery">
				@if($package)
					@foreach($package as $productIteam)
					@foreach($productIteam->getPackageCategory as $packageValue)
						<div class="col-lg-4 col-sm-6 col-md-6 mb-4 shuffle-item my-5" data-groups="[&quot;{{$packageValue->package_category_name}}&quot;]">
							<div class="card">
								<div class="image-container">
									<div class="first">
										<div class="d-flex justify-content-between align-items-center">
										<span class="discount"> {{$packageValue->package_discount_percentage ?? 0}}%</span>
										<span class="wishlist"><i class="fa fa-heart text-danger"></i></span>
										</div>
									</div>
									<a href="{{asset('services/product/'.$packageValue->package_name)}}">
										<img src="{{asset('public/storage/package/img/'.$packageValue->package_image)}}" class="img-fluid rounded thumbnail-image">
									</a>
								</div>
								<div class="product-detail-container p-2 ">
										<div class="d-flex justify-content-between align-items-center">
											<h5 class="dress-name">{{$packageValue->package_name ?? ''}}</h5>
											<div class="d-flex flex-column mb-2">
												<span class="new-price">₹{{$packageValue->package_discount_price ?? ''}}</span>
												<small class="old-price text-right"><del>₹{{$packageValue->package_price ?? ''}}</del></small>
											</div>
										</div>
										<ul class="new-price">Test Parameter ({{$packageValue->total_test ?? ''}})</ul>
											@php
												$packageDescription = $packageValue->package_description ?? '';
												$packageItems = explode('\n', $packageDescription);
											@endphp
											<ul class="list-unstyled mx-2">
												@php
													$counter = 0;
													@endphp
													@foreach ($packageItems as $packageItem)
														@if ($packageItem)
															<li><i class="icofont-check mr-2 text-info"></i>{{ trim($packageItem ?? '') }}</li>
															@php
															$counter++;
															@endphp
															@if ($counter == 3)
															<a href="{{route('packages.single',$packageValue->package_slug_name ?? $item->id)}}"  class="text-info ">......Read More<i class="icofont-simple-right ml-2"></i></a>
																@break
															@endif
														@endif
													@endforeach
											</ul>
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
											<a href="{{route('packages.book',$packageValue->package_slug_name ?? $item->id)}}" class="theme-btn">
												<button class="btn btn-outline-info btn-sm">Book Now </button>
											</a>
									</div>
								</div>
							</div>
							<div class="mt-3">
								<div class="card voutchers">
									<div class="voutcher-divider">
										<div class="voutcher-left text-center">
											<span class="voutcher-name">Happy Day</span>
											<h5 class="voutcher-code">Home Collection Free</h5>
										</div>
										<div class="voutcher-right text-center border-left">
											<h5 class="discount-percent">{{$packageValue->package_discount_percentage ?? 0}}%</h5>
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