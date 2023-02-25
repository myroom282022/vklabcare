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


<!-- portfolio -->
<section class="section doctors">
  <div class="container">
      <div class="col-12 text-center  mb-5">
	        <div class="btn-group btn-group-toggle " data-toggle="buttons">
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

    <div class="row shuffle-wrapper portfolio-gallery">
		@if($product)
				@foreach($product as $productIteam)
				@foreach($productIteam->getProduct as $productValue)

			<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;{{$productValue->package_name}}&quot;]">
				<div class="position-relative doctor-inner-box">
					<div class="doctor-profile">
						<div class="doctor-img">
						<a href="{{ route('add.to.cart', $productValue->id) }}">
							<img src="{{url('storage/product/img/'.$productValue->product_image)}}" alt="" class="img-fluid w-100">
						</a>
						</div>
					</div>
					<div class="content mt-3">
						<div class="content">
							<h4 class="mt-4 mb-2 title-color">{{$productValue->product_name}}</h4>
							<div class="truhealth-packege-info-price">
								<span><span class="rupee"><span class="rupee">₹</span></span>{{$productValue->product_price}}</span>
								<span class="text-muted"><del>₹{{$productValue->product_discount_price}}</del></span>
							</div>
							<p class="mb-4">{{$productValue->product_description}}</p>
							<a href="{{ route('add.to.cart', $productValue->id) }}" class="btn btn-primary btn-sm mr-1">Book Now</a>
							<a href="department-single.html" class="read-more btn-small">Learn More  <i class="icofont-simple-right ml-2"></i></a>
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
</section>
<!-- /portfolio -->
@endsection