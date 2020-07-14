<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public function order(){
        return $this->hasMany('App\Order', 'bill_id','id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id','id');
    }
}
