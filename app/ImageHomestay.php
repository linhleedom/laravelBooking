<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageHomestay extends Model
{
    protected $table = 'images_homestay';

    public function product(){
        return $this->belongsTo('App\Homestay', 'homestay_id','id');
    }
}
