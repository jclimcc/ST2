<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrdersProduct;
use Auth;
use Session;
class OrderController extends Controller
{
    public $vendorID=null; 
    public $profileType=""; 

    function defaultload() {        
        $this->vendorID =Auth::guard('admin')->user()->id;
        $this->profileType =Auth::guard('admin')->user()->type;        
    }

    public function orders(){
        
        self::defaultload();
        if($this->profileType== 'admin'||$this->profileType=='vendor')
        { 
         
            $getOrders=Order::with(['orderSummary'=>function($query)
            {
                $query->whereRaw(' order_status="paid" OR (order_status="pending payment" AND payment_method="COD") ');
            }])
            ->where(['vendor_id'=>$this->vendorID,'delivery_status'=>Null])  
            ->orderBy('id','desc')->get()->toArray();

        
        }
        else
        {
            $getOrders=Order::orderBy('id','asc');
            $vendor_id= Auth::guard('admin')->user()->id;
            $getOrders=  $getOrders->where('vendor_id',$vendor_id)
            ->get()
            ->toArray();
        }
     
     
        $title="Latest Order";
        Session::put('page','order_management');
        Session::put('page-type','new-order');
        
        return view('admin.order.orders')->with(compact('getOrders','title'));
    }
    public function completeOrders(){
        
    }
    public function ReportOrders(){

    }


}
