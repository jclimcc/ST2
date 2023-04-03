@extends('front.layout.layout')
@section('customcss')
	<!-- One Page Module Specific Stylesheet -->
	{{-- <link rel="stylesheet" href="{{ url('front/css/one-page/onepage.css')}}" type="text/css" /> --}}
	<!-- / -->
	{{-- <link rel="stylesheet" href="{{ url('front/one-page/css/et-line.css')}}" type="text/css" /> --}}

	<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>

.block-card-9 .grid-inner .btn-hover {
			opacity: 0;
			display: block;
			transition: opacity .3s ease, transform .3s .1s ease;
			margin-top: 15px;
			position: absolute;
			transform: translateY(0);
		}
		.block-card-9 .grid-inner:hover .btn-hover {
			opacity: 1;
			transform: translateY(-5px);
		}

		.block-card-9 .grid-inner .grid-image {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-size: cover;
			background-position: center center;
		}

		.block-card-9 .grid-inner:hover .grid-image {
			-webkit-animation: kenburns 20s ease-out both;
	        animation: kenburns 20s ease-out both;
		}

		.block-card-9 .grid-inner .grid-icon,
		.block-card-9 .grid-inner .grid-content {
			transition: transform .3s ease;
		}

		.block-card-9 .grid-inner:hover .grid-content { transform: translateY(-45px); }
		.block-card-9 .grid-inner:hover .grid-icon { transform: translateY(-5px); }

		@-webkit-keyframes kenburns {
		  0% {
		    -webkit-transform: scale(1) translate(0, 0);
		            transform: scale(1) translate(0, 0);
		    -webkit-transform-origin: 84% 84%;
		            transform-origin: 84% 84%;
		  }
		  100% {
		    -webkit-transform: scale(1.25) translate(20px, 15px);
		            transform: scale(1.25) translate(20px, 15px);
		    -webkit-transform-origin: right bottom;
		            transform-origin: right bottom;
		  }
		}
		@keyframes kenburns {
		  0% {
		    -webkit-transform: scale(1) translate(0, 0);
		            transform: scale(1) translate(0, 0);
		    -webkit-transform-origin: 84% 84%;
		            transform-origin: 84% 84%;
		  }
		  100% {
		    -webkit-transform: scale(1.25) translate(20px, 15px);
		            transform: scale(1.25) translate(20px, 15px);
		    -webkit-transform-origin: right bottom;
		            transform-origin: right bottom;
		  }
		}


</style>
@endsection

@section('content')
		<!-- Slider
		============================================= -->
	
    
			<livewire:front.page.hero-image :pageURL="$pageURL" />
    <!-- #slider end -->
<!-- Content
		============================================= -->
		<section id="content  ">
			<div class="content-wrap min-vh-100 d-flex align-items-center">
				<div class="container clearfix">

					<div class="row block-card-9 col-mb-50">

						<div class="col-lg-4 min-vh-75">
							<div class="grid-inner rounded-3 h-100">
								<div class="grid-image lazy" data-bg="{{ url('images/projects/the-sail/The_Sail_MTower_Building-scaled.jpg')}}"></div>
								<div class="bg-overlay">
									<div class="bg-overlay-content flex-column justify-content-between align-items-start p-5 dark">
										<div class="grid-icon">
											<img src="{{ url('images/projects/the-sail/thesail-logo.png')}}" alt="Image" width="120">
										</div>
										<div class="grid-content">
											<h5 class="text-uppercase fw-medium font-body ls1 text-smaller op-07 mb-2">A Pride of Globalisation</h5>
											<h3 class="fw-medium h2">The Sail ,Melaka</h3>
											<a href="#" class="icon-stacked rounded-circle bg-white text-danger text-center mb-0 btn-hover h5"><i class="icon-line-arrow-right"></i></a>
										</div>
									</div>
									<div class="bg-overlay-bg" style="background: linear-gradient(to bottom, rgba(0,0,0,0.3) 30%, #4115b970 100%);"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 min-vh-75">
							<div class="grid-inner rounded-3 h-100">
								<div class="grid-image lazy" data-bg="{{ url('images/projects/the-sail/6-1.jpg')}}"></div>
								<div class="bg-overlay">
									<div class="bg-overlay-content flex-column justify-content-between align-items-start p-5 dark">
										<div class="grid-icon">
											
											<img src="{{ url('images/projects/the-sail/thesail-logo.png')}}" alt="Image" width="120">
										</div>
										<div class="grid-content">
											<h5 class="text-uppercase fw-medium font-body ls1 text-smaller op-07 mb-2">Sustainable Agriculture</h5>
											<h3 class="fw-medium h2">Grown without Insecticides</h3>
											<a href="#" class="icon-stacked rounded-circle bg-white text-center mb-0 btn-hover h5" style="color: brown"><i class="icon-line-arrow-right"></i></a>
										</div>
									</div>
									<div class="bg-overlay-bg" style="background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, #604235 100%);"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 min-vh-75">
							<div class="grid-inner rounded-3 h-100">
								<div class="grid-image lazy" data-bg="{{ url('images/projects/the-sail/6-1.jpg')}}"></div>
								<div class="bg-overlay">
									<div class="bg-overlay-content flex-column justify-content-between align-items-start p-5 dark">
										<div class="grid-icon">
											
											<img src="{{ url('images/projects/the-sail/thesail-logo.png')}}" alt="Image" width="120">
										</div>
										<div class="grid-content">
											<h5 class="text-uppercase fw-medium font-body ls1 text-smaller op-07 mb-2">Farmer's Markets</h5>
											<h3 class="fw-medium h2">Available Countrywide</h3>
											<a href="#" class="icon-stacked rounded-circle bg-white text-success text-center mb-0 btn-hover h5"><i class="icon-line-arrow-right"></i></a>
										</div>
									</div>
									<div class="bg-overlay-bg" style="background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, #497b37 100%);"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 min-vh-75">
							<div class="grid-inner rounded-3 h-100">
								<div class="grid-image lazy" data-bg="{{ url('images/projects/the-sail/6-1.jpg')}}"></div>
								<div class="bg-overlay">
									<div class="bg-overlay-content flex-column justify-content-between align-items-start p-5 dark">
										<div class="grid-icon">
											
											<img src="{{ url('images/projects/the-sail/thesail-logo.png')}}" alt="Image" width="120">
										</div>
										<div class="grid-content">
											<h5 class="text-uppercase fw-medium font-body ls1 text-smaller op-07 mb-2">Organic &amp; Handmade</h5>
											<h3 class="fw-medium h2">Crafted Plates of Food</h3>
											<a href="#" class="icon-stacked rounded-circle bg-white text-danger text-center mb-0 btn-hover h5"><i class="icon-line-arrow-right"></i></a>
										</div>
									</div>
									<div class="bg-overlay-bg" style="background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, #b91523 100%);"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 min-vh-75">
							<div class="grid-inner rounded-3 h-100">
								<div class="grid-image lazy" data-bg="{{ url('images/projects/the-sail/6-1.jpg')}}"></div>
								<div class="bg-overlay">
									<div class="bg-overlay-content flex-column justify-content-between align-items-start p-5 dark">
										<div class="grid-icon">
											
											<img src="{{ url('images/projects/the-sail/thesail-logo.png')}}" alt="Image" width="120">
										</div>
										<div class="grid-content">
											<h5 class="text-uppercase fw-medium font-body ls1 text-smaller op-07 mb-2">Sustainable Agriculture</h5>
											<h3 class="fw-medium h2">Grown without Insecticides</h3>
											<a href="#" class="icon-stacked rounded-circle bg-white text-center mb-0 btn-hover h5" style="color: brown"><i class="icon-line-arrow-right"></i></a>
										</div>
									</div>
									<div class="bg-overlay-bg" style="background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, #604235 100%);"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="content-wrap bg-light">
				<div class="row justify-content-between align-items-center py-md-6">

					<div class="col-lg-5">
						<div class="col-padding">
							<h2 class="fw-semibold mb-3">The Sails</h2>
							<p class="lead mb-5">The Sail is the brainchild of Sheng Tai International, a multinational development, real estate, investment management, property tourism and hospitality company with a vision to fully capitalise on the One Belt One Road ambition.</p>
							<a href="#" class="btn px-5 py-3 btn-dark rounded-0">Get Started</a>
						</div>
					</div>

					<div class="col-lg-7">
						<div id="oc-images" class="owl-carousel image-carousel carousel-widget" data-nav="false" data-margin="20" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="3" data-items-xl="3">

							<div class="oc-item">
								<a href="demo-hostel.html"><img src="{{ url('images/projects/the-sail/promo/1.jpg')}}" alt="Image 1" class="border border-f5 shadow-sm"></a>
							</div>
							<div class="oc-item">
								<a href="demo-blog.html"><img src="{{ url('images/projects/the-sail/promo/2.jpg')}}" alt="Image 2" class="border border-f5 shadow-sm"></a>
							</div>
							<div class="oc-item">
								<a href="demo-forum.html"><img src="{{ url('images/projects/the-sail/promo/1.jpg')}}" alt="Image 3" class="border border-f5 shadow-sm"></a>
							</div>
							<div class="oc-item">
								<a href="demo-landing.html"><img src="{{ url('images/projects/the-sail/promo/2.jpg')}}" alt="Image 4" class="border border-f5 shadow-sm"></a>
							</div>
							<div class="oc-item">
								<a href="http://themes.semicolonweb.com/html/canvas/intro.html#section-niche"><img src="{{ url('images/projects/the-sail/promo/1.jpg')}}" alt="Image 5" class="border border-f5 shadow-sm"></a>
							</div>

						</div>
					</div>

				</div>
			</div>
		</section><!-- #content end -->

@endsection
@section('customjs')
<script src="js/jquery.hotspot.js"></script>


@endsection