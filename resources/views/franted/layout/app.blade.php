<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>VKA3 - Health Care &amp; Medical D 13/187, Sector 7, Rohini Near Sai Baba mandir New Delhi 110085</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Health Care Medical HTML5 Template">
  <meta name="keywords" content="Healthcare, Lab, Blood Checkup, Health, Medical, New Delhi, D 13/187, Sector 7, Rohini, Sai Baba Mandir, 110085, Full Body Checkup, Comprehensive Health Checkup, Complete Body Health Assessment, Annual Full Body Examination, Total Wellness Checkup, Preventive Health Checkup, Medical Checkup Packages, Whole Body Health Screening, Health Checkup for Men/Women, Diagnostic Health Tests, Blood Tests for Health Checkup, Healthcare Screening Services, Best Full Body Checkup, Body Checkup Cost, Full Body Checkup Packages, Pathology Tests for Full Body Checkup, Medical Test for Complete Health Checkup, Full Body Checkup in [D 13/187, Sector 7, Rohini Near Sai Baba mandir New Delhi 110085], Wellness Blood Tests, Corporate Health Checkup, Family Health Checkup, Health Checkup Center, Affordable Full Body Checkup, Senior Citizen Health Checkup, Complete Medical Examination, Full Body Checkup Near Me, Full Body Scan, Health Checkup for All Ages, Body Health Assessment, Preventive Health Screening">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Novena HTML Template v1.0">
  

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{url('public/front_assets/images/vka3logo.png')}}" />

  <!-- 
  Essential stylesheets
  =====================================-->
  <link rel="stylesheet" href="{{url('public/front_assets/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('public/front_assets/plugins/icofont/icofont.min.css')}}">
  <link rel="stylesheet" href="{{url('public/front_assets/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url('public/front_assets/plugins/slick-carousel/slick/slick-theme.css')}}">
  <link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
  <script src="{{url('public/front_assets/js/jquery.min.js')}}"></script>

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{url('public/front_assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('public/front_assets/css/custom.css')}}">
</head>
<body id="top">
<header class="">
    @include('franted.layout.header')
    @include('franted.layout.navbar')
</header>
    @yield('content')
    @include('franted.layout.footer')
 <!-- 
    Essential Scripts
    =====================================-->

    <script src="{{url('public/front_assets/plugins/jquery/jquery.js')}}"></script>
    <script src="{{url('public/front_assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('public/front_assets/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{url('public/front_assets/plugins/shuffle/shuffle.min.js')}}"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    <script src="plugins/google-map/gmap.js"></script>
    
    <script src="{{url('public/front_assets/js/script.js')}}"></script>
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