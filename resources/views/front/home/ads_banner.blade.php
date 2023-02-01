<?php 
// use App\Models\Banner;
// $banners= Banner::banners();
// // dd($sectionsMenu)   ;

?>
<section class="banners">
  <div class="row">
      <div class="col-lg-4 col-md-6">
          <div class="banner-img">
              <img src="{{ asset('front/assets/imgs/banner/banner-1.png') }}" alt="" />
              <div class="banner-text">
                  <h4>
                      Everyday Fresh & <br />Clean with Our<br />
                      Products
                  </h4>
                  <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
              </div>
          </div>
      </div>
      <div class="col-lg-4 col-md-6">
          <div class="banner-img">
              <img src="{{ asset('front/assets/imgs/banner/banner-2.png') }}" alt="" />
              <div class="banner-text">
                  <h4>
                      Make your Breakfast<br />
                      Healthy and Easy
                  </h4>
                  <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
              </div>
          </div>
      </div>
      <div class="col-lg-4 d-md-none d-lg-flex">
          <div class="banner-img mb-sm-0">
              <img src="{{ asset('front/assets/imgs/banner/banner-3.png') }}" alt="" />
              <div class="banner-text">
                  <h4>The best Organic <br />Products Online</h4>
                  <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
              </div>
          </div>
      </div>
  </div>
</section>

