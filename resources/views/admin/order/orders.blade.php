@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Orders</h3>
                        
                        {{ Breadcrumbs::render('admins.orders') }}
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
                        <h3>Order List</h3>
				       
                    
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="order-page">
                                <thead>
                                    <tr>
                                        <th>No</th> 
                                        <th>Order Date</th>
                                        <th>Updated</th>
                                        <th>Invoice No</th>
                                        <th>Grand Total</th>
                                        <th>Delivery Status/Method</th>
                                        <th>Tracking Code</th>                                       
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getOrders as $order)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ convertYmdhmsToMdy($order['order_summary']['created_at']) }}</td>
                                        <td>{{ ($order['updated_at']== $order['order_summary']['created_at']?"-":convertYmdhmsToMdy($order['updated_at'])) }}</td>
                                        <td>{{ $order['invoice_no'] }}</td>
                                        <td>RM {{ $order['grand_total'] }}</td>                                        
                                        <td>{{ $order['delivery_status']."".$order['delivery_method'] }}</td>
                                          
                                        <td>{{ $order['delivery_tracking_code'] }}</td>
                                        <td>
                                            @if( $order['order_status']=='1')
                                            <i status="{{$order['order_status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            
                                            @else
                                            <i status="{{$order['order_status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                           
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-order/'.$order['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>

                                            <a href="javascript:void(0)"class="confirmDelete" data-title="{{$order['coupon_code']}}" data-link="{{ url('admin/delete-coupon/'.$order['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                            
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
<script src="{{ url('admin/js/custom-order.js') }}"></script>
@endsection