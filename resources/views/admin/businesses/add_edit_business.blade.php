@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        {{ Breadcrumbs::render('admins.businesses.add-edit',$title) }}
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
                       
                        <form class="forms-sample" @if(empty($business)) action="{{ url('admin/add-edit-business/')}}" @else action="{{ url('admin/add-edit-business/'.$business['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="title">Business Name</label>
                                <input type="text" name="name" value="{{ !empty($business)? $business['name']:""}}" class="form-control" id="name" placeholder="Enter Business Name" >
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <input type="text" name="description" value="{{ !empty($business)? $business['description']:""}}" class="form-control" id="name" placeholder="Enter Business Name" >
                            </div>
                            <div class="form-group">
                                <label for="subtitle">URL </label>
                                <input type="text" name="url" value="{{ !empty($business)? $business['url']:""}}"  class="form-control" id="url" placeholder="Enter URL link">
                            </div>
                            <div class="form-group">
                                <label for="business_image">Icon</label>
                                <input type="file" name="business_icon" class="form-control" id="business_image" >
                                
                                @if(!empty($business['icon']))                                
                                    <a target="_blank" href="{{ url('front/business/icons/'.$business['icon'] )}}">View Image</a> |                                 
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-business-image/'.$business['id'])}}" data-title='{{$business['image']}}'>Remove Image</a>                                
                                    
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="business_image">Image</label>
                                <input type="file" name="business_image" class="form-control" id="business_image" >
                                
                                @if(!empty($business['image']))                                
                                    <a target="_blank" href="{{ url('front/business/images/'.$business['image'] )}}">View Image</a> |                                 
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-business-image/'.$business['id'])}}" data-title='{{$business['image']}}'>Remove Image</a>                                
                                    
                                @endif
                            </div>
                           
                            <div class="form-group">
                                <label for="title">Display Sequence </label>
                                <input type="text" name="sequence" value="{{ !empty($business)? $business['sequence']:""}}" class="form-control" id="sequence" placeholder="display Sequence" >
                            </div>
                          

                            @if(empty($business))
                                <input type="hidden" name="type" value="add"  required>
                            
                            @else
                                <input type="hidden" name="type" value="edit"  required>
                            @endif

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light" onclick="history.back()">Cancel</button>
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
<script src="{{ url('admin/js/custom-business.js') }}"></script>
@endsection