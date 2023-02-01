@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
                        <h6 class="font-weight-normal mb-0"> Update Admin Password </h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Update your password</h4>
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
                        <form class="forms-sample" action="{{ url('admin/update-admin-password')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username / Email address</label>
                                <input type="email" name='email' class="form-control" id="exampleInputEmail1" value="{{ $adminDetails['email']}}" placeholder="Email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="admin_type">Admin Type</label>
                                <input type="text" name='admin_type' class="form-control" id="admin_type" value="{{ $adminDetails['type']}}" placeholder="Admin Type" readonly>
                            </div>
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Enter Current Password" required>
                                <span id="current_password_status"></span>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Confirm Password</label>
                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter New Password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter New Confirm Password" required>
                            </div>
                            
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
<script src="{{ url('admin/js/custom.js') }}"></script>
@endsection