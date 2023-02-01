<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Session;
use Image;

class BannerController extends Controller
{
  
     
    public function banners(){


        $getBanners=Banner::orderBy('sequence','asc')->orderBy('id','asc')
        ->get()->toArray();
     
        $title="Banner List";
        Session::put('page','media_management');
        Session::put('page-type','banners');
        // dd($categories);
        return view('admin.banners.banners')->with(compact('getBanners','title'));
    }

    public function updateBannerStatus(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();            
       
            $rules=[
                'status' => 'required|numeric',
                'banner_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Banner::where('id',$data['banner_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'banner_id'=> $data['banner_id']]);
        }
        else
        return false;
    }

    public function addEditBanner(Request $request,$id =null){
        Session::put('page','media_management');
        Session::put('page-type','banners');
        
        if($id=="")
        {
            
            $title="Add Banner";
            $banner= new Banner;
           
        }
        else
        {
            $title="Edit Banner";
            $banner= Banner::find($id);
        
            $banner_imageDB= $banner['image'];
           
        }
        
       
        if($request->isMethod('POST')){
          
           $data=$request->all();
           $result='';
           $message='';
        //    $rules=[
        //         'title' => 'required',               
        //     ];
        //     $this->validate($request,$rules);
           
          
            //Upload banner Image
            if($request->hasFile('banner_image')){
                $image_temp= $request->file('banner_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='front/banners/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);
                    $image=$imageName;
                   
                    $banner->image= $image; 
          
                }
            }
            else{
                
                $banner->image=  $banner_imageDB;
            }
           
          
                
            
            $banner->title= $data['title'];  
            $banner->sub_title= $data['sub_title'];  
            $banner->description= $data['description'];  
            $banner->alt= $data['alt'];  
            $banner->url= $data['url'];     
            $banner->button_label= $data['button_label'];     
            $banner->sequence= $data['sequence'];     
            $banner->status=1; 
            $banner->save();
           
            if($data['type']=='add'){
                $message='Successfully Created New Banner-'.$data['title'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Banner to'.$data['title'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/banners')->with('success_message',$message); 
            else
                return redirect('admin/banners')->with('error_message',$message); 

        }
       
       
        return view('admin.banners.add_edit_banners')->with(compact('banner','title'));
    }
    public function deleteBannerStatus ($id){
        
         Banner::where('id',$id)->delete();
        //dd('deleteBrandStatus');
        $success_message="Banner has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }
    public function deleteBannerImageStatus ($id){
        //get Banner image
        $bannerImage= Banner::select('image')->where('id',$id)->first();
        //get Banner path
        $banner_image_path='front/banners/';

        //delete banner image from banners folder if exists
        if(file_exists($banner_image_path.$bannerImage->image)){
            unlink($banner_image_path.$bannerImage->image);
        }

        //delete banner from banners table images
        Banner::where('id',$id)->update(['image'=>'']);

        $success_message="Banner Image has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }

    
}
