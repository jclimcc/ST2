@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$title}}</h3>
                        {{ Breadcrumbs::render('admins.careers.view',$title) }}
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <h5 class="card-title" style="margin-bottom: 0px;">Title: {{ $career['title']}}</h5>
                        <h4 class="card-title" style="margin-bottom: 0px;">Location: {{ $career['location']}} </h4>
                        <h4 class="card-title" style="margin-bottom: 0px;">Type Of Employeement: {{ $career['typeofemployee']}}</h4>
                        <h4 class="card-title" style="margin-bottom: 0px;">Start Date : {{ $career['start_date']}}  </h4>
                        <h4 class="card-title" style="margin-bottom: 0px;">End Date : {{ $career['end_date']}}  </h4>
                        <h4 class="card-title">Published : {{ $career['status']=='1'? 'Published':'Not Published'}}  </h4>
                        <h4 class="card-title">Description:  </h4>
                        <iframe width="100%" srcdoc='{{  html_entity_decode($career['description']) }}'></iframe>

                            
                            
                            
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