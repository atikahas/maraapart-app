<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function getState(Request $request) {
        $state = DB::table('dd_state')->where($request->all())->get();
        return response()->json($state);
    }

    public function getDistrict(Request $request) {
        $district = DB::table('dd_district')->where($request->all())->get();
        return response()->json($district);
    }
}
