@extends('franted.layout.app')
@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our blog</span>
          <h1 class="text-capitalize mb-5 text-lg">Blog articles</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section blog-wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
			@foreach ($blog as $item)
				<div class="col-lg-12 col-md-12 mb-5">
					<div class="blog-item">
						<h2 class="mt-3 mb-3 text-capitalize"><a href="blog-single.html">{{$item->title ?? ''}}</a></h2>
						<div class="blog-item-content">
							{!! $item->description ?? '' !!}
						</div>
						<div class="blog-item-meta mb-3 mt-4">
							<span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>5 Comments</span>
							<span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-1"></i> 28th January</span>
						</div> 
						<a href="blog-single.html" target="_blank" class="btn btn-main btn-icon btn-round-full text-light">Read More <i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			@endforeach
			<div class="col-lg-12 col-md-12">
				<nav class="pagination py-2 d-inline-block">
					<div class="nav-links">
						{!! $blog->withQueryString()->links('pagination::bootstrap-5') !!}
					</div>
				</nav>
			</div>
		</div>
      </div>
      <div class="col-lg-4">
        <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
	<div class="sidebar-widget search  mb-3 ">
		<h5>Search Here</h5>
		<form action="#" class="search-form">
			<input type="text" class="form-control" placeholder="search">
			<i class="ti-search"></i>
		</form>
	</div>


	<div class="sidebar-widget latest-post mb-3">
		<h5>Popular Posts</h5>

        <div class="py-2">
        	<span class="text-sm text-muted">03 Mar 2018</span>
            <h6 class="my-2"><a href="#">Thoughtful living in los Angeles</a></h6>
        </div>

        <div class="py-2">
       		<span class="text-sm text-muted">03 Mar 2018</span>
            <h6 class="my-2"><a href="#">Vivamus molestie gravida turpis.</a></h6>
        </div>

        <div class="py-2">
        	<span class="text-sm text-muted">03 Mar 2018</span>
            <h6 class="my-2"><a href="#">Fusce lobortis lorem at ipsum semper sagittis</a></h6>
        </div>
	</div>

	<div class="sidebar-widget category mb-3">
		<h5 class="mb-4">Categories</h5>

		<ul class="list-unstyled">
		  <li class="align-items-center">
		    <a href="#">Medicine</a>
		    <span>(14)</span>
		  </li>
		  <li class="align-items-center">
		    <a href="#">Equipments</a>
		    <span>(2)</span>
		  </li>
		  <li class="align-items-center">
		    <a href="#">Heart</a>
		    <span>(10)</span>
		  </li>
		  <li class="align-items-center">
		    <a href="#">Free counselling</a>
		    <span>(5)</span>
		  </li>
		  <li class="align-items-center">
		    <a href="#">Lab test</a>
		    <span>(5)</span>
		  </li>
		</ul>
	</div>


	<div class="sidebar-widget tags mb-3">
		<h5 class="mb-4">Tags</h5>

		<a href="#">Doctors</a>
		<a href="#">agency</a>
		<a href="#">company</a>
		<a href="#">medicine</a>
		<a href="#">surgery</a>
		<a href="#">Marketing</a>
		<a href="#">Social Media</a>
		<a href="#">Branding</a>
		<a href="#">Laboratory</a>
	</div>


	<div class="sidebar-widget schedule-widget mb-3">
		<h5 class="mb-4">Time Schedule</h5>

		<ul class="list-unstyled">
		  <li class="d-flex justify-content-between align-items-center">
		    <span>Monday - Friday</span>
		    <span>9:00 - 17:00</span>
		  </li>
		  <li class="d-flex justify-content-between align-items-center">
		    <span>Saturday</span>
		    <span>9:00 - 16:00</span>
		  </li>
		  <li class="d-flex justify-content-between align-items-center">
		    <span>Sunday</span>
		    <span>Closed</span>
		  </li>
		</ul>

		<div class="sidebar-contatct-info mt-4">
			<p class="mb-0">Need Urgent Help?</p>
			<h3>+23-4565-65768</h3>
		</div>
	</div>

</div>
      </div>
    </div>
  </div>
</section>
@endsection