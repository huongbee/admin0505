<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slide";
    public $timestamps = false;
    
    public $fillable = [
        'image',
        'link',
        'title',
        'status'
    ];
}
