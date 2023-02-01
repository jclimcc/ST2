@extends('admin.layout.layout')
@section('content')
<style>
    .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}
    </style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Categories</h3>
                        {{ Breadcrumbs::render('admins.categories') }}
                        <h6 class="font-weight-normal mb-0"> Categories Details</h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category List</h4>
                       
                    
				        <ul class="tree"  id="tree1" >      
                            @foreach($sectionShow as $section)
                           <li>  <button>{{$section['name']}} </button>
                                @foreach($categoriesShow as $category)
                                @continue($section['id'] !=$category['section_id'])
                                  
                                    <ul>
                                    <li>        
                                        {{ $category->category_name }}
                                        @if(!empty($category->subCategories()))
                                            @include('admin.categories.manageCategoryChild',['childs' => $category->subCategories])
                                        @endif
                                    </li>
                                    </ul>
                                
                                   
                                @endforeach
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
                        <h3>Category List</h3>
				       
                    
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
<script src="{{ url('admin/js/custom-category.js') }}"></script>
@endsection