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
        $validatedData = $request->validate([
            'family' => 'required',
        ]);

        if ($validatedData['family'] !== 'Choose a family attribute') {
           $keys = $request->keys();
           foreach ($keys as $key) {
              if (strpos($key, 'att') !== false) {
                 $attributeID = str_replace('att', '', $key);
                 $family = AttributeSetRelationship::all()->where('attribute_id', $attributeID);
                 foreach ($family as $item => $value) {
                    if ($value->attribute_set_id == $request->family && $value->attribute_id == $attributeID && $value->active != 0) {
                       return redirect()->route('admin.attributes')->with('messageError', 'That attribute is already assigned');
                    }elseif($value->attribute_set_id == $request->family && $value->attribute_id == $attributeID && $value->active == 0){
//                       $newFamily = new AttributeSetRelationship();
                       $family = AttributeSetRelationship::all()->where('attribute_set_id', $request->family)
                          ->where('attribute_id',$attributeID)->first();
//                       $family = AttributeSetRelationship::all()->where('attribute_id', $attributeID)->where('attribute_id',$attributeID)->first();
//                       dd($family);
//                       $family->attribute_id = $attributeID;
//                       $family->attribute_set_id = $request->family;
                       $family->active = 1;
                       $family->save();
                       return redirect()->route('admin.attributes')->with('message', 'Updated');

                    }
                 }
                 $newFamily = new AttributeSetRelationship();
                 $newFamily->attribute_id = $attributeID;
                 $newFamily->attribute_set_id = $request->family;
                 $newFamily->save();
              }
           }
           return redirect()->route('admin.attributes')->with('message', 'Attribute family ' . $request->name . ' updated');
        }else{
           return redirect()->route('admin.attributes')->with('messageError', 'Please choose a family attribute');
        }
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
               if ($att_rela = AttributeSetRelationship::all()->where('attribute_set_id', $request->family)
                  ->where('attribute_id',$attributeID)->first() != true){
                  return back()->with('messageError', 'That attribute is not assigned');
               }elseif ($att_rela = AttributeSetRelationship::all()->where('attribute_set_id', $request->family)
                  ->where('attribute_id',$attributeID)->first()->active == 0){
                  return back()->with('messageError', 'That attribute is already not active');
               }
               else {
                  $att_rela = AttributeSetRelationship::all()->where('attribute_set_id', $request->family)
                     ->where('attribute_id', $attributeID)->first();
                  $att_rela->active = 0;
                  $att_rela->save();
               }
            }
        }
      return back()->with('message', 'Attribute family ' . $request->name . ' updated');;
    }
}
