<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancelBill extends Model
{
    const UPDATED_AT = null;
    protected $table = 'cancel_bill';
    protected $fillable = ['bill_id','token'];
}
