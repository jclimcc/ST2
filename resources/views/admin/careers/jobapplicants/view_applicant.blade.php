@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        {{ Breadcrumbs::render('admins.careers.jobapplicant.view',$title) }}
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <h5 class="card-title" >Job Applied: {{ $applicant['career']['title']}}</h5>
                        <h5 class="card-title" style="margin-bottom: 0px;">Name: {{ $applicant['name']}}</h5>
                        <h4 class="card-title" style="margin-bottom: 0px;">Email: {{ $applicant['email']}} </h4>
                        <h4 class="card-title" style="margin-bottom: 0px;">Phone: {{ $applicant['phone']}}</h4>
                        <h4 class="card-title" style="margin-bottom: 0px;">Resume: 
                            <a class="btn btn-primary btn-sm" target="_blank" href="{{ url('uploads/resume/'.$applicant['resume']) }}">
                                <i class="mdi mdi-account-card-details">
                                </i>
                                File
                             </a>
                             
                               </h4>
                        <h4 class="card-title">Message:  </h4>
                            <p class="card-text"> {{ $applicant['cover_letter']}} </p> 
                            <p class="card-text"><small class="text-muted">Received on {{date('Y-m-d H:i', strtotime( $applicant['created_at'])); }}</small></p>  
                           
                            
                            
                          

                          
                            <button class="btn btn-light" onclick="history.back()">Cancel</button>
                        
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
<script src="{{ url('admin/js/custom-banners.js') }}"></script>
@endsection