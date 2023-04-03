<?php

namespace App\Http\Livewire\Front\Home;

use App\Models\Category;
use Livewire\Component;

class PostList extends Component
{
    public $press;
    public $news;
    public $events;

    
    
    public function mount($events = null, $news= null,$press=null){
        //Category ID
        // id= 1 Events
        // id= 2 News
        // id= 3 Press
        if(!($events == null || $news == null || $press == null ))
        {
            $this->events= $events;
            $this->news=$news;
            $this->press= $press;
        }
        else
        {
            $this->events = Category::with(['posts' => function($query) {
                $query->orderBy('created_at', 'desc');
            }])->find(1)->posts->take(2);

            $this->news = Category::with(['posts' => function($query) {
                $query->orderBy('created_at', 'desc');
            }])->find(2)->posts->take(6);

            $this->press = Category::with(['posts' => function($query) {
                $query->orderBy('created_at', 'desc');
            }])->find(3)->posts->take(7);
        }
        
       
    }
    public function render()
    {
        return view('livewire.front.home.post-list',['events'=>$this->events,'news'=>$this->news,'press'=>$this->press]);
    }
}
