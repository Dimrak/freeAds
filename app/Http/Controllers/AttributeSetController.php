<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttributeSet;

class AttributeSetController extends Controller
{
    //
    public function store(Request $request)
    {
//        dd($request);
        $newFamily = new AttributeSet();
        $newFamily->name = 'att_' . $request->name;
        $newFamily->save();
        return redirect()->route('admin.attributes')->with('message', 'Attribute set created');

    }
}
