<?php

namespace App\Http\Livewire\Front\Home;

use Livewire\Component;
use App\Models\Banner;
class HeroSlider extends Component
{
    public $banners;
    public $language;
    public function mount($language)
    {        
    
        $this->banners= Banner::banners();
    }
    public function render()
    { 
        return view('livewire.front.home.hero-slider',['banners'=>$this->banners]);
    }
}
