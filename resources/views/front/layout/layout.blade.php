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
	<link rel="stylesheet" href="{{ url('front/style.css" type="')}}text/css" />
	<link rel="stylesheet" href="{{ url('front/css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{ url('front/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{ url('front/css/custom.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

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

		<section id="slider" class="slider-element slider-parallax swiper_wrapper vh-75">
			<div class="slider-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark">
							<div class="container">
								<div class="slider-caption slider-caption-center">
									<h2 data-animate="fadeInUp">Welcome to Canvas</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on our Canvas.</p>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background-image: url('images/slider/swiper/1.jpg');"></div>
						</div>
						<div class="swiper-slide dark">
							<div class="container">
								<div class="slider-caption slider-caption-center">
									<h2 data-animate="fadeInUp">Beautifully Flexible</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
								</div>
							</div>
							<div class="video-wrap">
								<video poster="images/videos/explore-poster.jpg" preload="auto" loop autoplay muted>
									<source src='images/videos/explore.mp4' type='video/mp4' />
									<source src='images/videos/explore.webm' type='video/webm' />
								</video>
								<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="container">
								<div class="slider-caption">
									<h2 data-animate="fadeInUp">Great Performance</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background-image: url('images/slider/swiper/3.jpg'); background-position: center top;"></div>
						</div>
					</div>
					<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
					<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
				</div>

			</div>
		</section>

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">

				<div class="promo promo-light promo-full bottommargin-lg header-stick border-top-0 p-5">
					<div class="container clearfix">
						<div class="row align-items-center">
							<div class="col-12 col-lg">
								<h3>Try Premium Free for <span>30 Days</span> and you'll never regret it!</h3>
								<span>Starts at just <em>$0/month</em> afterwards. No Ads, No Gimmicks and No SPAM. Just Real Content.</span>
							</div>
							<div class="col-12 col-lg-auto mt-4 mt-lg-0">
								<a href="#" class="button button-large button-circle m-0">Start Trial</a>
							</div>
						</div>
					</div>
				</div>

				<div class="container clearfix">

					<div class="row col-mb-50">
						<div class="col-sm-6 col-lg-3">
							<div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
								<div class="fbox-icon">
									<a href="#"><i class="i-alt border-0 icon-shop"></i></a>
								</div>
								<div class="fbox-content">
									<h3>e-Commerce Solutions<span class="subtitle">Start your Own Shop today</span></h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-lg-3">
							<div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
								<div class="fbox-icon">
									<a href="#"><i class="i-alt border-0 icon-wallet"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Easy Payment Options<span class="subtitle">Credit Cards &amp; PayPal Support</span></h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-lg-3">
							<div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
								<div class="fbox-icon">
									<a href="#"><i class="i-alt border-0 icon-megaphone"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Instant Notifications<span class="subtitle">Realtime Email &amp; SMS Support</span></h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-lg-3">
							<div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
								<div class="fbox-icon">
									<a href="#"><i class="i-alt border-0 icon-fire"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Hot Offers Daily<span class="subtitle">Upto 50% Discounts</span></h3>
								</div>
							</div>
						</div>
					</div>

					<div class="line"></div>

					<div class="row col-mb-50">
						<div class="col-md-5">
							<a href="https://vimeo.com/101373765" class="d-block position-relative rounded overflow-hidden" data-lightbox="iframe">
								<img src="images/others/1.jpg" alt="Image" class="w-100">
								<div class="bg-overlay">
									<div class="bg-overlay-content dark">
										<i class="i-circled i-light icon-line-play m-0"></i>
									</div>
									<div class="bg-overlay-bg op-06 dark"></div>
								</div>
							</a>
						</div>

						<div class="col-md-7">
							<div class="heading-block">
								<h2>Globally Preferred Ecommerce Platform</h2>
							</div>

							<p>Worldwide John Lennon, mobilize humanitarian; emergency response donors; cause human experience effect. Volunteer Action Against Hunger Aga Khan safeguards women's.</p>

							<div class="row col-mb-30">
								<div class="col-sm-6 col-md-12 col-lg-6">
									<ul class="iconlist iconlist-color mb-0">
										<li><i class="icon-caret-right"></i> Responsive Ready Layout</li>
										<li><i class="icon-caret-right"></i> Retina Display Supported</li>
										<li><i class="icon-caret-right"></i> Powerful &amp; Optimized Code</li>
										<li><i class="icon-caret-right"></i> 380+ Templates Included</li>
									</ul>
								</div>

								<div class="col-sm-6 col-md-12 col-lg-6">
									<ul class="iconlist iconlist-color mb-0">
										<li><i class="icon-caret-right"></i> 12+ Headers &amp; Menu Designs</li>
										<li><i class="icon-caret-right"></i> Premium Sliders Included</li>
										<li><i class="icon-caret-right"></i> Light &amp; Dark Colors</li>
										<li><i class="icon-caret-right"></i> e-Commerce Design Included</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="section topmargin-lg">
					<div class="container clearfix">

						<div class="heading-block center">
							<h2>Features that you are gonna Love</h2>
							<span>Canvas comes with 100+ Feature oriented Shortcodes that are easy to use too.</span>
						</div>

						<div class="row justify-content-center col-mb-50">
							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn">
									<div class="fbox-icon">
										<a href="#"><i class="icon-phone2"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Responsive Layout</h3>
										<p>Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="200">
									<div class="fbox-icon">
										<a href="#"><i class="icon-eye"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Retina Ready Graphics</h3>
										<p>Looks beautiful &amp; ultra-sharp on Retina Displays with Retina Icons, Fonts &amp; Images.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="400">
									<div class="fbox-icon">
										<a href="#"><i class="icon-star2"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Powerful Performance</h3>
										<p>Optimized code that are completely customizable and deliver unmatched fast performance.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="600">
									<div class="fbox-icon">
										<a href="#"><i class="icon-video"></i></a>
									</div>
									<div class="fbox-content">
										<h3>HTML5 Video</h3>
										<p>Canvas provides support for Native HTML5 Videos that can be added to a Full Width Background.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="800">
									<div class="fbox-icon">
										<a href="#"><i class="icon-params"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Parallax Support</h3>
										<p>Display your Content attractively using Parallax Sections that have unlimited customizable areas.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="1000">
									<div class="fbox-icon">
										<a href="#"><i class="icon-fire"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Endless Possibilities</h3>
										<p>Complete control on each &amp; every element that provides endless customization possibilities.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="1200">
									<div class="fbox-icon">
										<a href="#"><i class="icon-bulb"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Light &amp; Dark Color Schemes</h3>
										<p>Change your Website's Primary Scheme instantly by simply adding the dark class to the body.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="1400">
									<div class="fbox-icon">
										<a href="#"><i class="icon-heart2"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Boxed &amp; Wide Layouts</h3>
										<p>Stretch your Website to the Full Width or make it boxed to surprise your visitors.</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="1600">
									<div class="fbox-icon">
										<a href="#"><i class="icon-note"></i></a>
									</div>
									<div class="fbox-content">
										<h3>Extensive Documentation</h3>
										<p>We have covered each &amp; everything in our Documentation including Videos &amp; Screenshots.</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="container clearfix">

					<div class="heading-block center">
						<h3>Some of our <span>Featured</span> Works</h3>
						<span>We have worked on some Awesome Projects that are worth boasting of.</span>
					</div>

					<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="1" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-xl="4">

						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="images/portfolio/4/1.jpg" alt="Open Imagination">
								</a>
								<div class="bg-overlay">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
										<a href="images/portfolio/full/1.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350" data-lightbox="image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single.html">Open Imagination</a></h3>
								<span><a href="#">Media</a>, <a href="#">Icons</a></span>
							</div>
						</div>

						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="images/portfolio/4/2.jpg" alt="Locked Steel Gate">
								</a>
								<div class="bg-overlay">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
										<a href="images/portfolio/full/2.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350" data-lightbox="image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single.html">Locked Steel Gate</a></h3>
								<span><a href="#">Illustrations</a></span>
							</div>
						</div>
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="#">
									<img src="images/portfolio/4/3.jpg" alt="Mac Sunglasses">
								</a>
								<div class="bg-overlay">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
										<a href="https://vimeo.com/89396394" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350" data-lightbox="iframe"><i class="icon-line-play"></i></a>
										<a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
								<span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
							</div>
						</div>
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="#">
									<img src="images/portfolio/4/4.jpg" alt="Morning Dew">
								</a>
								<div class="bg-overlay" data-lightbox="gallery">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
										<a href="images/portfolio/full/4.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="images/portfolio/full/4-1.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single-gallery.html">Morning Dew</a></h3>
								<span><a href="#">Icons</a>, <a href="#">Illustrations</a></span>
							</div>
						</div>
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="images/portfolio/4/5.jpg" alt="Console Activity">
								</a>
								<div class="bg-overlay">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
										<a href="images/portfolio/full/5.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single.html">Console Activity</a></h3>
								<span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
							</div>
						</div>
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="portfolio-single-gallery.html">
									<img src="images/portfolio/4/6.jpg" alt="Shake It!">
								</a>
								<div class="bg-overlay" data-lightbox="gallery">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
										<a href="images/portfolio/full/6.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="images/portfolio/full/6-1.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="images/portfolio/full/6-2.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="images/portfolio/full/6-3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="portfolio-single-gallery.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single-gallery.html">Shake It!</a></h3>
								<span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
							</div>
						</div>
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="portfolio-single-video.html">
									<img src="images/portfolio/4/7.jpg" alt="Backpack Contents">
								</a>
								<div class="bg-overlay">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
										<a href="https://www.youtube.com/watch?v=kuceVNBTJio" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="iframe"><i class="icon-line-play"></i></a>
										<a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single-video.html">Backpack Contents</a></h3>
								<span><a href="#">UI Elements</a>, <a href="#">Icons</a></span>
							</div>
						</div>
						<div class="portfolio-item">
							<div class="portfolio-image">
								<a href="portfolio-single.html">
									<img src="images/portfolio/4/8.jpg" alt="Sunset Bulb Glow">
								</a>
								<div class="bg-overlay">
									<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
										<a href="images/portfolio/full/8.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Image"><i class="icon-line-plus"></i></a>
										<a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
									</div>
									<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="portfolio-single.html">Sunset Bulb Glow</a></h3>
								<span><a href="#">Graphics</a></span>
							</div>
						</div>

					</div>
				</div>

				<div class="section topmargin-sm mb-0">

					<div class="container clearfix">

						<div class="heading-block center">
							<h3>Testimonials</h3>
							<span>Check out some of our Client Reviews</span>
						</div>

						<ul class="testimonials-grid grid-1 grid-md-2 grid-lg-3">
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/1.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum repellendus!</p>
										<div class="testi-meta">
											John Doe
											<span>XYZ Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/2.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
										<div class="testi-meta">
											Collis Ta'eed
											<span>Envato Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/7.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Fugit officia dolor sed harum excepturi ex iusto magnam asperiores molestiae qui natus obcaecati facere sint amet.</p>
										<div class="testi-meta">
											Mary Jane
											<span>Google Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/3.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
										<div class="testi-meta">
											Steve Jobs
											<span>Apple Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/4.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, perspiciatis illum totam dolore deleniti labore.</p>
										<div class="testi-meta">
											Jamie Morrison
											<span>Adobe Inc.</span>
										</div>
									</div>
								</div>
							</li>
							<li class="grid-item">
								<div class="testimonial">
									<div class="testi-image">
										<a href="#"><img src="images/testimonials/8.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Porro dolorem saepe reiciendis nihil minus neque. Ducimus rem necessitatibus repellat laborum nemo quod.</p>
										<div class="testi-meta">
											Cyan Ta'eed
											<span>Tutsplus</span>
										</div>
									</div>
								</div>
							</li>
						</ul>

					</div>

				</div>

				<div class="container clearfix">

					<div id="oc-clients" class="owl-carousel owl-carousel-full image-carousel carousel-widget" data-margin="30" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6" style="padding: 20px 0;">

						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/1.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/2.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/3.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/4.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/5.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/6.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/7.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/8.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/9.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/10.png" alt="Clients"></a></div>

					</div>

				</div>

				<a href="#" class="button button-full center text-end footer-stick">
					<div class="container clearfix">
						Canvas comes with Unlimited Customizations &amp; Options. <strong>Check Out</strong> <i class="icon-caret-right" style="top:4px;"></i>
					</div>
				</a>

			</div>
		</section>
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