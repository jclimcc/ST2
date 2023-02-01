@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Categories</h3>
                        <h6 class="font-weight-normal mb-0"> Categories Details</h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> {{$title}}</h4>
                        {{-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> --}}
                        <div class="justify-content-end d-flex" style="max-width:150px;float: right;display:inline">
                        <a href="{{ url('admin/add-edit-category/')}}" class="btn btn-block btn-primary">Add Category</a>
                        </div>
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        
                      


                        @foreach ($categories as $category)
                        {{$category['category_name']}}
                        {{-- @while (!empty($category['parent_category'])) --}}
                        {{-- @endwhile --}}
                        <br>
                        @endforeach

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="categories-page">
                                <thead>
                                    <tr>
                                        <th>No</th> 
                                        <th>Category Name</th>
                                        <th>Parent Category</th>
                                        <th>Section</th>
                                        <th>URL</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)

                                    <tr>
                                        <td>{{ $loop->index+1}}</td>
                                        <td>{{ $category['category_name'] }}</td>
                                        <td>
                                            
                                            @if(!empty($category['parent_category']))
                                            {{   $category['parent_category']['id']."-".$category['parent_category']['category_name'] 
                                                }}
                                            @else
                                            Root
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($category['section']))
                                            {{ $category['section']['id']."-".$category['section']['name'] }}
                                            @endif
                                        
                                        </td>
                                        <td>
                                            {{ $category['slug'] }}
                                          
                                        
                                         </td>
                                        <td>
                                            @if( $category['status']=='1')
                                            <a class="updateCategoryStatus" id="category-{{$category['id']}}" category_id="{{$category['id']}}" href="javascript:void(0)">
                                            <i status="{{$category['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateCategoryStatus" id="category-{{$category['id']}}" category_id="{{$category['id']}}" href="javascript:void(0)">
                                            <i status="{{$category['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-category/'.$category['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>

                                            <a href="javascript:void(0)"class="confirmDelete" data-title="{{$category['category_name']}}" data-link="{{ url('admin/delete-category/'.$category['id']) }}"><i style="font-size:25px;" class="mdi mdi-close-circle"></i></a>
                                            
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
{{-- <script src="{{ url('admin/js/data-table.js') }}"></script> --}}
@endsection