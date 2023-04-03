<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Video;
use Illuminate\Support\Facades\Request;

class PageController extends Controller
{
    public $pageURL;
    public function homePage(){
        $currentUrl = Request::url();
        $this->pageURL= 'home';

       return view("front.home.index",[
        'pageURL'=>$this->pageURL]);
    }

    public function videoPage(){
        $currentUrl = Request::url();
        $this->pageURL= 'video-all';
        

        $videos= Video::where('status','1')->orderBy('created_at', 'desc')->get();
       return view("front.video.video-all",[
        'pageURL'=>$this->pageURL,
        'videos'=>$videos,
    ]);
    }
    public function careerPage(){
        $currentUrl = Request::url();
        $this->pageURL= 'career';
        

        $careers= Career::where('status','1')->orderBy('created_at', 'desc')->get();
       return view("front.career.career-all",[
        'pageURL'=>$this->pageURL,
        'careers'=>$careers,
    ]);
    }
    public function careerApplyPage($job_id=null){
        $currentUrl = Request::url();
        $this->pageURL= 'career';
        $career= Career::find($job_id)->orderBy('created_at', 'desc')->first();
        
        if(empty($career))
        {
            return redirect('career')->with('error','Article Not Found..');
        }
     
        return view("front.career.career-job-apply",[
        'pageURL'=>$this->pageURL,
        'career'=>$career,
    ]);
    }
   
    public function contactusPage()
    {
        $currentUrl = Request::url();
        
        $this->pageURL= 'contact-us';
        $career="";
        return view("front.contact-us.contact-us",[
            'pageURL'=>$this->pageURL,
            'career'=>$career,
        ]);
    }
    
}
