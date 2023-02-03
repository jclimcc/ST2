@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        
                        {{ Breadcrumbs::render('admins.projects') }}
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> --}}
                        <div class="justify-content-end d-flex" style="max-width:150px;float: right;display:inline">
                        <a href="{{ url('admin/add-edit-project/')}}" class="btn btn-block btn-primary">Add Project</a>
                        </div>
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        <h3>{{$title}}</h3>
				       
                    
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="projects-page">
                                <thead>
                                    <tr>
                                        <th>Sequence</th> 
                                        <th>Title</th>
                                        <th>Icon</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getProjects as $project)
                                    <tr>
                                        <td>{{ $project['sequence']}}</td>
                                        <td>{{ $project['name'] }}</td>
                                        <td><a href="{{url('front/projects/icons/'.$project['icon'] )}}" target="_blank"> <img style="width:120px;height:50px;border-radius: inherit;" src="{{ url('front/projects/icons/'.$project['icon']) }}"></a></td>
                                        <td><a href="{{url('front/projects/images/'.$project['image'] )}}" target="_blank"> <img style="width:120px;height:50px;border-radius: inherit;" src="{{ url('front/projects/images/'.$project['image']) }}"></a></td>
                                        
                                       
                                        <td>
                                            @if( $project['status']=='1')
                                            <a class="updateProjectStatus" id="project-{{$project['id']}}" project_id="{{$project['id']}}" href="javascript:void(0)">
                                            <i status="{{$project['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateProjectStatus" id="project-{{$project['id']}}" project_id="{{$project['id']}}" href="javascript:void(0)">
                                            <i status="{{$project['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-project/'.$project['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>

                                            <a href="javascript:void(0)"class="confirmDelete" data-title="{{$project['name']}}" data-link="{{ url('admin/delete-project/'.$project['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                            
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
<script src="{{ url('admin/js/custom-projects.js') }}"></script>
@endsection