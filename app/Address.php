<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';

    public function district(){
        return $this->hasMany('App\Address', 'parent_id','id');
    }
    public function province(){
        return $this->belongsTo('App\Address', 'parent_id','id');
    }
    public function user(){
        return $this->hasMany('App\User', 'address_id','id');
    }
    public function homestay(){
        return $this->hasMany('App\Homestay', 'address_id','id');
    }

}
