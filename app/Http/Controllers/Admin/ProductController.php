<?php

namespace App\Http\Controllers\Admin;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductsAttribute;
use App\Models\ProductsFilter;
use App\Models\Section;
use Illuminate\Http\Request;
use Session;
use Image;
use Auth;
class ProductController extends Controller
{
    //
    public function products(){
        $products= Product::with(['section'=>function($query){
            $query->select('id','name');
        },'category'=>function($query){
            $query->select('id','category_name');
        },'productImages']);
      
       
        $result= vendorBusinessBankStatusChecking();

        
        if($result['result']==false)
        {         
            //check vendor status when vendor is not verified 
            return redirect('admin/update-vendor-details/personal')->with('error_message',$result['message']);
        }
        else
        {
            if($result['type']=='vendor')
            {
                //filter only vendor
                $products=$products->where('vendor_id', $result['vendor_id']);
            }
            else
            {
               //admin
            }
                

        }

        $products=$products->get()->toArray();


        $title="Products List";
        Session::put('page','categories_management');
        Session::put('page-type','products');
         // dd($products);
        return view('admin.products.products')->with(compact('products','title'));
    
    }

    public function updateProductStatus (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'status' => 'required|numeric',
                'product_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Product::where('id',$data['product_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'product_id'=> $data['product_id']]);
        }
        else
        return false;
        
    }

    public function updateProductImageStatus (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'status' => 'required|numeric',
                'productImage_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            ProductImage::where('id',$data['productImage_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'productImage_id'=> $data['productImage_id']]);
        }
        else
        return false;
        
    }
    public function updateProductAttributeAvailable (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'available' => 'required|numeric',
                'productAttribute_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $available=($data['available']=='1')?0:1;              
               
            
            ProductsAttribute::where('id',$data['productAttribute_id'])
            ->update([
                'available'=> $available,
            ]);
            return response()->json(['available'=>$available,'productAttribute_id'=> $data['productAttribute_id']]);
        }
        else
        return false;
        
    }
    public function updateProductAttributeStatus (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'status' => 'required|numeric',
                'productAttribute_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            ProductsAttribute::where('id',$data['productAttribute_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'productAttribute_id'=> $data['productAttribute_id']]);
        }
        else
        return false;
        
    }


    public function updateProductImageSequence (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'sequence' => 'required|numeric',
                'productImage_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $sequence=$data['sequence'];              
               
            
            ProductImage::where('id',$data['productImage_id'])
            ->update([
                'sequence'=> $sequence,
            ]);
            return response()->json(['sequence'=>$sequence,'productImage_id'=> $data['productImage_id']]);
        }
        else
        return false;
        
    }

    public function updateProductAttributeSequence (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'sequence' => 'required|numeric',
                'productAttribute_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $sequence=$data['sequence'];              
               
            
            ProductsAttribute::where('id',$data['productAttribute_id'])
            ->update([
                'sequence'=> $sequence,
            ]);
            return response()->json(['sequence'=>$sequence,'productAttribute_id'=> $data['productAttribute_id']]);
        }
        else
        return false;
        
    }
    public function updateProductAttributePrice (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'price' => 'required|numeric',
                'productAttribute_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $price=$data['price'];              
               
            
            ProductsAttribute::where('id',$data['productAttribute_id'])
            ->update([
                'price'=> $price,
            ]);
            return response()->json(['price'=>$price,'productAttribute_id'=> $data['productAttribute_id']]);
        }
        else
        return false;
        
    }
    public function updateProductAttributeStock(Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'stock' => 'required|numeric',
                'productAttribute_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $stock=$data['stock'];              
               
            
            ProductsAttribute::where('id',$data['productAttribute_id'])
            ->update([
                'stock'=> $stock,
            ]);
            return response()->json(['stock'=>$stock,'productAttribute_id'=> $data['productAttribute_id']]);
        }
        else
        return false;
        
    }

    public function checkProductSlug (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'textInput' => 'required',
            ];

            $this->validate($request,$rules);
            $textInput=$data['textInput'];              
            $slug= SlugService::CreateSlug(Product::class,'slug',$textInput);

            
           
            return response()->json(['slug'=>$slug ]);
        }
        else
        return false;
        
    }

    public function deleteProductStatus ($id){
        
        Product::where('id',$id)->delete();
        
        $success_message="Product has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }

    public function deleteProductImage ($id){
        
         $productImage= ProductImage::find($id);
         //get productImage path
         $productImage_image_largePath='front/images/products/large/';
         $productImage_image_mediumPath='front/images/products/medium/';
         $productImage_image_smallPath='front/images/products/small/';

         //delete ProductImage from path folder if exists
         if(file_exists($productImage_image_largePath.$productImage->image)){
             unlink($productImage_image_largePath.$productImage->image);
         }
         if(file_exists($productImage_image_mediumPath.$productImage->image)){
            unlink($productImage_image_mediumPath.$productImage->image);
        }
        if(file_exists($productImage_image_smallPath.$productImage->image)){
            unlink($productImage_image_smallPath.$productImage->image);
        }
 
         ProductImage::where('id',$id)->delete();

        $success_message="Product Image has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }
    public function deleteProductAttribute ($id){
        
        ProductsAttribute::where('id',$id)->delete();
        
        $success_message="Product Attribute has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }
    public function addEditProduct(Request $request, $id=null){

        Session::put('page','categories_management');
        Session::put('page-type','products');
        $sections= Section::with('categories')->get()->toArray();
        $brands= Brand::get()->toArray();
       // $categories= Category::get();
        // dd($sections);
        if($id=="")
        {
            
            $title="Add Product";
            $product= new Product();
           
        }
        else
        {
            $title="Edit Product";
            $product= Product::find($id);
            $product_imageDB= $product['product_image'];
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
               'product_name' => 'required',
               'slug' => 'required',
               'category_id' => 'required',
                'brand_id' => 'required',
                'product_code' => 'required',
                'product_variation_type' => 'required',
                'product_price' => 'required|numeric',
                'product_discount' => 'required|numeric',
                'product_width' => 'required|numeric',
                'product_height' => 'required|numeric',
                'product_depth' => 'required|numeric',
                'product_weight' => 'required|numeric',
                'description' => 'required',
                'short_description' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required',
               
            ];
            $this->validate($request,$rules);
           
            //save Product Details to products object 
            $categoryDetails= Category::find($data['category_id']);
            $product->section_id= $categoryDetails->section_id;
            $product->product_name=trim($data['product_name']);
            $product->slug=$data['slug'];
            $product->category_id=$data['category_id'];
            $product->brand_id=$data['brand_id'];


            $productFilters= ProductsFilter::productFilters();
            foreach($productFilters as $filter){
                // $product->$filter['filter_column']= $data["".$filter['filter_column'].""];

                
            $filterAvailable=ProductsFilter::filterAvailable($filter['id'],$data['category_id']);
         
                if($filterAvailable==true)
                {
                    if(isset($filter['filter_column'])&&  $data[$filter['filter_column']])
                    $product->{$filter['filter_column']}= $data[$filter['filter_column']];
                }

            }


            $admin_type= Auth::guard('admin')->user()->type;
            $vendor_id= Auth::guard('admin')->user()->vendor_id;
            $admin_id= Auth::guard('admin')->user()->id;

            $product->admin_id=$admin_id;
            $product->admin_type=$admin_type;
            $product->vendor_id=$admin_type=='vendor'? $vendor_id: 0 ;
            
            $product->product_code=$data['product_code'];
            $product->product_variation_type=$data['product_variation_type'];
            $product->product_price=$data['product_price'];
            $product->product_discount=$data['product_discount'];
            $product->product_width=$data['product_width'];
            $product->product_height=$data['product_height'];
            $product->product_depth=$data['product_depth'];
            $product->product_weight=$data['product_weight'];
            $product->description=$data['description'];
            $product->short_description=$data['short_description'];
            $product->is_featured=(!empty($data['is_featured']))?1:0;
            $product->meta_title=$data['meta_title'];
            $product->meta_description=$data['meta_description'];
            $product->meta_keywords=$data['meta_keywords'];
            $product->status=1;
            $product->save();


            // //Upload Category Image
            // if($request->hasFile('category_image')){
            //     $image_temp= $request->file('category_image');
            //     if($image_temp->isValid()){
            //         //Get Image Extension
            //         $extension= $image_temp->getClientOriginalExtension();
            //         //Generate  New image filename
            //         $imageName=date('ymd').rand(111,99999).'.'.$extension;
            //         $imagePath='front/images/products/'.$imageName;
            //         //Upload the Image
            //         Image::make($image_temp)->save($imagePath);
            //         $category_image=$imageName;
                    
            //         $category->category_image= $category_image; 
          
            //     }
            // }
            // else{
                
            //     $category->category_image=  $category_imageDB;
            // }
           
          
                
          
         
            if($data['type']=='add'){
                $message='Successfully Created New Product-'.$data['product_name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Product to'.$data['product_name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/add-edit-product/'.$id)->with('success_message',$message); 
            else
                return redirect('admin/add-edit-products/'.$id)->with('error_message',$message); 

        }
       
       
        return view('admin.products.add_edit_products')->with(compact('product','title','sections','brands'));
   
    }

    public function addEditProductImages(Request $request, $id=null){

        Session::put('page','categories_management');
        Session::put('page-type','products');
        $productImage= ProductImage::where('product_id',$id)
        ->orderBy('sequence','ASC')
        ->orderBy('id','ASC')->get()->toArray();
        $product= Product::with(
            [
                'section'=>function($query){
                    $query->select('id','name');
                },
                'category'=>function($query){
                    $query->select('id','category_name');
                },
                'productImagesFirst','productAttribute'=>function($query){
                    $query->orderBy('sequence','ASC')
                    ->orderBy('id','ASC');
                },
            ]
        )->find($id)->toArray();
        $title=" >".$product['product_name']."-".$product['product_name'];
              
         //dd($productImage);
        if($request->isMethod('POST')){

           $data=$request->all();
           $result='';
           $message='';
           $rules=[
              
                'productImage_sequence' => 'required|numeric',
               
                'productImage_image' => 'required',
               
            ];
            $this->validate($request,$rules);
            $newProductImage= new ProductImage();
            //save Product image object 
            
              //Upload Product Image: Resize 250x250 medium:500x500 large:1000x1000
            if($request->hasFile('productImage_image')){
                $image_temp= $request->file('productImage_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imageLargePath='front/images/products/large/'.$imageName;
                    $imageMediumPath='front/images/products/medium/'.$imageName;      
                    $imageSmallPath='front/images/products/small/'.$imageName;
                    //Upload the productImagex 3 size
                    Image::make($image_temp)->resize(1100,1100)->save($imageLargePath);
                    Image::make($image_temp)->resize(300,300)->save($imageMediumPath);
                    Image::make($image_temp)->resize(60,60)->save($imageSmallPath);
                    
                    $newProductImage->image=$imageName;
          
                }
            }
           
            $newProductImage->type=$data['productImage_type'];
            $newProductImage->sequence=$data['productImage_sequence'];
            $newProductImage->product_id=$id;
            $newProductImage->status=1;
            $newProductImage->save();
                
          
         
            $message='Successfully Created New Product Image on'.$product['product_name'];
           
             return redirect('admin/add-edit-product-images/'.$id)->with('success_message',$message); 
           

        }
       
       
        return view('admin.products.add_edit_product_images')->with(compact('productImage','title','product'));
   
    }


    public function addEditProductAttributes(Request $request, $id=null){

        Session::put('page','categories_management');
        Session::put('page-type','products');
        $productAttributes= ProductsAttribute::where('product_id',$id)
        ->orderBy('sequence','ASC')
        ->orderBy('id','ASC')->get()->toArray();

        $product= Product::with(
            [
                'section'=>function($query){
                    $query->select('id','name');
                },
                'category'=>function($query){
                    $query->select('id','category_name');
                },
                'productImagesFirst','productAttribute'=>function($query){
                    $query->orderBy('sequence','ASC')
                    ->orderBy('id','ASC');
                },
            ]
        )->find($id)->toArray();
        $title=" >".$product['product_name']."-".$product['product_name'];
              
        //dd($product);
        if($request->isMethod('POST')){

           $data=$request->all();

           //dd($data);
           $result='';
           $message='';
          
            
            foreach($data['sku'] as $key=> $value){
                
                if(!empty($value)){

                    //SKU duplicate check
                    $skuCount=ProductsAttribute::where(['sku'=>$data['sku'][$key], 'product_id'=>$id])->count();
                    if($skuCount>0){
                            
                        $message='Error Duplicated SKU :'.$data['sku'][$key];
           
                        return redirect()->back()->with('error_message',$data['sku'][$key]); 
           
                    }
                    //variation duplicate check
                    $variationCount=ProductsAttribute::where(['variation'=>$data['variation'][$key], 'product_id'=>$id])->count();
                    if($variationCount>0){
                            
                        $message='Error Duplicated Variation :'.$data['variation'][$key];
           
                        return redirect()->back()->with('error_message',$data['variation'][$key]); 
           
                    }

                    $attribute=new ProductsAttribute;
                    $attribute->product_id = $id;
                    $attribute->variation= $data['variation'][$key];
                    $attribute->sku= $data['sku'][$key];
                    $attribute->price= $data['price'][$key];
                    $attribute->stock= $data['stock'][$key];
                    $attribute->sequence= $data['sequence'][$key];
                    $attribute->available=1;
                    $attribute->status=1;
                    $attribute->save();
                }
            }
                        
            $message='Successfully Create Product Attribute on'.$product['product_name'];
           
            return redirect()->back()->with('success_message',$message); 
           

        }
       
       
        return view('admin.products.attributes.add_edit_product_attributes')->with(compact('productAttributes','title','product'));
   
    }

}   
