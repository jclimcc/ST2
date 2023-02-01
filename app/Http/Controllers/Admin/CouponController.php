<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Auth;
use Session;
class CouponController extends Controller
{
    public function coupon(){

        $getCoupons=Coupon::orderBy('id','asc');
        if(Auth::guard('admin')->user()->type=='admin')
        {
            $getCoupons=  $getCoupons->get()->toArray();
        }
        else
        {
            $vendor_id= Auth::guard('admin')->user()->id;
            $getCoupons=  $getCoupons->where('vendor_id',$vendor_id)
            ->get()
            ->toArray();
        }
     
     
        $title="Coupon List";
        Session::put('page','coupons_management');
        Session::put('page-type','coupons');
        
        return view('admin.coupons.coupons')->with(compact('getCoupons','title'));
    }


    public function updateCouponStatus(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();            
       
            $rules=[
                'status' => 'required|numeric',
                'coupon_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Coupon::where('id',$data['coupon_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'coupon_id'=> $data['coupon_id']]);
        }
        else
        return false;
    }

    public function addEditCoupon(Request $request,$id =null){
        Session::put('page','coupons_management');
        Session::put('page-type','coupons');
        
       $categories= Section::with('categories');
       if(Auth::guard('admin')->user()->type=='admin')
       {
           $categories=  $categories->get()->toArray();
       }
       else
       {
            //get All category ID,  Product group by vendor id only
            $vendor_id= Auth::guard('admin')->user()->id;
            $categoryfilter= Product::select('category_id')
                        ->where('vendor_id',$vendor_id)
                        ->groupby('category_id')
                        ->get()
                        ->toArray();

                    
           $categories=  $categories->whereIn('id',$categoryfilter)
           ->get()
           ->toArray();
            //    dd($categories);
       }


        if($id=="")
        {
            
            $title="Add Coupon";
            $coupon= new Coupon;
           $coupon->vendor_id=$vendor_id;
           
        }
        else
        {
            $title="Edit Coupon";
            $coupon= Coupon::find($id);
            $vendor_id= $coupon->vendor_id;


          
           
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
          
           $result='';
           $message='';
           $rules=[
                'coupon_code' => 'required',               
                'coupon_type' => 'required',               
                'categories' => 'required',               
                'amount_type' => 'required',               
                'amount' => 'required|numeric|between:1,9999',               
                'expiry_date' => 'required',               
                'cart_amount' => 'required|numeric|between:1,9999',               
            ];
           
            $this->validate($request,$rules);
            //Check Coupon Code from same vendor it's exist
            if($coupon->coupon_code != $data['coupon_code'])
            {
                $checkexisit= Coupon::where(['coupon_code'=>$data['coupon_code'], 'vendor_id'=>$vendor_id])->get()->count();
         
                if($checkexisit>0 )
                {
                    $message= 'This coupon code '.$data['coupon_code'].' already exist, please using new Coupon Code';
                    return redirect()->back()->with('error_message',$message);  
                }
            }
            // dd($data['expiry_date']);
        
            $coupon->coupon_code= $data['coupon_code'];  
            $coupon->categories= implode(",",$data['categories']);  
            $coupon->coupon_type= $data['coupon_type'];  
            $coupon->amount_type= $data['amount_type'];  
            $coupon->amount= $data['amount'];     
            $coupon->expiry_date=date('Y-m-d', strtotime($data['expiry_date']));     
            $coupon->cart_amount= $data['cart_amount'];     
            $coupon->status= 1;     
            $coupon->save();
         
            if($data['type']=='add'){
                $message='Successfully Created New Coupon-'.$data['coupon_code'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Coupon to '.$data['coupon_code'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/coupons')->with('success_message',$message); 
            else
                return redirect('admin/coupons')->with('error_message',$message); 

        }
       
       
        return view('admin.coupons.add_edit_coupons')->with(compact('coupon','title','categories'));
    }
    public function deleteCouponStatus ($id){
        //SOFT DELETE
        $coupon=  Coupon::find($id);
        $coupon->delete();
        //dd('deleteBrandStatus');
        $success_message="Coupon has been deleted succesfully";
        return redirect()->back()->with('success_message',$success_message);

    
    }


}
