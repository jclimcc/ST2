<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class MediaCategoryAll extends Component
{
    use WithPagination; 
    public $category;
    protected $posts;

    public function mount(Category $category =null){
        $this->category= $category;
      
        $this->loadPosts();
       
     
    }
    public function hydrate(){
        $this->loadPosts();
    }

    protected function loadPosts(){

        $category=$this->category;
        

        $this->posts = Post::whereHas('categories', function($query) use ($category) {
            $query->where('category_id', $this->category->id);
        })->orderBy('created_at', 'desc')->paginate(4);
    }
    
    public function render()
    {
        
     
        return view('livewire.front.page.media-category-all',[
            'posts'=>$this->posts]);
    }

  
}
