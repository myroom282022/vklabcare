@php
	$user = auth()->user();
	if ($user){
		$cart = App\Models\PackageBook::where('user_id', $user->id)->with('getPackage')->get();
	}else {
		$cart = [];
	}
@endphp
<div class="1fixed-top ">
<nav class="navbar navbar-expand-lg navigation " id="navbar">
	<div class="container ">
		<a class="navbar-brand" href="{{url('/')}}">
			<img src="{{url('public/front_assets/images/vka3logo.png')}}" alt="" class="img-fluid">
		</a>

		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
			aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		</button>

		<div class="collapse navbar-collapse " id="navbarmain">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('packages.index')}}">Packages</a></li>
				<li class="nav-item"><a class="nav-link" href="{{route('services.index')}}">Services</a></li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="{{route('departments')}}" id="dropdown02" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">Department <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href="{{route('departments')}}">Departments</a></li>
						<li><a class="dropdown-item" href="{{route('department-single')}}">Department Single</a></li>
				
						<!-- <li class="dropdown dropdown-submenu dropright">
							<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>
		
							<ul class="dropdown-menu" aria-labelledby="dropdown0301">
								<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
								<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
							</ul>
						</li> -->
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="{{route('doctor')}}" id="dropdown03" data-toggle="dropdown"	aria-haspopup="true" aria-expanded="false">Doctors <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown03">
						<li><a class="dropdown-item" href="{{route('doctor')}}">Doctors</a></li>
						<li><a class="dropdown-item" href="{{route('doctor-single')}}">Doctor Single</a></li>
						<li><a class="dropdown-item" href="{{route('appoinment')}}">Appoinment</a></li>

						<!-- <li class="dropdown dropdown-submenu dropleft">
							<a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sub Menu</a>
		
							<ul class="dropdown-menu" aria-labelledby="dropdown0501">
								<li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
								<li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
							</ul>
						</li> -->
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="{{route('blog-sidebar')}}" id="dropdown05" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">Blog <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown05">
						<li><a class="dropdown-item" href="{{route('blog-sidebar')}}">Blog with Sidebar</a></li>
						<li><a class="dropdown-item" href="{{route('blog-single')}}">Blog Single</a></li>
					</ul>
				</li>
				<li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
				@if(auth()->user() && auth()->user()->is_phone_verified == 1)
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">Dashboard <i class="icofont-thin-down"></i></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href="{{route('user-dashboard')}}">Dashboard</a></li>
						<li><a class="dropdown-item" href="{{route('user-logout')}}">Logout</a></li>
					</ul>
				</li>
				@else
				<li class="nav-item"><a class="nav-link" href="{{route('otp.login')}}">Login</a></li>
				@endif
					
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="{{route('packages.list')}}" id="dropdown05" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false"><i class="icofont-shopping-cart" style="font-size:20px"><sup><b class="cart-items">{{ count($cart ?? 0) }}</b></sup></i></a>
						
					<ul class="dropdown-menu  cart-list" aria-labelledby="dropdown05">
						@if (count($cart ?? 0) > 0)
						<li>
							<div class="container-fluit my-3">
								@foreach($cart as $key => $packageData)
							@foreach($packageData->getPackage as $key => $item)
								<div class="row mx-2">
									<div class="col-sm-6"><h6>{{$item['package_name']}}</h6></div>
									<div class="col-sm-1">{{$item['quantity'] ?? 1}}</div>
									<div class="col-sm-3">{{$item['package_discount_price']}}</div>
									<div class="col-sm-1">
										<a href="{{route('packages.remove.cart',$item->id)}}" class="text-muted"><i class="icofont-close text-danger"></i></a>
									</div>
								</div>
							<hr/>
								@endforeach
							@endforeach
								<div class="row">
									<div class="col-sm-7">
										<a href="{{route('packages.list')}}">
											<button type="button" class="btn btn-color btn-block btn-lg">
											<div class="d-flex justify-content-between">
												<span>view Cart</span>
											</div>
											</button>
										  </a>
									</div>
									<div class="col-sm-5">
										<a href="{{route('billing-address')}}">
											<button type="button" class="btn btn-color btn-block btn-lg">
											<div class="d-flex justify-content-between">
												<span>Checkout </span>
											</div>
											</button>
										  </a>
								</div>
							</div>
							
						</li>
						@else
						<li class="nav-item my-3 text-center">
							<h6 class="text-danger">Empty cart</h6>
						</li>
						@endif

					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
</div>



