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
        <form class="forms-sample" @if(empty($tag)) action="{{ url('admin/add-edit-post-tag/')}}" @else action="{{ url('admin/add-edit-post-tag/'.$tag['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="title" value="{{ !empty($tag)? $tag['tag']:""}}" class="form-control" id="post_title" placeholder="Enter title" oninput="populate_slug_field();" >
                            </div>
                            
                           
                            @if(empty($tag))
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