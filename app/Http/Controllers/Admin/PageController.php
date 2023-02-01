<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page\PageBlock;
use App\Models\Page\PageSection;
use App\Models\page\PageTemplate;
use App\Models\SeoMetadata;
use Illuminate\Http\Request;

use Image;
use Session;
class PageController extends Controller
{
    public function index(){
     
        $pageDetails= PageTemplate::orderBy('id')->get()->toArray();

        Session::put('page','pages');
        Session::put('page-type','page_management');
        return view('admin.pages.index')->with(compact('pageDetails'));

    }
    public function PageTemplateSection($id =null)
    {
        Session::put('page','pages');
        Session::put('page-type','page_management');
        
        if($id===null)
        {            
            $message='No Page is selected';
            return redirect('admin/pages')->with('error_message',$message);             
        }
        

        $pageTemplateSection= PageTemplate::with('sections')->find($id); 
        return view('admin.pages.pagetemplate_section')->with(compact('pageTemplateSection'));
    }
    public function addEditPageTemplate(Request $request,$id =null){
        Session::put('page','pages');
        Session::put('page-type','page_management');
        
        if($id=="")
        {
            
            $title="Add Page Template";
            $pageTemplate= new PageTemplate();
            $pageSEO= new SeoMetadata();
           
        }
        else
        {
            $title="Edit Page Template";
            $pageTemplate= PageTemplate::where('id',$id)->first();           
            $pageSEO= $pageTemplate->seo_page()->first(); 
          
            $metaog_imageDB= $pageSEO->og_image;    
        }
        
       
        if($request->isMethod('POST')){
          
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'name' => 'required',               
            ];
            $this->validate($request,$rules);
           
          
            $pageTemplate->name= $data['name'];  
            $pageTemplate->url= $data['url'];  
            $pageTemplate->layout= $data['layout'];  
            $pageTemplate->save();
           


            


            
            $pageSEO->template_id= $pageTemplate->id;
            $pageSEO->page_type= 'page';
            $pageSEO->page_title= $data['page_title'];
            $pageSEO->meta_description= $data['meta_description'];
            $pageSEO->meta_keywords= $data['meta_keywords'];
            $pageSEO->og_title= $data['og_title'];
            $pageSEO->og_description= $data['og_description'];
            //Upload Og Image
            if($request->hasFile('og_image')){
                $image_temp= $request->file('og_image');
                if($image_temp->isValid()){
                    //Get Image Extension
                    $extension= $image_temp->getClientOriginalExtension();
                    //Generate  New image filename
                    $imageName=date('ymd').rand(111,99999).'.'.$extension;
                    $imagePath='front/og_image/'.$imageName;
                    //Upload the Image
                    Image::make($image_temp)->save($imagePath);
                    $image=$imageName;
                    $pageSEO->og_image= $image;
          
                }
            }
            else{
                $pageSEO->og_image= $metaog_imageDB;
            
            }
            $pageSEO->og_url= $data['url'];

            $pageSEO->save();
            
            if($data['type']=='add'){
                $message='Successfully Created New Page-'.$data['name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Page to'.$data['name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/pages')->with('success_message',$message); 
            else
                return redirect('admin/pages')->with('error_message',$message); 

        }
       
       
        return view('admin.pages.add_edit_page_template')->with(compact('pageTemplate','pageSEO','title'));
    }

    public function addEditPageTemplateSection(Request $request,$template_id =null,$section_id =null){
        Session::put('page','pages');
        Session::put('page-type','page_management');
        
        if($section_id=="")
        {
            
            $title="Add Section";
            $pageTemplate = PageTemplate::where('id', $template_id)->first();
            $pageSection= new PageSection();
            $pageSection->template_id= $pageTemplate->id;
            
                
        }
        else
        {
            $title="Edit Section";
            $pageTemplate = PageTemplate::where('id', $template_id)->first();            
            $pageSection = $pageTemplate->sections()->where('id', $section_id)->first();
               
        }
        
       
        if($request->isMethod('POST')){
          
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'name' => 'required',               
            ];
            $this->validate($request,$rules);
           
          
            $pageSection->name= $data['name'];  
            // $pageSection->content= htmlspecialchars( $data['content'], ENT_QUOTES, 'UTF-8');    
            $pageSection->sequence= $data['sequence']; 
             
            $pageSection->save();

           
            $pageBlock= new PageBlock();
            $pageBlock->language_code='eng';
            $pageBlock->section_id=$pageSection->id;
            $pageBlock->save();
            $pageBlock= new PageBlock();
            $pageBlock->language_code='zho';
            $pageBlock->section_id=$pageSection->id;
            $pageBlock->save();
           
            if($data['type']=='add'){
                $message='Successfully Created New Section-'.$data['name'];
                $result=true;
            }
            else if($data['type']=='edit')
            { 
                $message='Successfully update Section to'.$data['name'];
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/page_template_section/'.$template_id)->with('success_message',$message); 
            else
                return redirect('admin/page_template_section/'.$template_id)->with('error_message',$message); 

        }
       
       
        return view('admin.pages.add_edit_pagetemplate_section')->with(compact('pageTemplate','pageSection','title'));
    }
    public function addEditPageTemplateBlock(Request $request,$template_id =null,$section_id =null){
        Session::put('page','pages');
        Session::put('page-type','page_management');
        
      
        
        $title="Edit Block";
        $pageTemplate = PageTemplate::where('id', $template_id)->first();            
        $pageSection = $pageTemplate->sections()->where('id', $section_id)->first();       
        $pageBlock   =$pageSection->blocks()->get();            
        
       
        
        if($request->isMethod('POST')){
          
           $data=$request->all();
           $result='';
           $message='';
           $rules=[
                'zho_content' => 'required',               
                'eng_content' => 'required',               
            ];
            $this->validate($request,$rules);
          
            foreach($pageBlock as $block)
            {
                if($block->language_code=='eng')
                {
                    PageBlock::where('id',$block->id)
                    ->update([
                        'content'=>htmlspecialchars($data['eng_content'], ENT_QUOTES, 'UTF-8'),
                    ]);
                }
                if($block->language_code=='zho')
                {
                    PageBlock::where('id',$block->id)
                    ->update([
                        'content'=>htmlspecialchars($data['zho_content'], ENT_QUOTES, 'UTF-8'),
                    ]);
                }
            }
           
            if($data['type']=='edit')
            { 
                $message='Successfully update '.$pageTemplate->name .' block - '.$pageSection->name  ;
                $result=true;
            }
           
           
            if($result)
                return redirect('admin/page_template_section/'.$template_id)->with('success_message',$message); 
            else
                return redirect('admin/page_template_section/'.$template_id)->with('error_message',$message); 

        }
       
       
        return view('admin.pages.add_edit_pagetemplatesection_block')->with(compact('pageTemplate','pageSection','pageBlock','title'));
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
               
            
            PageSection::where('id',$data['section_id'])
            ->update([
                'status'=> $status,
            ]);
            
            $sectionDetails= PageSection:: where('id',$data['section_id'])->first()->toArray();
            
            return response()->json(['status'=>$status,'section_id'=> $data['section_id']]);
        }
        else
        return false;
        
    }
}
