<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
     	return view('admin.login.login');
    }
	public function getLoginAgain(){
	    return view('admin.login.loginagain');
	}
}
