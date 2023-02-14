@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        {{ Breadcrumbs::render('admins.videos.add-edit',$title) }}
                    </div>                    
                </div>
            </div>
        </div>
        <form class="forms-sample" @if(empty($video)) action="{{ url('admin/add-edit-video/')}}" @else action="{{ url('admin/add-edit-video/'.$video['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
            @csrf
           
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
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
                                <input type="text" name="title" value="{{ !empty($video)? $video['title']:""}}" class="form-control"  placeholder="Enter title"  >
                            </div>
                            <div class="form-group">
                                <label for="video">Video</label>
                                <input type="text" name="video" value="{{ !empty($video)? $video['video']:""}}" class="form-control"placeholder="Enter Iframe link from youtube" >
                            </div>
                            <div class="form-group">
                                <label for="video">URL</label>
                                <input type="text" name="url" value="{{ !empty($video)? $video['url']:""}}" class="form-control" placeholder="optional" >
                                <small id="blog_is_published_help" class="form-text text-muted">*Read more link, link to post
                                </small>
                            </div>
                            
                            <div class="form-group">
                                <label for="blog_is_published">Published</label>
                    
                                <select name='status' class='form-control' id='blog_is_published'
                                        aria-describedby='blog_is_published_help'>
                    
                                    <option @if($video['status'] == '1') selected='selected' @endif value='1'>
                                        Published
                                    </option>
                                    <option @if($video['status'] == '0') selected='selected' @endif value='0'>Not
                                        Published
                                    </option>
                    
                                </select>
                                <small id="blog_is_published_help" class="form-text text-muted">Should this be published? If not, then it
                                    won't be
                                    publicly viewable.
                                </small>
                            </div>

                            
                            @if(empty($video))
                                <input type="hidden" name="type" value="add"  required>
                            
                            @else
                                <input type="hidden" name="type" value="edit"  required>
                            @endif

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light"  onclick="history.back()">Cancel</button>
                        
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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

@endsection