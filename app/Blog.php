<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function ward(){
        return $this->belongsTo('App\Ward', 'xaid','xaid');
    }
    public function image(){
        return $this->hasMany('App\ImageBlog', 'blog_id','id');
    }
}
