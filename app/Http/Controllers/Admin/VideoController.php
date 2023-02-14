<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Session;
class VideoController extends Controller
{
    public function index(){
        $getVideos=Video::all()->toArray();
        // var_dump($getCategories);      
          
        $title="Videos";
        Session::put('page','media_management');
        Session::put('page-type','videos');
        
        return view('admin.videos.index')->with(compact('getVideos','title'));
    }

    public function viewVideo(Request $request,$id =null){
        Session::put('page','media_management');
        Session::put('page-type','videos');     
      
        if($id=="")
        {
            
           return redirect('admin/video'); 
        
        }
        else
        {
            $title="List Video";
            
            $video=Video::find($id)->toArray();
            // $video;
           $title="Filter Video:  " .$video['title'].'';
            
            //dd($category['title']);
        }
       
       
        return view('admin.videos.view_video')->with(compact('video','title'));
    }
      
    public function addEditVideo(Request $request,$id =null){
        Session::put('page','media_management');
        Session::put('page-type','videos');     
      
        if($id=="")
        {
            
            $title="Add Video";
            $video= new Video();           
        }
        else
        {
            $title="Edit Video";
            $video= Video::find($id);          
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'title' => 'required',
               
            ];
            $this->validate($request,$rules);     
     
            $video->title= $data['title'];
            $video->video= $data['video'];
            $video->url= $data['url'];
            $video->status= $data['status']==0 ? 0:1;
            $video->save();
         
            if($data['type']=='add'){
                $message='Successfully Created New video'.$data['title'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update video to'.$data['title'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/videos')->with('success_message',$message); 
            else
                return redirect('admin/videos')->with('error_message',$message); 

        }
       
       
        return view('admin.videos.add_edit_video')->with(compact('video','title'));
    }
    public function deleteVideoStatus ($id){
        //SOFT DELETE
        $video=  Video::find($id);
        $video->delete();
        //dd('deleteBrandStatus');
        $success_message="Video has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }

    public function updateVideoStatus(Request $request)
   {
       if($request->ajax()){
           $data=$request->all();            
      
           $rules=[
               'status' => 'required|numeric',
               'video_id' => 'required|numeric',
           ];

           $this->validate($request,$rules);
           $status=($data['status']=='1')?0:1;              
              
           
           Video::where('id',$data['video_id'])
           ->update([
               'status'=> $status,
           ]);
           return response()->json(['status'=>$status,'video_id'=> $data['video_id']]);
       }
       else
       return false;
   }
}
