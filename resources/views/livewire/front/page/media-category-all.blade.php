 <div>   
    <div class="container clearfix">
        @if(!is_null($posts))
        <!-- Posts
        ============================================= -->
        <div id="posts" class="post-grid row grid-container gutter-40 clearfix" data-layout="fitRows">
           
            @foreach($posts as $post)
            <div class="entry col-md-4 col-sm-6 col-12">
                <div class="grid-inner">
                    <div class="entry-image post-list-category">
                        <a href="{{$post->get_the_post_image_url()}}" data-lightbox="image"><img src="{{$post->get_the_post_image_url()}}" alt="{{$post->title}} Image"></a>
                    </div>
                    <div class="entry-title">
                        <h2><a href="{{$post->the_permalink()}}">{{$post->title}}</a></h2>
                    </div>
                    <div class="entry-meta">
                        <ul>
                            <li><i class="icon-calendar3"></i>{{$post->the_time()}}</li>
                            <li><a href="#"><i class="icon-user"></i> {{$post->the_author()}}</a></li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>{{str_limit($post->excerpt,160)}}</p>
                        <a href="{{$post->the_permalink()}}" class="more-link">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            

        </div><!-- #posts end -->

        <div class="clear mt-5"></div>

        <!-- Pagination
        ============================================= -->
        {{ $posts->links('vendor.pagination.bootstrap-5') }}
        @else
         <h1>no post</h1>
        @endif
        {{-- <div class="d-flex justify-content-between mt-5">
            <a href="#" class="btn btn-outline-secondary">&larr; Older</a>
            <a href="#" class="btn btn-outline-dark">Newer &rarr;</a>
        </div> --}}
        <!-- .pager end -->

    </div>
 </div>
