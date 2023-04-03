@extends('front.layout.layout')
@section('customcss')
	<!-- One Page Module Specific Stylesheet -->
	{{-- <link rel="stylesheet" href="{{ url('front/css/one-page/onepage.css')}}" type="text/css" /> --}}
	<!-- / -->
	<link rel="stylesheet" href="{{ url('front/one-page/css/et-line.css')}}" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>

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

				<div class="container">
					<div class="row topmargin">
						<div class="col-md-5 offset-md-1">
							<h3 class="text-dark"><i class="icon-line-circle-check color me-1 position-relative" style="top: 2px"></i>Who We are</h3>
							<p>Sheng Tai Real Estate Dramatically re-engineer integrated e-tailers without interoperable growth strategies. Collaboratively create customer directed "outside the box" thinking with world-class e-commerce.</p>
						</div>
						<div class="col-md-5 ps-md-5">
							<h3 class="text-dark"><i class="icon-line-circle-check color me-1 position-relative" style="top: 2px"></i> What we Do</h3>
							<p>Intrinsicly recaptiualize state of the art information for interactive applications. Dynamically optimize proactive convergence and timely value.</p>
						</div>
					</div>

					<div class="clear my-5"></div>

					<div class="row align-items-center border-0 mx-auto rounded ytb-card py-5" style="box-shadow: 0 32px 46px 2px rgba(0,0,0,0.12);">
						<div class="col-lg-4 col-md-7 offset-lg-1 mb-5 mb-lg-0">
							<h3 class="text-dark text-n-right mb-0">Sheng Tai <br>Property</h3>
							<div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget" data-margin="0" data-items="1" data-pagi="true" data-nav="false">

								<div class="oc-item">
									<blockquote class="testimonial text-md-end">
										<div class="testi-content">
											<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum repellendus!</p>
											<div class="testi-meta">
												John Doe
												<span>XYZ Inc.</span>
											</div>
										</div>
									</blockquote>
								</div>

							

							</div>
							
						</div>
						<div class="col-lg-5 col-md-5 ps-lg-4">
							<img src="{{ url('images/home/2.jpg')}}" alt="Image">
						</div>
					</div>
				</div>

				<div class="clear"></div>
        <div class="section  bg-transparent topmargin-lg mb-0">
					<div class="container">
						<div class="heading-block mx-auto center" style="max-width: 600px">
							<small class="text-black-50 text-uppercase ls3 fw-semibold">Our Service</small>
							<h2 class="text-capitalize fw-semibold ls0 mb-1" style="font-size: 36px">How do you Get Bike</h2>
							<p>Energistically syndicate team building synergy after efficient human capital. Assertively underwhelm sticky solutions.</p>
						</div>
						<div class="clear"></div>
						<div class="row showcase-section align-items-center justify-content-between clearfix">
							<div class="col-lg-3 col-md-5">
								<ul class="mb-0">
									<li class="showcase-feature showcase-feature-active" data-target="#target-1">
										<h3>Choose Your Location.</h3>
	  									<p>Credibly conceptualize backward-compatible interna visionary.</p>
									</li>
									<li class="showcase-feature" data-target="#target-2">
										<h3>Choose Your Bike.</h3>
	  									<p>Assertively engineer standardized interactive meta-services.</p>
									</li>
									<li class="showcase-feature" data-target="#target-3">
										<h3>Get Confirmation Email.</h3>
	  									<p>Holisticly customize fully synergistic e-business continually.</p>
									</li>
									<li class="showcase-feature" data-target="#target-4">
										<h3 class="text-uppercase">Start Riding.</h3>
	  									<p>Interactively without backward-compatible enable.</p>
									</li>
								</ul>
							</div>

							<div class="col-lg-8 col-md-7">
								<div id="target-1" class="showcase-target showcase-target-active">
									
									<img class="rounded" src="{{ url('images/home/2.jpg')}}" alt="Image">
								</div>
								<div id="target-2" class="showcase-target">
									<img class="rounded" src="{{ url('images/home/2.jpg')}}" alt="Image">
								</div>
								<div id="target-3" class="showcase-target">
									<img class="rounded" src="{{ url('images/home/2.jpg')}}" alt="Image">
								</div>
								<div id="target-4" class="showcase-target">
									<img class="rounded" src="{{ url('images/home/2.jpg')}}" alt="Image">
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