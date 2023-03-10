<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\JobApplicant;
use Illuminate\Http\Request;
use Session;
class JobApplicantController extends Controller
{
    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $getJobApplicants=JobApplicant::with('career')->get()->toArray();
               
            
            $title="Job Applicant";
            Session::put('page','career_management');
            Session::put('page-type','jobapplicants');
            
            return view('admin.careers.jobapplicants.index')->with(compact('getJobApplicants','title'));
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(Request $request)
        {
           
        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show($id)
        {
            $applicant=JobApplicant::with('career')->find($id)->toArray();
               
           
            $title="Applicant:".$applicant['name'];
            Session::put('page','career_management');
            Session::put('page-type','jobapplicants');
            
            return view('admin.careers.jobapplicants.view_applicant')->with(compact('applicant','title'));
          
        }
    
        /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function edit($id)
        {
           
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update(Request $request,$id)
        {
          
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
