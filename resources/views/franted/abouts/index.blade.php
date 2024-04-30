@extends('franted.layout.app')
@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">About Us</span>
          <h1 class="text-capitalize mb-5 text-lg">About Us</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section about-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="title-color">Personal care for your healthy living</h2>
			</div>
			<div class="col-lg-8">
				<p>"Welcome to VKA3 Healthcare, where your well-being is our top priority. At VKA3 Healthcare, we are dedicated to providing exceptional lab services and comprehensive healthcare solutions tailored to your individual needs.

					Our state-of-the-art laboratory is equipped with the latest technology and staffed by skilled professionals committed to delivering accurate and timely results. Whether you require routine blood tests, diagnostic imaging, or specialized screenings, you can trust VKA3 Healthcare to deliver precise and reliable outcomes.
					
					But we're more than just a lab – we're your partners in health. Our integrated healthcare approach combines advanced medical expertise with personalized care, ensuring that you receive the attention and support you deserve at every step of your wellness journey.
					
					At VKA3 Healthcare, we believe that prevention is key to maintaining a healthy lifestyle. That's why we offer a range of preventive care services, including health screenings, vaccinations, and wellness programs designed to empower you to take control of your health and live your best life.
					
					With VKA3 Healthcare, you can rest assured knowing that you're in capable hands. Experience the difference in healthcare excellence – choose VKA3 Healthcare for your personal care needs."</p>
				<img src="{{asset('public/front_assets/images/about/sign.png')}}" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</section>


<section class="section awards">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4">
				<h2 class="title-color">Our Doctors achievements </h2>
				<div class="divider mt-4 mb-5 mb-lg-0"></div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="{{asset('public/front_assets/images/about/3.png')}}" alt="" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="{{asset('public/front_assets/images/about/4.png')}}" alt="" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="{{asset('public/front_assets/images/about/1.png')}}" alt="" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="{{asset('public/front_assets/images/about/2.png')}}" alt="" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="{{asset('public/front_assets/images/about/5.png')}}" alt="" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="{{asset('public/front_assets/images/about/6.png')}}" alt="" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section team">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4">Meet Our Specialist</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Today’s users expect effortless experiences. Don’t let essential people and processes stay stuck in the past. Speed it up, skip the hassles</p>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach ($doctor as $item)
			<div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item illustration" data-groups="[&quot;cat2&quot;]">
				<div class="position-relative doctor-inner-box">
					<div class="doctor-profile">
						<div class="doctor-img">
							@if ($item->user_image ?? '')
								<img src="{{asset('public/storage/users/img/'.$item->user_image)}}" alt="doctor-image" class="img-fluid w-100" style="height: 255px">
							@else
								<img src="{{asset('public/front_assets/images/team/4.jpg')}}" alt="doctor-image" class="img-fluid w-100" style="height: 255px">
							@endif
						</div>
					</div>
					<div class="content mt-3">
						<h4 class="mb-0 text-capitalize"><a href="{{url('doctor-single/'.$item->id ?? '')}}">{{$item->name ?? ''}}</a></h4>
						@if(isset($item->getDoctor->education_degree))
							@php
								$degrees = json_decode($item->getDoctor->education_degree);
							@endphp
							<p>
								@foreach($degrees as $index => $degree)
									{{ $degree }}
									@if($index < count($degrees) - 1)
										,
									@endif
								@endforeach
							</p>
						@else
							<p>No education degree available</p>
						@endif
					</div> 
				</div>
			</div>
		@endforeach
		</div>
	</div>
</section>


@endsection