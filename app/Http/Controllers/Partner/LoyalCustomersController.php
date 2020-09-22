<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Bill;

class LoyalCustomersController extends Controller
{
    public function index(){
        $payment = Bill::where('status',2)
                        ->get();
        $payment2 = Bill::all();
        $listBill = Bill::GroupBy('email')
                            ->get();
        return view ('partner.loyalcustomers.listloyalcustomers',compact('listBill','payment','payment2')); 
    }
}
