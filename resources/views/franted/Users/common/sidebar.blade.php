<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="{{url('front_assets/css/sidebar.css')}}">
   <div class="container my-4">
    <div class="row">
      <div class="col-sm-3 sidebar">
          <div class="list-group list-group-flush mx-3">
            
          </div>
          <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
              
              <div class="list-group list-group-flush mx-3">
                <div class="user-details m-auto">
                  @if (auth()->user()->user_image ?? '')
                  <img src="{{url('storage/users/img/'.auth()->user()->user_image)}}" alt="" class="user-image">
                  @else
                    <img src="{{url('front_assets/images/team/test-thumb1.jpg')}}" alt="" class="user-image">
                  @endif
                  
                  <h6>{{auth()->user()->email ?? auth()->user()->phone_number}}</h6>
                </div>
                <a href="{{route('user-dashboard')}}"class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('user-dashboard') ? 'active':'' }}"aria-current="true">
                  <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                </a>
                <a href="{{route('user-payment')}}" class="list-group-item list-group-item-action py-2 ripple {{ request()->routeIs('user-payment') ? 'active':'' }}"
                  ><i class="fas fa-money-bill fa-fw me-3"></i><span>Transation</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2 ripple ">
                  <i class="fas fa-chart-area fa-fw me-3"></i><span>Webiste traffic</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-lock fa-fw me-3"></i><span>Password</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                  <i class="fas fa-chart-pie fa-fw me-3"></i><span>SEO</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-globe fa-fw me-3"></i><span>International</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-building fa-fw me-3"></i><span>Partners</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                  ><i class="fas fa-users fa-fw me-3"></i><span>Users</span></a
                >
                
              </div>
            </div>
          </nav>
      </div>

    <div class="col-sm-9">