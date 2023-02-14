@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}} </h3>
                        {{ Breadcrumbs::render('admins.popup-banner.add-edit',$title) }}
                       
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
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
                       
                        <form class="forms-sample" @if(empty($banner)) action="{{ url('admin/add-edit-popup-banner/')}}" @else action="{{ url('admin/add-edit-popup-banner/'.$banner['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{ !empty($banner)? $banner['title']:""}}" class="form-control" id="title" placeholder="Enter title" >
                            </div>
                           
                            <div class="form-group">
                                <label for="banner_image">Image</label>
                                <input type="file" name="banner_image" class="form-control" id="banner_image" >
                                
                                @if(!empty($banner['image']))                                
                                    <a target="_blank" href="{{ url('front/popup/'.$banner['image'] )}}">View Image</a> |                                 
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-popup-banner-image/'.$banner['id'])}}" data-title='{{$banner['image']}}'>Remove Image</a>                                
                                    
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="meta_title">URL LINK</label>
                                <input type="text" name="url" value="{{ !empty($banner)? $banner['url']:""}}" class="form-control" id="url" placeholder="Enter url">
                            </div>  
                           
                            <div class="form-group">
                                <label for="title">Display Sequence </label>
                                <input type="text" name="sequence" value="{{ !empty($banner)? $banner['sequence']:""}}" class="form-control" id="sequence" placeholder="display Sequence" >
                            </div>
                          

                            @if(empty($banner))
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
<script src="{{ url('admin/js/custom-banners.js') }}"></script>
@endsection