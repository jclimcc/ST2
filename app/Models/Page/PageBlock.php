<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBlock extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(PageSection::class,'section_id','id');
    }
    
}
