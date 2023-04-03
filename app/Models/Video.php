<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    function my_custom_time_format($datetime, $format) {
        $date = date($format, strtotime($datetime));
        return $date;
    }
    public function the_time($format ='jS F Y' ){
        return $this->my_custom_time_format($this->created_at, $format);
    }

    
}
