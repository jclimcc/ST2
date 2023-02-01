<?php

namespace App\Http\Controllers\Admin;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use Image;

class BrandController extends Controller
{
    public function brands(){

       
        
        $brands= Brand::get()->toArray();
      
        $title="Brands List";
        Session::put('page','categories_management');
        Session::put('page-type','brands');
        // dd($categories);
        return view('admin.brands.brands')->with(compact('brands','title'));
    }

    public function updateBrandStatus(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();            
       
            $rules=[
                'status' => 'required|numeric',
                'brand_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Brand::where('id',$data['brand_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'brand_id'=> $data['brand_id']]);
        }
        else
        return false;
    }

    public function addEditBrand(Request $request,$id =null){
        Session::put('page','categories_management');
        Session::put('page-type','brands');
        
        if($id=="")
        {
            
            $title="Add Brand";
            $brand= new Brand();
           
        }
        else
        {
            $title="Edit Brand";
            $brand= Brand::find($id);
        
            $brand_imageDB= $brand['brand_image'];
           
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'brand_name' => 'required',
                'brand_discount' => 'numeric',
                'type' => 'required',
               
            ];
            $this->validate($request,$rules);
           
           
            //Upload brand Image
            if($request->hasFile('brand_image')){
                $image_temp= $request->file('brand_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='front/brand_images/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);
                    $brand_image=$imageName;
                   
                    $brand->brand_image= $brand_image; 
          
                }
            }
            else{
                
                $brand->brand_image=  $brand_imageDB;
            }
           
          
                
            
            $brand->brand_name= $data['brand_name'];  
            $brand->brand_discount= $data['brand_discount'];  
            $brand->description= $data['description'];  
            $brand->slug= $data['slug'];  
            $brand->meta_title= $data['meta_title'];  
            $brand->meta_description= $data['meta_description'];  
            $brand->meta_keywords= $data['meta_keywords'];  
            $brand->status=1; 
            $brand->save();
         
            if($data['type']=='add'){
                $message='Successfully Created New Brand-'.$data['brand_name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Brand to'.$data['brand_name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/brands')->with('success_message',$message); 
            else
                return redirect('admin/brands')->with('error_message',$message); 

        }
       
       
        return view('admin.brands.add_edit_brand')->with(compact('brand','title'));
    }
    public function deleteBrandStatus ($id){
        
       // Brand::where('id',$id)->delete();
        dd('deleteBrandStatus');
        $success_message="Brand has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }
    public function deleteBrandImageStatus ($id){
        //get Brands image
        $brandImage= Brand::select('brand_image')->where('id',$id)->first();
        //get Brands path
        $brand_image_path='front/brand_images/';

        //delete brand image from brand_images folder if exists
        if(file_exists($brand_image_path.$brandImage->brand_image)){
            unlink($brand_image_path.$brandImage->brand_image);
        }

        //delete brands from brands table brand_image
        Brand::where('id',$id)->update(['brand_image'=>'']);

        $success_message="Brand Image has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }

    public function checkBrandSlug (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'textInput' => 'required',
            ];

            $this->validate($request,$rules);
            $textInput=$data['textInput'];              
            $slug= SlugService::CreateSlug(Brand::class,'slug',$textInput);

            
           
            return response()->json(['slug'=>$slug ]);
        }
        else
        return false;
        
    }
}
