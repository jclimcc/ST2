@extends('front.layout.layout')
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
 
		<livewire:front.page.breadcrump-post :category=" $category ?$category->toArray()  : null"   />	
<!-- Content 
		============================================= -->
    
		<section id="content" >
			<div class="content-wrap pt-0">
        
        <livewire:front.page.media-category-all :category="$category"   />
       

					
				
				
			
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