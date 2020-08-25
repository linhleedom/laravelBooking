<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    public function user(){
        return $this->belongsTo('App\User', 'user_id','id');
    }
    public function homestay(){
        return $this->belongsTo('App\Homestay', 'homestay_id','id');
    }
    public function bill(){
        return $this->belongsTo('App\Bill', 'bill_id','id');
    }
}
