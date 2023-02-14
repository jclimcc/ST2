<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PopupBanner;
use Illuminate\Http\Request;
use Session;
use Image;
class PopupBannerController extends Controller
{
    public function index(){
        $getBanners=PopupBanner::orderBy('sequence','asc')->orderBy('id','asc')
        ->get()->toArray();
        
        $title="Popup Banner";
        Session::put('page','media_management');
        Session::put('page-type','popup-banner');
        // dd($categories);
        return view('admin.popup-banners.index')->with(compact('getBanners','title'));
    }
    public function addEditPopupBanner(Request $request,$id =null){
        Session::put('page','media_management');
        Session::put('page-type','popup-banner');
        
        if($id=="")
        {
            
            $title="Add Banner";
            $banner= new PopupBanner();
           
        }
        else
        {
            $title="Edit Banner";
            $banner= PopupBanner::find($id);
        
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
                    $imagePath='front/popup/'.$imageName;
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
            $banner->url= $data['url'];       
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
                return redirect('admin/popup-banners')->with('success_message',$message); 
            else
                return redirect('admin/popup-banners')->with('error_message',$message); 

        }
       
       
        return view('admin.popup-banners.add_edit_popup_banner')->with(compact('banner','title'));
    }

    public function deletePopupBannerImageStatus ($id){
        //get Banner image
        $bannerImage= PopupBanner::select('image')->where('id',$id)->first();
        //get Banner path
        $banner_image_path='front/popup/';

        //delete banner image from banners folder if exists
        if(file_exists($banner_image_path.$bannerImage->image)){
            unlink($banner_image_path.$bannerImage->image);
        }

        //delete banner from banners table images
        PopupBanner::where('id',$id)->update(['image'=>'']);

        $success_message="Banner Image has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }

    public function deletePopupBannerStatus ($id){
        
        //dd('deleteBrandStatus');
        //get Banner path
        $bannerImage= PopupBanner::find($id);
        
        $banner_image_path='front/popup/';
        
        PopupBanner::where('id',$id)->delete();
       //delete banner image from banners folder if exists
       if(file_exists($banner_image_path.$bannerImage->image)){
           unlink($banner_image_path.$bannerImage->image);
       }

       $success_message="Banner has been deleted succesfully";
       return redirect()->back()->with('success_message',$success_message);

   
   }

   public function updatePopupBannerStatus(Request $request)
   {
       if($request->ajax()){
           $data=$request->all();            
      
           $rules=[
               'status' => 'required|numeric',
               'banner_id' => 'required|numeric',
           ];

           $this->validate($request,$rules);
           $status=($data['status']=='1')?0:1;              
              
           
           PopupBanner::where('id',$data['banner_id'])
           ->update([
               'status'=> $status,
           ]);
           return response()->json(['status'=>$status,'banner_id'=> $data['banner_id']]);
       }
       else
       return false;
   }

}
