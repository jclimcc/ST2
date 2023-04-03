<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\Category;
use Livewire\Component;

class MediaPostSingleSideWidgetPage extends Component
{
    public $category_id;
    public $category_title;
    public $category_slug;
    public $recentCategoryPosts;

    public function mount($category_id, $category_title, $category_slug){
        $this->category_id= $category_id;
        $this->category_title= $category_title;
        $this->category_slug= $category_slug;

        $this->recentCategoryPosts = Category::with(['posts' => function($query) {
            $query->orderBy('created_at', 'desc');
        }])->find($category_id)->posts->take(10);

    }
    public function render()
    {
        return view('livewire.front.page.media-post-single-side-widget-page',[
            'category_title'=>$this->category_title,
            'category_slug'=>$this->category_slug,
            'recentCategoryPosts'=>$this->recentCategoryPosts]);
    }
}
