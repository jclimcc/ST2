<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;
    public $timestamps = false;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['tag', 'id']
            ]
        ];
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function the_permalink(){

        return url('media/tags/'.$this->id.'/'.$this->slug.'/all');
        //media-tag-all.blade.. is hardcode the link
    }

    
}
