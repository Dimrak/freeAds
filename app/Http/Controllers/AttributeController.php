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
   public function destroy($id)
   {
//      dd($id);
      $attribute = Attribute::find($id);
//      dd($advert);
      $attribute->destroy();
      $attribute->save();
      $user = Auth::user();
      if($user && ($user->hasRole('admin'))){
         return redirect()->action('AdminController@index');
      }else{
         return redirect()->action('HomeController@index');
      }
   }
}
