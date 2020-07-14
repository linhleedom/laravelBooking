<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function order(){
        return $this->belongsTo('App\Product', 'product_id','id');
    }
    public function bill(){
        return $this->belongsTo('App\Bill', 'bill_id','id');
    }

}
