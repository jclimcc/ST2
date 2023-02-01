@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Coupon</h3>
                        {{ Breadcrumbs::render('admins.coupons.add-edit',$title) }}
                        <h6 class="font-weight-normal mb-0"> {{$title}} </h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
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
                       
                        <form class="forms-sample" @if(empty($coupon)) action="{{ url('admin/add-edit-coupon/')}}" @else action="{{ url('admin/add-edit-coupon/'.$coupon['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                
                            </div>
                           
                            <div class="form-group"  >
                                <label for="coupon_code">Coupon Code</label>
                                <input type="text" name="coupon_code" value="{{ !empty($coupon)? $coupon['coupon_code']:""}}"  class="form-control" id="coupon_code" placeholder="Enter Code">
                            </div>
                            <div class="form-group">
                                <label for="categories">Categories</label>
                                <?php 
                                   $selectedCategoryId = array_map('intval', explode(',', $coupon['categories']));

                                //    dd($explode_id);
                                   ?>
                                <select name="categories[]" class="form-select  js-example-basic-multiple"   data-placeholder="Choose anything" id="categories"  style="width: 100%" multiple>
                                   
                                    @foreach($categories as $section )
                                    @if($loop->first)
                                    <option value='0'  @if(!empty($coupon['categories'])) 
                                        @if(in_array('0',$selectedCategoryId)) 
                                        selected 
                                        @endif 
                                        @endif
                                    >All</option>
                                    @endif                                        
                                    <optgroup label="{{ $section['name']}}">

                                         @foreach($section['categories'] as $category)
                                       
                                            <option value='{{$category['id']}}' 
                                            @if(!empty($coupon['categories'])) 
                                                @if(in_array($category['id'],$selectedCategoryId)) 
                                                selected 
                                                @endif 
                                            @endif >&nbsp;&nbsp;&nbsp; --&nbsp;{{$category['category_name']}}</option>
                                            
                                                @foreach($category['sub_categories'] as $subcategory)
                                                <option  value='{{$subcategory['id']}}'  @if(!empty($coupon['categories']==$subcategory['id'])) selected @endif
                                                >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ----&nbsp;{{$subcategory['category_name']}}</option>
                                                

                                                @endforeach
                                        @endforeach 
                                    @endforeach
                                </optgroup>
                                </select>
                            </div>
                            <div class="form-check form-check-inline">
                                <label for="subtitle">Coupon Type for Claim:</label> &nbsp;&nbsp;
                                <input type="radio" name="coupon_type" value="Once" @if(!empty($coupon)) {{ ($coupon['coupon_type']=='Once')?'checked':""}} @endif class="form-check-input" id="Once_option"  required>
                                <label for="Once_option">Once</label>&nbsp;
                               
                                <input type="radio" name="coupon_type" value="Unlimited" @if(!empty($coupon)) {{ ($coupon['coupon_type']=='Unlimited')?'checked':""}} @endif  class="form-check-input" id="Unlimited_option"  required>
                                <label for="Unlimited_option">Unlimited</label>&nbsp;
                            </div>
                            <div class="form-check form-check-inline">
                                <label for="subtitle">Amount Type:</label> &nbsp;&nbsp;
                                <input type="radio" name="amount_type" value="Fixed" @if(!empty($coupon)) {{ ($coupon['amount_type']=='Fixed')?'checked':""}} @endif class="form-check-input" id="Fixed_option"  required>
                                <label for="Fixed_option">By Fixed  RM</label>&nbsp;
                               
                                <input type="radio" name="amount_type" value="Percentage" @if(!empty($coupon)) {{ ($coupon['amount_type']=='Percentage')?'checked':""}} @endif  class="form-check-input" id="Percentage_option"  required>
                                <label for="Percentage_option">By Percentage %</label>&nbsp;
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" value="{{ !empty($coupon)? $coupon['amount']:""}}"  class="form-control" id="amount" placeholder="Enter Amount">
                            </div>
                            <div class="form-group input-group " >
                                <input type="text" class="form-control date"  name="expiry_date" value="{{ date('Y-m-d', strtotime($coupon['expiry_date']) )?? date('Y-m-d')}}" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                           

                          
                            <div class="form-group">
                                <label for="cart_amount">Mininum Claim Amount</label>
                                <input type="text" name="cart_amount" value="{{ !empty($coupon)? $coupon['cart_amount']:""}}"  class="form-control" id="cart_amount" placeholder="Enter Amount">
                            </div>
                            

                            @if(empty($coupon))
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
<script src="{{ url('admin/js/custom-coupons.js') }}"></script>
@endsection