<?php

namespace App\Models\Page;

use App\Models\page\PageTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    public function template()
    {
        return $this->belongsTo(PageTemplate::class,'template_id','id');
    }
    
    public function blocks()
    {
        return $this->hasMany(PageBlock::class,'section_id','id');
    }
}
