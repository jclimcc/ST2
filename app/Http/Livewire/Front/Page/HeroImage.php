<?php

namespace App\Http\Livewire\Front\Page;

use Livewire\Component;

class HeroImage extends Component
{
    public $pageURL;

    public function mount($pageURL)
    {
        $this->pageURL= $pageURL;
    }
    public function render()
    {
        return view('livewire.front.page.hero-image');
    }
}
