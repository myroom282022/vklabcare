@extends('franted.layout.app')
@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">All Doctors</span>
          <h1 class="text-capitalize mb-5 text-lg">Specalized doctors</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- portfolio -->
<section class="section doctors">
  <div class="container">
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Doctors</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>We provide a wide range of creative services adipisicing elit. Autem maxime rem modi eaque, voluptate. Beatae officiis neque </p>
                </div>
            </div>
        </div>

      <div class="col-12 text-center  mb-5">
	        <div class="btn-group btn-group-toggle " data-toggle="buttons">
	          <label class="btn active ">
	            <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department
	          </label>
	          <label class="btn ">
	            <input type="radio" name="shuffle-filter" value="cat1" />Cardiology
	          </label>
	          <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat2" />Dental
	          </label>
	          <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat3" />Neurology
	          </label>
	          <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat4" />Medicine
	          </label>
	           <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat5" />Pediatric
	          </label>
	          <label class="btn">
	            <input type="radio" name="shuffle-filter" value="cat6" />Traumatology
	          </label>
			  
	        </div>
      </div>

    <div class="row shuffle-wrapper portfolio-gallery">
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
<!-- /portfolio -->
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">We are pleased to offer you the <span class="title-color">chance to have the healthy</span></h2>
					<a href="{{route('book-appoinment-create')}}" class="btn btn-main-2 btn-round-full">Get appoinment<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection