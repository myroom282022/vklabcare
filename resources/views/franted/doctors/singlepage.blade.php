@extends('franted.layout.app')
@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Doctor Details</span>
          <h1 class="text-capitalize mb-5 text-lg">{{$doctor->name ?? ''}}</h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section doctor-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="doctor-img-block">
					@if ($doctor->user_image ?? '')
						<img src="{{asset('public/storage/users/img/'.$doctor->user_image)}}" alt="doctor-image" class="img-fluid w-100" style="height: 320px">
					@else
						<img src="{{asset('public/front_assets/images/team/4.jpg')}}" alt="doctor-image" class="img-fluid w-100" style="height: 320px">
					@endif
					<div class="info-block mt-4">
						<h4 class="mb-0 text-capitalize">{{$doctor->name ?? ''}}</h4>
						@if(isset($doctor->getDoctor->medical_specialization))
							@php
								$degrees = json_decode($doctor->getDoctor->medical_specialization);
							@endphp
							<p>
								@foreach($degrees as $index => $degree)
									{{ $degree }}
									@if($index < count($degrees) - 1)
							</br>
									@endif
								@endforeach
							</p>
						@else
							<p>No specialization available</p>
						@endif

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

			<div class="col-lg-8 col-md-6">
				<div class="doctor-details mt-4 mt-lg-0">
					<h2 class="text-md">Introducing to myself</h2>
					<div class="divider my-4"></div>
							@if($doctor)
								<h5>Doctor Details</h5>
								<ul>
									<li>Name: {{ $doctor->name }}</li>
									<li>Email: {{ $doctor->email }}</li>
									<li>Phone Number: {{ $doctor->phone_number }}</li>
								</ul>

								@if($doctor->getDoctor)
									<h5>Doctor Education</h5>
									<p>
										@php
											$education = json_decode($doctor->getDoctor->education_degree);
											echo implode(', ', $education);
										@endphp
									</p>

									<h5>Doctor Address</h5>
									<ul>
										<li>Address: {{ $doctor->getUserDetails->address }}</li>
										<li>City: {{ $doctor->getUserDetails->city }}</li>
										<li>State: {{ $doctor->getUserDetails->state }}</li>
										<li>Zip Code: {{ $doctor->getUserDetails->zip_code }}</li>
										<li>Country: {{ $doctor->getUserDetails->country }}</li>
									</ul>
								@else
									<p>No education or address information available for this doctor.</p>
								@endif
							@else
								<p>Doctor not found.</p>
							@endif
						</div>

					<a href="{{route('book-appoinment-create')}}" class="btn btn-main-2 btn-round-full mt-3">Make an Appoinment<i
							class="icofont-simple-right ml-2  "></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection