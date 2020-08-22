<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Uti_Pro extends Model
{
    protected $table = 'uti_pro';
    protected $fillable = ['id', 'product_id', 'utilities_id'];
    
}
