@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Pages</h3>
                        
                        {{ Breadcrumbs::render('admins.pages') }}
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="justify-content-end d-flex" style="max-width:150px;float: right;display:inline">
                        <a href="{{ url('admin/add-edit-page_template/')}}" class="btn btn-block btn-primary">Add Pages</a>
                        </div>
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        <h3>Pages List</h3>
				       
                    
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="template-page">
                                <thead>
                                    <tr>
                                        <th>No</th>                                        
                                        <th>Page Name</th>                                        
                                        <th>URL</th>
                                        <th>SEO/Attribute</th>
                                        <th>Edit Page</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pageDetails as $content)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $content['name'] }}</td>
                                        <td><a href="{{$content['url']}}" target="_blank">Live Page</a></td>                                     
                                        <td>
                                            <a href="{{ url('admin/add-edit-page_template/'.$content['id']) }}">SEO Edit<i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>
                                        
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/page_template_section/'.$content['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>
   
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
<script src="{{ url('admin/js/custom-pages.js') }}"></script>
@endsection