@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}} </h3>
                        {{ Breadcrumbs::render('admins.careers.add-edit',$title) }}
                       
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
                       
                        <form class="forms-sample" action="{{ url('admin/careers/')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" style="width:30%"  name="title" value="" class="form-control" id="title" placeholder="Enter title" >
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select class="form-control" name="location"  style="width:200px" >
                                    <option value="selangor" selected>PJ Selangor</option>
                                    <option value="melaka">Melaka</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="typeofemployeement">Type of Employeement</label>
                                <select class="form-control " name="typeofemployeement"  style="width:200px" >
                                    <option value="Full Time" selected>Full Time</option>
                                    <option value="Partime">Part Time</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Contract">Contract</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="body">Start Date</label>
                                <input type="date" name="start" style="width:200px" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="body">End Date</label>
                                <input type="date" name="end" style="width:200px" class="form-control" i>
                            </div>


                            <div class="form-group">
                                <label for="body">Post Description</label>
                                <textarea id="body" name="ckeditor-body" class="ckeditor-body form-control"
                                    rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="blog_is_published">Published</label>
                    
                                <select name='status' class='form-control' style="width:200px">
                    
                                    <option value='1'>
                                        Published
                                    </option>
                                    <option value='0' selected>Not
                                        Published
                                    </option>
                    
                                </select>
                              
                            </div>
                          
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
<script src="{{url('admin/vendors/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
       // $('.ckeditor').ckeditor();
        CKEDITOR.replace( 'ckeditor-body' );
    });
    
</script>
@endsection