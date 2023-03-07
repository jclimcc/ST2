<?php

namespace App\Http\Controllers\Admin;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\SeoMetadata;
use App\Models\Tag;
use Illuminate\Http\Request;
use Session;
use Image;
use Illuminate\Support\Str;
use Auth;
use Cocur\Slugify\Slugify;

class PostController extends Controller
{
    public function index(){
        $getPosts=Post::orderBy('id','desc')->get()->toArray();
        
        $title="Posts";
        Session::put('page','post_management');
        Session::put('page-type','posts');
        // dd($categories);
        return view('admin.posts.index')->with(compact('getPosts','title'));
    }
   
    public function addEditPost(Request $request,$id =null){
        Session::put('page','post_management');
        Session::put('page-type','posts');
        $categories= Category::all();
        $tags = Tag::all();
        
        if($id=="")
        {
            
            $title="Add Posts";
            $post= new Post();
            $post_imageDB="";
           
        }
        else
        {
            $title="Edit Post";
            $post= Post::find($id);
        
            $post_iconDB= $post['icon'];
            $post_imageDB= $post['image'];
           
            //dd($post->categories());
        }
        
       
        if($request->isMethod('POST')){
          
           $data=$request->all();
           $result='';
           $message='';
    
            //Upload post Image
            if($request->hasFile('post_image')){
                $image_temp= $request->file('post_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='front/posts/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);
                    $image=$imageName;
                   
                    $post->image= $image; 
          
                }
            }
            else{
                
                $post->image=  $post_imageDB;
            }
           
          
         
    
            
            $post->user_id= Auth::guard('admin')->user()->id;  
            if($post->title != $data['title'] )
            {
                $post->title= $data['title'];  
            
                $translate=Str::ascii($data['title'],'zh');
                 // Remove all symbols
                $titleFilter = preg_replace('/[^a-zA-Z0-9]+/', ' ', $translate);            
                 
                $slug = SlugService::createSlug(Post::class, 'slug', $titleFilter);           
              
                $post->slug= $slug;
            }
            
            $post->excerpt= $data['excerpt'];    
            $post->body= htmlspecialchars($data['ckeditor-body'], ENT_QUOTES, 'UTF-8');     
            $post->featured= $data['featured']?:'0';     
            $post->is_published= $data['is_published']?:'0';     
           
            $post->save();
            if ($request->has('tags')) {
                $post->tags()->sync($request->tags);
            }
            if ($request->has('categories')) {
                $post->categories()->sync($request->categories);
            }

           if($post->seo_page()->count()>0)
           {
                $seo= $post->seo_page()->first();
               
                $seo->page_title= $data['seo_title'];
                $seo->meta_description= $data['meta_desc'];
                $seo->save();
            }
            else{
                $seo = new SeoMetadata();
                $seo->template_id= $post->id;
                $seo->page_type= 'post';
                $seo->page_title= $data['seo_title'];
                $seo->meta_description= $data['meta_desc'];
                $seo->meta_keywords= '';
                $seo->save();
            }

            
           
            if($data['type']=='add'){
                $message='Successfully created New Post-'.$data['title'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Post to'.$data['title'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/posts')->with('success_message',$message); 
            else
                return redirect('admin/posts')->with('error_message',$message); 

        }
       
       
        return view('admin.posts.add_edit_post')->with(compact('post','categories','tags','title'));
    }

    public function uploadImageSubject()
    {
        $this->validate(request() , [
            'upload' => 'required|mimes:jpeg,png,bmp',
        ]);
    
        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";
    
        $file = request()->file('upload');
        $filename = $file->getClientOriginalName();
    
        if(file_exists(public_path($imagePath) . $filename)) {
            $filename = Carbon::now()->timestamp . $filename;
        }
    
        $file->move(public_path($imagePath) , $filename);
        $url = $imagePath . $filename;
    
        return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";
    }

    public function deletePostStatus ($id){
        //SOFT DELETE
        $post=  Post::find($id);
        $post->delete();
        //dd('deleteBrandStatus');
        $success_message="Post has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }

}
