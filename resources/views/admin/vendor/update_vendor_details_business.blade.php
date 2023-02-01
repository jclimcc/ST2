<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Update Business Details</h4>
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
                @if(!empty($vendorBusinessDetails['shop_image']))
                  <img src="{{ url('front/images/vendors/normal/'.$vendorBusinessDetails['shop_image'])}}">
                @endif
                <form class="forms-sample" action="{{ url('admin/update-vendor-details/business')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vendor Email address</label>
                        <input type="email" name='email' class="form-control" id="exampleInputEmail1" value="{{ Auth::guard('admin')->user()->email }}" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="shop_name">Shop Name</label>
                        <input type="text" name="shop_name" class="form-control" id="shop_name" value="{{ $vendorBusinessDetails['shop_name'] }}" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_description">Shop Description</label>
                        <textarea name="shop_description" class="form-control" id="shop_description">{{ $vendorBusinessDetails['shop_description'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="shop_address">Shop Address</label>
                        <input type="text" name="shop_address" class="form-control" id="shop_address" value="{{ $vendorBusinessDetails['shop_address']  }}" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_city">City</label>
                        <input type="text" name="shop_city" class="form-control" id="shop_city" value="{{ $vendorBusinessDetails['shop_city']  }}" placeholder="Enter City" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_state">State</label>
                        <input type="text" name="shop_state" class="form-control" id="shop_state" value="{{ $vendorBusinessDetails['shop_state']  }}" placeholder="Enter State" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_country">Country</label>
                        <select  name="shop_country" class="form-control">   
                            <option>Select Country</option>                                
                            @foreach($countries as $country)                               
                                <option value="{{$country['country_name']}}"  @if($vendorBusinessDetails['shop_country']== $country['country_name']) selected @endif>{{$country['country_name']}}</option>                              
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shop_postcode">Postcode</label>
                        <input type="text" name="shop_postcode" class="form-control" id="shop_postcode" value="{{ $vendorBusinessDetails['shop_postcode']  }}" placeholder="Enter Postcode" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_mobile">Shop Contact</label>
                        <input type="text" name="shop_mobile" class="form-control" id="shop_mobile" value="{{ $vendorBusinessDetails['shop_mobile']  }}" placeholder="Enter Shop mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_email">Email</label>
                        <input type="text" name="shop_email" class="form-control" id="shop_email" value="{{ $vendorBusinessDetails['shop_email']  }}" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label for="shop_website">Website</label>
                        <input type="text" name="shop_website" class="form-control" id="shop_website" value="{{ $vendorBusinessDetails['shop_website']  }}" placeholder="Enter Website" required>
                    </div>
                    <div class="form-group">
                        <label for="address_proof_image">Shop Image (recommend size: 180x180px)</label>
                        <input type="file" name="shop_image" class="form-control" id="shop_image" >
                        
                        @if(!empty($vendorBusinessDetails['shop_image']))                                
                            <a target="_blank" href="{{ url('front/images/vendors/normal/'.$vendorBusinessDetails['shop_image'])}}">View Image</a>                                
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address_proof">Address Proof</label>
                        <input type="text" name="address_proof" class="form-control" id="address_proof" value="{{ $vendorBusinessDetails['address_proof']  }}" placeholder="Enter AddressProof" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="address_proof_image">Address Proof Image</label>
                        <input type="file" name="address_proof_image" class="form-control" id="address_proof_image" >
                        
                        @if(!empty($vendorBusinessDetails['address_proof_image']))                                
                            <a target="_blank" href="{{ url('admin/images/photos/address_proof_image/'.$vendorBusinessDetails['address_proof_image'])}}">View Image</a>                                
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="business_license_number">Business License Number</label>
                        <input type="text" name="business_license_number" class="form-control" id="business_license_number" value="{{ $vendorBusinessDetails['business_license_number']  }}" placeholder="Enter BLN" required>
                    </div>
                    <div class="form-group">
                        <label for="follow_tw">Follow Twitter </label>
                        <input type="text" name="follow_tw" class="form-control" id="follow_tw" value="{{ $vendorBusinessDetails['follow_tw']  }}"  >
                    </div>
                    <div class="form-group">
                        <label for="follow_fb">Follow FB page</label>
                        <input type="text" name="follow_fb" class="form-control" id="follow_fb" value="{{ $vendorBusinessDetails['follow_fb']  }}"  >
                    </div>
                    <div class="form-group">
                        <label for="follow_ig">Follow IG Page</label>
                        <input type="text" name="follow_ig" class="form-control" id="follow_ig" value="{{ $vendorBusinessDetails['follow_ig']  }}"  >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>