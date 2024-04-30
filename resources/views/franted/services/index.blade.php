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
<section class="section service-2">
	<div class="container">
		<div class="row">
			@foreach ($serviceSlider as $item)
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="service-block mb-5">
						@if ($item->image_name ?? '')
							<img src="{{asset('public/storage/service/img/'.$item->image_name ?? '')}}" style="height: 200px !important;"/>
						@else
							<img src="{{asset('public/front_assets/images/about/about-1.jpg')}}" alt="" class="img-fluid">
						@endif
						<div class="content">
							<h4 class="mt-4 mb-2 title-color">{{$item->title ?? ''}}</h4>
							<p class="mb-4">{{$item->description ?? ''}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
<!-- /portfolio -->
@endsection