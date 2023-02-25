@extends('franted.layout.app')
@section('content')

<section class="section service-2">
	<div class="container">
		<div class="row">
			@if($product)
				@foreach($product as $productValue)
				<div class="col-lg-4 col-md-6">
				<div class="department-block mb-5">
					<a href="{{ route('add.to.cart', $productValue->id) }}">
						<img src="{{url('storage/product/img/'.$productValue->product_image)}}" alt="" class="img-fluid w-100">
					</a>
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">{{$productValue->product_name}}</h4>
						<div class="truhealth-packege-info-price">
							<span><span class="rupee"><span class="rupee">₹</span></span>{{$productValue->product_price}}</span>
							<span class="text-muted"><del>₹{{$productValue->product_discount_price}}</del></span>
						</div>
						<p class="mb-4">{{$productValue->product_description}}</p>
						<a href="{{ route('add.to.cart', $productValue->id) }}" class="btn btn-primary btn-sm mr-3">Book Now</a>
						<a href="department-single.html" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
				@endforeach
			@endif
			
		</div>
	</div>
</section>
@endsection