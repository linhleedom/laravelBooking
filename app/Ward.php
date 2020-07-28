<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';

    public function user(){
        return $this->hasMany('App\User', 'xaid','xaid');
    }
    public function homestay(){
        return $this->hasMany('App\Homestay', 'xaid','xaid');
    }
    public function blog(){
        return $this->hasMany('App\Blog', 'xaid','xaid');
    }
    public function district(){
        return $this->belongsTo('App\District', 'maqh','maqh');
    }

}
