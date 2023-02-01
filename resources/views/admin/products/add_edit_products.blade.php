@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Product</h3>
                        {{ Breadcrumbs::render('admins.products.add-edit',$title) }}
                        <h6 class="font-weight-normal mb-0"> {{$title}} </h6>
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
                        <form class="forms-sample" @if(empty($product)) action="{{ url('admin/add-edit-product/')}}" @else action="{{ url('admin/add-edit-product/'.$product['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" value="{{ !empty($product)? $product['product_name']:""}}" class="form-control checkProductSlug" id=" product_name" placeholder="Enter New Product" required>
                            </div>
                            <div class="form-group">
                                <label for="url">Product URL Slug (Auto Generate)</label>
                                <input type="text" name="slug" value="{{ !empty($product)? $product['slug']:""}}" class="form-control" id="slug" placeholder="auto generate" readonly>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <?php 
                                if(isset($product))
                                    $categoryValue= $product['category_id'];
                                else
                                    $categoryValue=null
                                ?>
                                <select name="category_id" class="form-control text-dark" id="category_id">
                                    <option value='0' {{ ($product['category_id']=='0') ? "selected": "" }}>Select Category</option>
                                    @foreach($sections as $section )                                        
                                    <optgroup  value="{{$section['id']}}" label="{{ $section['name']}}">
                                         @foreach($section['categories'] as $category)
                                            <option value='{{$category['id']}}' {{($categoryValue==$category['id']?"selected":"" )}}>&nbsp;&nbsp;&nbsp; --&nbsp;{{$category['category_name']}}</option>
                                            @foreach($category['sub_categories'] as $subcategory)
                                            <option value='{{$subcategory['id']}}' {{($categoryValue==$subcategory['id']?"selected":"" )}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ----&nbsp;{{$subcategory['category_name']}}</option>
                                                @foreach($subcategory['children_recursive'] as $subchildcategory)
                                                <option value='{{$subchildcategory['id']}}' {{($categoryValue==$subchildcategory['id']?"selected":"" )}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ------&nbsp;{{$subchildcategory['category_name']}}</option>
                                                    @foreach($subchildcategory['children_recursive'] as $subchildcategory)
                                                    <option value='{{$subchildcategory['id']}}' {{($categoryValue==$subchildcategory['id']?"selected":"" )}}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --------&nbsp;{{$subchildcategory['category_name']}}</option>
                                                    @endforeach
                                               
                                                @endforeach

                                             @endforeach

                                             
                                        @endforeach 
                                    @endforeach
                                </optgroup>
                                </select>
                            </div>
                            <div class="loadFilters" id="loadFilters">
                                @include('admin.products.category_filter')
                                </div>
                            <div class="form-group">
                                <label for="brand_id">Select Brands</label>
                                <?php 
                                if(isset($product))
                                    $brandValue= $product['brand_id'];
                                else
                                    $brandValue=null
                                ?>
                                <select name="brand_id" class="form-control  text-dark" id="brand_id">
                                    <option value='0' {{ ($product['brand_id']=='0') ? "selected": "" }}>Select Brands</option>
                                    @foreach($brands as $brand )                                        
                                    <option value="{{$brand['id']}}" {{($brandValue==$brand['id']?"selected":"")}}>{{ $brand['brand_name']}}
                                    </option>
                                         
                                    @endforeach
                                </select>
                            </div>
                          
                            {{-- <div class="form-group">
                                <div id="appendProductsLevel">
                                    @include('admin.products.append_products_level')
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" name="product_code" value="{{ !empty($product)? $product['product_code']:""}}" class="form-control" id="product_code" placeholder="Enter Product Code">
                            </div>
                            <div class="form-group ">
                                <?php 
                                if(isset($product))
                                    $variationType= $product['product_variation_type'];
                                else
                                    $variationType=null
                                   
                                ?>

                                <label for="product_variation_type">Product Variation Type</label>
                                <div class="form-check form-check-flat form-check-primary">
                                    <div class="form-check ">
                                        <label class="form-check-label">
                                            <input type="radio" name="product_variation_type" value="1" class="form-check-input"  {{ ($variationType=='1') ? "checked": "" }}  required> {{ getProductVariationType(1)}}<i class="input-helper"></i>
                                        </label>
                                      </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="product_variation_type" value="2" class="form-check-input" {{ ($variationType=='2') ? "checked": "" }}  required> {{ getProductVariationType(2)}}<i class="input-helper"></i>
                                        </label>
                                      </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="product_variation_type" value="3" class="form-check-input" {{ ($variationType=='3') ? "checked": "" }}  required> {{ getProductVariationType(3)}}<i class="input-helper"></i>
                                        </label>
                                      </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="product_variation_type" value="4" class="form-check-input" {{ ($variationType=='4') ? "checked": "" }}  required> {{ getProductVariationType(4)}}<i class="input-helper"></i>
                                        </label>
                                      </div>


                                  
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_price">Product Prices</label>
                                <input type="text" name="product_price" value="{{ !empty($product)? $product['product_price']:""}}" class="form-control" id="product_price" placeholder="Enter Prices">
                            </div>
                            <div class="form-group">
                                <label for="product_discount">Product Discount(%)</label>
                                <input type="text" name="product_discount" value="{{ !empty($product)? $product['product_discount']:""}}" class="form-control" id="product_discount" placeholder="Enter Discount">
                            </div>
                            <div class="form-group">
                                <label for="product_width">Product Width</label>
                                <input type="text" name="product_width" value="{{ !empty($product)? $product['product_width']:""}}" class="form-control" id="product_width" placeholder="Enter Width">
                            </div>
                            <div class="form-group">
                                <label for="product_height">Product Height</label>
                                <input type="text" name="product_height" value="{{ !empty($product)? $product['product_height']:""}}" class="form-control" id="product_height" placeholder="Enter Height">
                            </div>
                            <div class="form-group">
                                <label for="product_depth">Product Depth</label>
                                <input type="text" name="product_depth" value="{{ !empty($product)? $product['product_depth']:""}}" class="form-control" id="product_depth" placeholder="Enter Depth">
                            </div>
                            <div class="form-group">
                                <label for="product_weight">Product Weight</label>
                                <input type="text" name="product_weight" value="{{ !empty($product)? $product['product_weight']:""}}" class="form-control" id="product_weight" placeholder="Enter weight">
                            </div>
                            <div class="form-group">
                                <label for="short_description">Short Descriptions</label>
                                <textarea class="form-control" name="short_description">{{ !empty($product)? $product['short_description']:""}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Long Descriptions</label>
                                <textarea class="form-control" name="description">{{ !empty($product)? $product['description']:""}}</textarea>
                            </div>
                            




                            {{-- <div class="form-group">
                                <label for="product_image">Product Image</label>
                                <input type="file" name="product_image" class="form-control" id="product_image" >
                                
                                @if(!empty($product['product_image']))                                
                                    <a target="_blank" href="{{ url('front/images/products/'.$product['product_image'] )}}">View Image</a> |                                
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-product-image/'.$product['id'])}}" data-title='{{$product['product_image']}}'>Remove Image</a>                                
                                                            
                                @endif
                            </div>
                             --}}
                            
                            <div class="form-group">
                                <label for="is_featured">Features </label>
                                &nbsp;<input type="checkbox" name="is_featured" value="1"id="is_featured" {{ !empty($product)&& ($product['is_featured']==1)? "checked":""}}> Yes
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ !empty($product)? $product['meta_title']:""}}" class="form-control" id="meta_title" placeholder="Enter Meta Title">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ !empty($product)? $product['meta_description']:""}}" class="form-control" id="meta_description" placeholder="Enter Meta Descriptions">
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="{{ !empty($product)? $product['meta_keywords']:""}}" class="form-control" id="meta_keywords" placeholder="Enter Meta Keywords">
                            </div>
                            @if(empty($product))
                                <input type="hidden" name="type" value="add"  required>
                            
                            @else
                                <input type="hidden" name="type" value="edit"  required>
                            @endif

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