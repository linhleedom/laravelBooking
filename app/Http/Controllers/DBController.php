<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DBController extends Controller
{
   public function getDashBoard()
   {
   	return view('admin.dashboard');
   }
}
