<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;

class BreadcrumpPost extends Component
{

    public $category;
    public $tag;
    public $type;
  

    public function mount($category = null ,$tag =null ){
        
        $this->tag= $tag;
        $this->category= $category;
         if ($category === null) {
            // If $this->category is null, execute this code
            $this->type='tag';
            $this->tag= Tag::find($tag['id'])->first();
        } else {
            // If $this->category is not null, execute this code
            // ...
            $this->type='post';
            $this->category= Category::find($category['id'])->first();
        }
       

       // dd($this->type);
      

       
    }


    public function render()
    {
       
        return view('livewire.front.page.breadcrump-post',['category'=>$this->category,'tag'=>$this->tag,]);
    }
}
