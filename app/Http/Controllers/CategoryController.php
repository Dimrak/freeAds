<?php

namespace App\Http\Controllers;

use App\Advert;
use App\AttributeSet;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStore;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

//use Illumintate\Http\RedirectResponse;
//use Illuminate\Routing\Redirector;
//use App\Helper;

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
        $adverts = Advert::where('active',1)->orderBy('created_at', 'desc')->take(4)->get();
        $data['categories'] = $categories;
        $data['adverts'] = $adverts;
        $counter = [];
        $data['counter'] = $counter;
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
            $categories = Category::all()->where('parent_id', 0);
            $attribute_set = AttributeSet::all();
//          dd($attribute_set);
            $data['att_set'] = $attribute_set;
            $data['categories'] = $categories;
            return view('category.create', $data);
        } else {
            echo 'No permissions';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
//        $data = request->validate([
//            'title' => 'required|max:50|unique:categories',
//         ]);
        $validated = $request->validated();
        $category = new Category();
        $category->title = $validated['title'];
        $slug = Str::slug($request->title, '-');
        $category->slug = $slug;
        $category->image = $request->image;
        $category->parent_id = $request->parent_id;
        $category->attribute_set_id = $request->attribute;
        $category->save();
        return redirect()->back()->with('message', 'Category created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data['category'] = $category;
        $data['id'] = $category->id;
        return view('category.single', $data);
    }

    public function showSub(Category $subCategory)
    {
        $fatherData = Category::all()->where('id', $subCategory->parent_id);
        $dataFather = [];
        foreach ($fatherData as $dataArray) {
            $slug = $dataArray->slug;
            array_push($dataFather, $slug);
        }
        $data['father'] = $dataFather[0];
        $data['subCategory'] = $subCategory;
        $data['id'] = $subCategory->id;
//       dd($data);
        return view('category.single-sub', $data);
    }

    public function showSubSub(Category $secondSub)
    {
        $parentId = $secondSub->parent_id;
        $firstParent = Category::all()->where('id', $parentId);
        $dataFirst = [];
        foreach ($firstParent as $dataArray) {
            $slug = $dataArray->slug;
            $fatherId = $dataArray->parent_id;
            array_push($dataFirst, $slug);
            array_push($dataFirst, $fatherId);
        }
        $fatherData = Category::all()->where('id', $dataFirst[1]);
        $dataFather = [];
        foreach ($fatherData as $data) {
            $slug = $data->slug;
            array_push($dataFather, $slug);
        }
        $data['father'] = $dataFather[0];
        $data['firstParent'] = $dataFirst[0];
        $data['secondSub'] = $secondSub;
        $data['id'] = $secondSub->id;
        return view('category.second-sub', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param \Illuminate\Http\Request $request
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
