<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = "bills";
    
    function customer(){
        return $this->belongsTo('App\Customers','id_customer','id');
    }

    
}
