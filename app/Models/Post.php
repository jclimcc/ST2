<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use HasFactory;
    use Sluggable;
 
    protected $fillable = [
        'user_id',
        'title', 
        'slug', 
        'excerpt', 
        'body',  
        'featured', 
        'image', 
    ];
    protected $casts = [
        'created_at' => 'datetime:F j,Y g:i a',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id'],
            ]
        ];
    }


    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    
    
    public function seo_page()
    {
        return $this->hasOne(SeoMetadata::class,'template_id','id')->where('page_type','post');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFeatured($query){
        return $query->where('featured', true);
    }

    public function previousPost(){
        return  Post::where('id', '<', $this->id)->orderBy('id','desc')->first();
    }

    public function nextPost(){
        return Post::where('id', '>', $this->id)->orderBy('id')->first();
    }
   
    public function the_author(){
        return $this->user->name;
    }
    function my_custom_time_format($datetime, $format) {
        $date = date($format, strtotime($datetime));
        return $date;
    }
    public function the_time($format ='jS F Y' ){
        return $this->my_custom_time_format($this->created_at, $format);
    }

    public function the_tags(){
    
        $string= "";
        foreach($this->tags as $tag)
        {
            $string.='<a href="'.$tag->the_permalink().'">'.$tag->tag.'</a>';
        }
        return $string;
       }
    public function the_related_post(){
        $tags = $this->tags()->pluck('tags.id');
      
        // Find related posts based on shared tags
        $relatedPosts = Post::whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('tags.id', $tags);
        })->where('posts.id', '<>', $this->id)
          ->orderBy('created_at', 'desc')
          ->take(4)
          ->get();
          return $relatedPosts;
    }
    public function get_the_post_image_url()
    {       
        return url('front/posts/'.$this->image); 
    }    
    public function the_permalink(){

      
        return url('media/'.$this->categories[0]->slug.'/'.$this->id.'/'.$this->slug);
    }
}
