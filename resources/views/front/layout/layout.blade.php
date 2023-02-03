<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{ url('front/css/custom.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />



	@yield('customcss')
	<!-- Document Title
	============================================= -->
	<title>Home - Corporate Layout 2 | Canvas</title>
  @livewireStyles
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
    @include('front.layout.header')
    <!-- #header end -->

		
		
    @yield('content')
    <!-- #content end -->

		<!-- Footer
		============================================= -->
		@include('front.layout.footer')
    <!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script src="{{ url('front/js/jquery.js')}}"></script>
	<script src="{{ url('front/js/plugins.min.js')}}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ url('front/js/functions.js')}}"></script>
	@yield('customjs')
  @livewireScripts
</body>
</html>



    {{-- <!-- partial:partials/_navbar.html -->
    @include('admin.layout.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layout.sidebar')
      <!-- partial -->
      
   
  {{-- <script src="{{ url('admin/js/Chart.roundedBarCharts.js') }}"></script> --}}