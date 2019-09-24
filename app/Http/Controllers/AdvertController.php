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
      $data['adverts'] = Advert::paginate(3);
      //$data['content'] = Str::words($adverts->content, 20,'...');
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
       $user = Auth::user()->id;
       $advert->user_id = $user;
       $advert->price = $request->price;
       $advert->slug = Str::slug($request->title, '-');
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
       $id = $advert->user_id;
       $user = User::find($id);
       $data['user'] = $user;
//       $data['users'] = User::all();
//       dd($advert->id);
       return view('adverts.single', $data);
    }

    public function byUser($id)
    {
        $adverts = Advert::all()->where('user_id', $id);
        $user = User::find($id);
        $data['adverts'] = $adverts;
        $data['user'] = $user;
        return view('adverts.byUser', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Check the id of the user and compares with the author_id
        $id_user = Auth::user()->id;
        $advert = Advert::find($id);
       if ($id_user == $advert->user_id || $id_user == 1) {
           $data['advert'] = $advert;
           $data['attribute_sets'] = AttributeSet::all();
           $data['categories'] = Category::all();
           $x = 0;
           $data['counter'] = $x;
           return view('adverts.edit', $data);
       }else{
           return redirect()->back()->with('message', 'Cannot edit adverts which are not yours');
       }
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
       $advert = Advert::find($id);
       $advert->title = $request->title;
       $advert->content = $request->content_text;
       $advert->cat_id = $advert->cat_id;
       $advert->price = $request->price;
       $advert->attribute_set_id = $advert->attribute_set_id;
       $advert->slug = Str::slug($request->title);
       $advert->save();

       //Attributes saving
       $keys = $request->keys();
           foreach ($keys as $key){
            // strpos(original_str, search_str, start_pos)
               if(strpos($key, 'att')!== false){
//                   str_replace ( $searchVal, $replaceVal, $subjectVal, $count )
                   $attributeID = str_replace('att','',$key);
                   $att = new AttributesValue();
                   $att->attribute_id = $attributeID;
                   $att->advert_id = $advert->id;
                   $att->value = $request->$key;
                   $att->save();
               }
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
       $advert = Advert::find($id);
       $advert->destroy($id);
       $user = Auth::user();
      if($user && ($user->hasRole('admin'))){
         return redirect()->action('AdminController@index')->with('message', 'Advert deleted');
      }else{
         return redirect()->action('HomeController@index')->with('message', 'Advert deleted');
      }
   }
    public function disable($id)
    {
      $advert = Advert::find($id);
      $advert->active = 0;
      $advert->save();
//      return redirect()->back()->with('message', 'Advert disable');
      return redirect()->route('advert.index')->with('message', 'Advert disable');

    }
}
