<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::parents()->active()->get();
        $adverts = Advert::orderBy('created_at', 'asc')->take(1)->get();
        $data['categories'] = $categories;
        $data['adverts'] = $adverts;
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $user = Auth::user();
       if ($user && $user->hasRole('admin')) {
          $categories = Category::all();
//       $adverts = Advert::all();
          $data['categories'] = $categories;
          return view('category.create', $data);
       }else{
          echo 'No permissions';
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $category = new Category();
       $category->title = $request->title;
       $slug = Str::slug($request->title, '-');
       $category->slug = Str::slug($slug);
       $category->image = $request->image;
       $category->parent_id = $request->parent_id;
       $category->save();
       //este back es para mandarle de vuelta
       //rename
       return redirect()->back()->with('message', 'Category created');

    }
    public function categories()
    {
        $data['categories'] = Category::all();
        return view('category.categories', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
//       dd($category->advertsCat());
       $data['category'] = $category;
//        $data['title'] = 'Adverts from ' . $categories->title;
       return view('category.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       $data['category'] = $category;
       $data['categories'] = Category::all();
       $data['title'] = 'Edit category';
       return view('category.edit', $data);
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
       $category = Category::find($id);
       $category->title = $request->title;
       $category->parent_id = $request->parent_id;
       $category->slug = Str::slug($request->title, '-');
       $category->save();
       return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
