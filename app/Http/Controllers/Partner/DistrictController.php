<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Province;

class DistrictController extends Controller
{
    public function showProvinceInDistrict(Request $request)
	{
		if ($request->ajax()) {
			$Province = Province::whereDistrict($request->matp)->select('matp', 'name')->get();

			return response()->json($Province);
		}
	}
}
