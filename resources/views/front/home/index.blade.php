@extends('front.layout.layout')
@section('customcss')
	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="{{ url('front/include/rs-plugin/css/settings.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{ url('front/include/rs-plugin/css/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('front/include/rs-plugin/css/navigation.css')}}">
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
 	


    /* ----- | Story-Box | ----- */
.story-box {
	display: -ms-flexbox;
	display: flex;
	-ms-flex-wrap: wrap;
	flex-wrap: wrap;
	cursor: pointer;
}

.story-box .story-box-image {
	width: 70%;
	height: 500px;
	z-index: 2;
	overflow: hidden;
	-ms-flex-preferred-size: auto;
	flex-basis: auto;
}

.story-box .story-box-image img {
	display: block;
	height: auto;
	width: 100%;
	opacity: 1;
	transition: opacity .3s ease;
}

.story-box:hover .story-box-image img {
	opacity: .9;
}

.story-box .story-box-info {
	box-sizing: border-box;
	width: 50%;
	height: 430px;
	padding: 60px;
	margin: 35px 0 0 -20%;
	background: #fff;
	z-index: 4;
	box-shadow: 0 10px 45px rgba(0,0,0,.1);
	transition: all ease-in .3s;
	-ms-flex-preferred-size: auto;
	flex-basis: auto;
}

.story-box.description-left .story-box-info {
	-ms-flex-order: -1;
	order: -1;
	margin: 35px -20% 0 0;
}

.story-box .story-box-info .story-title {
  font-size: 1.5rem;
	font-weight: 700;
	letter-spacing: 0;
	color: #1d2c4c;
}

.story-box .story-box-info .story-box-content p {
	font-size: 15px;

	line-height: 1.8px;
}

.story-box .story-box-info .story-box-content a {
	font-size: 16px;
	text-decoration: underline !important;
}

/* ----- Story-Box Responsive ----- */
@media (max-width: 991px) {

	.story-box .story-box-image {
		height: auto;
		width: 100%;
		height: 400px;
		-ms-flex-order: -1;
		order: -1;
	}

	.story-box.description-left .story-box-info {
		-ms-flex-order: -1;
		order: -1;
		margin: 35px -20% 0 0;
	}

	.story-box.description-left .story-box-info { margin: -40px 5% 0; }

	.story-box .story-box-info {
		max-width: 90%;
		height: auto;
		-ms-flex-preferred-size: 90%;
		flex-basis: 90%;
		margin: -40px 5% 0;
	}
}


@media (max-width: 767px) {

	.story-box.description-left .story-box-info { margin: -100px 5% 0; }
	.story-box .story-box-info {
		padding: 35px;
		text-align: center;
		margin: -100px 5% 0;
	}
	.customers-count { border-right: none }
}

@media (max-width: 479px) {

	.story-box .story-box-info {
		width: 100%;
		padding: 15px;
		text-align: center;
		margin: -200px 5% 0;
	}
	.story-box.description-left .story-box-info { margin: -200px 5% 0; }

	ul.tab-nav:not(.tab-nav-lg) li a i {display: none;}
}



      </style>
@endsection

@section('content')

{{-- @include('front.home.hero_slider') --}}
	
			<livewire:front.home.hero-slider :language="'en'" />

<!-- Content
		============================================= -->
		<section id="content" >
			<div class="content-wrap">

				<div class="container clearfix">

          <div class="story-box description-left clearfix">
            <div class="story-box-image">
              <img src="images/home/1.jpg" alt="story-image">
            </div>
            <div class="story-box-info">
              <h3 class="story-title">WELCOME TO  <span>SHENG TAI INTERNATIONAL</span></h3>
              <div class="story-box-content">
                <p>Sheng Tai International is a dynamic and diversified company specializing in development, real estate, investment management, and hospitality. We offer professional services with a warm, humanistic approach and cater to luxury, upscale, and economy markets.</p>
                <button class="fw-light button ms-0 button-rounded">Read Canvas's story</button>
              </div>
            </div>
          </div>


					<div class="row align-items-center col-mb-50 mb-5">
						<div class="col-md-4 center">
							<img data-animate="fadeInLeft" src="images/home/homecompanyLOGO.jpg" alt="Iphone" class="fadeInLeft animated">
						</div>

						<div class="col-md-8 text-center text-md-start">
							<div class="heading-block">
								<h3>WELCOME TO  <span>SHENG TAI INTERNATIONAL</span></h3>
							</div>

							<p>Sheng Tai International is a dynamic and diversified company specializing in development, real estate, investment management, and hospitality. We offer professional services with a warm, humanistic approach and cater to luxury, upscale, and economy markets.</p>
							
						</div>
					</div>					
					
				</div>
				
				<div class="section carousel-section parallax m-0 dark skrollable skrollable-between" style="background-image: url(&quot;images/home/bg-carousel.jpg&quot;); min-height: 1200px; padding: 100px 0px; background-position: 0px -80%;" data-bottom-top="background-position:0% 0%;" data-top-bottom="background-position:0px 100%;">

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

					<livewire:front.home.post-list />
				
				
				<a href="#" class="button button-full center text-end footer-stick">
					<div class="container clearfix">
						Canvas comes with Unlimited Customizations &amp; Options. <strong>Check Out</strong> <i class="icon-caret-right" style="top:4px;"></i>
					</div>
				</a>

			</div>
		</section>
@endsection
@section('customjs')
   <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
   <script src="{{ url('front/include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
   <script src="{{ url('front/include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

   <script src="{{ url('front/include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
   <script src="{{ url('front/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
   <script src="{{ url('front/include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
   <script src="{{ url('front/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
   <script src="{{ url('front/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
   <script src="{{ url('front/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
   <script src="{{ url('front/include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
   <script src="{{ url('front/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>

   <script>
     var tpj = jQuery;
     var revapi31;
     var $ = jQuery.noConflict();

	
     tpj(document).ready(function () {
       if (tpj("#rev_slider_679_1").revolution == undefined) {
         revslider_showDoubleJqueryError("#rev_slider_679_1");
       } else {
         revapi31 = tpj("#rev_slider_679_1")
           .show()
           .revolution({
             sliderType: "standard",
             jsFileLocation: "include/rs-plugin/js/",
             sliderLayout: "fullwidth",
             dottedOverlay: "none",
             delay: 12000,
             hideThumbs: 200,
             thumbWidth: 100,
             thumbHeight: 50,
             thumbAmount: 5,
             navigation: {
               keyboardNavigation: "on",
               keyboard_direction: "horizontal",
               mouseScrollNavigation: "off",
               onHoverStop: "off",
               touch: {
                 touchenabled: "on",
                 swipe_threshold: 75,
                 swipe_min_touches: 1,
                 swipe_direction: "horizontal",
                 drag_block_vertical: false,
               },
			   bullets: { 
				enable: true,
				style: 'hesperiden',
				tmp: '',
				direction: 'horizontal',
				rtl: false,
				container: 'slider',
				h_align: 'center',
				v_align: 'bottom',
				h_offset: 0,
				v_offset: 20,
				space: 5,
				hide_onleave: false,
				hide_onmobile: false,
				hide_under: 0,
				hide_over: 9999,
				hide_delay: 200,
				hide_delay_mobile: 1200
				},
               arrows: {
                 style: "hesperiden",
                 enable: true,
                 hide_onmobile: false,
                 hide_onleave: false,
                 left: {
                   h_align: "left",
                   v_align: "center",
                   h_offset: 10,
                   v_offset: 0,
                 },
                 right: {
                   h_align: "right",
                   v_align: "center",
                   h_offset: 10,
                   v_offset: 0,
                 },
               },
			   
             },
             responsiveLevels: [1140, 1024, 778, 480],
             visibilityLevels: [1140, 1024, 778, 480],
            //  gridwidth: [1140, 1024, 778, 480],
            //  gridheight: [700, 768, 960, 720],
             gridwidth: [1650],
             gridheight: [724],
             lazyType: "none",
             shadow: 0,
             spinner: "off",
             stopLoop: "off",
             stopAfterLoops: -1,
             stopAtSlide: -1,
             shuffle: "off",
             autoHeight: "off",
             fullScreenAutoWidth: "off",
             fullScreenAlignForce: "off",
             fullScreenOffsetContainer: "",
             fullScreenOffset: "0px",
             hideThumbsOnMobile: "off",
             hideSliderAtLimit: 0,
             hideCaptionAtLimit: 0,
             hideAllCaptionAtLilmit: 0,
             debugMode: false,
             fallbacks: {
               simplifyAll: "off",
               nextSlideOnWindowFocus: "off",
               disableFocusListener: false,
             },
           });
       }

       revapi31.on("revolution.slide.onloaded", function (e) {
         setTimeout(function () {
           SEMICOLON.slider.sliderDimensions();
         }, 200);
       });

       revapi31.on("revolution.slide.onchange", function (e, data) {
         SEMICOLON.slider.revolutionSliderMenu();
       });
     }); /*ready*/
   </script>
@endsection