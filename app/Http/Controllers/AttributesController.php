<?php

namespace App\Http\Controllers;

use App\AttributeSet;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    public function __construct()
    {

    }

    public function store(Request $request)
    {
//        dd($request);
        $newFamily = new AttributeSet();
        $newFamily->name = $request->name;
        $newFamily->save();
        return redirect()->route('admin.attributes')->with('message', 'Attribute set created');

    }
}
