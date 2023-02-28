<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\JobApplicant;
use Illuminate\Http\Request;
use Session;
class CareerController extends Controller
{
    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $getCareers=Career::get()->toArray();
               
              
            $title="Career Management";
            Session::put('page','career_management');
            Session::put('page-type','careers');
            
            return view('admin.careers.index')->with(compact('getCareers','title'));
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
              
            $career="";
            $title="New Career ";
            Session::put('page','career_management');
            Session::put('page-type','careers');
            
            return view('admin.careers.add_edit_career')->with(compact('career','title'));
        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'title' => 'required',
                'location' => 'required',
                'typeofemployee' => 'required',
                'ckeditor-body' => 'required',
                'start' => 'required',
                'end' => 'required',
                'status' => 'required'
            ]);
        
            $career = new Career();
            $career->title = $request->input('title');
            $career->location = $request->input('location');
            $career->typeofemployee = $request->input('typeofemployee');
            $career->description = $request->input('ckeditor-body');
            $career->start_date = $request->input('start');
            $career->end_date = $request->input('end');
            $career->status = $request->input('status');
            $career->save();


            // $career = Career::create($validatedData);
        
            return redirect('admin/careers')
                ->with('success', 'Career created successfully.');
        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show($id)
        {
            $career=Career::find($id)->toArray();
               
           
            $title="View Career:".$career['title'];
            Session::put('page','career_management');
            Session::put('page-type','careers');
            
            return view('admin.careers.view_career')->with(compact('career','title')); 
          
        }
    
        /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function edit($id)
        {
            $career=Career::find($id)->toArray();
               
           
            $title="Edit Career:".$career['title'];
            Session::put('page','career_management');
            Session::put('page-type','careers');
            
            return view('admin.careers.edit_career')->with(compact('career','title'));
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update(Request $request,$id)
        {
            $career=Career::find($id);
            $career->title = $request->input('title');
            $career->location = $request->input('location');
            $career->typeofemployee = $request->input('typeofemployee');
            $career->description = $request->input('ckeditor-body');
            $career->start_date = $request->input('start');
            $career->end_date = $request->input('end');
            $career->status = $request->input('status');
            $career->save();

            return redirect('admin/careers')
            ->with('success', 'Career :'. $career->title.' created successfully.');
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

        public function updateCareerStatus(Request $request)
        {
            if($request->ajax()){
                $data=$request->all();            
            
                $rules=[
                    'status' => 'required|numeric',
                    'career_id' => 'required|numeric',
                ];

                $this->validate($request,$rules);
                $status=($data['status']=='1')?0:1;              
                    
                
                Career::where('id',$data['career_id'])
                ->update([
                    'status'=> $status,
                ]);
                return response()->json(['status'=>$status,'career_id'=> $data['career_id']]);
            }
            else
            return false;
        }

        public function viewCareerApplicant($id)
        {
            $career=Career::with('jobApplicants')->find($id)->toArray();

         
            $applicants= $career['job_applicants'];
            $title="Filter :".$career['title'];
            Session::put('page','career_management');
            Session::put('page-type','jobapplicants');
            
            return view('admin.careers.career_jobapplicant')->with(compact('career','applicants','title'));
        }
}

