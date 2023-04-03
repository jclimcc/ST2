@extends('front.layout.layout')
@section('customcss')
	<!-- One Page Module Specific Stylesheet -->
	{{-- <link rel="stylesheet" href="{{ url('front/css/one-page/onepage.css')}}" type="text/css" /> --}}
	<!-- / -->
	<link rel="stylesheet" href="{{ url('front/one-page/css/et-line.css')}}" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>

        .revo-slider-emphasis-text {
          font-size: 64px;
          font-weight: 700;
          letter-spacing: -1px;
          font-family: 'Poppins', sans-serif;
          padding: 15px 20px;
          border-top: 2px solid #FFF;
          border-bottom: 2px solid #FFF;
        }
      
        .revo-slider-desc-text {
          font-size: 20px;
          font-family: 'Lato', sans-serif;
          width: 650px;
          text-align: center;
          line-height: 1.5;
        }
      
        .revo-slider-caps-text {
          font-size: 16px;
          font-weight: 400;
          letter-spacing: 3px;
          font-family: 'Poppins', sans-serif;
        }
        .tp-video-play-button { display: none !important; }
      
        .tp-caption { white-space: nowrap; }
      
		
		@media all and (max-width: 800px) {
		.owl-carousel .portfolio-item img {
			height: auto;
			max-height: 100%;
		}
		.carousel-section{
			background-position: center;
			background-size: cover;
		}
		}


.cloud-container1 {
    top: 0;
    -webkit-transform: translateY(50%);
    transform: translateY(50%)
}
.cloud-container1 {

	/* height: 55vw; */
	max-height: 375px;
    min-height: 200px;
    /* overflow: hidden; */
    pointer-events: none;
    position: absolute;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 100%;
    z-index: 2;
	
}
.cloud-container2 {
    bottom: -363px;
    -webkit-transform: translateY(50%);
    transform: translateY(50%)
}
.cloud-container2 {
    height: 55vw;
    max-height: 375px;
    min-height: 200px;
    overflow: hidden;
    pointer-events: none;
    position: absolute;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 100%;
    z-index: 2
}
.bg-gradient__linear--sky-fade {
    background: -webkit-gradient(linear,left bottom, left top,from(#dfebf4),to(rgba(223,235,244,0)));
    background: linear-gradient(0deg,#dfebf4,rgba(223,235,244,0));
}
.bg-gradient__linear--sky-fade-top {
    background: -webkit-gradient(linear,left bottom, left top,from(#dfebf4),to(rgba(223,235,244,0)));
    background: linear-gradient(180deg,#dfebf4,rgba(223,235,244,0));
}
.cloud-1 {
  position: absolute;
  top: -100px;
  left: -300px;
  animation: moveCloud 70s linear infinite;
}

.cloud-2 {
  position: absolute;
  top: -110px;
  right: -300px;
  animation: moveCloud 40s linear infinite;
}


.cloud-5 {
  position: absolute;
  top: -30px;
  left: -300px;
  animation: moveCloud 70s linear infinite;
}

.cloud-6 {
  position: absolute;
  top: -10px;
  right: -300px;
  animation: moveCloud 40s linear infinite;
}

@keyframes moveCloud {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(1200px);
  }
}
@media all and (max-width: 800px) {
	.cloud-container2 {
			bottom:-200px;
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
		<section id="content" >
			<div class="content-wrap pb-0">
                <div class="container clearfix">
                    <div class="row col-mb-50 mb-0">
                        <div class="col-md-7 center">
							<img data-animate="fadeInLeft" src="images/aboutus/companygroup.jpg" alt="Iphone" class="fadeInLeft animated">
						</div>

						<div class="col-md-5 text-center text-md-start">
							<div class="heading-block">
								<h3><span>Who we are</span></h3>
							</div>

							<p>Sheng Tai International is a dynamic and diversified company specializing in development, real estate, investment management, and hospitality. We offer professional services with a warm, humanistic approach and cater to luxury, upscale, and economy markets.</p>
							
						</div>
                   
                   
                    </div>
                    </div>

                <div id="section-about" class="center page-section pt-0 pb-5">

                    <div class="container clearfix">
                        <div class="row justify-content-center gutter-50">
                            <div class="col-xl-6 col-lg-8 text-center">
                            <h3 class="h1 fw-bold mb-3"><span>Our Mission </span></h3>
                            <p class="text-larger text-muted">Best-Selling &amp; Most Trusted HTML5 Template. Experience the Ever-Growing Feature Rich Template since 2014.</p>
                            </div>
                            <div class="clear"></div>
                            <div class="col-lg-3 col-sm-6">
                            <div class="feature-box fbox-effect flex-column">
                            <div class="fbox-icon mb-4">
                            <a href="#"><img src="demos/seo/images/icons/social.svg" alt="Feature Icon" class="bg-transparent rounded-0"></a>
                            </div>
                            <div class="fbox-content">
                            <h3>Responsive Layout</h3>
                            <p>Powerful Layout with Responsive functionality that can be adapted to any screen size. Resize browser to view.</p>
                            </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                            <div class="feature-box fbox-effect flex-column">
                            <div class="fbox-icon mb-4">
                            <a href="#"><img src="demos/seo/images/icons/experience.svg" alt="Feature Icon" class="bg-transparent rounded-0"></a>
                            </div>
                            <div class="fbox-content">
                            <h3>Retina Ready Graphics</h3>
                            <p>Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Retina Icons, Fonts &amp; all others graphics are optimized.</p>
                            </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                            <div class="feature-box fbox-effect flex-column">
                            <div class="fbox-icon mb-4">
                            <a href="#"><img src="demos/seo/images/icons/content_marketing.svg" alt="Feature Icon" class="bg-transparent rounded-0"></a>
                            </div>
                            <div class="fbox-content">
                            <h3>Powerful Performance</h3>
                            <p>Canvas includes tons of optimized code that are completely customizable and deliver unmatched fast performance.</p>
                            </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                            <div class="feature-box fbox-effect flex-column">
                            <div class="fbox-icon mb-4">
                            <a href="#"><img src="demos/seo/images/icons/optimizing.svg" alt="Feature Icon" class="bg-transparent rounded-0"></a>
                            </div>
                            <div class="fbox-content">
                            <h3>Optimized Codes</h3>
                            <p>Canvas included 20+ custom designed Slider Pages with Premium Sliders like Layer, Revolution, Swiper &amp; others.</p>
                            </div>
                            </div>
                            </div>
                            <div class="clear my-3"></div>


                            
                         
                            </div>
                    </div>
					
  

				</div>
        
                <div class="section carousel-section parallax m-0 dark skrollable skrollable-between" style="background-image: url(&quot;images/home/bg-carousel.jpg&quot;); min-height: 900px; padding: 220px 0px; background-position: 0px -80%;" data-bottom-top="background-position:0% 20%;" data-top-bottom="background-position:0px 140%;">

					<div class=" clearfix">
							<div class="w-100 mh20 bg-gradient__linear--sky-fade-top position-absolute top-0" style="height:0vh;z-index:2"></div>
							<div class="cloud-container1">
								<div class="cloud-1">
									<img class="img-fluid" src="https://www.sunway.com.my/wp-content/themes/sunway2020/img/home/cloud-02.png" srcset="https://www.sunway.com.my/wp-content/themes/sunway2020/img/home/cloud-02@2x.png 2x" width="892" height="322" alt="Cloud">
								</div>
						
									<div class="cloud-2">
									<img class="img-fluid" src="https://www.sunway.com.my/wp-content/themes/sunway2020/img/home/cloud-01.png" srcset="https://www.sunway.com.my/wp-content/themes/sunway2020/img/home/cloud-01@2x.png 2x" width="904" height="375" alt="Cloud">
								</div>
							</div>
						

						
							<div class="row align-items-center col-mb-50">
								@include('front.home.business_services')
							</div>
							<div class="w-100 mh20 bg-gradient__linear--sky-fade position-absolute bottom-0" style="height:30vh;"></div>
							<div class="cloud-container2">
								<div class="cloud-5">
									<img class="img-fluid" src="https://www.sunway.com.my/wp-content/themes/sunway2020/img/home/cloud-02.png" srcset="https://www.sunway.com.my/wp-content/themes/sunway2020/img/home/cloud-02@2x.png 2x" width="892" height="322" alt="Cloud">
								</div>
						
									<div class="cloud-6">
									<img class="img-fluid" src="https://www.sunway.com.my/wp-content/themes/sunway2020/img/home/cloud-01.png" srcset="https://www.sunway.com.my/wp-content/themes/sunway2020/img/home/cloud-01@2x.png 2x" width="904" height="375" alt="Cloud">
								</div>
							</div>
							

						</div>

					</div>
       
        @include('front.layout.logo-slider')
			</div>
		</section>
@endsection
@section('customjs')

@endsection