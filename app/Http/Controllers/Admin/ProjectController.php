<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Session;
use Image;
class ProjectController extends Controller
{
    public function index(){
        $getProjects=Project::orderBy('sequence','asc')->orderBy('id','asc')
        ->get()->toArray();
     
        $title="Project List";
        Session::put('page','project_management');
        Session::put('page-type','projects');
        // dd($categories);
        return view('admin.projects.index')->with(compact('getProjects','title'));
    }
    public function updateProjectStatus(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();            
       
            $rules=[
                'status' => 'required|numeric',
                'project_id' => 'required|numeric',
            ];

            $this->validate($request,$rules);
            $status=($data['status']=='1')?0:1;              
               
            
            Project::where('id',$data['project_id'])
            ->update([
                'status'=> $status,
            ]);
            return response()->json(['status'=>$status,'project_id'=> $data['project_id']]);
        }
        else
        return false;
    }

    public function addEditProject(Request $request,$id =null){
        Session::put('page','project_management');
        Session::put('page-type','projects');
        
        if($id=="")
        {
            
            $title="Add Project";
            $project= new Project();
           
        }
        else
        {
            $title="Edit Project";
            $project= Project::find($id);
        
            $project_iconDB= $project['icon'];
            $project_imageDB= $project['image'];
           
        }
        
       
        if($request->isMethod('POST')){
          
           $data=$request->all();
           $result='';
           $message='';
        //    $rules=[
        //         'title' => 'required',               
        //     ];
        //     $this->validate($request,$rules);
           
          
        //Upload project Image
        if($request->hasFile('project_icon')){
            $image_temp= $request->file('project_icon');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension= $image_temp->getClientOriginalExtension();
                //Generate  New image filename
                $imageName=date('ymd').rand(111,99999).'.'.$extension;
                $imagePath='front/projects/icons/'.$imageName;
                //Upload the Image
                Image::make($image_temp)->save($imagePath);
                $image=$imageName;
               
                $project->icon= $image; 
      
            }
        }
        else{
            
            $project->icon=  $project_iconDB;
        }

            //Upload project Image
            if($request->hasFile('project_image')){
                $image_temp= $request->file('project_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='front/projects/images/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);
                    $image=$imageName;
                   
                    $project->image= $image; 
          
                }
            }
            else{
                
                $project->image=  $project_imageDB;
            }
           
          
                
            
            $project->name= $data['name'];  
            $project->url= $data['url'];    
            $project->sequence= $data['sequence'];     
           
            $project->save();
           
            if($data['type']=='add'){
                $message='Successfully created New Project-'.$data['name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Project to'.$data['name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/projects')->with('success_message',$message); 
            else
                return redirect('admin/projects')->with('error_message',$message); 

        }
       
       
        return view('admin.projects.add_edit_project')->with(compact('project','title'));
    }

}
