<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Update Bank Details</h4>
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

                <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank')}}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vendor Email address</label>
                        <input type="email" name='email' class="form-control" id="exampleInputEmail1" value="{{ Auth::guard('admin')->user()->email }}" placeholder="Email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="bank_name">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" id="bank_name" value="{{ $vendorBankDetails['bank_name']  }}" placeholder="Enter Bank Name" required>
                    </div>
                    <div class="form-group">
                        <label for="account_holder_name">Account Holder Name</label>
                        <input type="text" name="account_holder_name" class="form-control" id="account_holder_name" value="{{ $vendorBankDetails['account_holder_name']  }}" placeholder="Enter Account Holder Name" required>
                    </div>
                    <div class="form-group">
                        <label for="bank_acc_no">Bank Account No</label>
                        <input type="text" name="bank_acc_no" class="form-control" id="bank_acc_no" value="{{ $vendorBankDetails['bank_acc_no']  }}" placeholder="Enter Bank Account Number" required>
                    </div>
                    

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>