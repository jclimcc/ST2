@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Vendor Details</h3>
                        <h6 class="font-weight-normal mb-0"> Update Vendor Details</h6>
                    </div>                    
                </div>
            </div>
        </div>
        @if($slug=='personal')
            @include('admin.vendor.update_vendor_details_personal')       
        @elseif($slug=='business')
            @include('admin.vendor.update_vendor_details_business')
        @elseif($slug=='bank')
            @include('admin.vendor.update_vendor_details_bank')
        @endif
        
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
    
@endsection
