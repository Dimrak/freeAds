<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttributeSetRelationship;
use App\Attribute;
use App\AttributeSet;

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
    public function edit($id)
    {
        $data['family'] = $id;
        $data['att_set'] = AttributeSet::all();
        $data['attributesRela'] = AttributeSetRelationship::all()->where('active',1);
        $data['attributes'] = Attribute::all();
//        dd($data);
        return view('admin.attSetRela', $data);
    }
    public function update(Request $request)
    {
        $keys = $request->keys();
        foreach ($keys as $key){
            if(strpos($key, 'att')!== false){
                $attributeID = str_replace('att','',$key);
//                $family = AttributeSetRelationship::all()->where('attribute_set_id', $request->family);
                $att_rela = AttributeSetRelationship::all()->where('attribute_set_id', $request->family)
                ->where('attribute_id',$attributeID)->first();
                $att_rela->active = 0;
                $att_rela->save();
            }
        }

    }
}
