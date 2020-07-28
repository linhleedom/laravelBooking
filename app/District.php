<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    public function ward(){
        return $this->hasMany('App\Ward', 'maqh','maqh');
    }
    public function provice(){
        return $this->belongsTo('App\Provice', 'matp','matp');
    }
}
