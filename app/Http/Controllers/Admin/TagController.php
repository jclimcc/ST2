<?php

namespace App\Http\Controllers\Admin;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Session;
use Image;
class TagController extends Controller
{
    
    public function index(){
        $getTags=Tag::with('posts')->get()->toArray();
        // var_dump($getCategories);      
          
        $title="Post Tag";
        Session::put('page','post_management');
        Session::put('page-type','posts-tags');
        
        return view('admin.posts.tags.index')->with(compact('getTags','title'));
    }

    public function viewPostTag(Request $request,$id =null){
        Session::put('page','post_management');
        Session::put('page-type','posts-tags');     
      
        if($id=="")
        {
            
           return redirect('admin/posts'); 
        
        }
        else
        {
            $title="List Tag";
            
            $tag=Tag::with('posts')->find($id)->toArray();
            // $tag;
           $title="Filter Tag:  " .$tag['tag'].'';
            
            //dd($category['title']);
        }
       
       
        return view('admin.posts.tags.view_post')->with(compact('tag','title'));
    }
      
    public function addEditTag(Request $request,$id =null){
        Session::put('page','post_management');
        Session::put('page-type','posts-tags');     
      
        if($id=="")
        {
            
            $title="Add Tag";
            $tag= new Tag();           
        }
        else
        {
            $title="Edit Tag";
            $tag= Tag::find($id);          
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'title' => 'required',
               
            ];
            $this->validate($request,$rules);     
     
            $tag->tag= $data['title'];
            $tag->save();
         
            if($data['type']=='add'){
                $message='Successfully Created New Category-'.$data['title'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Category to'.$data['title'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/posts-tags')->with('success_message',$message); 
            else
                return redirect('admin/posts-tags')->with('error_message',$message); 

        }
       
       
        return view('admin.posts.tags.add_edit_tag')->with(compact('tag','title'));
    }
    public function deleteTagStatus ($id){
        //SOFT DELETE
        $tag=  Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        //dd('deleteBrandStatus');
        $success_message="Tag has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }
}
