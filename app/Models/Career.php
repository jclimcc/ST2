<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    public function jobApplicants()
    {
        return $this->hasMany(JobApplicant::class);
    }

    public function the_permalink(){

      
        return url('career/job/'.$this->id.'/'.str_slug($this->title));
    }
}
