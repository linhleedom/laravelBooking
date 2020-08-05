<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $table = 'homestays';

    public function product(){
        return $this->hasMany('App\Product', 'homestay_id','id');
    }
    public function rating(){
        return $this->hasMany('App\Rating', 'homestay_id','id');
    }
    public function image(){
        return $this->hasMany('App\ImageHomestay', 'homestay_id','id');
    }
    public function province(){
        return $this->belongsTo('App\Province', 'matp','matp');
    }
    public function district(){
        return $this->belongsTo('App\District', 'maqh','maqh');
    }
    public function ward(){
        return $this->belongsTo('App\Ward', 'xaid','xaid');
    }
}
