<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="{{url('/')}}">
				<img src="{{url('front_assets/images/vka3logo.png')}}" alt="" class="img-fluid">
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('about')}}">About</a></li>
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
					<li class="nav-item"><a class="nav-link" href="{{route('otp.login')}}">Login</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('cart-item')}}">
						<i class="icofont-shopping-cart" style="font-size:20px"><sup><b  class="cart-items">{{ count((array) session('cart')) }}</b></sup></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>