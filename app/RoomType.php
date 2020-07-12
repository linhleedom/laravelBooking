<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';

    public function roomType(){
        return $this->hasMany('App\Product', 'room_type_id','id');
    }
}
