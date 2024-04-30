@extends('franted.layout.app')
@section('content')
@include('franted.home.slider')
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>24 Hours Service</span>
						<h4 class="mb-3">Online Appoinment</h4>
						<p class="mb-4">Get ALl time support for emergency.We have introduced the principle of family medicine.</p>
						<a href="{{route('book-appoinment-create')}}" class="btn btn-main btn-round-full">Book appoinment</a>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>Timing schedule</span>
						<h4 class="mb-3">Working Hours</h4>
						<ul class="w-hours list-unstyled">
							<li class="d-flex justify-content-between">Sun - Wed : <span>8:00 AM - 8:00 PM</span></li>
							<li class="d-flex justify-content-between">Thu - Fri : <span>8:00 AM - 8:00 PM</span></li>
							<li class="d-flex justify-content-between">Sat - sun : <span>8:00 AM - 8:00 PM</span></li>
						</ul>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Emegency Cases</span>
						<h4 class="mb-3">+91 768 303 6386</h4>
						<p>Get ALl time support for emergency.We have introduced the principle of family medicine.Get Conneted with us for any urgency .</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="">
	@include('franted.home.special-packages')
</section>
{{-- <section class="">
	@include('franted.home.secondp')
</section> --}}
<section class="">
	@include('franted.home.package')
</section>
<section class="my-5">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 m-auto mt-5">
				<a href="{{route('packages.index')}}"><button class="btn btn-color btn-lg btn-block my-3"> MORE PACKAGES</button></a>
			</div>
		</div>
	</div>
</section>
<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3 counter" data-count="{{9561+$totalUser ?? 1000}}">0</span>
						<p>Happy People</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3 counter" data-count="{{63201+$Totalbooking ?? 5236}}">0</span>
						<p>Comeplet Test</p>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3 counter" data-count="40">0</span>
						<p>Expert Doctors</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3 counter" data-count="20">0</span>
						<p>Worldwide Branch</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section service gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Our Services</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Explore VKA3Healthcare's diverse range of specialized services, designed to cater to all your healthcare needs efficiently and effectively.</p>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach ($serviceSlider as $service)
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="service-item mb-4">
						<div class="icon d-flex align-items-center">
							@if ($service->image_name ?? '')
								<img src="{{asset('public/storage/service/img/'.$service->image_name ?? '')}}" style="height: 100px !important;border-radius: 50%;"/>
							@else
								<i class="icofont-laboratory text-lg"></i>
							@endif
							<h4 class="mt-3 mb-3">{{$service->title ?? ''}}</h4>
						</div>
						<div class="content">
							<p class="mb-4">{{$service->description ?? ''}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>

<section class="section testimonial-2 gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>We served over {{9561+$totalUser ?? 5000}}+ Patients</h2>
					<div class="divider mx-auto my-4"></div>
					<p>VKA3Healthcare values patient feedback, collecting it through various channels like surveys, reviews, and direct communication. We use this input to continuously improve our services and ensure patient satisfaction.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">

		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">
				@foreach ($feedback as $feedbackItem)

				<div class="testimonial-block style-2  gray-bg">
					<i class="icofont-quote-right"></i>
					<div class="testimonial-thumb">
						@if ($feedbackItem->feedbackData->user_image ?? '')
							<img src="{{asset('public/storage/users/img/'.$feedbackItem->feedbackData->user_image)}}" alt="" class="img-fluid">
						@else
							<img src="{{asset('public/img_defautl/users.png')}}" alt="" class="img-fluid">
						@endif
					</div>
					<div class="client-info ">
						<h4>{{$feedbackItem->title ?? ''}}</h4>
						<span>{{$feedbackItem->feedbackData->name ?? ''}}</span>
						<p>{{$feedbackItem->description ?? ''}}</p>
						<div>
							@for ($i = 1; $i <= 5; $i++)
							
								@if ($i <= $feedbackItem->review)
									<span class="text-warning " style="font-size:30px;font-weight: 900;"><b>*</b></span>
								@else
									<span class="text-dark" style="font-size: 30px;color:black;font-weight: 900;"><b>*</b></span>
								@endif
							@endfor
						</div>
					</div>
					
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@include('franted.home.partners_supportus')
@endsection
