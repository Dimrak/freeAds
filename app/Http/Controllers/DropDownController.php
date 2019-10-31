<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropDownController extends Controller
{
    public function index()
    {
        $categories = DB::table("categories")->pluck("title","id");
        return view('index',compact('categories'));
    }

    public function getStateList(Request $request)
    {
        $states = DB::table("states")
            ->where("country_id",$request->country_id)
            ->pluck("name","id");
        return response()->json($states);
    }

    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
        return response()->json($cities);
    }
}
