<div>
    <div class="sidebar-widgets-wrap">
                    
        <div class="fancy-title title-border">
            <h4>Recent {{$category_title}}</h4>
        </div>
            <div style="height:600px; overflow-y:scroll; overflow-x:hidden">
                <div class="posts-sm row col-mb-30" id="post-list-sidebar">
                    @foreach($recentCategoryPosts as $post)                            
                    <div class="entry col-12">
                        <div class="grid-inner row g-0">
                            <div class="col-auto">
                                <div class="entry-image post-list-press" >
                                    <a href="{{$post->the_permalink() }}"><img src="{{ url("front/posts/".$post->image) }}" alt="Image"></a>
                                </div>
                            </div>
                            <div class="col ps-3">
                                <div class="entry-title">
                                    <h4><a href="{{ $post->the_permalink() }}">{{$post->title}}</a></h4>
                                </div>
                                <div class="entry-meta">
                                    <ul>
                                        <li>{{$post->created_at}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-between my-5">
        
                <a href="{{url('media/'.$category_slug.'/all')}}" class="btn btn-outline-dark">More {{$category_title}}</a>
            </div>
            <div class="widget clearfix">
                <div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="true">

                    <div class="oc-item"><a href="#"><img src="{{url('front/posts/test4.jpg')}}" alt="Clients"></a></div>
                    <div class="oc-item"><a href="#"><img src="{{url('front/posts/test4.jpg')}}" alt="Clients"></a></div>
                    

                </div>

            </div>
            <div class="widget clearfix">
              <h4>Tag Cloud</h4>
              <div class="tagcloud">
                <a href="#">general</a>
                <a href="#">videos</a>
                <a href="#">music</a>
                <a href="#">media</a>
                <a href="#">photography</a>
                <a href="#">parallax</a>
                <a href="#">ecommerce</a>
                <a href="#">terms</a>
                <a href="#">coupons</a>
                <a href="#">modern</a>
              </div>
            </div>

    </div>
</div>
