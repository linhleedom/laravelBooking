<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';

    public function user(){
        return $this->hasMany('App\User', 'ward_id','id');
    }
    public function homestay(){
        return $this->hasMany('App\Homestay', 'ward_id','id');
    }
    public function blog(){
        return $this->hasMany('App\Blog', 'ward_id','id');
    }
    public function district(){
        return $this->belongsTo('App\District', 'district_id','id');
    }

}
