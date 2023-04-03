@extends('front.layout.layout')
@section('customcss')
	<!-- One Page Module Specific Stylesheet -->
	{{-- <link rel="stylesheet" href="{{ url('front/css/one-page/onepage.css')}}" type="text/css" /> --}}
	<!-- / -->
	<link rel="stylesheet" href="{{ url('front/one-page/css/et-line.css')}}" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>

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
			<div class="content-wrap ">
        <div id="section-about" class="center page-section pt-0 pb-5">

					<div class="container clearfix pb-5">

            <div class="position-relative">

              <div class="timeline-border"></div>
  
              <!-- Posts
              ============================================= -->
              <div id="posts" class="post-grid grid-container row post-timeline col-mb-50" data-basewidth=".entry:not(.entry-date-section):eq(0)">
  
                <div class="entry entry-date-section col-12 mb-3"><span>November 2021</span></div>
  
                <div class="entry col-lg-6 col-12">
                  <div class="entry-timeline">
                    <div class="timeline-divider"></div>
                  </div>
                  <div class="grid-inner position-sm-relative">
                    <div class="entry-image">
                      <a href="images/aboutus/17.jpg" data-lightbox="image"><img src="images/aboutus/17.jpg" alt="Standard Post with Image"></a>
                    </div>
                    <div class="entry-title">
                      <h2><a href="blog-single.html">1This is a Standard post with a Preview Image</a></h2>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li><i class="icon-calendar3"></i> 10th Feb 2021</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                      </ul>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus.</p>
                      <a href="blog-single.html" class="more-link">Read More</a>
                    </div>
                  </div>
                </div>
  
                <div class="entry col-lg-6 col-12">
                  <div class="entry-timeline">
                    <div class="timeline-divider"></div>
                  </div>
                  <div class="grid-inner">
                    <div class="entry-image">
                      <iframe src="https://player.vimeo.com/video/87701971" width="500" height="281" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                    <div class="entry-title">
                      <h2><a href="blog-single-full.html">2This is a Standard post with an Embedded Video</a></h2>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li><i class="icon-calendar3"></i> 16th Feb 2021</li>
                        <li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 19</a></li>
                        <li><a href="#"><i class="icon-film"></i></a></li>
                      </ul>
                    </div>
                    <div class="entry-content">
                      <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt!</p>
                      <a href="blog-single-full.html" class="more-link">Read More</a>
                    </div>
                  </div>
                </div>
  
                <div class="entry col-lg-6 col-12">
                  <div class="entry-timeline">
                    <div class="timeline-divider"></div>
                  </div>
                  <div class="grid-inner position-sm-relative">
                    <div class="entry-image">
                      <a href="images/aboutus/17.jpg" data-lightbox="image"><img src="images/aboutus/17.jpg" alt="Standard Post with Image"></a>
                    </div>
                    <div class="entry-title">
                      <h2><a href="blog-single.html">1This is a Standard post with a Preview Image</a></h2>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li><i class="icon-calendar3"></i> 10th Feb 2021</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                      </ul>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus.</p>
                      <a href="blog-single.html" class="more-link">Read More</a>
                    </div>
                  </div>
                </div>
  
            
  
            
                <div class="entry entry-date-section col-12 mb-3"><span>October 2021</span></div>
  
                <div class="entry col-lg-6 col-12">
                  <div class="entry-timeline">
                    <div class="timeline-divider"></div>
                  </div>
                  <div class="grid-inner">
                    <div class="entry-image">
                      <div class="card">
                        <div class="card-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, laudantium, iusto saepe eius ea architecto voluptatem veniam. Nisi, pariatur, optio minima dolor iste non quae reprehenderit ullam culpa fugit aut.
                        </div>
                      </div>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li><i class="icon-calendar3"></i> 21st Mar 2021</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 11</a></li>
                        <li><a href="#"><i class="icon-align-justify2"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
  
                <div class="entry col-lg-6 col-12">
                  <div class="entry-timeline">
                    <div class="timeline-divider"></div>
                  </div>
                  <div class="grid-inner">
                    <div class="entry-image clearfix">
                      <div class="fslider" data-animation="fade" data-pagi="false" data-pause="6000" data-lightbox="gallery">
                        <div class="flexslider">
                          <div class="slider-wrap">
                            <div class="slide"><a href="images/blog/full/6-1.jpg" data-lightbox="gallery-item"><img src="images/blog/masonry/6-1.jpg" alt="Standard Post with Gallery"></a></div>
                            <div class="slide"><a href="images/blog/full/6-2.jpg" data-lightbox="gallery-item"><img src="images/blog/masonry/6-2.jpg" alt="Standard Post with Gallery"></a></div>
                            <div class="slide"><a href="images/blog/full/12-1.jpg" data-lightbox="gallery-item"><img src="images/blog/masonry/12-1.jpg" alt="Standard Post with Gallery"></a></div>
                            <div class="slide"><a href="images/blog/full/22.jpg" data-lightbox="gallery-item"><img src="images/blog/masonry/22.jpg" alt="Standard Post with Gallery"></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="entry-title">
                      <h2><a href="blog-single-thumbs.html">This is a Standard post with Fade Gallery</a></h2>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li><i class="icon-calendar3"></i> 3rd Apr 2021</li>
                        <li><a href="blog-single-thumbs.html#comments"><i class="icon-comments"></i> 21</a></li>
                        <li><a href="#"><i class="icon-picture"></i></a></li>
                      </ul>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo!</p>
                      <a href="blog-single-thumbs.html" class="more-link">Read More</a>
                    </div>
                  </div>
                </div>
  
                <div class="entry col-lg-6 col-12">
                  <div class="entry-timeline">
                    <div class="timeline-divider"></div>
                  </div>
                  <div class="grid-inner">
                    <div class="entry-image clearfix">
                      <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/301161123&amp;auto_play=false&amp;hide_related=true&amp;visual=true"></iframe>
                    </div>
                    <div class="entry-title">
                      <h2><a href="blog-single.html">This is an Embedded Audio Post</a></h2>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li><i class="icon-calendar3"></i> 28th April 2021</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 16</a></li>
                        <li><a href="#"><i class="icon-music2"></i></a></li>
                      </ul>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum.</p>
                      <a href="blog-single.html" class="more-link">Read More</a>
                    </div>
                  </div>
                </div>
  
                <div class="entry col-lg-6 col-12">
                  <div class="entry-timeline">
                    <div class="timeline-divider"></div>
                  </div>
                  <div class="grid-inner">
                    <div class="entry-image">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/SZEflIVnhH8" allowfullscreen></iframe>
                    </div>
                    <div class="entry-title">
                      <h2><a href="blog-single-full.html">This is a Standard post with a Youtube Video</a></h2>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li><i class="icon-calendar3"></i> 30th Apr 2021</li>
                        <li><a href="blog-single-full.html#comments"><i class="icon-comments"></i> 34</a></li>
                        <li><a href="#"><i class="icon-film"></i></a></li>
                      </ul>
                    </div>
                    <div class="entry-content">
                      <p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt!</p>
                      <a href="blog-single-full.html" class="more-link">Read More</a>
                    </div>
                  </div>
                </div>
  
                <div class="entry col-lg-6 col-12">
                  <div class="entry-timeline">
                    <div class="timeline-divider"></div>
                  </div>
                  <div class="grid-inner">
                    <div class="entry-image clearfix">
                      <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/17521446&amp;auto_play=false&amp;hide_related=false&amp;visual=true"></iframe>
                    </div>
                    <div class="entry-title">
                      <h2><a href="blog-single.html">This is another Embedded Audio Post</a></h2>
                    </div>
                    <div class="entry-meta">
                      <ul>
                        <li><i class="icon-calendar3"></i> 15th May 2021</li>
                        <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 2</a></li>
                        <li><a href="#"><i class="icon-music2"></i></a></li>
                      </ul>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo!</p>
                      <a href="blog-single.html" class="more-link">Read More</a>
                    </div>
                  </div>
                </div>
  
              </div><!-- #posts end -->
  
            </div>
  
  
          </div>
  

				</div>
        
          
       
        @include('front.layout.logo-slider')
			</div>
		</section>
@endsection
@section('customjs')
  
<script>

  jQuery(window).on( 'load', function(){

    let $container = $('#posts');

    function blogTimelineEntries() {
      $('.post-timeline').find('.entry:not(.entry-date-section)').each( function(){
        let position = $(this).position();
        if( position.left === 0 ) {
          $(this).removeClass('alt');
        } else {
          $(this).addClass('alt');
        }
        $(this).find('.entry-timeline').fadeIn();
      });

      $('.entry.entry-date-section').next().next().find('.entry-timeline').css({ 'top': '70px' });
    }

    $container.on( 'layoutComplete', function() {
      blogTimelineEntries();
    });

    $(window).resize(function() {
      $container.isotope('layout');
      setTimeout( function(){
        blogTimelineEntries();
      }, 2500 );
    });

  });

</script>
@endsection