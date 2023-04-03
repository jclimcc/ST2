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
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function applicantStore(Request $request)
        {
            $validatedData = \Validator::make($request->all(), [
                'fname' => 'required',
                'email' => 'required',
                'phone' => 'required|regex:/^\+?\d{8,}$/',
                'career_id' => 'required',
                'cover_letter' => 'required',
                'cvfile' => 'required|mimes:pdf,doc,docx'
            ]);
            if ($validatedData->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validatedData->errors()
                ]);
        
            }
            
            $fileName="";
           
            if ($request->hasFile('cvfile')) {
                $file = $request->file('cvfile');
                if ($file->isValid()) {
                    $allowedExtensions = ['doc', 'docx', 'pdf', 'txt'];
                    $extension = strtolower($file->getClientOriginalExtension());
                    if (in_array($extension, $allowedExtensions)) {
                        $fileName = uniqid() . '_' . time() . '.' . $extension;
                        $file->move(public_path('uploads/'), $fileName);
                        
                    } else {
                        // handle invalid file type error
                    }
                }
            }

            $jobA = new JobApplicant();
            $jobA->career_id  = $request->input('career_id');
            $jobA->name = $request->input('fname');
            $jobA->email = $request->input('email');
            $jobA->phone = $request->input('phone');
            $jobA->cover_letter = $request->input('cover_letter');
            $jobA->resume = $fileName;
            $jobA->save();


            // $career = Career::create($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Application submitted successfully!'
            ]);
            // return redirect()->back()->with('success', 'Application submitted successfully!');
            // return redirect()->back()
            //     ->with('success', 'Career created successfully.');
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
