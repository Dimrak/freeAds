<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\AttributeSet;
use App\AttributeSetRelationship;

class AttributeSetRelaController extends Controller
{
    public function store(Request $request)
    {
        $keys = $request->keys();
//        dd($keys);
        foreach ($keys as $key){
            if(strpos($key, 'att')!== false){
                $attributeID = str_replace('att','',$key);
                $newFamily = new AttributeSetRelationship();
//                dd($attributeID);
                $newFamily->attribute_id = $attributeID;
                $newFamily->attribute_set_id = $request->family;
                $newFamily->save();
            }
        }
        return redirect()->route('admin.attributes')->with('message', 'Attribute family ' . $request->name . ' updated');
    }
}
