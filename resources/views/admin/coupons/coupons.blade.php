@extends('admin.layout.layout')
@section('content')
<?php 

use App\Models\Category;
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Coupons</h3>
                        
                        {{ Breadcrumbs::render('admins.coupons') }}
                        <h6 class="font-weight-normal mb-0"> {{$title}}</h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{$title}}</h4>
                        {{-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> --}}
                        <div class="justify-content-end d-flex" style="max-width:150px;float: right;display:inline">
                        <a href="{{ url('admin/add-edit-coupon/')}}" class="btn btn-block btn-primary">Add Coupon</a>
                        </div>
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        <h3>Coupon List</h3>
				       
                    
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="coupons-page">
                                <thead>
                                    <tr>
                                        <th>No</th> 
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Coupon Type</th>
                                        <th>Amount Type</th>
                                        <th>Amount</th>
                                        <th>Expiry Date</th>
                                        <th>Claim Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getCoupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $coupon['coupon_code'] }}</td>
                                        <td><span style=" white-space: normal !important;
                                        "> {{ Category::getCategoryNameFromArray($coupon['categories']) }}</span></td>
                                        <td>{{ $coupon['coupon_type'] }}</td>
                                        <td>{{ $coupon['amount_type'] }}</td>
                                        <td>{{ $coupon['amount'] }}</td>
                                        <td>{{ $coupon['expiry_date'] }}</td>
                                        <td>{{ $coupon['cart_amount'] }}</td>
                                        <td>
                                            @if( $coupon['status']=='1')
                                            <a class="updateCouponStatus" id="coupon-{{$coupon['id']}}" coupon_id="{{$coupon['id']}}" href="javascript:void(0)">
                                            <i status="{{$coupon['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateCouponStatus" id="coupon-{{$coupon['id']}}" coupon_id="{{$coupon['id']}}" href="javascript:void(0)">
                                            <i status="{{$coupon['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-coupon/'.$coupon['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>

                                            <a href="javascript:void(0)"class="confirmDelete" data-title="{{$coupon['coupon_code']}}" data-link="{{ url('admin/delete-coupon/'.$coupon['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                            
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
<script src="{{ url('admin/js/custom-coupons.js') }}"></script>
@endsection