<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $table = 'homestays';

    protected $fillable = ['id', 'name', 'alias', 'avtar', 'keyword(SE0)', 'status', 'user_id', 'matp', 'maqh','xaid','title','description','point'];

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


    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }


}
