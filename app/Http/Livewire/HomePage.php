<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Request;
class HomePage extends Component
{
    public $pageURL;

    public function mount(){
       // Get the current route name
       $currentUrl = Request::url();
       $this->pageURL= 'home';

       if (strpos($currentUrl, 'founder-and-chairman') !== false) {
        // do something if the URL contains 'founder-and-chairman'
        $this->pageURL= 'founder-and-chairman';
       }
       if (strpos($currentUrl, 'about-us') !== false) {
        // do something if the URL contains 'about-us'
        $this->pageURL= 'about-us';
       }
       if (strpos($currentUrl, 'awards') !== false) {
        // do something if the URL contains 'awards'
        $this->pageURL= 'awards';
       }
       
 
    }
    public function render()
    {
      
       if ($this->pageURL=='founder-and-chairman'){
        // do something if the URL contains 'founder-and-chairman'
      
        return view('livewire.home-page')->layout("front.about-us.founder-and-chairman",['pageURL'=>$this->pageURL]);
       }
       if ($this->pageURL=='about-us'){
        // do something if the URL contains 'about-us'
      
        return view('livewire.home-page')->layout("front.about-us.about-us",['pageURL'=>$this->pageURL]);
       }
       
       if ($this->pageURL=='awards'){
        // do something if the URL contains 'awards'
      
        return view('livewire.home-page')->layout("front.about-us.awards",['pageURL'=>$this->pageURL]);
       }
       else
        return view('livewire.home-page')->layout("front.home.index");
    }
}
