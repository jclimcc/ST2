<?php

namespace App\Http\Controllers\Admin;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Session;
use Image;
class CategoryController extends Controller
{
    // public function categories(){
    //     $categories= Category::with(['section','parentCategory'])->get()->toArray();
    //     $title="Category List";
    //     Session::put('page','categories_management');
    //     Session::put('page-type','categories');
    //     // dd($categories);
    //     return view('admin.sections.categories')->with(compact('categories','title'));
    // }
    
    public function categories(){


        $getCategories=Category::with('childrenRecursive')
        ->where(['parent_id'=>0,'section_id'=>5])
        ->get()->toArray();

        $flatten = $this->flatten($getCategories);
        
        foreach ($flatten as $key => $fl) {
            // eliminate categories from $flatten array
            if (!array_key_exists('id', $fl)) {
                unset($flatten[$key]);
            }
        }

        $getCategories = array_values($flatten);

      
        $categories= Category::with(['section','parentCategory'])->get()->toArray();
        $categoriesShow = Category::where('parent_id', '=', 0)->get();
        $sectionShow = Section::get()->toArray();
        $allCategories = Category::pluck('category_name','id')->all();
     
        $title="Category List";
        Session::put('page','categories_management');
        Session::put('page-type','categories');
        // dd($categories);
        return view('admin.categories.categories')->with(compact('categories','categoriesShow','sectionShow','allCategories','title'));
    }
    
    public function updateCategoryStatus (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'status' => 'required|numeric',
                'category_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Category::where('id',$data['category_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'category_id'=> $data['category_id']]);
        }
        else
        return false;
        
    }
    public function deleteCategoryStatus ($id){
        
            Category::where('id',$id)->delete();
            
            $success_message="Category has been deleted succesfully";
            return redirect()->back()->with('success_message',$success_message);
   
        
    }

    public function addEditCategory(Request $request,$id =null){
        Session::put('page','categories_management');
        Session::put('page-type','categories');
        $categoriesShow = Category::where('parent_id', '=', 0)->get();
        $sectionShow = Section::get()->toArray();
        $category_imageDB="";
        if($id=="")
        {
            
            $title="Add Category";
            $category= new Category();
            $getSections=Section::get();
            $getCategories=Category::get();

           
        }
        else
        {
            $title="Edit Category";
            $category= Category::with('parentCategory')->find($id);
            $category_imageDB= $category['category_image'];
            $getSections=Section::get();
            $getCategories=Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category->section_id])->get();
            $category_imageDB=  $category->category_image;
           // dd($getCategories);
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'category_name' => 'required',
                'category_discount' => 'numeric',
                'type' => 'required',
               
            ];
            $this->validate($request,$rules);
           

            //Upload Category Image
            if($request->hasFile('category_image')){
                $image_temp= $request->file('category_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='front/category_images/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);
                    $category_image=$imageName;
                    
                    $category->category_image= $category_image; 
          
                }
            }
            else{
                
                $category->category_image=  $category_imageDB;
            }
           
          
                
            $category->parent_id= $data['parent_id']; 
            $category->section_id= $data['section_id']; 
            $category->category_name= $data['category_name']; 
            $category->category_discount= $data['category_discount'];  
            $category->description= $data['description'];  
            $category->slug= $data['slug'];  
            $category->meta_title= $data['meta_title'];  
            $category->meta_description= $data['meta_description'];  
            $category->meta_keywords= $data['meta_keywords'];  
            $category->status=1; 
            $category->save();
         
            if($data['type']=='add'){
                $message='Successfully Created New Category-'.$data['category_name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Category to'.$data['category_name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/categories')->with('success_message',$message); 
            else
                return redirect('admin/categories')->with('error_message',$message); 

        }
       
       
        return view('admin.categories.add_edit_category')->with(compact('category','title','getSections','getCategories','categoriesShow','sectionShow'));
    }

    
    public function deleteCategoryImageStatus($id){
        //get Category image
        $categoryImage= Category::select('category_image')->where('id',$id)->first();
        //get Category path
        $category_image_path='front/category_images/';

        //delete Category image from Category_images folder if exists
        if(file_exists($category_image_path.$categoryImage->category_image)){
            unlink($category_image_path.$categoryImage->category_image);
        }

        //delete Category from Category table category_image
        Category::where('id',$id)->update(['category_image'=>'']);

        $success_message="Category Image has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);


    }
    public function flatten($array)
    {
            $flatArray = [];

            if (!is_array($array)) {
                $array = (array)$array;
            }

            foreach($array as $key => $value) {
                if (is_array($value) || is_object($value)) {
                    $flatArray = array_merge($flatArray, $this->flatten($value));
                } else {
                    $flatArray[0][$key] = $value;
                }
            }

            return $flatArray;
    }

    public function checkCategorySlug (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'textInput' => 'required',
            ];

            $this->validate($request,$rules);
            $textInput=$data['textInput'];              
            $slug= SlugService::CreateSlug(Category::class,'slug',$textInput);

            
           
            return response()->json(['slug'=>$slug ]);
        }
        else
        return false;
        
    }
    public function appendCategoriesLevel(Request $request){
        if($request->isMethod('GET'))
        {
            $data=$request->all();  
          
            $rules=[
                'section_id' => 'required',
                'category_id' => 'required',
            ];
           
            $this->validate($request,$rules);    
           
            $getCategories=Category::with('subcategories')
            ->where('id','!=',$data['category_id'])
            ->where(['parent_id'=>0,'section_id'=>$data['section_id']])
            ->get()->toArray();
            // $flatten = $this->flatten($dataget);
          
            // foreach ($flatten as $key => $fl) {
            //     // eliminate categories from $flatten array
            //     if (!array_key_exists('id', $fl)) {
            //         unset($flatten[$key]);
            //     }
            // }
           
            // $getCategories = array_values($flatten);
            // $getCategories = array_unique($getCategories,SORT_REGULAR);
         
            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }
            
    }

    public function changeSectionReappend (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'textInput' => 'required',
                'category_id' => 'required',
            ];

            $this->validate($request,$rules);
            $textInput=$data['textInput'];              
            $category_id=$data['category_id'];              
            $categoryList= Category::select('id','category_name')->where('id','!=',$category_id)->where(['section_id'=>$textInput, 'status'=>'1'])->get()->toArray();

            return response()->json(['categoryList'=>$categoryList ]);
        }
        else
        return false;
        
    }

}
