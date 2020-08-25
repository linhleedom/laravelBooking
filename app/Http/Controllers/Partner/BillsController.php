<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bill;

class BillsController extends Controller
{
    function getListBills(){

        $list_Bill = Bill::where('user_id',Auth::user()->id)->get();

        return view ('partner.my_order.list-bills',compact('list_Bill'));
    }

}
