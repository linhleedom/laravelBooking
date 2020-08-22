<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePartnerController extends Controller
{
    public function getHomePartner()
    {
        return view ('partner.trangchu');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('partner/login-partner');
    }
}
