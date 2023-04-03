<div>
    <section id="content" >
        <div class="content-wrap ">
            <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('media/all')}}">Media</a></li>
              
                @if($type=='post')
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('media/'.$category->slug.'/all')}}">{{ $category->title}} Center</li>
                @else                
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('media/tags/all')}}">Tag Center</a></li>
                @endif 
            </ol>
            </div>
        </div>
    </section>
</div>
            
