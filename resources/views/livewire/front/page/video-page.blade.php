<div>
    <div class="container mt-5 clearfix">
        
        @if(!is_null($videos))
        <!-- Posts
        ============================================= -->
        <div id="posts" class="post-grid row grid-container gutter-40 clearfix" data-layout="fitRows">
           
            @foreach($videos as $video)
            <div class="entry col-md-4 col-sm-6 col-12">
                <div class="grid-inner">
                    <div class="entry-image post-list-category">
                        <a class="grid-item" href="https://www.youtube.com/watch?v={{$video->video}}" data-lightbox="iframe">
                            <div class="grid-inner">
                                <img src="{{ $videothumbnails[$video->video]['image']}}" alt="Youtube Video">
                                <div class="bg-overlay">
                                    <div class="bg-overlay-content dark">
                                        <i class="icon-youtube-play h4 mb-0" data-hover-animate="fadeIn"></i>
                                    </div>
                                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                </div>
                            </div>
                        </a>
                   </div>
                    <div class="entry-title">
                        <h2><a href="https://www.youtube.com/watch?v={{$video->video}}" data-lightbox="iframe">{{$video->title}}</a></h2>
                    </div>
                    <div class="entry-meta">
                        <ul>
                            <li><i class="icon-calendar3"></i>{{$video->the_time()}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            

        </div><!-- #posts end -->

        <div class="clear mt-5"></div>

        <!-- Pagination
        ============================================= -->
        {{ $videos->links('vendor.pagination.bootstrap-5') }}
        @else
         <h1>no video</h1>
        @endif
        {{-- <div class="d-flex justify-content-between mt-5">
            <a href="#" class="btn btn-outline-secondary">&larr; Older</a>
            <a href="#" class="btn btn-outline-dark">Newer &rarr;</a>
        </div> --}}
        <!-- .pager end -->

    </div>


    

    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>
