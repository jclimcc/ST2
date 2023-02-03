<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Session;
use Image;
class BusinessController extends Controller
{
    
    public function index(){
        $getBusiness=Business::orderBy('sequence','asc')->orderBy('id','asc')
        ->get()->toArray();
     
        $title="Business List";
        Session::put('page','business_management');
        Session::put('page-type','business');
        // dd($categories);
        return view('admin.businesses.index')->with(compact('getBusiness','title'));
    }
    public function updateBusinessStatus(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();            
       
            $rules=[
                'status' => 'required|numeric',
                'business_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Business::where('id',$data['business_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'business_id'=> $data['business_id']]);
        }
        else
        return false;
    }

    public function addEditBusiness(Request $request,$id =null){
        Session::put('page','business_management');
        Session::put('page-type','business');
        
        if($id=="")
        {
            
            $title="Add Business";
            $business= new Business();
           
        }
        else
        {
            $title="Edit Business";
            $business= Business::find($id);
        
            $business_iconDB= $business['icon'];
            $business_imageDB= $business['image'];
           
        }
        
       
        if($request->isMethod('POST')){
          
           $data=$request->all();
           $result='';
           $message='';
        //    $rules=[
        //         'title' => 'required',               
        //     ];
        //     $this->validate($request,$rules);
           
          
        //Upload business Image
        if($request->hasFile('business_icon')){
            $image_temp= $request->file('business_icon');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension= $image_temp->getClientOriginalExtension();
                //Generate  New image filename
                $imageName=date('ymd').rand(111,99999).'.'.$extension;
                $imagePath='front/business/icons/'.$imageName;
                //Upload the Image
                Image::make($image_temp)->save($imagePath);
                $image=$imageName;
               
                $business->icon= $image; 
      
            }
        }
        else{
            
            $business->icon=  $business_iconDB;
        }

            //Upload business Image
            if($request->hasFile('business_image')){
                $image_temp= $request->file('business_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='front/business/images/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);
                    $image=$imageName;
                   
                    $business->image= $image; 
          
                }
            }
            else{
                
                $business->image=  $business_imageDB;
            }
           
          
                
            
            $business->name= $data['name']; 
            $business->description= $data['description'];   
            $business->url= $data['url'];    
            $business->sequence= $data['sequence'];     
            
            $business->save();
           
            if($data['type']=='add'){
                $message='Successfully created New Business-'.$data['name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Business to'.$data['name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/business')->with('success_message',$message); 
            else
                return redirect('admin/business')->with('error_message',$message); 

        }
       
       
        return view('admin.businesses.add_edit_business')->with(compact('business','title'));
    }

}
