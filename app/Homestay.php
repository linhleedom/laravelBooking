<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $table = 'homestays';

    public function product(){
        return $this->hasMany('App\Product', 'homestay_id','id');
    }
    public function address(){
        return $this->belongsTo('App\Ward', 'xaid','id');
    }
    public function rating(){
        return $this->hasMany('App\Rating', 'homestay_id','id');
    }
    public function image(){
        return $this->hasMany('App\ImageHomestay', 'homestay_id','id');
    }
}
