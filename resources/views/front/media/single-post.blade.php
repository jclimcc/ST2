@extends('front.layout.layout')
@section('head')
  <meta name="description" content="{{ $page_description }}">
  <meta property="og:title" content="{{ $page_title }}">
  <meta property="og:type" content="article">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ $page_image }}">
  <meta property="og:description" content="{{ $page_description }}">
  <title>{{ $page_title }}</title>
@endsection
@section('customcss')
	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->

<style>

</style>
@endsection

@section('content')

<!-- Slider
		============================================= -->
	
    
    <livewire:front.page.hero-image :pageURL="$pageURL" />
    <!-- #slider end -->
	
	<livewire:front.page.breadcrump-post :category="$category ?$category->toArray()  : null"   />		
   <!-- #page-title end -->
<!-- Content
		============================================= -->
		<section id="content" >
			<div class="content-wrap ">
        <div class="container">
          
					<div class="row gutter-40 col-mb-80">
						<!-- Post Content
						============================================= -->
						<div class="postcontent col-lg-9">

							<div class="single-post mb-0">

								<!-- Single Post
								============================================= -->
								<div class="entry clearfix">

									<!-- Entry Title
									============================================= -->
									<div class="entry-title">
										<h2>{{ $post->title}}</h2>
									</div><!-- .entry-title end -->

									<!-- Entry Meta
									============================================= -->
									<div class="entry-meta">
										<ul>
											<li><i class="icon-calendar3"></i> {{$post->the_time()}} </li>
											<li><a href="#"><i class="icon-user"></i> {{$post->the_author()}}</a></li>
											
										</ul>
									</div><!-- .entry-meta end -->

									<!-- Entry Image
									============================================= -->
									<div class="entry-image">
										<a href="#"><img  class="lazy" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 3'%3E%3C/svg%3E" alt="{{ $post->title}} Image" data-src="{{ url('front/posts/'.$post->image)}}"></a>
									</div><!-- .entry-image end -->

									<!-- Entry Content
									============================================= -->
									<div class="entry-content mt-0">

                    {!! html_entity_decode($post->body) !!}
										<!-- Post Single - Content End -->

										<!-- Tag Cloud
										============================================= -->
										<div class="tagcloud clearfix bottommargin">
											{!! $post->the_tags()!!}
										</div><!-- .tagcloud end -->

										<div class="clear"></div>

										<!-- Post Single - Share
										============================================= -->
										<div class="si-share border-0 d-flex justify-content-between align-items-center">
											<span>Share this Post:</span>
											<div>
												<a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" target="_blank" class="social-icon si-borderless si-facebook">
													<i class="icon-facebook"></i>
													<i class="icon-facebook"></i>
												</a>
												<a href="https://twitter.com/intent/tweet?url={{url()->current()}}" target="_blank" class="social-icon si-borderless si-twitter">
													<i class="icon-twitter"></i>
													<i class="icon-twitter"></i>
												</a>
												<a href="https://www.pinterest.com/pin/create/button/?url={{url()->current()}}" target="_blank"class="social-icon si-borderless si-pinterest">
													<i class="icon-pinterest"></i>
													<i class="icon-pinterest"></i>
												</a>
												<a href="https://plus.google.com/share?url={{url()->current()}}" target="_blank"class="social-icon si-borderless si-gplus">
													<i class="icon-gplus"></i>
													<i class="icon-gplus"></i>
												</a>
												<a href="mailto:?subject=Check out this link&amp;body={{url()->current()}}" class="social-icon si-borderless si-email3">
													<i class="icon-email3"></i>
													<i class="icon-email3"></i>
												</a>
											</div>
										</div><!-- Post Single - Share End -->

									</div>
								</div><!-- .entry end -->
               
								<!-- Post Navigation
								============================================= -->
								<div class="row justify-content-between col-mb-30 post-navigation">
									<div class="col-12 col-md-auto text-center" @if($prev_post!=null) title="{{$prev_post->title}}" @endif>
                    @if($prev_post!=null)
										<a class="btn btn-outline-secondary"  href="{{ $prev_post->the_permalink() }}" >< Previous</a>
                    {{str_limit($prev_post->title,25)}}
                    @endif
                    
									</div>

									<div class="col-12 col-md-auto text-center"  @if($next_post!=null) title="{{$next_post->title}}@endif ">
                    @if($next_post!=null)
                    {{str_limit($next_post->title,25)}}
										<a class="btn btn-outline-secondary" href="{{ $next_post->the_permalink() }}" >
                     Next ></a>
                     
                    @endif
                    
									</div>
								</div><!-- .post-navigation end -->


							
								<div class="line"></div>

								<h4>Related Posts:</h4>

								<div class="related-posts row posts-md col-mb-30">

                  @foreach($related_posts as $post)
									<div class="entry col-12 col-md-6">
										<div class="grid-inner row align-items-center gutter-20">
											<div class="col-4">
												<div class="entry-image">
													<a href="#"><img src="{{$post->get_the_post_image_url()}}" alt="Blog Single"></a>
												</div>
											</div>
											<div class="col-8">
												<div class="entry-title title-xs">
													<h3><a href="{{ $post->the_permalink()}}">{{str_limit($post->title,25)}}</a></h3>
												</div>
												<div class="entry-meta">
													<ul>
														<li><i class="icon-calendar3"></i>{{$post->the_time()}}</li>
														<li><a href="#"><i class="icon-user"></i> {{$post->the_author()}}</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
                  @endforeach
								
								</div>

							
							</div>

						</div><!-- .postcontent end -->

						<!-- Sidebar
						============================================= -->
						<div class="sidebar col-lg-3">
              <livewire:front.page.media-post-single-side-widget-page  :category_id="$post->categories[0]->id" :category_title="$post->categories[0]->title" :category_slug="$post->categories[0]->slug"/>
							

								
                
              

             
							

							
						</div><!-- .sidebar end -->
					</div>


        </div>				
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