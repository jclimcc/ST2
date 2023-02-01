<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public static function banners(){

        return Banner::where('status','1')->orderBy('sequence','ASC')
        ->orderBy('id','ASC')->get()->toArray();
    }


}
