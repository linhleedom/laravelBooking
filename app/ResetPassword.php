<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    const UPDATED_AT = null;
    protected $table = 'password_resets';

    protected $fillable = ['email','token'];
}
