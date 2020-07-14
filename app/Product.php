<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function roomType(){
        return $this->belongsTo('App\RoomType', 'room_type_id','id');
    }
    public function homestay(){
        return $this->belongsTo('App\Homestay', 'homestay_id','id');
    }
    public function utilities(){
        return $this->belongsToMany('App\Utilities', 'uti_pro','product_id','utilities_id');
    }
    public function order(){
        return $this->hasMany('App\Order','product_id','id');
    }

}
