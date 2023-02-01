@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Admin Management</h3>
                        {{ Breadcrumbs::render('admins') }}
                        <h6 class="font-weight-normal mb-0"> View {{$title}}</h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{$title}}</h4>
                        <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Admin ID</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin['id'] }}</td>
                                        <td>{{ $admin['name'] }}</td>
                                        <td>{{ ucfirst($admin['type']) }}</td>
                                        <td>{{ $admin['mobile'] }}</td>
                                        <td>{{ $admin['email'] }}</td>
                                        <td>
                                            @if($admin['image']!='')
                                            <img src="{{ asset('admin/images/photos/'.$admin['image']) }}">
                                            @else
                                            <img src="{{ asset('admin/images/photos/default.png') }}">
                                            @endif
                                        </td>
                                        <td>
                                            @if( $admin['status']=='1')
                                            <a class="updateAdminStatus" id="admin-{{$admin['id']}}" admin_id="{{$admin['id']}}" href="javascript:void(0)">
                                            <i status="{{$admin['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateAdminStatus" id="admin-{{$admin['id']}}" admin_id="{{$admin['id']}}" href="javascript:void(0)">
                                            <i status="{{$admin['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if( $admin['type']=='admin')
                                            <a href="{{ url('admin/admins/edit/'.$admin['id']) }}"><i style="font-size:25px;" class="mdi mdi-file-document"></i></a>
                                            @elseif( $admin['type']=='vendor')
                                            <a href="{{ url('admin/view-vendor-details/'.$admin['id']) }}"><i style="font-size:25px;"  class="mdi mdi-file-document"></i></a>
                                            @endif
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
<script src="{{ url('admin/js/custom.js') }}"></script>
@endsection