<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilities extends Model
{
    protected $table = 'utilities';

    public function product(){
        return $this->belongsToMany('App\Product', 'uti_pro','product_id','utilities_id');
    }
}
