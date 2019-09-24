<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;

class AttributeController extends Controller
{
    public function store(Request $request)
    {
//        dd($request);
        $newFamily = new Attribute();
        $newFamily->name = $request->name;
        $newFamily->type_id = $request->type;
        $newFamily->save();
        return redirect()->route('admin.attributes')->with('message', 'Attribute ' . $request->name . ' created');

    }
}
