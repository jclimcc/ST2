<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\ProductsFilter;
use App\Models\ProductsFiltersValue;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class FilterController extends Controller
{
    
    public function filters(){

       
        
        $filters= ProductsFilter::get()->toArray();
      
        $title="Filters List";
        Session::put('page','categories_management');
        Session::put('page-type','filters');
     //   dd($filters);
        return view('admin.filters.filters')->with(compact('filters','title'));
    }
    public function filtersValues(){       
        
        $filters= ProductsFiltersValue::with('productsFilters')->orderby('filter_id', 'asc')->get()->toArray();
      
        $title="Filters Value List";
        Session::put('page','categories_management');
        Session::put('page-type','filters');
     //   dd($filters);
        return view('admin.filters.filters_values')->with(compact('filters','title'));
    }


    public function updateFilterStatus(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();            
       
            $rules=[
                'status' => 'required|numeric',
                'filter_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            ProductsFilter::where('id',$data['filter_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'filter_id'=> $data['filter_id']]);
        }
        else
        return false;
    }
    public function updateFilterValuesStatus(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();            
       
            $rules=[
                'status' => 'required|numeric',
                'filter_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            ProductsFiltersValue::where('id',$data['filter_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'filter_id'=> $data['filter_id']]);
        }
        else
        return false;
    }

    public function addEditFilter(Request $request,$id =null){
        Session::put('page','categories_management');
        Session::put('page-type','filters');
        
        if($id=="")
        {
            
            $title="Add Filter";
            $filter= new ProductsFilter();
           
        }
        else
        {
            $title="Edit Filter";
            $filter= ProductsFilter::find($id);        
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'filter_name' => 'required',
                'filter_column' => 'required',
                'type' => 'required',
               
            ];
            
            $this->validate($request,$rules);
           
            $filter->cat_ids=implode(',' , $data['category_id'] ); 
            $filter->filter_name=$data['filter_name']; 
            $filter->filter_column=$data['filter_column']; 
           
            $filter->status=1; 
            $filter->save();
         
            DB::statement('Alter table products add '.$data['filter_column']. ' varchar(255) after description');
            if($data['type']=='add'){
                $message='Successfully Created New Filter-'.$data['filter_name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Filter to'.$data['filter_name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/filters')->with('success_message',$message); 
            else
                return redirect('admin/filters')->with('error_message',$message); 

        }
       
       $categories= Section::with('categories')->get()->toArray();
       //dd($categories);
        return view('admin.filters.add_edit_filter')->with(compact('filter','categories','title'));
    }
    
    public function addEditFiltersValues(Request $request,$id =null){
        Session::put('page','categories_management');
        Session::put('page-type','filters');
        
        if($id=="")
        {
            
            $title="Add Filters Values";
            $filter= new ProductsFiltersValue();
           
        }
        else
        {
            $title="Edit Filters Values";
            $filter= ProductsFiltersValue::find($id);        
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'filter_id' => 'required',
                'filter_value' => 'required',
                'type' => 'required',
               
            ];
            
            $this->validate($request,$rules);
        
            $filter->filter_id=$data['filter_id']; 
            $filter->filter_value=$data['filter_value']; 
           
            $filter->status=1; 
            $filter->save();
         
            // DB::statement('Alter table products add '.$data['filter_column']. ' varchar(255) after description');
            if($data['type']=='add'){
                $message='Successfully Created New Filter Values-'.$data['filter_value'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Filter Values to'.$data['filter_value'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/filters-values')->with('success_message',$message); 
            else
                return redirect('admin/filters-values')->with('error_message',$message); 

        }
       
       $filters= ProductsFilter::where('status',1)->get()->toArray();
       //dd($categories);
        return view('admin.filters.add_edit_filters_values')->with(compact('filter','filters','title'));
    }


    public function getProductFilterByCategory(Request $request){
        if($request->ajax())
        {
            $data=$request->all();  
          
            $rules=[
                'category_id' => 'required',
            ];
           
            $this->validate($request,$rules);    
            $category_id = $data['category_id'];

            
            // $productFilters=ProductsFilter::with('productFilters')
            // ->where('cat_ids','likes',"%".$data['category_id']."%")
            // ->where(['status'=>1])
            // ->get()->toArray();
            // dd($productFilters);


            // $flatten = $this->flatten($dataget);
          
            // foreach ($flatten as $key => $fl) {
            //     // eliminate categories from $flatten array
            //     if (!array_key_exists('id', $fl)) {
            //         unset($flatten[$key]);
            //     }
            // }
           
            // $getCategories = array_values($flatten);
            // $getCategories = array_unique($getCategories,SORT_REGULAR);
         
            return response()->json(['view'=>(String)View::make('admin.products.category_filter')->with(compact('category_id'))]);
           // return view('admin.products.category_filter')->with(compact('productFilters'));
        }
            
    }


}
