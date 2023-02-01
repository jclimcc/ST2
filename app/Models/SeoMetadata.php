<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMetadata extends Model
{
    use HasFactory;

    public function template()
    {
        return $this->belongsTo(PageTemplate::class,'template_id','id');
    }
}
