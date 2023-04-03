<?php

namespace App\Http\Livewire\Front\Page;

use Livewire\Component;

class ProjectPage extends Component
{

    public $pageURL;

    public function mount($project){
        // Get the current route name
        
        $currentUrl = $project;
        $this->pageURL= 'all';
  
        if (strpos($currentUrl, 'current-upcomming') !== false) {
         // do something if the URL contains 'current-upcomming'
         $this->pageURL= 'current-upcomming';
        }
        if (strpos($currentUrl, 'the-sail-melaka') !== false) {
         // do something if the URL contains 'the-sail-melaka'
         $this->pageURL= 'the-sail-melaka';
        }
        if (strpos($currentUrl, 'novo-jalan-ampang') !== false) {
         // do something if the URL contains 'novo-jalan-ampang'
         $this->pageURL= 'novo-jalan-ampang';
        
        }
        if (strpos($currentUrl, 'regalia-melaka') !== false) {
         // do something if the URL contains 'regalia-melaka'
         $this->pageURL= 'regalia-melaka';
        }
        if (strpos($currentUrl, 'metrasquare-melaka') !== false) {
         // do something if the URL contains 'metrasquare-melaka'
         $this->pageURL= 'metrasquare-melaka';
        }
        if (strpos($currentUrl, 'ames-hotel-melaka') !== false) {
         // do something if the URL contains 'ames-hotel-melaka'
         $this->pageURL= 'ames-hotel-melaka';
        }
        if (strpos($currentUrl, 'nyra-hotel-melaka') !== false) {
         // do something if the URL contains 'nyra-hotel-melaka'
         $this->pageURL= 'nyra-hotel-melaka';
        }
       
        
  
     }
    public function render()
    {

        if ($this->pageURL=='current-upcomming'){
            // do something if the URL contains 'current-upcomming'
          
        return view('livewire.home-page')->layout("front.projects.current-upcomming",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='the-sail-melaka'){
        // do something if the URL contains 'the-sail-melaka'
        
        return view('livewire.home-page')->layout("front.projects.the-sail-melaka",['pageURL'=>$this->pageURL]);
        }
       
        if ($this->pageURL=='novo-jalan-ampang'){
        // do something if the URL contains 'novo-jalan-ampang'
       
        return view('livewire.home-page')->layout("front.projects.novo-jalan-ampang",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='regalia-melaka'){
        // do something if the URL contains 'regalia-melaka'
        
        return view('livewire.home-page')->layout("front.projects.regalia-melaka",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='metrasquare-melaka'){
        // do something if the URL contains 'metrasquare-melaka'
        
        return view('livewire.home-page')->layout("front.projects.metrasquare-melaka",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='ames-hotel-melaka'){
        // do something if the URL contains 'ames-hotel-melaka'
        
        return view('livewire.home-page')->layout("front.projects.ames-hotel-melaka",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='nyra-hotel-melaka'){
        // do something if the URL contains 'nyra-hotel-melaka'
        
        return view('livewire.home-page')->layout("front.projects.nyra-hotel-melaka",['pageURL'=>$this->pageURL]);
        }
       

       //  return view('livewire.front.page.project-page');
    }

   
}
