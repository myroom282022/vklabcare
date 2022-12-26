@extends('franted.layout.app')
@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our services</span>
          <h1 class="text-capitalize mb-5 text-lg">What We Do</h1>
        </div>
      </div>
    </div>
  </div>
</section>
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
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have the healthy</span></h2>
					<a href="appoinment.html" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection