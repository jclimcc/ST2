@extends('front.layout.layout')
@section('customcss')
	<!-- One Page Module Specific Stylesheet -->
	{{-- <link rel="stylesheet" href="{{ url('front/css/one-page/onepage.css')}}" type="text/css" /> --}}
	<!-- / -->
	<link rel="stylesheet" href="{{ url('front/one-page/css/et-line.css')}}" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
.slider-text {
  font-size: 6rem;
  font-family: 'Nunito', sans-serif;
  line-height: 1;
}

@media (max-width: 991.98px) {
  .slider-text {
    font-size: 7vw;
  }
}

.secondary-color { background: rgb(224,213,209) !important; }
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
			<div class="content-wrap py-0">
        <div id="section-about" class="center page-section pt-0 mb-5 secondary-color">

					<div class="container clearfix">

            <div class="row align-items-center justify-content-center  gutter-40 ">
              <div class="col-md-4 d-md-block">  
                <div style="
                height: 531px;
                overflow: hidden;
                width: auto;">
<img  src="images/aboutus/parallax/datophoto.png" alt="Imac"  style="
                
object-fit: cover;
" width="552px" height="605px">
</div>

              </div>
  
              <div class="col-md-8 d-flex flex-column justify-content-center px-md-2">
                <div class="heading-block">
                  <h2>Dato’ Leong Sir Ley</h2>
                  <span>Founder & Chairman of Sheng Tai International.</span>
                </div>
  
               </div>
            </div>
         
  
  
          </div>
  

				</div>
        <div class="container clearfix">
          <div class="row align-items-center gutter-40 col-mb-50">
            <div class="col-md-6">
              
              <p>With over 10 years of experience in the real estate sector, Dato’ Leong Sir Ley also serves as an advocate and solicitor in Malaysia, bringing considerable expert knowledge and business acumen to her role as the founder and principal of Sheng Tai International.Having been awarded the honorific title of Dato’ in 2015 for her contributions to the economy and society as an entrepreneur, Dato’ Leong goes on to expand and transform Sheng Tai International into an integrated company providing top-notch hospitality services and a wide range of real estate services.</p>

               
            </div>

            <div class="col-md-6">
              
                <p>Having been awarded the honorific title of Dato’ in 2015 for her contributions to the economy and society as an entrepreneur, Dato’ Leong goes on to expand and transform Sheng Tai International into an integrated company providing top-notch hospitality services and a wide range of real estate services.Having been awarded the honorific title of Dato’ in 2015 for her contributions to the economy and society as an entrepreneur, Dato’ Leong goes on to expand and transform Sheng Tai International into an integrated company providing top-notch hospitality services and a wide range of real estate services.</p>

             

             </div>
          </div>
        </div>
          <section id="slider" class="slider-element" style="background-color: #ECF4F1; padding: 100px 0;">
            <div class="shape-divider" data-shape="wave-6" data-height="350"></div>
      
            <div class="container mw-sm text-center" style="z-index: 3;">
              <h3 class="display-4 fw-bold mb-5"> A Celebration of Our Company's Achievements and Future Vision</h3>
                  
              <div class="clear"></div>
      <div class="row">
        <div class="col-6"> <a href="https://www.youtube.com/watch?v=hI2GdzrKMXA" data-lightbox="iframe" class="d-flex justify-content-center align-items-center text-center mt-5 rounded-6 shadow grid-inner min-vh-40 mw-xs mx-auto h-scale-sm transform-ts" style="background-image: url('images/aboutus/videoimage.jpg');background-size: contain;">
          <i class="icon-line-play h3 icon-stacked text-center rounded-circle ps-1 text-white h-bg-danger bg-ts" style="background: rgba(255,255,255,0.2);"></i>
        </a></div>
        <div class="col-6"><a href="https://www.youtube.com/watch?v=hI2GdzrKMXA" data-lightbox="iframe" class="d-flex justify-content-center align-items-center text-center mt-5 rounded-6 shadow grid-inner min-vh-40 mw-xs mx-auto h-scale-sm transform-ts" style="background-image: url('images/aboutus/videoimage.jpg');background-size: contain;">
          <i class="icon-line-play h3 icon-stacked text-center rounded-circle ps-1 text-white h-bg-danger bg-ts" style="background: rgba(255,255,255,0.2);"></i>
        </a></div>
      </div>
             
              
      
            </div>
      
          </section>
          <div class="section my-0">
          <div class="container clearfix">
            <div class="row  align-items-start gutter-40 col-mb-50 my-5 ">
              <div class="col-lg-12">
               
                <h3 class="display-4 fw-bold mb-5">Inspiration for <span>Sheng Tai International’s</span></h3>
              
                <div class="clear"></div>
              </div>
              <div class="col-md-6">
                <p>I founded Sheng Tai in 2012 and was hugely inspired by Malaysia’s astonishing beauty and its uniqueness. We went all out and promoted property tourism aggressively. To convince overseas property buyers and investors, they must also be attracted to the country’s natural surroundings such as the environment, weather, people, and culture.</p>
                <p>Before borders were closed in March 2020, we were bringing in more than 400 tourists and investors into Malaysia every month, mainly from Hong Kong, China, and Japan. Despite the closure of borders during the pandemic, we continue to promote the property tourism concept online because we believe in it passionately.</p>
                 
              </div>
  
              <div class="col-md-6 ">               
                 
                <p>As a country, Malaysia has distinct advantages compared to other countries like Hong Kong such as lower living expenses, a more relaxed working environment, and more affordable property prices.</p>

                <p>For example, for RM20 million you can buy a huge, landed house in Malaysia. However, in Hong Kong, with HKG$20 million you can only get a 2,000 sqft high-rise unit in the Ho Man Tin area.</p>
               
  
               </div>
               <div class="row justify-content-center col-mb-50 mb-0 py-0">
                <div class="col-md-6 col-lg-4">
                <div class="feature-box fbox-plain">
                <div class="fbox-icon bounceIn animated" data-animate="bounceIn">
                <a href="#"><img src="{{ url('images/aboutus/icon/icon1.png')}}"></a>
                </div>
                <div class="fbox-content">
                <h3>Property Tourism Promotion</h3>
                <p class="mt-0">Inspired by Malaysia's natural beauty and uniqueness, leading the company to promote property tourism aggressively.</p>
                </div>
                </div>
                </div>
                <div class="col-md-6 col-lg-4">
                <div class="feature-box fbox-plain">
                <div class="fbox-icon bounceIn animated" data-animate="bounceIn" data-delay="200">
                <a href="#"><img src="{{ url('images/aboutus/icon/icon1.png')}}" alt="Retina Graphics"></a>
                </div>
                <div class="fbox-content">
                <h3>Adaptation to Pandemic Challenges</h3>
                <p class="mt-0">Despite the closure of borders during the pandemic, Sheng Tai continues to promote property tourism online and remains passionate about its benefits.</p>
                </div>
                </div>
                </div>
                <div class="col-md-6 col-lg-4">
                <div class="feature-box fbox-plain">
                <div class="fbox-icon bounceIn animated" data-animate="bounceIn" data-delay="400">
                <a href="#"><img src="{{ url('images/aboutus/icon/icon1.png')}}" alt="Powerful Performance"></a>
                </div>
                <div class="fbox-content">
                <h3>Malaysia's Distinct Advantages</h3>
                <p class="mt-0">Malaysia offers advantages such as lower living expenses, a more relaxed working environment, and more affordable property prices compared to other countries like Hong Kong, making it an attractive location for property investment.</p>
                </div>
                </div>
                </div>


                
                
              
                </div>

            </div>

            <div class="row gallery-categories gutter-20">
              <div class="col-md-7">
                <div class="grid-inner">
                  <div class="portfolio-image">
                    <div class="fslider" data-arrows="false" data-speed="650" data-pause="3500" data-animation="fade">
                      <div class="flexslider">
                        <div class="slider-wrap">
                          <div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/4/mixed/9.jpg" alt="Bridge Side"></a></div>
                          <div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/4/mixed/9-1.jpg" alt="Bridge Side"></a></div>
                          <div class="slide"><a href="portfolio-single-gallery.html"><img src="images/portfolio/4/mixed/9-2.jpg" alt="Bridge Side"></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="bg-overlay" data-lightbox="gallery">
                      <div class="bg-overlay-content dark flex-column" data-hover-animate="fadeIn">
                        <div class="portfolio-desc pt-0 center" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                          <h3><a href="portfolio-single.html">Bridge Side</a></h3>
                          <span><a href="#">Illustrations</a>, <a href="#">Icons</a></span>
                        </div>
    
                        <div class="d-flex">
                          <a href="images/portfolio/full/9.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
                          <a href="images/portfolio/full/9-1.jpg" class="d-none" data-lightbox="gallery-item"></a>
                          <a href="images/portfolio/full/9-2.jpg" class="d-none" data-lightbox="gallery-item"></a>
                          <a href="portfolio-single-gallery.html" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInUpSmall" data-hover-animate-out="fadeOutDownSmall" data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                        </div>
                      </div>
                      <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
              <div style="background: url('images/aboutus/2.jpg') no-repeat center center; background-size: cover; height: 280px;">
              <div class="vertical-middle p-4">
              <div class="heading-block m-0 border-0 w-50">
              <h3 class="text-capitalize font-secondary nott fw-bold h1 mb-3">Headphones</h3>
              <a href="#" class="more-link border-dark text-dark mb-0 stretched-link">Shop Now <i class="icon-line-arrow-right"></i></a>
              </div>
              </div>
              </div>
              </div>
              
              </div>

          </div>
          <div class="section my-0 py-0">
          <div class="container clearfix">
            <div class="row  align-items-start gutter-40 col-mb-50 my-5 ">
              <div class="col-lg-12">
               
                <h3 class="display-4 fw-bold mb-5">Advice for <span>or young women</span> planning to embark on the same career path</h3>
              
                <div class="clear"></div>
              </div>
              <div class="col-md-6">
                <p>Women who wish to embark on the road to entrepreneurship need to find a good balance. It’s not just about business. You need to manage people well and deliver on your promises. You have to lead, care for your family, and maintain your honesty and integrity.
                  </p>
                <p>My experience has made me a wiser woman. A successful woman must be able to juggle between her career, family, and leisure while maintaining her calmness. You cannot be too emotional when things don’t turn out right. But when things are successful, we shouldn’t be overconfident as well.</p>
                <p>I’m not a superwoman. I believe that whatever I have achieved can be emulated by other women too. Chase your dreams and be independent because nothing is impossible. Last but not least, whatever men can achieve in their careers, women can do the same too, if not even better!</p>

                  <p>So, to all the ladies out there, spread your wings and fly!</p>

                 
              </div>
              <div class="col-md-6">
                <div class="row justify-content-center col-mb-50 mb-0">
                  <div class="col-md-12">
                  <div class="feature-box fbox-plain">
                  <div class="fbox-icon bounceIn animated" data-animate="bounceIn">
                  <a href="#"><img src="{{ url('images/aboutus/icon/icon1.png')}}"></a>
                  </div>
                  <div class="fbox-content">
                  <h3> The Importance of Balance </h3>
                  <p class="mt-0">Women who want to be successful entrepreneurs need to find balance in their lives between their business, family, and personal pursuits.</p>
                  </div>
                  </div>
                  </div>
                  <div class="col-md-12">
                  <div class="feature-box fbox-plain">
                  <div class="fbox-icon bounceIn animated" data-animate="bounceIn" data-delay="200">
                  <a href="#"><img src="{{ url('images/aboutus/icon/icon1.png')}}" alt="Retina Graphics"></a>
                  </div>
                  <div class="fbox-content">
                  <h3>Juggling Responsibilities</h3>
                  <p class="mt-0">Successful women must be able to manage their career, family, and leisure activities while maintaining their composure and emotional control.</p>
                  </div>
                  </div>
                  </div>
                  <div class="col-md-12">
                  <div class="feature-box fbox-plain">
                  <div class="fbox-icon bounceIn animated" data-animate="bounceIn" data-delay="400">
                  <a href="#"><img src="{{ url('images/aboutus/icon/icon1.png')}}" alt="Powerful Performance"></a>
                  </div>
                  <div class="fbox-content">
                  <h3>Emulating Success</h3>
                  <p class="mt-0">Women can achieve the same level of success as men in their careers and should not be discouraged by societal limitations or stereotypes.</p>
                  </div>
                  </div>
                  </div>
  
  
                  
                  
                
                  </div>
  
              
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