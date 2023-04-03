<?php

namespace App\Http\Livewire\Front\Page;

use Livewire\Component;

class BusinessAndServices extends Component
{
    public $pageURL;

    public function mount($type){
        // Get the current route name
        
        $currentUrl = $type;
        $this->pageURL= 'home';
 
        if (strpos($currentUrl, 'real-estate') !== false) {
         // do something if the URL contains 'real-estate'
         $this->pageURL= 'real-estate';
        }
        if (strpos($currentUrl, 'hospitality') !== false) {
         // do something if the URL contains 'hospitality'
         $this->pageURL= 'hospitality';
        }
        if (strpos($currentUrl, 'one-stop-center') !== false) {
         // do something if the URL contains 'one-stop-center'
         $this->pageURL= 'one-stop-center';
        }
        if (strpos($currentUrl, 'heathcare') !== false) {
         // do something if the URL contains 'heathcare'
         $this->pageURL= 'heathcare';
        }
       
        if (strpos($currentUrl, 'agriculture') !== false) {
         // do something if the URL contains 'agriculture'
         $this->pageURL= 'agriculture';
        }
        if (strpos($currentUrl, 'legal-firm') !== false) {
         // do something if the URL contains 'legal-firm'
         $this->pageURL= 'legal-firm';
        }
        if (strpos($currentUrl, 'publication') !== false) {
         // do something if the URL contains 'publication'
         $this->pageURL= 'publication';
        }
        if (strpos($currentUrl, 'fashion') !== false) {
         // do something if the URL contains 'fashion'
         $this->pageURL= 'fashion';
        }
       
        if (strpos($currentUrl, 'e-commerce') !== false) {
         // do something if the URL contains 'e-commerce'
         $this->pageURL= 'e-commerce';
        }
       
        
  
     }
    public function render()
    {

        if ($this->pageURL=='real-estate'){
            // do something if the URL contains 'real-estate'
          
        return view('livewire.home-page')->layout("front.business-and-services.real-estate",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='hospitality'){
        // do something if the URL contains 'hospitality'
        
        return view('livewire.home-page')->layout("front.business-and-services.hospitality",['pageURL'=>$this->pageURL]);
        }
        
        if ($this->pageURL=='one-stop-center'){
        // do something if the URL contains 'one-stop-center'
        
        return view('livewire.home-page')->layout("front.business-and-services.one-stop-center",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='heathcare'){
        // do something if the URL contains 'heathcare'
        
        return view('livewire.home-page')->layout("front.business-and-services.heathcare",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='agriculture'){
        // do something if the URL contains 'agriculture'
        
        return view('livewire.home-page')->layout("front.business-and-services.agriculture",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='legal-firm'){
        // do something if the URL contains 'legal-firm'
        
        return view('livewire.home-page')->layout("front.business-and-services.legal-firm",['pageURL'=>$this->pageURL]);
        }
        if ($this->pageURL=='publication'){
        // do something if the URL contains 'publication'
        
        return view('livewire.home-page')->layout("front.business-and-services.publication",['pageURL'=>$this->pageURL]);
        }
        
        if ($this->pageURL=='fashion'){
        // do something if the URL contains 'fashion'
        
        return view('livewire.home-page')->layout("front.business-and-services.fashion",['pageURL'=>$this->pageURL]);
        }
        
        if ($this->pageURL=='e-commerce'){
        // do something if the URL contains 'e-commerce'
        
        return view('livewire.home-page')->layout("front.business-and-services.e-commerce",['pageURL'=>$this->pageURL]);
        }
        
          

       // return view('livewire.front.page.business-and-services');
    }
}
