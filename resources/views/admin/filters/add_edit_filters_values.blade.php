@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-boFilters</h3>     
                        {{ Breadcrumbs::render('admins.filters.add-edit-filter',$title) }}
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
                       
                        <form class="forms-sample" @if(empty($filter)) action="{{ url('admin/add-edit-filters-values')}}" @else action="{{ url('admin/add-edit-filters-values/'.$filter['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="filter_id">Select Filter</label>
                              
                                <select name="filter_id" class="form-control text-dark"  id="filter_id">
                                    <option value=''>Select Filter</option>
                                    @foreach($filters as $f_filter )                                        
                                        <option  value='{{$f_filter['id']}}'  @if(!empty($f_filter['id']==$filter['filter_id'])) selected @endif
                                                >{{$f_filter['filter_name']}}</option>
                                                
                                    @endforeach
                                </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="filter_value">Filter Value</label>
                                <input type="text" name="filter_value" value="{{ !empty($filter)? $filter['filter_value']:""}}" class="form-control " id="filter_value" placeholder="Enter Filter Value" required>
                            </div>
                          
                           
                           
                           
                         
                            @if(empty($filter))
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
<script src="{{ url('admin/js/custom-filters.js') }}"></script>
@endsection