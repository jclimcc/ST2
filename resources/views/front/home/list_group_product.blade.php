<section class="section-padding mb-30">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                <div class="product-list-small animated animated">
                    
                    @foreach($topSelling as $product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product/'.$product['slug'])}}"><img src="{{ asset('front/images/products/medium/'.getProductImage($product['product_images_first']) )}}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/'.$product['slug'])}}">{{ $product['product_name']}}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="product-price">
                                @if($product['product_discount']>0)
                                <span>RM{{getProductAfterDiscount($product['product_price'],$product['product_discount'])}}</span>
                                <span class="old-price">RM{{$product['product_price']}}</span>
                                @else 
                                <span>RM{{$product['product_price']}}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                    
                    
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                <div class="product-list-small animated animated">
                    @foreach($trendingProduct as $product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product/'.$product['slug'])}}"><img src="{{ asset('front/images/products/medium/'.getProductImage($product['product_images_first'])) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/'.$product['slug'])}}">{{ $product['product_name']}}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="product-price">
                                @if($product['product_discount']>0)
                                <span>RM{{getProductAfterDiscount($product['product_price'],$product['product_discount'])}}</span>
                                <span class="old-price">RM{{$product['product_price']}}</span>
                                @else 
                                <span>RM{{$product['product_price']}}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 ">
                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                <div class="product-list-small animated animated">
                    @foreach($recentlyAdded as $product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ url('product/'.$product['slug'])}}"><img src="{{ asset('front/images/products/medium/'.getProductImage($product['product_images_first'])) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/'.$product['slug'])}}">{{ $product['product_name']}}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="product-price">
                                @if($product['product_discount']>0)
                                <span>RM{{getProductAfterDiscount($product['product_price'],$product['product_discount'])}}</span>
                                <span class="old-price">RM{{$product['product_price']}}</span>
                                @else 
                                <span>RM{{$product['product_price']}}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                <div class="product-list-small animated animated">
                    @foreach($topDiscount as $product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0"> 
                            <a href="{{ url('product/'.$product['slug'])}}"><img src="{{ asset('front/images/products/medium/'.getProductImage($product['product_images_first'])) }}" alt="" /></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ url('product/'.$product['slug'])}}">{{ $product['product_name']}}</a>
                            </h6>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div class="product-price">
                                @if($product['product_discount']>0)
                                <span>RM{{getProductAfterDiscount($product['product_price'],$product['product_discount'])}}</span>
                                <span class="old-price">RM{{$product['product_price']}}</span>
                                @else 
                                <span>RM{{$product['product_price']}}</span>
                                @endif
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>