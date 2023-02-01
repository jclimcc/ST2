@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0"> 
                        <h3 class="font-weight-bold">Vendor Details</h3>     
                                     
                        {{ Breadcrumbs::render('admins.vendorDetail', $vendorDetails) }}
                        <h6 class="font-weight-normal mb-0"> Update Vendor Details</h6>
                    </div>                    
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Personal Details</h4>
                      
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vendor Email address</label>
                                <input type="email" name='email' class="form-control" id="exampleInputEmail1" value="{{ $vendorDetails['email'] }}" placeholder="Email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_name">Name</label>
                                <input type="text" name="vendor_name" class="form-control" id="vendor_name" value="{{ $vendorDetails['vendor_personal']['name'] }}" placeholder="Enter name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_address">Address</label>
                                <input type="text" name="vendor_address" class="form-control" id="vendor_address" value="{{ $vendorDetails['vendor_personal']['address']  }}" placeholder="Enter Address" readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_city">City</label>
                                <input type="text" name="vendor_city" class="form-control" id="vendor_city" value="{{ $vendorDetails['vendor_personal']['city']  }}" placeholder="Enter City" readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_state">State</label>
                                <input type="text" name="vendor_state" class="form-control" id="vendor_state" value="{{ $vendorDetails['vendor_personal']['state']  }}" placeholder="Enter State" readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_country">Country</label>
                                <input type="text" name="vendor_country" class="form-control" id="vendor_country" value="{{ $vendorDetails['vendor_personal']['country']  }}" placeholder="Enter Country" readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_postcode">Postcode</label>
                                <input type="text" name="vendor_postcode" class="form-control" id="vendor_postcode" value="{{ $vendorDetails['vendor_personal']['postcode']  }}" placeholder="Enter Postcode" readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_mobile">Mobile</label>
                                <input type="text" name="vendor_mobile" class="form-control" id="vendor_mobile" value="{{ $vendorDetails['vendor_personal']['mobile']  }}" placeholder="Enter Mobile" readonly>
                            </div>
                            @if(!empty($vendorDetails['image'] ))  
                            <div class="form-group">
                                <label for="admin_image">Vendor Image</label>
                                <br>   
                                                             
                                    <a target="_blank" href="{{ url('admin/images/photos/'.$vendorDetails['image'] )}}">View Image</a>                                
                               
                            </div> 
                            @endif
                           
                           
                       
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Business Details</h4>
                      
                            <div class="form-group">
                                <label for="shop_name">Shop Name</label>
                                <input type="text" name="shop_name" class="form-control" id="shop_name" value="{{ $vendorDetails['vendor_business']['shop_name'] }}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="shop_description">Shop Description</label>
                                <textarea name="shop_description" class="form-control" id="shop_description" readonly>
                                {{ $vendorDetails['vendor_business']['shop_description'] }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="shop_address">Shop Address</label>
                                <input type="text" name="shop_address" class="form-control" id="shop_address" value="{{ $vendorDetails['vendor_business']['shop_address']  }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="shop_city">Shop City</label>
                                <input type="text" name="shop_city" class="form-control" id="shop_city" value="{{ $vendorDetails['vendor_business']['shop_city']  }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="shop_state">Shop State</label>
                                <input type="text" name="shop_state" class="form-control" id="shop_state" value="{{ $vendorDetails['vendor_business']['shop_state']  }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="shop_country">Shop Country</label>
                                <input type="text" name="shop_country" class="form-control" id="vendor_country" value="{{ $vendorDetails['vendor_business']['shop_country']  }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="shop_postcode">Shop Postcode</label>
                                <input type="text" name="shop_postcode" class="form-control" id="shop_postcode" value="{{ $vendorDetails['vendor_business']['shop_postcode']  }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="shop_mobile">Shop Mobile</label>
                                <input type="text" name="shop_mobile" class="form-control" id="shop_mobile" value="{{ $vendorDetails['vendor_business']['shop_mobile']  }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="address_proof">Shop Address Proof</label>
                                <input type="text" name="address_proof" class="form-control" id="address_proof" value="{{ $vendorDetails['vendor_business']['address_proof']  }}"  readonly>
                            </div>

                            @if(!empty($vendorDetails['vendor_business']['address_proof_image']))  
                            <div class="form-group">
                                <label for="admin_image">Address Proof Image</label>
                                <br>                               
                                                             
                                    <a target="_blank" href="{{ url('admin/images/photos/address_proof_image/'.$vendorDetails['vendor_business']['address_proof_image'] )}}">View Image</a>                                
                               
                            </div> 
                            @endif

                            <div class="form-group">
                                <label for="address_proof">Shop Mobile</label>
                                <input type="text" name="address_proof" class="form-control" id="address_proof" value="{{ $vendorDetails['vendor_business']['address_proof_image']  }}"  readonly>
                            </div>

                            <div class="form-group">
                                <label for="business_license_number">Business License Number</label>
                                <input type="text" name="business_license_number" class="form-control" id="business_license_number" value="{{ $vendorDetails['vendor_business']['business_license_number']  }}"  readonly>
                            </div>
                            <div class="form-group">
                                <label for="follow_tw">Follow Twitter </label>
                                <input type="text" name="follow_tw" class="form-control" id="follow_tw" value="{{ $vendorDetails['vendor_business']['follow_tw']  }}" readonly >
                            </div>
                            <div class="form-group">
                                <label for="follow_fb">Follow FB page</label>
                                <input type="text" name="follow_fb" class="form-control" id="follow_fb" value="{{ $vendorDetails['vendor_business']['follow_fb']  }}" readonly >
                            </div>
                            <div class="form-group">
                                <label for="follow_ig">Follow IG Page</label>
                                <input type="text" name="follow_ig" class="form-control" id="follow_ig" value="{{ $vendorDetails['vendor_business']['follow_ig']  }}" readonly >
                            </div>
                           
                          
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Bank Details</h4>
                      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Account Holder Name</label>
                            <input type="text"  class="form-control" id="exampleInputEmail1" value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="vendor_bankname">Bank Name</label>
                            <input type="text" name="vendor_bankname" class="form-control" id="vendor_bankname" value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" name="account_name" class="form-control" id="vendor_bankname" value="{{ $vendorDetails['vendor_bank']['account_name'] }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="bank_acc_no">Bank Account Number</label>
                            <input type="text" name="bank_acc_no" class="form-control" id="vendor_bankname" value="{{ $vendorDetails['vendor_bank']['bank_acc_no'] }}" readonly>
                        </div>
                        <button onclick="history.back()" class="btn btn-primary mr-2">Back</button>
                       
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
