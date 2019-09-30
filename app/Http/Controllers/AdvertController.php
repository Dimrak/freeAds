<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Attribute;
use App\AttributesValue;
use App\Category;
use App\Comment;
use App\City;
use App\User;
use App\AttributeSet;
use App\AttributeSetRelationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

//Hello from server to New linux installed on Marija's computer

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//       $data['adverts'] = Advert::active()->paginate(2);
      $data['adverts'] = Advert::paginate(4);
//        $data['content'] = Str::words($adverts->content, 20,'...');
      return view('adverts.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['cities'] = City::all();
        $data['title'] = 'Create advert';
        $data['attributeSets'] = AttributeSet::all();
        $data['attributes'] = Attribute::all();

//        $attributes = new AttributeSet();
//        dd($attributes->relationCategory());

        return view('adverts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function imageUp(){
        return view('testing.file');
    }
    public function store2(Request $request)
    {
        $request->logo->store('logos');
    }
    public function store(Request $request)
    {
       $advert = new Advert();
       //valores derecha son los del form
       $advert->title = $request->title;
       $advert->content = $request->content_text;
       $advert->cat_id = $request->category;
        $advert->image = $request->image;
       $advert->city_id = $request->city;
       $user = Auth::user();
//       dd($user);
       $advert->user_id = $user->id;
       $advert->price = $request->price;
       $advert->slug = Str::slug($request->title, '-');
       $advert->counter = 0;
       $advert->save();
       $slug = $advert->slug;
       return redirect()->route('advert.show', $slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
       $data['advert'] = $advert;
       $data['comments'] = Comment::all();
       $data['users'] = User::all();
       return view('adverts.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $advert = Advert::find($id);
       $data['advert'] = $advert;
       $data['attribute_sets'] = AttributeSet::all();
       $data['att_set'] = AttributeSet::all();
       $data['attributes'] = AttributeSetRelationship::all()->where('attribute_set_id',$advert->attribute_set_id);
       $data['attributesRela'] = AttributeSetRelationship::all()->where('attribute_set_id',$advert->attribute_set_id);
       $data['categories'] = Category::all();
       $x = 0;
       $data['counter'] = $x;
       return view('adverts.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//       if (!isset($request->att1)){
//          $request->att1 = 'no';
//          dd($request->att1);
//       }
//        dd($request);
       //Updates the advert details
       $advert = Advert::find($id);
       $advert->title = $request->title;
       $advert->content = $request->content_text;
       $advert->cat_id = $advert->cat_id;
       $advert->price = $request->price;
       $advert->attribute_set_id = $advert->attribute_set_id;
       $advert->slug = Str::slug($request->title);
       $advert->save();
       //Save attribute values
      //id	bigint(20) unsigned Auto Increment
      //attribute_id	int(11)
      //advert_id	int(11)
      //value	varchar(255)
      //created_at	timestamp NULL
      //updated_at	timestamp NULL

       $attributes = AttributeSetRelationship::all()->where('attribute_set_id',$advert->attribute_set_id);
//       dd($attributes);
       $counter = 0;
       foreach($attributes as $single){
//          for ($i = 0; $i <= count($attributes); $i++) {
//             dd($i);
             $att = new AttributesValue();
             $att->attribute_id = $single->attribute_id;
             $att->advert_id = $advert->id;
             if (empty($request->att0)){
               $att->value = 'no';
             }else {
                $att->value = $request->att0;
             }
//             $value = $request->att . $i;
////
////             dd($request);
//             $value = $request->att[$i];
//             $att->value = $request->att.$i;

//             if ($value == 0){
//                $att->value = 'no';
//             }else{
//                $att->value = 'yes';
//             }
//             dd($value);
//             foreach ($value as $key => $single){
////               dd($single);
//             }
//             if (!empty($value)){
//                $value = 'no';
//                $att->value = $value;
//             }else{
//                $att->value = 'yes';
//             }
//              dd($request->att1);
//             $attribuSingle = $request->att . $i;
//             dd($attribuSingle);
//             $att->value = $attribuSingle;
             $att->save();
             $counter++;
//             dd($i);
//          }
//          dd($request->att.$counter);
       }
       return redirect()->route('advert.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   {
//      dd($id);
      $advert = Advert::find($id);
//      dd($advert);
      $advert->active = 0;
      $advert->save();
      $user = Auth::user();
      if($user && ($user->hasRole('admin'))){
         return redirect()->action('AdminController@index');
      }else{
         return redirect()->action('HomeController@index');
      }
   }

    public function disable($id)
    {
//       dd('hel');
       $id;
       $advert = Advert::find($id);
      $advert->active = 0;
      $advert->save();
      return redirect()->route('advert.index')->with('Advert disable');

    }
}
