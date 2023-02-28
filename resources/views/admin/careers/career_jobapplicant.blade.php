@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        
                        {{ Breadcrumbs::render('admins.careers.applied_applicant',$title) }}
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
                                        <th>Subject</th> 
                                        <th>Published</th>                                           
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applicants as $applicant)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            <a>
                                                {{ $applicant['name'] }}    
                                            </a>
                                            <br />
                                            <small>
                                                H.Phone: {{  $applicant['phone'] }} | Email: {{  $applicant['email'] }}
                                            </small>
                                        
                                        </td>
                                        <td>
                                           
                                            <small>
                                              {{  $applicant['resume'] }}
                                            </small>
                                        
                                        </td>
                                        
                                        <td>
                                           
                                            <a class="btn btn-success btn-sm" href="{{ url('admin/jobapplicants/'.$applicant['id'].'') }}">
                                                <i class="mdi mdi-account-card-details">
                                                </i>
                                                View Applicant
                                        </a>
                                        <a class="btn btn-primary btn-sm" href="{{ url('admin/careers/'.$applicant['id'].'/edit') }}">
                                            <i class="mdi mdi-folder">
                                            </i>
                                            View Job
                                         </a>
                                        
                                        <a class="btn btn-info btn-sm" href="{{ url('admin/careers/'.$applicant['id'].'/edit') }}">
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