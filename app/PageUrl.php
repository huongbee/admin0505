<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageUrl extends Model
{
    protected $table = "page_url";

    function product(){
        return $this->hasOne('App\Products','id_url','id');
    }

    function category(){
        return $this->hasOne('App\Categories','id_url','id');
    }
    
}
