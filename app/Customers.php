<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table = "customers";

    function bills(){
        return $this->hasMany('App\Bills','id_customer','id');
    }

    function billDetail(){
        return $this->hasManyThrough('App\BillDetail','App\Bills','id_customer','id_bill','id','id');
    }
    
}
