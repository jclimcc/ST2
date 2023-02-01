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
                        <h3 class="font-weight-bold">Category</h3>
                        {{ Breadcrumbs::render('admins.categories.add-edit',$title) }}
                        <h6 class="font-weight-normal mb-0"> {{$title}} </h6>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       
                        <ul class="tree"  id="tree1" >      
                            @foreach($sectionShow as $section)
                           <li>  <button>{{$section['name']}} </button>
                                @foreach($categoriesShow as $thisCategory)
                                @continue($section['id'] !=$thisCategory['section_id'])
                                  
                                    <ul>
                                    <li>        
                                        {{ $thisCategory->category_name }}
                                        @if(!empty($thisCategory->subCategories()))
                                            @include('admin.categories.manageCategoryChild',['childs' => $thisCategory->subCategories])
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
            <div class="col-md-9 grid-margin stretch-card">
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
                        <form class="forms-sample" @if(empty($category)) action="{{ url('admin/add-edit-category/')}}" @else action="{{ url('admin/add-edit-category/'.$category['id'])}}"  @endif  method="POST" enctype="multipart/form-data">
                            @csrf
                           
                            
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" name="category_name" value="{{ !empty($category)? $category['category_name']:""}}" class="form-control checkCategorySlug" id="category_name" placeholder="Enter New Category" required>
                            </div> 
                            <div class="form-group">
                                <label for="slug">URL Slug </label>
                                <input type="text" name="slug" value="{{ !empty($category)? $category['slug']:""}}" readonly class="form-control " id="slug" placeholder="Enter URL" readonly>
                            </div>
                            <div class="form-group">
                                <label for="section_id">Select Section</label>
                                <select name="section_id" class="form-control changeSection" id="section_id">
                                    <option value='0' {{ ($category['section_id']=='0') ? "selected": "" }}>Select selection</option>
                                    @foreach($getSections as $section)                                        
                                    <option value="{{$section['id']}}" {{ ($category['section_id']==$section['id']) ? "selected": "" }} >{{ $section['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {{-- <label for="parent_id">Select Category Level</label>
                                <select name="parent_id" class="form-control" id="parent_id">
                                    <option value="0">Main Category</option>
                                    @foreach($getCategories as $item)
                                    @if($category['id']==$item['id'])
                                       
                                    @endif                                        
                                    <option value="{{$item['id']}}" {{ ($category['parent_id']==$item['id']) ? "selected": "" }} >{{ $item['category_name']}}</option>
                                    @endforeach
                                </select> --}}
                                
                                @if(empty($category))
                                <div id="appendCategoriesLevel">
                                    @include('admin.categories.append_categories_level')
                                </div>
                                @else
                                <label for="parent_id">Select Category Level</label>
                                <select name="parent_id" class="form-control categorySelect" id="parent_id">
                                    @if(!empty($category['parentCategory']))
                                    <option value="{{$category['parent_id']}}" {{ ($category['parent_id']=='0') ? "selected": "" }} >{{$category['parentCategory']['category_name']}}</option>
                                    @else
                                    <option value="0" {{ ($category['parent_id']=='0') ? "selected": "" }}  readonly>Main Category</option>
                                  
                                    @endif
                                </select>
                                @endif
                               
                            </div>
                            <div class="form-group">
                                <label for="category_image">Category Image</label>
                                <input type="file" name="category_image" class="form-control" id="category_image" >
                                
                                @if(!empty($category['category_image']))                                
                                    <a target="_blank" href="{{ url('front/category_images/'.$category['category_image'] )}}">View Image</a> |                                
                                    <a href="javascript:void(0)"class='confirmDelete' data-link="{{url('admin/delete-category-image/'.$category['id'])}}" data-title='{{$category['category_image']}}'>Remove Image</a>                                
                                                            
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category_discount">Category Discount</label>
                                <input type="text" name="category_discount" value="{{ !empty($category)? $category['category_discount']:""}}" class="form-control" id="category_discount" placeholder="Enter Discount">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description">{{ !empty($category)? $category['description']:""}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" value="{{ !empty($category)? $category['meta_title']:""}}" class="form-control" id="meta_title" placeholder="Enter Meta Title">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" name="meta_description" value="{{ !empty($category)? $category['meta_description']:""}}" class="form-control" id="meta_description" placeholder="Enter Meta Descriptions">
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="{{ !empty($category)? $category['meta_keywords']:""}}" class="form-control" id="meta_keywords" placeholder="Enter Meta Keywords">
                            </div>
                            <input type="hidden" name="category_id" value="{{empty($category)?0:$category['id']}}"  required>
                            @if(empty($category))
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
<script src="{{ url('admin/js/custom-category.js') }}"></script>
@endsection