<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class MediaTagFilter extends Component
{
    use WithPagination;
    public $tag;
    protected $posts;

    public function mount(Tag $tag = null){     
        $this->tag= $tag;
        $this->loadPosts();
       
     
    }
    public function hydrate(){
        $this->loadPosts();
    }

    protected function loadPosts(){
      
        $tag=$this->tag;
   

        $this->posts = Post::whereHas('tags', function($query) use ($tag) {
            $query->where('tag_id', $this->tag->id);
        })->orderBy('created_at', 'desc')->paginate(4);

      
    }
    
    public function render()
    {
        
     
        return view('livewire.front.page.media-tag-filter',[
            'posts'=>$this->posts,
            'tag'=>$this->tag,
        ]);
    }

  
}

