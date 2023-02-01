@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Product Attributes</h3>
                        <h6 class="font-weight-normal mb-0">Product: {{$title}} </h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    
                    <div class="card-body">
                        {{-- <h4 class="card-title">Add Product Attribute - {{$title}}</h4> --}}
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
                            @if(!empty($product['product_images_first']))
                            <img class="mx-auto d-block" src='{{ url('front/images/products/medium/'.$product['product_images_first']['image'])}}'>
                            @else
                            <img src='{{ url('front/images/products/medium/default.jpg')}}'>

                            @endif
                        </div>
                       
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

                        
                       

                        <h4 class="card-title">Add New Attribute</h4>
                       
                        <form class="forms-sample" action="{{ url('admin/add-edit-product-attributes/'.$product['id'])}}" method="POST" enctype="multipart/form-data">
                            @csrf                            
                           
                            <div class="form-group">
                                <div class="field_wrapper">
                                    <div>
                                        <input required style="width:120px" type="text" name="variation[]" placeholder="Variation"/>
                                        <input required style="width:120px" type="text" name="sku[]" placeholder="SKU"/>
                                        <input required style="width:120px" type="number" name="price[]" placeholder="Price"/>
                                        <input required style="width:120px" type="number" name="stock[]" placeholder="Stock"/>
                                        <input required style="width:120px" type="number" name="sequence[]" placeholder="Sequence"/>
                                        <a href="javascript:void(0);" class="add_button" title="Add field"><i style="font-size:25px; vertical-align: middle;" class="mdi mdi-plus-circle"></i></a>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="type" value="add"  required>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            
            
        </div>

        <div class="row">
           
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Attributes</h4>
                        <p class="text-info">After keyin new value press "Enter"</p>
                       
                       
                        <div class="table-responsive pt-3 table-bordered">
                            @if(empty($product['product_attribute']))
                            <h2> No Product Attribute</h2>
                            @else

                            <table class="table" id="products-attribute-page">
                                <thead>
                                    <tr>
                                        <th>Sequence</th>                                         
                                        <th>SKU</th>
                                        <th>Variation</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Created At</th>
                                        <th>Display/Avaliable</th>
                                        <th>Status</th>
                                        {{-- <th>Remove</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                        
                                        @foreach ($product['product_attribute'] as $attribute)
                                        <tr>
                                            <td><input type="number" class="editProductAttributeSequence" data-productAttribute_id="{{$attribute['id']}}" value="{{ $attribute['sequence']}}" style="width:60px"></td>
                                            <td>{{ $attribute['sku'] }}</td>
                                            <td>{{ $attribute['variation'] }}</td>
                                            <td><input type="number" class="editProductAttributePrice"  data-productAttribute_id="{{$attribute['id']}}" value="{{ $attribute['price']}}" style="width:80px"></td>
                                            <td><input type="number" class="editProductAttributeStock" data-productAttribute_id="{{$attribute['id']}}" value="{{ $attribute['stock']}}" style="width:80px"></td>
                                            
                                            <td>{{date('d-m-Y H:m', strtotime($attribute['created_at'])) }}</td>

                                            
                                            <td>
                                                @if( $attribute['available']=='1')
                                                <a class="updateProductAttributeAvailable" id="productAttributeAvailable-{{$attribute['id']}}" productAttribute_id="{{$attribute['id']}}" href="javascript:void(0)">
                                                <i available="{{$attribute['available']}}" style="font-size:25px;color:green" class="mdi mdi-eye"></i>
                                                </a>
                                                @else
                                                <a class="updateProductAttributeAvailable" id="productAttributeAvailable-{{$attribute['id']}}" productAttribute_id="{{$attribute['id']}}" href="javascript:void(0)">
                                                <i available="{{$attribute['available']}}"  style="font-size:25px;color:red"  class="mdi mdi-eye-off"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
            
                                                @if( $attribute['status']=='1')
                                                <a class="updateProductAttributeStatus" id="productAttributeStatus-{{$attribute['id']}}" productAttribute_id="{{$attribute['id']}}" href="javascript:void(0)">
                                                <i status="{{$attribute['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                                </a>
                                                @else
                                                <a class="updateProductAttributeStatus" id="productAttributeStatus-{{$attribute['id']}}" productAttribute_id="{{$attribute['id']}}" href="javascript:void(0)">
                                                <i status="{{$attribute['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                                </a>
                                                @endif
                                            </td>
                                            {{-- <td>
            
                                                <a href="javascript:void(0)"class="confirmDelete" data-title="{{$attribute['sku']}} {{$attribute['variation']}}" data-link="{{ url('admin/delete-product-attribute/'.$attribute['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle text-danger "></i></a>
                                                
                                            </td> --}}
                                        </tr>  
                                        @endforeach
                                   
                                </tbody>
                            </table>
                            @endif
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
 <script src="{{ url('admin/js/custom-product-attributes.js') }}"></script> 
@endsection