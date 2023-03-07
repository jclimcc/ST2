@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        
                        {{ Breadcrumbs::render('admins.posts') }}
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{$title}}</h4>
                        {{-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> --}}
                        <div class="justify-content-end d-flex" style="max-width:150px;float: right;display:inline">
                        <a href="{{ url('admin/add-edit-post/')}}" class="btn btn-block btn-primary">Add Post</a>
                        </div>
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
				       
                    
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered nowrap dt-responsive" id="posts-page" >
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Post Title</th>                                       
                                        <th>Published</th>                                       
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getPosts as $post)
                                    <tr>
                                        <td>{{ $post['id']}}</td>
                                        <td>
                                            <a href="#" title="{{$post['title'] }}">
                                                {{ str_limit($post['title']) }}
                                            </a>
                                            <br />
                                            <small>
                                                Created {{  $post['created_at'] }}
                                            </small>
                                        
                                        </td>
                                        <td>
                                             @if($post['is_published'] == 1)
                                            <div class="badge badge-success">Published</div>
                                            @else 
                                             <div class="badge badge-warning">Pending</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('admin/view-post/'.$post['id']) }}">
                                            <i class="mdi mdi-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ url('admin/add-edit-post/'.$post['id']) }}">
                                            <i class="mdi mdi-pencil">
                                            </i>
                                            Edit
                                        </a>
                                        
                                            
                                        
                                            <a href="javascript:void(0)"class="confirmDelete" data-title="{{$post['title']}}" data-link="{{ url('admin/delete-post/'.$post['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                            
                                        </td>
                                    </tr>  
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>

@endsection

@section('customjs')

<script src="{{ url('admin/js/custom-post.js') }}"></script>
@endsection