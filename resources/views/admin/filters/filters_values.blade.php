@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Filters Values</h3>
                             
                        {{ Breadcrumbs::render('admins.filters.values') }}
                        <h6 class="font-weight-normal mb-0"> Filters Values Details</h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Filters List</h4>
                       
                    
				        <ul class="tree"  id="tree1" >      
                            @foreach($filters as $filter)
                           <li>{{$filter['filter_value']}} </button>
                                
                            </li>
				            @endforeach
				        </ul>
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{$title}}</h4>
                        {{-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> --}}
                        <div class="justify-content-end d-flex" style="max-width:150px;float: right;display:inline">
                        <a href="{{ url('admin/add-edit-filters-values/')}}" class="btn btn-block btn-primary">Add Filter Values</a>
                        </div>
                        <div class="justify-content-end d-flex" style="max-width:150px;float: left;display:inline">
                        <a href="{{ url('admin/filters/')}}" class="btn btn-block btn-primary">View Filter</a>
                        </div>
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                        <h3>Filter Values List</h3>
				       
                    
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="filters-page">
                                <thead>
                                    <tr>
                                        <th>No</th> 
                                        <th>Filter ID</th>
                                        <th>Filter Name</th>
                                        <th>Filter Value</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filters as $filter)
                                    {{-- {{dd($filter)}} --}}
                                    <tr>
                                        <td>{{ $loop->index+1}}</td>
                                        <td>{{ $filter['id'] }}</td>
                                        <td>{{ $filter['products_filters']['filter_name']}}
                                          
                                          
                                        </td>
                                        <td>
                                            {{ $filter['filter_value'] }}
                                          
                                        
                                         </td>
                                        <td>
                                            @if( $filter['status']=='1')
                                            <a class="updateFiltersValuesStatus" id="filter-{{$filter['id']}}" filter_id="{{$filter['id']}}" href="javascript:void(0)">
                                            <i status="{{$filter['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateFiltersValuesStatus" id="filter-{{$filter['id']}}" filter_id="{{$filter['id']}}" href="javascript:void(0)">
                                            <i status="{{$filter['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-filters-values/'.$filter['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>

                                            <a href="javascript:void(0)"class="confirmDeleteFiltersValues" data-title="{{$filter['filter_value']}}" data-link="{{ url('admin/delete-filters-values/'.$filter['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                            
                                        </td>
                                    </tr>  
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
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