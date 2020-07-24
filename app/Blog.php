<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function ward(){
        return $this->belongsTo('App\Ward', 'ward_id','id');
    }
    public function image(){
        return $this->hasMany('App\Image', 'blog_id','id');
    }
}
