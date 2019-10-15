<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCity;
use App\City;

class CityController extends Controller
{
    /**
     * Display a advert-listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['cities'] = City::all();
       return view('city.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['title'] = 'Add a city';
       return view('city.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCity $request)
    {
//        $validatedData = $request->validate([
//            'cityName' => 'required:unique:cities|max:50',
////            'body' => 'required',
//        ]);
        $validated = $request->validated();
        $city = new City();
        $city->name = $validated['name'];
        $city->save();
        return redirect()->route('city.create')->with('message', 'City added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
