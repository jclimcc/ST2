<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\Tag;
use Livewire\Component;

class MediaTagAll extends Component
{

    public $tags;
 

    public function mount(){     
    
        $this->tags = Tag::withCount('posts')
        ->has('posts')
        ->orderBy('created_at', 'desc')
        ->get();


       
       
    }
 
    
    public function render()
    {
        
        $groupedTags = $this->tags->groupBy(function ($tag) {
            return strtoupper(substr($tag->tag, 0, 2));
        });
      
        $sortedGroups = $groupedTags->sortKeys()->toArray();
        return view('livewire.front.page.media-tag-all',[            
            'tags'=>$this->tags,
            'sortedGroups'=>$sortedGroups,
            'groupedTags'=>$groupedTags,
        ]);
    }

  
}

