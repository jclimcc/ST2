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
                       
                        <form class="forms-sample" @if(empty($filter)) action="{{ url('admin/add-edit-filter/')}}" @else action="{{ url('admin/add-edit-filter/'.$filter['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <?php 
                                if(isset($filter))
                                 {
                                   $categoryValue= $filter['cat_ids'];
                                   $categoryArray=explode(',', $categoryValue);
                                //     print_r( $categoryArray);
                                //    echo array_search(1,$categoryArray,true);
                                   
                                 }    
                                else
                                    $categoryValue=null
                                ?>
                                <select name="category_id[]" class="form-control text-dark" style="height:250px" id="category_id" multiple>
                                    <option value=''>Select Category</option>
                                    @foreach($categories as $section )                                        
                                    <optgroup label="{{ $section['name']}}">

                                         @foreach($section['categories'] as $category)
                                            <option value='{{$category['id']}}' @if(!empty($filter['category_id']==$category['id'])) selected @endif >&nbsp;&nbsp;&nbsp; --&nbsp;{{$category['category_name']}}</option>
                                            
                                                @foreach($category['sub_categories'] as $subcategory)
                                                <option  value='{{$subcategory['id']}}'  @if(!empty($filter['category_id']==$subcategory['id'])) selected @endif
                                                >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ----&nbsp;{{$subcategory['category_name']}}</option>
                                                

                                                @endforeach
                                        @endforeach 
                                    @endforeach
                                </optgroup>
                                </select>
                                <h6 class="text-info">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</h6>
                            </div>
                            <div class="form-group">
                                <label for="filter_name">Filter Name</label>
                                <input type="text" name="filter_name" value="{{ !empty($filter)? $filter['filter_name']:""}}" class="form-control " id="filter_name" placeholder="Enter Filter" required>
                            </div>
                            <div class="form-group">
                                <label for="filter_column">Filter Column</label>
                                <input type="text" name="filter_column" value="{{ !empty($filter)? $filter['filter_column']:""}}" class="form-control " id="filter_column" placeholder="Enter Filter Column" required>
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