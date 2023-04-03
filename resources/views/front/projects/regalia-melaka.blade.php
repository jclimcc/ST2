@extends('front.layout.layout')
@section('customcss')
	<!-- One Page Module Specific Stylesheet -->
	{{-- <link rel="stylesheet" href="{{ url('front/css/one-page/onepage.css')}}" type="text/css" /> --}}
	<!-- / -->
	<link rel="stylesheet" href="{{ url('front/one-page/css/et-line.css')}}" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>

.dotted-bg:before {
	content: "";
	position: absolute;
	display: block;
	top: 50%;
	left: 50%;
	width: 110%;
	height: 100%;
	background-size: 12px 12px;
	background-position: center;
	transform: translate(-50%, -50%);
	background-image: radial-gradient(rgba(38,70,83,0.3) 14%, transparent 14%);
	-webkit-mask-image: radial-gradient(rgba(0,0,0,1),rgba(0,0,0,0) 75%);
	mask-image: radial-gradient(rgba(0,0,0,1),rgba(0,0,0,0) 75%);
	z-index: 0;
}

.showcase-section .showcase-target { display: none; }

.showcase-section .showcase-target.showcase-target-active { display: block; }

.showcase-section ul { list-style: none; }

.showcase-section ul li {
	display: block;
	position: relative;
	padding: 24px 0;
	cursor: pointer;
	border-top: 1px solid #F0F2F6;
}

.showcase-section ul li:first-child {
	padding-top: 0;
	border-top: 0;
}

.showcase-section ul li h3 {
	display: block;
	position: relative;
	font-size: 18px;
	font-weight: 600;
	margin-bottom: 5px;
}

.showcase-section ul li p {
	font-weight: 400;
	font-size: 15px;
	line-height: 1.6;
	margin-bottom: 0;
	color: #777;
}

.showcase-section ul li h3::before {
	opacity: 0;
	content: "\e77d";
	font-family: 'font-icons';
	position: absolute;
	margin-left: -20px;
	top: -2px;
	-webkit-transition: margin-left .3s ease, opacity .3s ease;
	-ms-transition: margin-left .3s ease, opacity .3s ease;
	-o-transition: margin-left .3s ease, opacity .3s ease;
	transition: margin-left .3s ease, opacity .3s ease;
}

.showcase-section ul li.showcase-feature-active h3::before {
	opacity: 1;
	margin-left: -15px;
}

.showcase-section ul li.showcase-feature-active h3 { color: var(--themecolor); }

.showcase-section .showcase-target {
	display: block;
	position: absolute;
	top: 0;
	right: 0;
	opacity: 0;
	width: 100%;
	-webkit-transform: translateX(-10px);
	-ms-transform: translateX(-10px);
	-o-transform: translateX(-10px);
	transform: translateX(-10px);
	-webkit-transition: all .3s .1s ease;
	-o-transition: all .3s .1s ease;
	transition: all .3s .1s ease;
	-webkit-backface-visibility: hidden;
}

.showcase-section .showcase-target.showcase-target-active {
	opacity: 1;
	-webkit-transform: translateX(0);
	-ms-transform: translateX(0);
	-o-transform: translateX(0);
	transform: translateX(0);
	z-index: 9;
}

.showcase-section .showcase-target:first-child { position:  relative; }

</style>
@endsection

@section('content')
		<!-- Slider
		============================================= -->
	
    
			<livewire:front.page.hero-image :pageURL="$pageURL" />
    <!-- #slider end -->
<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap pb-0">
				<div class="container mb-5">
					<div class="single-product">
						<div class="product">
							<div class="row gutter-40">

								<div class="col-md-5">

									<!-- Product Single - Gallery
									============================================= -->
									<div class="product-image">
										<div id="oc-images" class="owl-carousel carousel-widget" data-lightbox="gallery" data-margin="0" data-items="1" data-pagi="false" data-nav="false" data-loop="true">
											<div class="oc-item">
												<a href="images/shop/dress/3.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item">
													<img src="{{ url('images/projects/the-sail.png')}}" alt="Pink Printed Dress">
												</a>
											</div>
											<div class="oc-item">
												<a href="images/shop/dress/3.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item">
													<img src="{{ url('images/projects/the-sail/6-1.jpg')}}" alt="Pink Printed Dress">
												</a>
											</div>
											<div class="oc-item">
												<a href="images/shop/dress/3-1.jpg" title="Pink Printed Dress - Side View" data-lightbox="gallery-item">
													<img src="{{ url('images/projects/the-sail/6-2.jpg')}}" alt="Pink Printed Dress">
												</a>
											</div>
											<div class="oc-item">
												<a href="images/shop/dress/3-2.jpg" title="Pink Printed Dress - Back View" data-lightbox="gallery-item">
													<img src="{{ url('images/projects/the-sail/6-3.jpg')}}" alt="Pink Printed Dress">
												</a>
											</div>
										</div>
									</div><!-- Product Single - Gallery End -->

								</div>

								<div class="col-md-5 product-desc">

									<div class="d-flex align-items-center justify-content-between">

										<!-- Product Single - Price
										============================================= -->
										<div class="product-price"><ins>The Sail, Melaka</ins></div><!-- Product Single - Price End -->

										<!-- Product Single - Rating
										============================================= -->
										<div class="product-rating">
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											<i class="icon-star3"></i>
											
										</div><!-- Product Single - Rating End -->

									</div>


									<div class="line"></div>

									<!-- Product Single - Short Description
									============================================= -->
									<p>9 linked towers backed by the picturesque Strait of Malacca, The Sail resembles a regal fleet of shipsand is home to a bustling hub with residences, hotels, retail shops, offices and other glamorous spaces.</p>

										<p>	Some of its must-visit spots are Melaka’s longest rooftop pool, largest luxuryshopping mall, largest sky garden, longest sky bridge, and first sky-high restaurants.</p>
									
									<p>Perspiciatis ad eveniet ea quasi debitis quos laborum eum reprehenderit eaque explicabo assumenda rem modi.</p>
									
									<h4>Attractive Point</h4>
									<ul class="iconlist">
										<li><i class="icon-caret-right"></i>Moon Theatre With 360˚ Movie Experience</li>
										<li><i class="icon-caret-right"></i>59th Floor Sky Open Bar</li>
										<li><i class="icon-caret-right"></i>330m Longest Unity Sky Ring</li>
										<li><i class="icon-caret-right"></i>Themed Sky Bars & International Cuisine Restaurants</li>
										<li><i class="icon-caret-right"></i>386m Longest Rooftop Pool</li>
										<li><i class="icon-caret-right"></i>Waterside Alfresco</li>
									</ul><!-- Product Single - Short Description End -->

									<div class="line"></div>

									<h4>Contact us</h4>

									

									<!-- Product Single - Meta
									============================================= -->
									<div class="card mt-5 product-meta">
										<div class="card-body">
											
											<span class="posted_in">Office Telephone: 
												: <a href="#" rel="tag">+603 7890 3096</a>.</span>
											<span class="tagged_as">Handphone: <a href="#" rel="tag">+6011 3737 3399</a></span>
										</div>
									</div><!-- Product Single - Meta End -->

								
								</div>

								<div class="col-md-2">

									<a href="#" title="Brand Logo" class="d-none d-md-block"><img src="{{ url('images/projects/the-sail/thesail-logo.png')}}" alt="Brand Logo"></a>

									<div class="divider divider-center"><i class="icon-circle-blank"></i></div>

									<div class="feature-box fbox-plain fbox-dark fbox-sm">
										<div class="fbox-icon">
											<i class="icon-thumbs-up2"></i>
										</div>
										<div class="fbox-content fbox-content-sm">
											<h3>LUXURY CONDOTELS</h3>
											<p class="mt-0">Luxurious hotels cum residences with high qualit furnising and finishes</p>
										</div>
									</div>

									<div class="feature-box fbox-plain fbox-dark fbox-sm mt-4">
										<div class="fbox-icon">
											<i class="icon-credit-cards"></i>
										</div>
										<div class="fbox-content fbox-content-sm">
											<h3>BUSINESS SUITES</h3>
											<p class="mt-0">Executive spaces with sea view and highest privacy and personalisation</p>
										</div>
									</div>

									<div class="feature-box fbox-plain fbox-dark fbox-sm mt-4">
										<div class="fbox-icon">
											<i class="icon-truck2"></i>
										</div>
										<div class="fbox-content fbox-content-sm">
											<h3>LUXURY SHOPPING MALL</h3>
											<p class="mt-0">AT 1,000,000 SF, Its Melaka's Largest Shopping Mall</p>
										</div>
									</div>

									<div class="feature-box fbox-plain fbox-dark fbox-sm mt-4">
										<div class="fbox-icon">
											<i class="icon-undo"></i>
										</div>
										<div class="fbox-content fbox-content-sm">
											<h3>5 & 6 STAR HOTELS</h3>
											<p class="mt-0">Spacious accommodations and beautifully decorated amenities</p>
										</div>
									</div>

								</div>

								<div class="w-100"></div>

							</div>
						</div>
					</div>


					
					
				</div>

				
				<div class="section  mb-0 parallax m-0 dark skrollable skrollable-between" 
				style="background-image: linear-gradient(to top, rgba(171, 249, 202,0.31), #39384D), url('{{ url('images/aboutus/parallax/demo1.jpg')}}'); background-size: cover; padding: 120px 0;" data-bottom-top="background-position:0px 40px;" data-top-bottom="background-position:0px -40px;">
				
						
				<div class="container">
					<div class="heading-block border-bottom-0 center">
						<div class="badge rounded-pill badge-default">Features</div>
						<h3 class="nott ls0">Best development 2021:</h3>
					</div>
				
					<div class="row topmargin">
						<div class="col-md-6">
							<h3 class="text-dark"><i class="icon-line-circle-check color me-1 position-relative" style="top: 2px"></i>Who We are</h3>
							<p>Sheng Tai Real Estate Dramatically re-engineer integrated e-tailers without interoperable growth strategies. Collaboratively create customer directed "outside the box" thinking with world-class e-commerce.</p>
						</div>
						<div class="col-md-6">
							<h3 class="text-dark"><i class="icon-line-circle-check color me-1 position-relative" style="top: 2px"></i> What we Do</h3>
							<p>Intrinsicly recaptiualize state of the art information for interactive applications. Dynamically optimize proactive convergence and timely value.</p>
						</div>
					</div>
					</div>
				</div>
					

				<div class="clear"></div>
				
        <div class="section  bg-transparent topmargin-lg mb-0" >
					<div class="container">
						<div class="heading-block mx-auto center" style="max-width: 600px">
							<h2 class="text-capitalize fw-semibold ls0 mb-1" style="font-size: 36px">Discover the Ideal Lifestyle</h2>
							<p>This location provides a high-quality living experience, making it an ideal destination for holidays, shopping, and relaxation. It is widely appreciated by many individuals</p>
						</div>
						<div class="clear"></div>
						<div class="row showcase-section align-items-center justify-content-between clearfix mx-auto rounded ytb-card px-5 py-5" style="box-shadow: 0 32px 46px 2px rgba(0,0,0,0.12);">
							<div class="col-lg-3 col-md-5">
								<ul class="mb-0">
									<li class="showcase-feature showcase-feature-active" data-target="#target-1">
										<h3>Location</h3>
	  									<p>Credibly conceptualize backward-compatible interna visionary.</p>
									</li>
									<li class="showcase-feature" data-target="#target-2">
										<h3>Unit Floor plan</h3>
	  									<p>Assertively engineer standardized interactive meta-services.</p>
									</li>
									<li class="showcase-feature" data-target="#target-3">
										<h3>Facility Floor Plan </h3>
	  									<p>Holisticly customize fully synergistic e-business continually.</p>
									</li>
									<li class="showcase-feature" data-target="#target-4">
										<h3 class="text-uppercase">Gallery Photo</h3>
	  									<p>Interactively without backward-compatible enable.</p>
									</li>
								</ul>
							</div>

							<div class="col-lg-8 col-md-7">
								<div id="target-1" class="showcase-target showcase-target-active">
									
									<a href="{{ url('images/projects/the-sail/location.png')}}" data-lightbox="image"><img class="rounded" src="{{ url('images/projects/the-sail/location.png')}}" alt="Image"></a>
								</div>
								
								<div id="target-2" class="showcase-target">
									<div id="oc-portfolio " class="owl-carousel owl-carousel-full portfolio-carousel carousel-widget" data-margin="2" data-pagi="true" data-autoplay="20000"  data-stage-padding="30"  data-rewind="true" data-items-xs="1" data-items-sm="2" data-items-md="1" data-items-xl="1">
										
										<div class="portfolio-item">
										  <div class="portfolio-image">		
											<a href="{{ url('images/projects/the-sail/layout/typeA.png')}}" data-lightbox="image">							
											  <img src="{{ url('images/projects/the-sail/layout/typeA.png')}}" alt="Open Imagination" ></a>
											  <div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>TYPE A Built-up: 39.24 m2 / 422 ft2</h3>
											  </div>
										  </div>										  
										</div>									  
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/layout/typeB.png')}}" data-lightbox="image">	
											  <img src="{{ url('images/projects/the-sail/layout/typeB.png')}}" alt="Open Imagination">	
											</a>						
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>TYPE B Built-up: 56.13 m2 / 604 ft2 </h3>
											</div>
										  </div>
										</div>
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/layout/typeC.png')}}" data-lightbox="image">	
											  <img src="{{ url('images/projects/the-sail/layout/typeC.png')}}" alt="Open Imagination">
											</a>
											
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>TYPE C Built-up: 31.98 m2 / 344 ft2 </h3>
											</div>											
											</div>
										</div>
									</div>
								</div>
									   
										
								<div id="target-3" class="showcase-target">
									<div id="oc-portfolio " class="owl-carousel owl-carousel-full portfolio-carousel carousel-widget" data-margin="2" data-pagi="true" data-autoplay="20000"  data-stage-padding="30"  data-rewind="true" data-items-xs="1" data-items-sm="2" data-items-md="1" data-items-xl="1">
										
										<div class="portfolio-item">
										  <div class="portfolio-image">		
											<a href="{{ url('images/projects/the-sail/gallery/g1.png')}}" data-lightbox="image">								
											  <img src="{{ url('images/projects/the-sail/gallery/g1.png')}}" alt="Open Imagination" >
											</a>
											  <div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>Residences Lobby </h3>
											  </div>
										  </div>										  
										</div>									  
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/gallery/g2.png')}}" data-lightbox="image">		
											  <img src="{{ url('images/projects/the-sail/gallery/g2.png')}}" alt="Open Imagination">
											</a>							
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>Visitor Waiting Area </h3>
											</div>
										  </div>
										</div>
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/gallery/g3.png')}}" data-lightbox="image">		
											  <img src="{{ url('images/projects/the-sail/gallery/g3.png')}}" alt="Open Imagination">
											</a>
										
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>Shopping mall</h3>
											</div>											
											</div>
										</div>
									</div>
								</div>
								<div id="target-4" class="showcase-target">
									<div id="oc-portfolio " class="owl-carousel owl-carousel-full portfolio-carousel carousel-widget" data-margin="2" data-pagi="true" data-autoplay="20000"  data-stage-padding="30"  data-rewind="true" data-items-xs="1" data-items-sm="2" data-items-md="1" data-items-xl="1">
										
										<div class="portfolio-item">
										  <div class="portfolio-image">			
											<a href="{{ url('images/projects/the-sail/gallery/Type-A-Bedroom.jpg')}}" data-lightbox="image">								
											  <img src="{{ url('images/projects/the-sail/gallery/Type-A-Bedroom.jpg')}}" alt="Open Imagination" >
											</a>
											  <div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>2 Room 1 Toilet (800sqft) </h3>
											  </div>
										  </div>										  
										</div>									  
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/gallery/Type-A-Bedroom-2.jpg')}}" data-lightbox="image">	
											  <img src="{{ url('images/projects/the-sail/gallery/Type-A-Bedroom-2.jpg')}}" alt="Open Imagination">
											</a>											
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>2 Room 1 Toilet (800sqft) </h3>
											</div>
										  </div>
										</div>
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/gallery/Type-B-Dining.jpg')}}" data-lightbox="image">	
											  <img src="{{ url('images/projects/the-sail/gallery/Type-B-Dining.jpg')}}" alt="Open Imagination">
											</a>
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>Real Estate Services</h3>
											</div>											
											</div>
										</div>
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/gallery/Type-B-Living.jpg')}}" data-lightbox="image">	
											  <img src="{{ url('images/projects/the-sail/gallery/Type-B-Living.jpg')}}" alt="Open Imagination">
											</a>
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>Real Estate Services</h3>
											</div>											
											</div>
										</div>
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/gallery/Type-C-Bedroom.jpg')}}" data-lightbox="image">	
											  <img src="{{ url('images/projects/the-sail/gallery/Type-C-Bedroom.jpg')}}" alt="Open Imagination">
											</a>
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>Real Estate Services</h3>
											</div>											
											</div>
										</div>
										<div class="portfolio-item">
										  <div class="portfolio-image">
											<a href="{{ url('images/projects/the-sail/gallery/Type-C-Overall.jpg')}}" data-lightbox="image">	
											  <img src="{{ url('images/projects/the-sail/gallery/Type-C-Overall.jpg')}}" alt="Open Imagination">
											</a>
											<div class="portfolio-desc" data-animate="fadeIn" data-speed="2000">
												<h3>Real Estate Services</h3>
											</div>											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</section><!-- #content end -->

@endsection
@section('customjs')
<script>
  


  function showcaseSection( element ){

    var otherElements = element.parents('.showcase-section').find('.showcase-feature'),
      elementTarget = jQuery( element.attr('data-target') ),
      otherTargets = element.parents('.showcase-section').find('.showcase-target');

    otherElements.removeClass('showcase-feature-active');
    element.addClass('showcase-feature-active');
    otherTargets.removeClass('showcase-target-active');
    elementTarget.addClass('showcase-target-active');

  }

  jQuery('.showcase-feature').hover( function(){
    showcaseSection( jQuery(this) );
  });


</script>

@endsection