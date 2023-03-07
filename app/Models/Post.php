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
}
