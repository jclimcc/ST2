<?php

namespace App\Models\page;

use App\Models\Page\PageSection;
use App\Models\SeoMetadata;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTemplate extends Model
{
    use HasFactory;

    public function sections()
    {
        return $this->hasMany(PageSection::class,'template_id','id');
    }

    public function seo_page()
    {
        return $this->hasOne(SeoMetadata::class,'template_id','id')->where('page_type','page');
    }
}
