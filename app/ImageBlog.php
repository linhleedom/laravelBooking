<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageBlog extends Model
{
    protected $table = 'images_blog';

    public function product(){
        return $this->belongsTo('App\Blog', 'blog_id','id');
    }
}
