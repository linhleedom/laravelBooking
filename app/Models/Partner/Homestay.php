<?php

namespace App\Models\Partner;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $table = 'homestays';
    // public $timestamps = false ; //Nếu sử dụng thì created_at thì true nhưng k cần sử dụng  
    protected $primaryKey = 'id';
}
