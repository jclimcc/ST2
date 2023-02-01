@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Product Images</h3>
                        {{ Breadcrumbs::render('admins.products.add-edit-product-images',$title) }}
                        <h6 class="font-weight-normal mb-0">Product: {{$title}} </h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
           
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
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
                       
                        <p class="text-info">**After keyin new value press "Enter"</p>
                        <div class="table-responsive  ">
                            <table class="table  table-bordered"id="products-page">
                                <thead>
                                    <tr>
                                        <th>Sequence</th>                                         
                                        <th>Type</th>
                                        <th>Product Image</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(empty($productImage))
                                    <tr><td colspan='6'>No Product Images</td></tr>
                                    @else
                                        
                                        @foreach ($productImage as $image)
                                        <tr>
                                            <td><input type="text" class="editProductImageSequence" data-productImage_id="{{$image['id']}}" value="{{ $image['sequence']}}" style="width:30px"></td>
                                            <td>{{ $image['type'] }}</td>
                                            <td>
                                                <img style="width:50px;height:50px" src='{{ url('front/images/products/small/'.$image['image'])}}'>
                                            </td>
                                            <td>{{date('d-m-Y H:m', strtotime($image['created_at'])) }}</td>

                                            
                                            <td>
                                                @if( $image['status']=='1')
                                                <a class="updateProductImageStatus" id="productImage-{{$image['id']}}" productImage_id="{{$image['id']}}" href="javascript:void(0)">
                                                <i status="{{$image['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                                </a>
                                                @else
                                                <a class="updateProductImageStatus" id="productImage-{{$image['id']}}" productImage_id="{{$image['id']}}" href="javascript:void(0)">
                                                <i status="{{$image['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
            
                                                <a href="javascript:void(0)"class="confirmDelete" data-title="{{$image['image']}}" data-link="{{ url('admin/delete-product-image/'.$image['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                                
                                            </td>
                                        </tr>  
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>



        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    
                    <div class="card-body">
                        <h4 class="card-title">Add Product Image - {{$title}}</h4>
                       
                       
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error :</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    
                        @endif
                        <div class="form-group text-dark">
                            <label for="productAttribute_sequence">Product:  {{ $product['product_code']}} | {{ $product['product_name']}} </label>
                        </div>
                        <div class="form-group text-dark">
                            <label for="productAttribute_sequence">Product slug: {{ $product['slug']}}</label>
                        </div>
                        <div class="form-group text-dark">
                            <label for="productAttribute_sequence">Product Section : {{ $product['section']['name']}}</label>
                        </div>
                        <div class="form-group text-dark">
                            <label for="productAttribute_sequence">Product Categories: {{ $product['category']['category_name']}}</label>
                        </div>
                        
                        <div class="form-group text-dark">
                            <label for="productAttribute_sequence">Variation Type:  {{ getProductVariationType($product['product_variation_type'])}}</label>
                        </div>
                        
                        <form class="forms-sample" action="{{ url('admin/add-edit-product-images/'.$product['id'])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="productImage_sequence">Product Sequence</label>
                                <input type="text" name="productImage_sequence" value="" class="form-control" id="productImage_sequence" placeholder="Enter Image Sequence" required>
                            </div>
                            <div class="form-group">
                                <label for="productImage_type">Type</label>
                                <input type="text" name="productImage_type" value="" class="form-control" id="productImage" placeholder="product type">
                            </div>
                           
                            <div class="form-group">
                                <label for="productImage_image">Product Image (Recommend size 1000x1000)</label>
                                <input type="file" name="productImage_image" class="form-control" id="productImage_image" >
                               
                            </div>
                            
                            <input type="hidden" name="type" value="add"  required>
                            
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
 <script src="{{ url('admin/js/custom-product.js') }}"></script> 
@endsection