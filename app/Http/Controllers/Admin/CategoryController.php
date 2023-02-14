<?php

namespace App\Http\Controllers\Admin;


use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Session;
class CategoryController extends Controller
{
    
    public function index(){
        $getCategories=Category::with('posts')->get()->toArray();
        // var_dump($getCategories);      
          
        $title="Post Category";
        Session::put('page','post_management');
        Session::put('page-type','posts-categories');
        
        return view('admin.posts.categories.index')->with(compact('getCategories','title'));
    }

    public function viewPostCategory(Request $request,$id =null){
        Session::put('page','post_management');
        Session::put('page-type','posts-categories');     
      
        if($id=="")
        {
            
           return redirect('admin/posts'); 
        
        }
        else
        {
            $title="List Category";
            
            $category=Category::with('posts')->find($id)->toArray();
            // $category;
           $title="Filter Category:  " .$category['title'].'';
            
            //dd($category['title']);
        }
       
       
        return view('admin.posts.categories.view_post')->with(compact('category','title'));
    }
      
    public function addEditCategory(Request $request,$id =null){
        Session::put('page','post_management');
        Session::put('page-type','posts-categories');     
      
        if($id=="")
        {
            
            $title="Add Category";
            $category= new Category();           
        }
        else
        {
            $title="Edit Category";
            $category= Category::find($id);          
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'title' => 'required',
               
            ];
            $this->validate($request,$rules);     
            
            $words= SlugService::createSlug(Category::class, 'slug', $data['title']);
            $category->title= $words;
            $category->slug= $words;
            $category->save();
         
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
                return redirect('admin/posts-categories')->with('success_message',$message); 
            else
                return redirect('admin/posts-categories')->with('error_message',$message); 

        }
       
       
        return view('admin.posts.categories.add_edit_category')->with(compact('category','title'));
    }

}
