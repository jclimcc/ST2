@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        {{ Breadcrumbs::render('admins.projects.add-edit',$title) }}
                        <h6 class="font-weight-normal mb-0"> {{$title}} </h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
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
                       
                        <form class="forms-sample" @if(empty($project)) action="{{ url('admin/add-edit-project/')}}" @else action="{{ url('admin/add-edit-project/'.$project['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="title">Project Name</label>
                                <input type="text" name="name" value="{{ !empty($project)? $project['name']:""}}" class="form-control" id="name" placeholder="Enter Project Name" >
                            </div>
                            <div class="form-group">
                                <label for="subtitle">URL </label>
                                <input type="text" name="url" value="{{ !empty($project)? $project['url']:""}}"  class="form-control" id="url" placeholder="Enter URL link">
                            </div>
                            <div class="form-group">
                                <label for="project_image">Icon</label>
                                <input type="file" name="project_icon" class="form-control" id="project_image" >
                                
                                @if(!empty($project['icon']))                                
                                    <a target="_blank" href="{{ url('front/projects/icons/'.$project['icon'] )}}">View Image</a> |                                 
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-project-image/'.$project['id'])}}" data-title='{{$project['image']}}'>Remove Image</a>                                
                                    
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="project_image">Image</label>
                                <input type="file" name="project_image" class="form-control" id="project_image" >
                                
                                @if(!empty($project['image']))                                
                                    <a target="_blank" href="{{ url('front/projects/images/'.$project['image'] )}}">View Image</a> |                                 
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-project-image/'.$project['id'])}}" data-title='{{$project['image']}}'>Remove Image</a>                                
                                    
                                @endif
                            </div>
                           
                            <div class="form-group">
                                <label for="title">Display Sequence </label>
                                <input type="text" name="sequence" value="{{ !empty($project)? $project['sequence']:""}}" class="form-control" id="sequence" placeholder="display Sequence" >
                            </div>
                          

                            @if(empty($project))
                                <input type="hidden" name="type" value="add"  required>
                            
                            @else
                                <input type="hidden" name="type" value="edit"  required>
                            @endif

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
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
<script src="{{ url('admin/js/custom-projects.js') }}"></script>
@endsection