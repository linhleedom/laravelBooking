<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    public function district(){
        return $this->hasMany('App\District', 'province_id','id');
    }
}
