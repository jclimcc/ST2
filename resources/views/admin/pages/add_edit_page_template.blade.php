@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">New Page Template</h3>
                        {{ Breadcrumbs::render('admins.pages.main',$title) }}
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
                       
                        <form class="forms-sample" @if(empty($pageTemplate)) action="{{ url('admin/add-edit-page_template/')}}" @else action="{{ url('admin/add-edit-page_template/'.$pageTemplate['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="title">Page Name</label>
                                <input type="text" name="name" value="{{ !empty($pageTemplate)? $pageTemplate['name']:""}}" class="form-control" id="title" placeholder="Enter Page Name" >
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Page URL</label>
                                <input type="text" name="url" value="{{ !empty($pageTemplate)? $pageTemplate['url']:""}}"  class="form-control" id="url" placeholder="Enter URL">
                            </div>
                            <div class="form-group">
                                <label for="description">Layout</label>
                                <input type="text" name="layout" value="{{ !empty($pageTemplate)? $pageTemplate['layout']:""}}"  class="form-control" id="layout" placeholder="Enter Layout">
                            </div> <br>
                           <h5>SEO Meta Setup</h5>
                          
                            <div class="form-group">
                                <label for="description">Page Title</label>
                                <input type="text" name="page_title" value="{{ !empty($pageSEO)? $pageSEO['page_title']:""}}"  class="form-control" id="layout" placeholder="Enter Layout">
                            </div>
                            <div class="form-group">
                                <label for="description">Meta Description</label>
                                <br><textarea name="meta_description">{{ !empty($pageSEO)? $pageSEO['meta_description']:""}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Meta Keywords</label>
                                <br><textarea name="meta_keywords">{{ !empty($pageSEO)? $pageSEO['meta_keywords']:""}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Og title</label>
                                <input type="text" name="og_title" value="{{ !empty($pageSEO)? $pageSEO['og_title']:""}}"  class="form-control" id="layout" placeholder="Enter Layout">
                            </div>
                            <div class="form-group">
                                <label for="description">Og Description</label>
                                <br><textarea name="og_description">{{ !empty($pageSEO)? $pageSEO['og_description']:""}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="banner_image">Og Image</label>
                                <input type="file" name="og_image" class="form-control" id="og_image" >
                                
                                @if(!empty($pageSEO['og_image']))                                
                                    <a target="_blank" href="{{ url('front/og_image/'.$pageSEO['og_image'] )}}">View Image</a> |                                 
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-seo-og-image/'.$pageSEO['og_image'])}}" data-title='{{$pageSEO['og_image']}}'>Remove Image</a>                                
                                    
                                @endif
                            </div>


                            @if(empty($pageTemplate))
                                <input type="hidden" name="type" value="add"  required>
                            
                            @else
                                <input type="hidden" name="type" value="edit"  required>
                            @endif

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{ URL::previous() }}">Go Back</a>
                           
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
<script src="{{ url('admin/js/custom-pages.js') }}"></script>
@endsection