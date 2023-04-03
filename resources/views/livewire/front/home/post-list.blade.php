<div>
    <div class="container pt-5 clearfix">

        {{-- <div class="heading-block center">
            <h3>Some of our <span>Featured</span> Works</h3>
            <span>We have worked on some Awesome Projects that are worth boasting of.</span>
        </div> --}}
        
        <div class="row gutter-40 col-mb-80">
            <div class="postcontent col-lg-9">
                <div class="fancy-title title-border">
                    <h4>News</h4>
                </div>
                <div class="row gutter-40">
                    <div class="entry col-12">
                        <div class="w-100">
                            <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">
                            
                                @foreach($this->news as $news)
                                <div class="oc-item posts-md">
                                    <div class="entry ">
                                        <div class="grid-inner">
                                        <div class="entry-image post-list-news">
                                        <a href="{{ $news->the_permalink() }}"><img src="{{ $news->get_the_post_image_url() }}" alt="{{$news->title}}" style="width: 100%;height: auto;"></a>
                                        </div>
                                        <div class="entry-title title-sm nott">
                                        <h3><a href="{{ $news->the_permalink()}}" title="{{$news->title}}">{{ str_limit($news->title,20)}}</a></h3>
                                        </div>
                                        <div class="entry-meta">
                                        <ul>
                                        <li><i class="icon-calendar3"></i>{{$news->the_time()}}</li>
                                        </ul>
                                        </div>
                                        <div class="entry-content">
                                        <p>{{str_limit($news->excerpt,50)}}</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-between my-5">
                                <a href="{{url('media/news/all')}}" class="btn btn-outline-dark">More News</a>
                            </div>
                        </div>
                            
                    


                        <div class="fancy-title title-border">
                            <h4>Events</h4>
                        </div>
                        <div class="row posts-md col-mb-30">
                            @foreach($this->events as $event)
                            <div class="entry col-md-6">
                                <div class="grid-inner">
                                    <div class="entry-image post-list-event">
                                        <a href="{{ $event->the_permalink() }}"><img src="{{ $event->get_the_post_image_url() }}" alt="Image"></a>
                                    </div>
                                    <div class="entry-title title-sm nott">
                                        <h3><a href="{{ $event->the_permalink() }}">{{$event->title}}</a></h3>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="icon-calendar3"></i>{{$event->the_time()}}</li>
                                        </ul>
                                    </div>
                                    <div class="entry-content">
                                        <p>{{str_limit($event->excerpt,50)}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-between my-5">
                    
                        <a href="{{url('media/events/all')}}" class="btn btn-outline-dark">More Events</a>
                    </div>
                </div>
            </div>
            <div class="sidebar col-lg-3">
                <div class="sidebar-widgets-wrap">
                    
                    <div class="fancy-title title-border">
                        <h4>Press Story</h4>
                    </div>
                        <div style="height:600px; overflow-y:scroll; overflow-x:hidden">
                            <div class="posts-sm row col-mb-30" id="post-list-sidebar">
                                @foreach($this->press as $press)                            
                                <div class="entry col-12">
                                    <div class="grid-inner row g-0">
                                        <div class="col-auto">
                                            <div class="entry-image post-list-press" >
                                                <a href="{{$press->the_permalink() }}"><img src="{{ $press->get_the_post_image_url() }}" alt="Image"></a>
                                            </div>
                                        </div>
                                        <div class="col ps-3">
                                            <div class="entry-title">
                                                <h4><a href="{{ $press->the_permalink() }}">{{$press->title}}</a></h4>
                                            </div>
                                            <div class="entry-meta">
                                                <ul>
                                                    <li>{{$press->the_time()}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-between my-5">
                    
                            <a href="{{url('media/press/all')}}" class="btn btn-outline-dark">More Press</a>
                        </div>
                        <div class="widget clearfix">
                            <div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="true">

                                <div class="oc-item"><a href="#"><img src="{{url('front/posts/test4.jpg')}}" alt="Clients"></a></div>
                                <div class="oc-item"><a href="#"><img src="{{url('front/posts/test4.jpg')}}" alt="Clients"></a></div>
                                

                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
