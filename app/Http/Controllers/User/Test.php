<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\user\mailInfor;
use App\Bill;

class Test extends Controller
{
    public function index(){
        // $mail = 'leduylinh1998.nc@gmail.com';
        $bill = Bill::findOrFail(5);

        // Ship order...

        Mail::to($bill->email)->send(new mailInfor($bill));
    }
}
