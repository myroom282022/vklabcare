<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Novena- Health Care &amp; Medical template</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Health Care Medical Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Novena HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{url('front_assets/images/favicon.png')}}" />

  <!-- 
  Essential stylesheets
  =====================================-->
  <link rel="stylesheet" href="{{url('front_assets/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('front_assets/plugins/icofont/icofont.min.css')}}">
  <link rel="stylesheet" href="{{url('front_assets/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url('front_assets/plugins/slick-carousel/slick/slick-theme.css')}}">
  <link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <script src="{{url('front_assets/js/jquery.min.js')}}"></script>

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{url('front_assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('front_assets/css/custom.css')}}">
</head>
<body id="top">
<header>
    @include('franted.layout.header')
    @include('franted.layout.navbar')
</header>
    @yield('content')
    @include('franted.layout.footer')
 <!-- 
    Essential Scripts
    =====================================-->

    <script src="{{url('front_assets/plugins/jquery/jquery.js')}}"></script>
    <script src="{{url('front_assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('front_assets/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{url('front_assets/plugins/shuffle/shuffle.min.js')}}"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    <script src="plugins/google-map/gmap.js"></script>
    
    <script src="{{url('front_assets/js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<script>
			@if(Session::has('success'))
			toastr.options =
			{
				"closeButton" : true,
				"progressBar" : true
			}
					toastr.success("{{ session('success') }}");
			@endif
		  
			@if(Session::has('error'))
			toastr.options =
			{
				"closeButton" : true,
				"progressBar" : true
			}
					toastr.error("{{ session('error') }}");
			@endif
		  </script>
		@stack('scripts')
  </body>
  </html>