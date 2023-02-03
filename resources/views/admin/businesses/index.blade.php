@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        
                        {{ Breadcrumbs::render('admins.businesses') }}
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
                        <a href="{{ url('admin/add-edit-business/')}}" class="btn btn-block btn-primary">Add Business</a>
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
                            <table class="table table-bordered" id="business-page">
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
                                    @foreach ($getBusiness as $business)
                                    <tr>
                                        <td>{{ $business['sequence']}}</td>
                                        <td>{{ $business['name'] }}</td>
                                        <td><a href="{{url('front/business/icons/'.$business['icon'] )}}" target="_blank"> <img style="width:120px;height:50px;border-radius: inherit;" src="{{ url('front/business/icons/'.$business['icon']) }}"></a></td>
                                        <td><a href="{{url('front/business/images/'.$business['image'] )}}" target="_blank"> <img style="width:120px;height:50px;border-radius: inherit;" src="{{ url('front/business/images/'.$business['image']) }}"></a></td>
                                        
                                       
                                        <td>
                                            @if( $business['status']=='1')
                                            <a class="updateBusinessStatus" id="business-{{$business['id']}}" business_id="{{$business['id']}}" href="javascript:void(0)">
                                            <i status="{{$business['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateBusinessStatus" id="business-{{$business['id']}}" business_id="{{$business['id']}}" href="javascript:void(0)">
                                            <i status="{{$business['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-business/'.$business['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>

                                            <a href="javascript:void(0)"class="confirmDelete" data-title="{{$business['name']}}" data-link="{{ url('admin/delete-business/'.$business['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                            
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
<script src="{{ url('admin/js/custom-business.js') }}"></script>
@endsection