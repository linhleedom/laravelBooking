<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageHomestay extends Model
{
    protected $table = 'images_homestay';
    protected $fillable = ['id', 'url', 'homestay_id', 'status'];

    public function homestay(){
        return $this->belongsTo('App\Homestay', 'homestay_id','id');
    }
}
