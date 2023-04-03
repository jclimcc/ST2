<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\Category;
use Livewire\Component;

class MediaPostPage extends Component
{
    public $pageURL;

    public $press;
    public $news;
    public $events;

    public function mount(){
      
        $currentUrl= "media-all";
        $this->pageURL= 'media-all';

        $this->events = Category::with(['posts' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->find(1)->posts->take(4);
        
        $this->news = Category::with(['posts' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->find(2)->posts->take(6);
        
        $this->press = Category::with(['posts' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->find(3)->posts->take(7);
        
      
    }
   
    // public function indexByCategory(Category $category)
    // {
    //     $posts = Post::where('category_id', $category->id)->get();
    //     return view('posts.index', ['posts' => $posts]);
    // }
     
    //  public function indexByTag(Tag $tag)
    //  {
    //      $posts = Post::whereHas('tags', function ($query) use ($tag) {
    //          $query->where('tags.id', $tag->id);
    //      })->get();
    //      return view('posts.index', ['posts' => $posts]);
    //  }

    public function render()
    {
       
        if ($this->pageURL=='media-all'){
            // do something if the URL contains 'media-all'
          
            return view('livewire.home-page')->layout("front.media.posts-all",[
                'pageURL'=>$this->pageURL,
                'events'=>$this->events,
                'news'=>$this->news,
                'press'=>$this->press
            ]);
        }
      

       // return view('livewire.front.page.media-post-page');
    }

}
