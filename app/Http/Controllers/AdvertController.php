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
    public function create(Request $request)
    {
//        dd($request->category);
        if (!$request->category == 0){
            $category = Category::all()->where('id', $request->category)->first();
            $catTitle = Category::all()->where('id', $category->parent_id)->first();
            $data['category_id'] = $category->id;
            $data['setter_id'] = $category->attribute_set_id;
            $data['secondSubCategories'] = Category::all()->where('parent_id', $category->id);
            $data['cities'] = City::all();
            $data['title'] = $catTitle->title . '/' . $category->title;
            $data['attributeSetRel'] = AttributeSetRelationship::all()->where('attribute_set_id', $category->attribute_set_id);
            return view('adverts.create', $data);
        }else{
            $data['category'] = $request->category;
            return redirect()->route('advert.createSub', $data)->with('message', 'Choose a subcategory');
        }

    }
    public function createTemplate()
    {
       $data['parentCategories'] = Category::all()->where('parent_id', 0);
       return view('adverts.createTemplate', $data);
    }
    public function createSub(Request $request)
    {
        if (!$request->category == 0){
            $parentCategory = Category::all()->where('id', $request->category);
            $data['parent'] = $parentCategory;
            $data['subCategories'] = Category::all()->where('parent_id', $request->category);
            return view('adverts.createSub', $data);
        }else{
            return redirect()->route('advert.createTemplate')->with('message', 'Choose a category');
        }


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
    public function store(Request $request)
    {
//        dd($request->categoryFinal);
       $advert = new Advert();
       //valores derecha son los del form
       $advert->title = $request->title;
       $advert->content = $request->content_text;
       $advert->cat_id = $request->categoryFinal;
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
//        dd($advert->cat_id); //479
        $secondSub = Category::all()->where('id', $advert->cat_id)->first();
//       $subCategory = Category::all()->where('parent_id', $secondSub->parent_id)->();
//       $subCategory = Category::find($secondSub->parent_id,'parent_id')->first();
       $subCategory = Category::all()->where('id', $secondSub->parent_id)->first();
//        dd($subCategory->title);
        $category = Category::all()->where('id', $subCategory->parent_id)->first();
//         dd($category->title);
        $data['cat'] = $category->title;
       $data['secondSub'] = $secondSub->title;
       $data['sub'] = $subCategory->title;
       $data['comments'] = Comment::all();
       $data['users'] = User::all();
//       dd($data);
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

       $advert = Advert::find($id);
       $advert->title = $request->title;
       $advert->content = $request->content_text;
       $advert->cat_id = $advert->cat_id;
       $advert->price = $request->price;
       $advert->attribute_set_id = $advert->attribute_set_id;
       $advert->slug = Str::slug($request->title);
       $advert->save();

       $attributes = AttributeSetRelationship::all()->where('attribute_set_id',$advert->attribute_set_id);
       $counter = 0;
       foreach($attributes as $single){
             $att = new AttributesValue();
             $att->attribute_id = $single->attribute_id;
             $att->advert_id = $advert->id;
             if (empty($request->att0)){
               $att->value = 'no';
             }else {
                $att->value = $request->att0;
             }
             $att->save();
             $counter++;
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
