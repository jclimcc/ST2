<?php 
// use App\Models\Banner;
// $banners= Banner::banners();
// // dd($sectionsMenu)   ;
use App\Models\Section;
use App\Models\Product;
use App\Models\Brand;
$categorySideMenu= Section::getSectionProductSum();
$newProductSideMenu= Product::getMenuNewProduct();
$listBrands= Brand::getProductBrand($filterCategoryList);

?>
  <div class="col-lg-1-5 primary-sidebar pt-30">
    <div class="sidebar-widget widget-category-2 mb-30">
        <h5 class="section-title style-1 mb-30">Category</h5>
        <ul>
            @foreach ($categorySideMenu as $item)
          
            <li>
                <a href="shop-grid-right.html"><img src="{{ asset('front/assets/imgs/theme/icons/category-1.svg') }}" alt="" />{{ $item['name'] }}</a><span class="count">{{ sizeof($item['products'])  }}</span>
            </li>
            @endforeach
            
           
        </ul>
    </div>
    <!-- Fillter By Price -->
    <div class="sidebar-widget price_range range mb-30">
        <h5 class="section-title style-1 mb-30">Product #</h5>
        
        <div class="list-group">
            <div class="list-group-item mb-10 mt-10">
                <label class="fw-900">Brands</label>
                <div class="custome-checkbox">
                    @foreach( $listBrands as $list)

                    <input class="form-check-input" wire:model="brandInputs" type="checkbox" id="brandCheckbox{{$loop->index}}" value="{{$list->brand_name}}" />
                    <label class="form-check-label" for="brandCheckbox{{$loop->index}}"><span>{{$list->brand_name}}</span></label>
                    <br />
                    @endforeach
                </div>
               
            </div>
        </div>
        <div class="list-group">
            <div class="list-group-item mb-10 mt-10">
                <label class="fw-900">Sort By</label>
                <div class="custome-radio">
                    <input class="form-check-input" wire:model="sortingInput" type="radio" id="brandradio1" value="Default" />
                    <label class="form-check-label" for="brandradio1"><span>Default</span></label>
                    <br />
                    <input class="form-check-input" wire:model="sortingInput" type="radio" id="brandradio2" value="LowToHight" />
                    <label class="form-check-label" for="brandradio2"><span>Price: Low to High</span></label>
                    <br />
                    <input class="form-check-input" wire:model="sortingInput" type="radio" id="brandradio3" value="HightToLow" />
                    <label class="form-check-label" for="brandradio3"><span>Price: Hight To Low</span></label>
                    <br />
                    <input class="form-check-input" wire:model="sortingInput" type="radio" id="brandradio4" value="NewToOld" />
                    <label class="form-check-label" for="brandradio4"><span>Date: New to Old</span></label>
                    <br />
                </div>
               
            </div>
        </div>
        <a href="shop-grid-right.html" class="btn btn-sm btn-default"><i class="fi-rs-filter mr-5"></i> Fillter</a>
    </div>
    <!-- Product sidebar Widget -->
    <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
        <h5 class="section-title style-1 mb-30">New products</h5>
        @foreach($newProductSideMenu as $item)        
        <div class="single-post clearfix">
            <div class="image">
                <img src="{{ asset('front/assets/imgs/shop/thumbnail-3.jpg') }}" alt="#" />
            </div>
            <div class="content pt-10">
                <h5><a href="{{ url('product/'.$item['slug'])}}">{{$item['product_name']}}</a></h5>
                <p class="price mb-0 mt-5">${{$item['product_price']}}</p>
                <div class="product-rate">
                    <div class="product-rating" style="width: 90%"></div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>

</div>