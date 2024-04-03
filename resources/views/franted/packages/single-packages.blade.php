@extends('franted.layout.app')
@section('content')
<section class=" doctor-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="doctor-img-block">
					@if ($package->package_image ?? '')
						<img src="{{asset('public/storage/package/img/'.$package->package_image)}}" alt="" class="img-fluid w-100">
					@else
						<img src="" alt="" class="img-fluid w-100">
					@endif
					<div class="info-block mt-4">
						<h4 class="mb-0">{{$package->package_name ?? ''}} </h4>
						<p>{{$package->package_category_name ?? ''}}</p>
						<p class="text-info">Home Collection Free <span class="mx-2 old-price">{{$package->package_discount_percentage ?? 0}}%<span> OFF</p>
                           
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
                            <div>
                                <span class="new-price">₹{{$package->package_discount_price ?? ''}}</span><br/>
                                <span class="old-price text-right"><del>₹{{$package->package_price ?? ''}}</del></span>
                            </div>
                        </div>
						<ul class="list-inline mt-4 doctor-social-links">
							<li class="list-inline-item"><a href="#!"><i class="icofont-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#!"><i class="icofont-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#!"><i class="icofont-skype"></i></a></li>
							<li class="list-inline-item"><a href="#!"><i class="icofont-linkedin"></i></a></li>
							<li class="list-inline-item"><a href="#!"><i class="icofont-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-9 col-md-6">
				<div class="doctor-details mt-4 mt-lg-0">
					<h2 class="text-md">{{$package->package_name ?? ''}}</h2>
                        <div class="skill-list">
                            <h5 class="mb-4 new-price">Test Parameter (6)</h5>
                            @php
                                $packageDescription = $package->package_description ?? '';
                                $packageItems = explode('\n', $packageDescription);
                            @endphp
                            <ul class="list-unstyled">
                                @foreach ($packageItems as $packageItem)
                                    @if ($packageItem)
                                    <li><i class="icofont-check mr-2"></i>{{ trim($packageItem ?? '') }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
					<a href="{{route('packages.book',$package->package_slug_name ?? $item->id)}}" class="btn btn-main-2 btn-round-full mt-3">Book Now<i
					class="icofont-simple-right ml-2  "></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class=" doctor-skills my-5">
	<div class="container">
        <div class="row my-3">
			@foreach($packageData as $packageValue)
				<div class="col-md-3 my-5">
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
						<div class="product-detail-container p-2">
								<div class="d-flex justify-content-between align-items-center">
									<h5 class="dress-name">{{$packageValue->package_name ?? ''}}</h5>
									<div class="d-flex flex-column mb-2">
										<span class="new-price">₹{{$packageValue->package_discount_price ?? ''}}</span>
										<small class="old-price text-right"><del>₹{{$packageValue->package_price ?? ''}}</del></small>
									</div>
								</div>
								<ul class="new-price">Test Parameter (6)</ul>
									@php
										$packageDescription = $packageValue->package_description ?? '';
										$packageItems = explode('\n', $packageDescription);
									@endphp
									<ul class="list-unstyled">
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
													<a href="{{route('packages.single',$packageValue->package_slug_name ?? $item->id)}}"  class="text-info ">......Read More<i class="icofont-simple-right"></i></a>
														@break
													@endif
												@endif
											@endforeach
									</ul>
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<i class="fa fa-star text-warning" aria-hidden="true"></i>
										<i class="fa fa-star text-warning" aria-hidden="true"></i>
										<i class="fa fa-star text-warning" aria-hidden="true"></i>
										<i class="fa fa-star-half-o text-warning" aria-hidden="true"></i>
										<i class="fa fa-star " aria-hidden="true"></i>
										<br/>
										<span class="rating-number">4.8</span>
									</div>
                                    <a href="{{route('packages.book',$package->package_slug_name ?? $item->id)}}" class="btn btn-outline-info btn-sm">Book Now<i
                                        class="icofont-simple-right"></i></a>
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
    	</div>
	</div>
</section>
@endsection