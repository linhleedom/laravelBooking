<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $table = 'homestays';

    public function product(){
        return $this->hasMany('App\Product', 'homestay_id','id');
    }
}
