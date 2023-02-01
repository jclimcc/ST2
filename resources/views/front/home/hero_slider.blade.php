<?php 
use App\Models\Banner;
$banners= Banner::banners();
// dd($sectionsMenu)   ;

?>
<section class="home-slider position-relative mb-30">
  <div class="home-slide-cover mt-30">
      <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
        @foreach($banners as $banner)
          <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ url('front/banners/'.$banner['image'])}})">
              <div class="slider-content">
                  <h1 class="display-2 mb-40">
                    {{$banner['title']}}
                  </h1>
                  <h1 class="display-2 mb-40">{{$banner['sub_title']}}</h1>
                  <p class="mb-65">{{$banner['description']}}</p>
                  <a href="{{$banner['url']}}"><button class="btn" type="submit">Subscribe</button></a>
              </div>
          </div>
          @endforeach
         
      </div>
      <div class="slider-arrow hero-slider-1-arrow"></div>
  </div>
</section>


