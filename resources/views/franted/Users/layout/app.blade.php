
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('../assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{url('../assets/img/favicon.png')}}">
  <title>VkA3</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{url('../assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{url('../assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{url('../assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{url('../assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
  <link  href="{{url('../assets/css/style.css')}}" rel="stylesheet" />
  @include('toster')
</head>
<body class="g-sidenav-show  bg-gray-100">
      @include('franted.Users.layout.sidenav')
   <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
      @include('franted.Users.layout.header')
      <div class="container-fluid py-4">
         @yield('content')
         @include('franted.Users.layout.footer')
      </div>
  </main>

  <!--   Core JS Files   -->
  <script src="{{url('../assets/js/core/popper.min.js')}}"></script>
  <script src="{{url('../assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{url('../assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{url('../assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
 
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script src="{{url('../assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
</body>

</html>
