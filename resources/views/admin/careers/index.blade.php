@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        
                        {{ Breadcrumbs::render('admins.careers') }}
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
                        <a href="{{ url('admin/careers/create')}}" class="btn btn-block btn-primary">Add Career</a>
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
                            <table class="table table-bordered" id="posts-page">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Title</th> 
                                        <th>Published</th>                                           
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCareers as $career)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            <a>
                                                {{ $career['title'] }} | {{  $career['location'] }}
                                            </a>
                                            <br />
                                            <small>
                                               Type of Employeement: {{  $career['typeofemployee'] }}
                                            </small>
                                        
                                        </td>
                                        <td>

                                            @if( $career['status']=='1')
                                            <a class="updateCareerStatus" id="career-{{$career['id']}}" career_id="{{$career['id']}}" href="#">
                                            <i status="{{$career['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateCareerStatus" id="career-{{$career['id']}}" career_id="{{$career['id']}}" href="#">
                                            <i status="{{$career['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif

                                            
                                        </td>
                                       
                                        <td>
                                           
                                            <a class="btn btn-primary btn-sm" href="{{ url('admin/careers/'.$career['id'].'/jobapplicant') }}">
                                                <i class="mdi mdi-folder">
                                                </i>
                                                Applied Applicants
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ url('admin/careers/'.$career['id'].'/') }}">
                                            <i class="mdi mdi-folder">
                                            </i>
                                            View Job
                                        </a>
                                        
                                        <a class="btn btn-info btn-sm" href="{{ url('admin/careers/'.$career['id'].'/edit') }}">
                                            <i class="mdi mdi-pencil">
                                            </i>
                                            Edit
                                        </a> 
                                        
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
<script src="{{ url('admin/js/custom-career.js') }}"></script>
@endsection