<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function district(){
        return $this->belongsTo('App\District', 'maqh','maqh');
    }
    public function image(){
        return $this->hasMany('App\ImageBlog', 'blog_id','id');
    }
}
