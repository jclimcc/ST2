<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Update Personal Details</h4>
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

                <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vendor Email address</label>
                        <input type="email" name='email' class="form-control" id="exampleInputEmail1" value="{{ $vendorDetails['email'] }}" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="vendor_name">Name</label>
                        <input type="text" name="vendor_name" class="form-control" id="vendor_name" value="{{ $vendorDetails['name'] }}" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_address">Address</label>
                        <input type="text" name="vendor_address" class="form-control" id="vendor_address" value="{{ $vendorDetails['address']  }}" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_city">City</label>
                        <input type="text" name="vendor_city" class="form-control" id="vendor_city" value="{{ $vendorDetails['city']  }}" placeholder="Enter City" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_state">State</label>
                        <input type="text" name="vendor_state" class="form-control" id="vendor_state" value="{{ $vendorDetails['state']  }}" placeholder="Enter State" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_country">Country</label>
                        <select  name="vendor_country" class="form-control">   
                            <option>Select Country</option>                                
                            @foreach($countries as $country)                               
                                <option value="{{$country['country_name']}}"  @if($vendorDetails['country']== $country['country_name']) selected @endif>{{$country['country_name']}}</option>                              
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vendor_postcode">Postcode</label>
                        <input type="text" name="vendor_postcode" class="form-control" id="vendor_postcode" value="{{ $vendorDetails['postcode']  }}" placeholder="Enter Postcode" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_mobile">Mobile</label>
                        <input type="text" name="vendor_mobile" class="form-control" id="vendor_mobile" value="{{ $vendorDetails['mobile']  }}" placeholder="Enter Mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="admin_image">Vendor Image</label>
                        <input type="file" name="admin_image" class="form-control" id="admin_image" >
                        
                        @if(!empty(Auth::guard('admin')->user()->image))                                
                            <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image )}}">View Image</a>                                
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>