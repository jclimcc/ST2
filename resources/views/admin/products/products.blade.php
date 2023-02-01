@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Products</h3>
                        
                        {{ Breadcrumbs::render('admins.products') }}
                        <h6 class="font-weight-normal mb-0">Products Details</h6>
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
                        <a href="{{ url('admin/add-edit-product/')}}" class="btn btn-block btn-primary">Add Product</a>
                        </div>
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        
                        @if( Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error :</strong> {{ Session::get('error_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif


                        @foreach ($products as $product)
                        {{$product['product_name']}}
                        {{-- @while (!empty($product['parent_product'])) --}}
                        {{-- @endwhile --}}
                        <br>
                        @endforeach

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="products-page">
                                <thead>
                                    <tr>
                                        <th>No</th> 
                                        <th>Product Name</th>
                                        <th>Product Section</th>
                                        <th>Category </th>
                                        <th>URL</th>
                                        <th>Image</th>
                                        <th>Section</th>
                                        <th>Category</th>
                                        <th>Added By</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)

                                    <tr>
                                        <td>{{ $loop->index+1}}</td>
                                        <td>{{ $product['product_name'] }}</td>
                                        <td>
                                            
                                            @if(!empty($product['section']))
                                            {{   $product['section']['name']}}
                                            @else
                                            Root
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($product['category']))
                                            {{ $product['category']['category_name']}}
                                            @endif
                                        
                                        </td>
                                        <td>
                                            {{ $product['slug'] }}
                                         </td>
                                         <td>
                                            <a href="{{url('admin/add-edit-product-images/'.$product['id'])}}">
                                                <i style="    font-size: 25px;
                                                vertical-align: middle;" class="mdi mdi-camera"></i>
                                           ( {{(empty($product['product_images']) ? "0" : sizeOf($product['product_images']))}} )
                                        </a>
                                         </td>

                                         <td> {{ $product['section']['name'] }} </td>
                                        <td> {{ $product['category']['category_name'] }} </td>
                                        <td> 
                                            @if($product['admin_type']=='vendor')
                                            <a href="{{url('admin/view-vendor-details/'.$product['vendor_id'])}}">{{ucfirst($product['admin_type'])}}</a>
                                            @else
                                            {{ ucfirst($product['admin_type'])}}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $product['status']=='1')
                                            <a class="updateProductStatus" id="product-{{$product['id']}}" product_id="{{$product['id']}}" href="javascript:void(0)">
                                            <i status="{{$product['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateProductStatus" id="product-{{$product['id']}}" product_id="{{$product['id']}}" href="javascript:void(0)">
                                            <i status="{{$product['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-product/'.$product['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>
                                            <a href="{{ url('admin/add-edit-product-attributes/'.$product['id']) }}"><i style="font-size:25px;" class="mdi mdi-plus-circle"></i></a>

                                            <a href="javascript:void(0)"class="confirmDelete" data-title="{{$product['product_name']}}" data-link="{{ url('admin/delete-product/'.$product['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                            
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
 <script src="{{ url('admin/js/custom-product.js') }}"></script> 
@endsection