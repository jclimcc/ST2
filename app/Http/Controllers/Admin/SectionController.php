<?php

namespace App\Http\Controllers\Admin;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Session;

use function PHPUnit\Framework\isNull;

class SectionController extends Controller
{
    
    public function sections(){
        $sections= Section::get()->toArray();

        $title="Section List";
        Session::put('page','categories_management');
        Session::put('page-type','sections');
        return view('admin.sections.sections')->with(compact('sections','title'));
    }
    public function updateSectionStatus (Request $request){
        if($request->ajax()){
            $data=$request->all();  
           
        
       
            $rules=[
                'status' => 'required|numeric',
                'section_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Section::where('id',$data['section_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'section_id'=> $data['section_id']]);
        }
        else
        return false;
        
    }
    public function deleteSectionStatus ($id){
        
            Section::where('id',$id)->delete();
            $success_message="Section has been deleted succesfully";
            return redirect()->back()->with('success_message',$success_message);
   
        
    }

    public function addEditSection(Request $request,$id =null){
        Session::put('page','categories_management');
        Session::put('page-type','sections');
        
        if($id=="")
        {
            
            $title="Add Section";
            $section= new Section;
           
        }
        else
        {
            $title="Edit Section";
            $section= Section::find($id);
            
        }
        

        if($request->isMethod('POST')){
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'section_name' => 'required',
                'type' => 'required',
               
            ];
            $this->validate($request,$rules);
           
            $section->name= $data['section_name']; 
            
            $slug= SlugService::CreateSlug(Section::class,'slug',$data['section_name']);
            $section->slug= $slug; 
            $section->status=1; 
            $section->save();
         
            if($data['type']=='add'){
                $message='Successfully Created New Section-'.$data['section_name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Section to'.$data['section_name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/sections')->with('success_message',$message); 
            else
                return redirect('admin/sections')->with('error_message',$message); 

        }
       
        
        return view('admin.sections.add_edit_section')->with(compact('section','title'));
    }
}
