@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{$pageTemplateSection->name}}</h3>
                        
                        {{ Breadcrumbs::render('admins.pages.main',$pageTemplateSection->name,$pageTemplateSection->id) }}
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="justify-content-end d-flex" style="max-width:150px;float: right;display:inline">
                        <a href="{{ url('admin/add-edit-pagetemplate_section/'.$pageTemplateSection->id)}}" class="btn btn-block btn-primary">Add Section</a>
                        </div>
                        @if( Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>Success :</strong> {{ Session::get('success_message')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        <h3>Pages Section</h3>
				       
                    
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="template-page">
                                <thead>
                                    <tr>
                                        <th>Sequence</th>                                        
                                        <th>Name</th>    
                                        <th>Section Attribute</th>
                                        <th>Status</th>
                                        <th>Edit Content </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($pageTemplateSection->sections->sortBy('sequence') as $content)
                                    <tr>
                                        <td>{{ $content['sequence'] }}</td>
                                        <td>{{ $content['name'] }}</td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-pagetemplate_section/'.$pageTemplateSection->id.'/'.$content['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>                                       
                                        </td>
                                        <td>

                                            @if( $content['status']=='1')
                                            <a class="updateSectionStatus" id="section-{{$content['id']}}" section_id="{{$content['id']}}" href="javascript:void(0)">
                                            <i status="{{$content['status']}}" style="font-size:25px;color:green" class="mdi mdi-bookmark-check"></i>
                                            </a>
                                            @else
                                            <a class="updateSectionStatus" id="section-{{$content['id']}}" section_id="{{$content['id']}}" href="javascript:void(0)">
                                            <i status="{{$content['status']}}"  style="font-size:25px;color:red"  class="mdi mdi-bookmark-outline"></i>
                                            </a>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-edit-pagetemplatesection_block/'.$pageTemplateSection->id.'/'.$content['id']) }}"><i style="font-size:25px;" class="mdi mdi-lead-pencil"></i></a>
   
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
<script src="{{ url('admin/js/custom-pages.js') }}"></script>
@endsection