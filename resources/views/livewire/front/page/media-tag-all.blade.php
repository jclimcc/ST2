<div>   
    
    <div class="container clearfix">
      
       
        
    
            @foreach($sortedGroups as $groupKey => $tags)
                <h3 class="story-title my-2">{{ $groupKey }} </h3>
             
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            @foreach($tags as $tag)
                            <li class="list-group-item">
                                <a href="{{url('media/tags/'.$tag['id'].'/'.$tag['slug'].'/all');}}" class="more-link">{{$tag['tag']}} </a>
                                <span class="badge bg-secondary float-end" style="margin-top: 3px;"> {{$tag['posts_count'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
                  
          
            

        <div class="clear mt-5"></div>

       
    

    </div>
 </div>
