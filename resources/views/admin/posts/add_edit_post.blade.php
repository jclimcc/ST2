@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        {{ Breadcrumbs::render('admins.posts.add-edit',$title) }}
                    </div>                    
                </div>
            </div>
        </div>
        <form class="forms-sample" @if(empty($post)) action="{{ url('admin/add-edit-post/')}}" @else action="{{ url('admin/add-edit-post/'.$post['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
            @csrf
           
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                    </div>
                    <div class="card-body">
                        @if( Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error :</strong> {{ Session::get('error_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                       
                        
                            
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{ !empty($post)? $post['title']:""}}" class="form-control" id="post_title" placeholder="Enter title" oninput="populate_slug_field();" >
                            </div>
                            <div class="form-group">
                                <label for="post_slug">Post Slug</label>
                                <input type="text" class="form-control" id="post_slug"  name='slug'
                                       value="{{$post['slug']}}" disabled>
                                <small id="post_slug_help" class="form-text text-muted">The slug (leave blank to auto generate) </small>
                            </div>
                            <div class="form-group">
                                <label for="resume">Post Excerpt</label>
                                <textarea id="resume" name="excerpt" class="form-control"
                                    rows="3">{{ !empty($post)? $post['excerpt']:"" }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Post Description</label>
                                <textarea id="body" name="ckeditor-body" class="ckeditor-body form-control"
                                    rows="5">{{ !empty($post)? html_entity_decode($post['body']):"" }}</textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Features </label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name='featured'
                                        value="1" {{$post['featured']=='1'? 'checked':''}}>
                                        YES
                                        </label>
                                    </div>
                                </div>
                                    <div class="col-sm-4">

                                        <div class="form-check">
                                            <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name='featured'
                                            value="0" {{$post['featured']=='0' ? 'checked': ""}} > No
                                            

                                            </label>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="features_img">Image</label>
                                <input type="file" class="form-control" name='post_image'
                                       value="{{$post['post_image']}}">
                            </div>
                            
                            @if(!empty($post['image']))
                            <div class="image-preview">
                                <img src="{{ asset('front/posts/' . $post['image']) }}" alt="" style="width: 300px;">
                            </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Extra</h3>                            
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="categories[]" class="form-control custom-select">
                                    
                                    <option value="" {{$post->categories->count()>0 ? 'selected':""}}>--Select Category--</option>
                                        
                                   
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if($post->categories->count()>0)
                                                {{ $post->categories->contains($category) ? 'selected' : '' }}
                                            @endif
                                             
                                            >
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tag">Tag</label>                               
                                <select id="tag" name="tags[]" class="form-control custom-select" multiple>
                                    <option disabled>Select one</option>
                                    {{-- {{ dd($post->tags()) }} --}}
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            @if($post->tags->count()>0)
                                                {{ $post->tags->contains($tag)? 'selected' : '' }}
                                            @endif
                                            >
                                            {{ $tag->tag }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="blog_is_published">Published</label>
                    
                                <select name='is_published' class='form-control' id='blog_is_published'
                                        aria-describedby='blog_is_published_help'>
                    
                                    <option @if($post['is_published'] == '1') selected='selected' @endif value='1'>
                                        Published
                                    </option>
                                    <option @if($post['is_published'] == '0') selected='selected' @endif value='0'>Not
                                        Published
                                    </option>
                    
                                </select>
                                <small id="blog_is_published_help" class="form-text text-muted">Should this be published? If not, then it
                                    won't be
                                    publicly viewable.
                                </small>
                            </div>
                        
                            <div class="form-group">
                                {{-- {{dd($post->seo_page()->count())}} --}}
                                <label for="blog_seo_title">SEO: {{"<title>"}} tag (optional)</label>
                                <input class="form-control" id="post_seo_title" aria-describedby="blog_seo_title_help"
                                    name='seo_title' tyoe='text' value='{{$post->seo_page()->count()>0? $post->seo_page->page_title :''}}' >
                                <small id="blog_seo_title_help" class="form-text text-muted">Enter a value for the {{"<title>"}} tag. If nothing is provided here we will just use the normal post title from above (optional)</small>
                            </div>

                            <div class="form-group">
                                <label for="blog_meta_desc">Meta Desc (optional)</label>
                                <textarea class="form-control" id="post_meta_desc" aria-describedby="blog_meta_desc_help"
                                        name='meta_desc'>{{$post->seo_page()->count()>0? $post->seo_page->meta_description :''}}</textarea>
                                <small id="blog_meta_desc_help" class="form-text text-muted">Meta description (optional)</small>
                            </div>
                    </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card ">
                        
                        <div class="card-body">
                        
                            @if(empty($post))
                                <input type="hidden" name="type" value="add"  required>
                            
                            @else
                                <input type="hidden" name="type" value="edit"  required>
                            @endif

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light"  onclick="history.back()">Cancel</button>
                      
                    </div>
                    </div>
                </div>
        </div>
        </form>
        
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
    
@endsection
@section('customjs')
<script src="{{url('admin/vendors/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
       // $('.ckeditor').ckeditor();
        CKEDITOR.replace( 'ckeditor-body' );
    });
    
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
    <script type="text/javascript">
        var route = "{{ url('admin/autocomplete-search-tag') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>

@endsection