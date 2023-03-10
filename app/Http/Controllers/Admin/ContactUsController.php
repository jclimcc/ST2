<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Session;
class ContactUsController extends Controller
{
    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $getContacts=ContactUs::get()->toArray();
               
              
            $title="Contact Us";
            Session::put('page','contactus');
            Session::put('page-type','contactus');
            
            return view('admin.contactus.index')->with(compact('getContacts','title'));
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            //
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store()
        {
            //
        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show($id)
        {
           
            $contact=ContactUs::find($id)->toArray();
               
            
            $title="View Inquiry";
            Session::put('page','contactus');
            Session::put('page-type','contactus');
            
            return view('admin.contactus.view_contactus')->with(compact('contact','title'));
        }
    
        /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function edit($id)
        {
            //
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update($id)
        {
            //
        }
    
        /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function destroy($id)
        {
            //
        }
}
