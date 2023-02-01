@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Brands</h3>     
                        {{ Breadcrumbs::render('admins.brands.add-edit',$title) }}
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
                       
                        <form class="forms-sample" @if(empty($brand)) action="{{ url('admin/add-edit-brand/')}}" @else action="{{ url('admin/add-edit-brand/'.$brand['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" name="brand_name" value="{{ !empty($brand)? $brand['brand_name']:""}}" class="form-control checkBrandSlug" id="brand_name" placeholder="Enter New Brand" required>
                            </div>
                            <div class="form-group">
                                <label for="slug">URL Slug </label>
                                <input type="text" name="slug" value="{{ !empty($brand)? $brand['slug']:""}}"  readonly class="form-control" id="slug" placeholder="Enter URL">
                            </div>
                            <div class="form-group">
                                <label for="brand_image">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control" id="brand_image" >
                                
                                @if(!empty($brand['brand_image']))                                
                                    <a target="_blank" href="{{ url('front/brand_images/'.$brand['brand_image'] )}}">View Image</a> |                                 
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-brand-image/'.$brand['id'])}}" data-title='{{$brand['brand_image']}}'>Remove Image</a>                                
                                    
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="brand_discount">Brand Discount</label>
                                <input type="text" name="brand_discount" value="{{ !empty($brand)? $brand['brand_discount']:""}}" class="form-control" id="brand_discount" placeholder="Enter Discount">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description">{{ !empty($brand)? $brand['description']:""}}</textarea>
                            </div>
                           
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ !empty($brand)? $brand['meta_title']:""}}" class="form-control" id="meta_title" placeholder="Enter Meta Title">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ !empty($brand)? $brand['meta_description']:""}}" class="form-control" id="meta_description" placeholder="Enter Meta Descriptions">
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="{{ !empty($brand)? $brand['meta_keywords']:""}}" class="form-control" id="meta_keywords" placeholder="Enter Meta Keywords">
                            </div>

                            @if(empty($brand))
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
<script src="{{ url('admin/js/custom-brands.js') }}"></script>
@endsection