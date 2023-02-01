<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
// use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Hash;
use DB;
use Image;
use Session;
class AdminController extends Controller
{
    //
    public function updateAdminPassword(Request $request){

       $adminDetails= Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
       //dd(Auth::guard('admin'));
        if($request->isMethod('POST')){
            $data=$request->all();

            //step1 check current password same as user password
            //step2 check new password and confirm password is match

            if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password))
            {
                //step2 check new password and confirm password is match
                if($data['new_password']==$data['confirm_password'])
                {
                    Admin::where('id',Auth::guard('admin')->user()->id)
                            ->update(['password'=>bcrypt($data['confirm_password'])]);
                    return redirect('admin/update-admin-password')->with('success_message','Successfully Update New Password!');
                }
                else
                {
                    return redirect()->back()->with('error_message','New Password And Confirm Password does not Match! ');              
                }
            }
            else
            {
                return redirect()->back()->with('error_message','Failed to Update -Invalid Password !');
              
            }
            
            
        }
        Session::put('page','settings');
        Session::put('page-type','update_admin_password');
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
        
    }
    public function updateAdminDetails(Request $request){

       $adminDetails= Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
       //dd(Auth::guard('admin'));
        if($request->isMethod('POST')){
            $data=$request->all();
            $rules=[
                'admin_name' => 'required|regex:/^[\pL\s]+$/u',
                'admin_mobile' => 'required|numeric',
            ];
            $this->validate($request,$rules);

            //Upload Admin Image
            if($request->hasFile('admin_image')){
                $image_temp= $request->file('admin_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='admin/images/photos/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);

                }
            }
            else
            {
                $imageName= $adminDetails['image'];
            }
          
           
            //step1 check current password same as user password           
            
            Admin::where('id',Auth::guard('admin')->user()->id)
                    ->update(['name'=> $data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$imageName]);
            return redirect('admin/update-admin-details')->with('success_message','Successfully Update Admin Details!');            
        }

        Session::put('page','settings');
        Session::put('page-type','update_admin_details');
        return view('admin.settings.update_admin_details')->with(compact('adminDetails'));
        
    }
    public function updateVendorDetails($slug,Request $request){
        
        $vendorDetails= Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        $vendorBusinessDetails=[];
        $vendorBankDetails=[];
        $countries=Country::where('status','1')->get()->toArray();

        
        if($slug=='personal')
        {
            
           
            if($request->isMethod('POST')){
                $data=$request->all();
                $result= $this->updateVendorDetailsPersonal($request,$vendorDetails);
                
                if($result)
                    return redirect('admin/update-vendor-details/personal')->with('success_message','Successfully Update Vendor Personal Details!'); 
                else
                    return redirect('admin/update-vendor-details/personal')->with('error_message','Error Update Vendor Personal Details!'); 

            }

          
            
        }
        else if($slug=='business')
        {
           
           $vendorBusinessDetails= VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
           

            if($request->isMethod('POST')){
                $data=$request->all();
                $result= $this->updateVendorDetailsBusiness($request,$vendorBusinessDetails);
                
                if($result)
                    return redirect('admin/update-vendor-details/business')->with('success_message','Successfully Update Vendor Business Details!'); 
                else
                    return redirect('admin/update-vendor-details/business')->with('error_message','Error Update Vendor Business Details!'); 

            }
         
        }
        else if($slug=='bank')
        {
            // dd(Auth::guard('admin')->user()->vendor_id);
            $vendorBankDetails= VendorsBankDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            //  dd($vendorBankDetails);

            if($request->isMethod('POST')){
                $data=$request->all();
                
                $result= $this->updateVendorDetailsBank($request,$vendorBankDetails);
               
                if($result)
                    return redirect('admin/update-vendor-details/bank')->with('success_message','Successfully Update Vendor Bank Details!'); 
                else
                    return redirect('admin/update-vendor-details/bank')->with('error_message','Error Update Vendor Bank Details!'); 

            }
        }
        else
        {

        }
        Session::put('page','update_vendor_details');
        Session::put('page-type',$slug);
        return view('admin.vendor.update_vendor_details')->with(compact('slug','vendorDetails','vendorBusinessDetails','vendorBankDetails','countries'));

    }
    public function updateVendorDetailsPersonal($request,$vendorDetails)
    {
    
        $data=$request->all();
        $rules=[
            'vendor_name' => 'required|regex:/^[\pL\s]+$/u',
            'vendor_address' => 'required',
            'vendor_city' => 'required',
            'vendor_state' => 'required',
            'vendor_postcode' => 'required|numeric',
            'vendor_mobile' => 'required|numeric',
        ];
        $this->validate($request,$rules);


            //Upload Admin Image
            if($request->hasFile('admin_image')){
                $image_temp= $request->file('admin_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='admin/images/photos/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);

                }
            }
            else
            {
                $imageName= Auth::guard('admin')->user()->image;
            }
          
           
            //Update admin image
            Admin::where('id',Auth::guard('admin')->user()->id)
                    ->update(['name'=> $data['vendor_name'],'mobile'=>$data['vendor_mobile'],'image'=>$imageName]);
            
            Vendor::where('id',Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'name'=> $data['vendor_name'],
                        'address'=>$data['vendor_address'],
                        'city'=>$data['vendor_city'],
                        'state'=>$data['vendor_state'],
                        'country'=>$data['vendor_country'],
                        'postcode'=>$data['vendor_postcode'],
                        'mobile'=>$data['vendor_mobile']]);
            return true;
    }

    public function updateVendorDetailsBusiness($request,$vendorBusinessDetails)
    {
    
        $data=$request->all();
        $rules=[
            'shop_name' => 'required|regex:/^[\pL\s]+$/u',
            'shop_address' => 'required',
            'shop_city' => 'required',
            'shop_state' => 'required',
            'shop_country' => 'required',
            'shop_website' => 'required',
            'shop_postcode' => 'required|numeric',
            'shop_mobile' => 'required|numeric',
            'shop_email' => 'required',
            'address_proof' => 'required',
            'business_license_number' => 'required',
        ];
        $this->validate($request,$rules);


             //Upload Shop Image
             if($request->hasFile('shop_image')){
                $image_temp= $request->file('shop_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageNameshop=date('ymd').rand(111,99999).'.'.$extension;
                   // $imagePath='front/images/vendors/'.$imageNameshop;
                    //Upload the Image\
                    $imageMediumPath='front/images/vendors/normal/'.$imageNameshop;
                    $imageSmallPath='front/images/vendors/thumnail/'.$imageNameshop;
                    //Upload the productImagex 3 size
                    Image::make($image_temp)->resize(180,180)->save($imageMediumPath);
                    Image::make($image_temp)->resize(60,60)->save($imageSmallPath);



                }
            }
            else
            {
                $imageNameshop= $vendorBusinessDetails['shop_image'];
            }

            //Upload Address proof Image
            if($request->hasFile('address_proof_image')){
                $image_temp= $request->file('address_proof_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='admin/images/photos/address_proof_image/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);

                }
            }
            else
            {
                $imageName= $vendorBusinessDetails['address_proof_image'];
            }
          
           
            //Update admin image
           
            VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)
                    ->update([
                        'shop_name'=> $data['shop_name'],
                        'shop_description'=> Str::squish($data['shop_description']),
                        'shop_address'=>$data['shop_address'],
                        'shop_city'=>$data['shop_city'],
                        'shop_state'=>$data['shop_state'],
                        'shop_country'=>$data['shop_country'],
                        'shop_website'=>$data['shop_website'],
                        'shop_postcode'=>$data['shop_postcode'],
                        'shop_mobile'=>$data['shop_mobile'],
                        'shop_email'=>$data['shop_email'],
                        'shop_image'=>$imageNameshop,
                        'address_proof'=>$data['address_proof'],
                        'address_proof_image'=>$imageName,
                        'business_license_number'=>$data['business_license_number'],
                        'gst_number'=>0,
                        'pan_number'=>0,
                        'follow_tw'=>$data['follow_tw'],
                        'follow_fb'=>$data['follow_fb'],
                        'follow_ig'=>$data['follow_ig'],
                    ]);

                        

            return true;
    }
    public function updateVendorDetailsBank($request,$vendorBankDetails)
    {
    
        $data=$request->all();
        $rules=[
            'account_holder_name' => 'required|regex:/^[\pL\s]+$/u',
            'bank_name' => 'required|regex:/^[\pL\s]+$/u',
            'bank_acc_no' => 'required|numeric'
        ];

        $customMessage=[
            'account_holder_name.required' => 'Account Holder Name is required!',
            'account_holder_name.regex' => 'Account Holder Name Only Alphabet Characters!',
            'bank_name.required' => 'Bank Name is required!',
            'bank_name.regex' => 'Bank Name Only Alphabet Characters!',
            'bank_acc_no.required' => 'Bank Account Number is required!',
            'bank_acc_no.numeric' => 'Bank Account Number Only Numbers!',
            'email.email' => 'Valid Email Address is required!',
            'password.required' => 'Password is required',
        ];

        $this->validate($request,$rules, $customMessage);

        //Update admin image
   
        VendorsBankDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)
                ->update([
                    'account_holder_name'=> $data['account_holder_name'],
                    'bank_name'=>$data['bank_name'],
                    'bank_acc_no'=>$data['bank_acc_no']
                ]);
              
            return true;
    }

    public function checkCurrentPassword (Request $request){

        $data=$request->all();
        if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
            return "true";
            
        }else{
            return "false";
        }
    }
    public function updateAdminStatus (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'status' => 'required|numeric',
                'admin_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Admin::where('id',$data['admin_id'])
            ->update([
                'status'=> $status,
            ]);
            
            $adminDetails= Admin:: where('id',$data['admin_id'])->first()->toArray();
            if($adminDetails['type']=='vendor' && $adminDetails['status']==1)
            {
                sendEmailVIP($adminDetails['email'],$adminDetails['name'], "Vendor Profile Approved", "emails.vendor_approved",url('vendor/login/'));
            }

            return response()->json(['status'=>$status,'admin_id'=> $data['admin_id']]);
        }
        else
        return false;
        
    }
    
    public function login(Request $request){

        
        if($request->isMethod('POST')){
            $data= $request->all();
            $rules=[
                'email' => 'required|email:rfc',
                'password' => 'required',
            ];
            $customMessage=[
                'email.required' => 'Email Address is required!',
                'email.email' => 'Valid Email Address is required!',
                'password.required' => 'Password is required',
            ];
            $this->validate($request,$rules,$customMessage);
 
            
            if(Auth::guard('admin')->attempt([
                'email' => $data['email'],
                'password' => $data['password'],
                'status'=>1])){
                    return redirect('admin/dashboard');
                }else{
                    return redirect()->back()->with('error_message','Invalid Email or Password.');
                }
            echo '<pre>';
            print_r($data);
            echo '</pre>';

        }
       
        return view('admin.login');
    }
    public function dashboard(){
        Session::put('page','dashboard');
        return view('admin.dashboard');
    }

    public function admins($type=null){
        
        $admins= Admin::query();
        
        if(!empty($type)){
            $admins= $admins->where('type',$type);
            $title=ucfirst($type).'s';
        }else{
            $title='All Admins/Subadmins/Vendors';
            $type="all";
        }
        $admins=$admins->get()->toArray();
        
        Session::put('page','admins');
        Session::put('page-type',$type);
        return view('admin.admins.admins')->with(compact('admins','type','title'));
    }

    public function viewVendorDetails($id){
        
        $vendorDetails= Admin::with('vendorPersonal','vendorBusiness','vendorBank')
        ->where('id',$id)->first();
        $vendorDetails=json_decode(json_encode($vendorDetails),true);
        //  dd($vendorDetails);
        Session::put('page','admins');
        Session::put('page-type','vendor');
        return view('admin.admins.view_vendor_details_personal')->with(compact('vendorDetails','id'));
    }

    public function logout(){

        Auth::guard('admin')->logout();
        
        return redirect('admin/login');
    }

        

}
