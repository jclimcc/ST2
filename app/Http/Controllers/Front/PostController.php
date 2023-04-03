<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $pageURL;

    public $press;
    public $news;
    public $events;

    public function mediaAll()
    {
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
        return view("front.media.posts-all",[
            'pageURL'=>$this->pageURL,
            'events'=>$this->events,
            'news'=>$this->news,
            'press'=>$this->press
        ]);
       
    }
    public function mediaCategoryPost($category_slug)
    {
        $category = Category::where('slug',$category_slug)->first();

       
        $this->pageURL= 'media-category-all';

      
        return view("front.media.category-all",[
            'pageURL'=>'media-'.$category_slug.'-all',
            'category'=>$category,
        ]);
    }

    public function mediaTagAll()
    {
        $tag = Tag::first();

      
        $this->pageURL= 'media-tag-all';
        return view("front.media.tag-all",[
            'pageURL'=>'media-tag-all',
            'tag'=>$tag,
        ]);
    }

    public function mediaTagFilter($tag_id,$tag_slug)
    {
        $tag = Tag::where('slug',$tag_slug)->first();

      
        $this->pageURL= 'media-tag-filter';
        return view("front.media.tag-filter",[
            'pageURL'=>'media-tag-filter',
            'tag'=>$tag,
        ]);
    }

    public function mediaPost($category= null,$post_id= null,$slug =null)
    {
        if(!($category=='events'|| $category=='news'|| $category=='press'))
        {               
            return redirect('media/all')->with('error','Article Not Found..');
        }
        if($post_id==null){
            return redirect('media/all')->with('error','Article Not Found..');
        }
        else
        {
            
            // Load the current post
            $post = Post::with(['categories','tags'])->find($post_id);
            
            // Get the next and previous posts
            $next_post = Post::select('posts.id', 'posts.title', 'posts.slug')
                        ->where('posts.id', '>', $post_id)
                        ->whereHas('categories', function ($query) use ($post) {
                            $query->whereIn('categories.id', $post->categories()->pluck('categories.id'));
                        })
                        ->join('category_post', 'posts.id', '=', 'category_post.post_id')
                        ->join('categories', 'categories.id', '=', 'category_post.category_id')
                        ->orderBy('posts.id')
                        ->first();
            
            $prev_post = Post::select('posts.id', 'posts.title', 'posts.slug')
                        ->where('posts.id', '<', $post_id)
                        ->whereHas('categories', function ($query) use ($post) {
                            $query->whereIn('categories.id', $post->categories()->pluck('categories.id'));
                        })
                        ->join('category_post', 'posts.id', '=', 'category_post.post_id')
                        ->join('categories', 'categories.id', '=', 'category_post.category_id')
                        ->orderByDesc('posts.id')
                        ->first();


            $relatedPosts= $post->the_related_post();

            return view("front.media.single-post",[
                'pageURL'=>'single-post',
                'post'=>$post,
                'category'=>$post->categories->first(),
                'page_title' => $post->title,
                'page_description' => $post->excerpt,
                'page_image' => $post->get_the_post_image_url(),
                'next_post' => $next_post,
                'prev_post' => $prev_post,
                'related_posts'=>$relatedPosts
            ]);
        }
    }
}
