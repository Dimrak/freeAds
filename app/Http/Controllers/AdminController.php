<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Attribute;
use App\AttributeSet;
use App\AttributeSetRelationship;
use App\Category;
use App\Message;
use App\User;
use App\MessageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = Auth::user();
       if ($user->hasRole('admin')) {
          return view('admin.index');
       }else{
          echo "Access denied";
       }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $users = User::all();
       $types = MessageType::all();
       $data['users'] = $users;
       $data['types'] = $types;
       return view('admin.message', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $message = new Message();
      $message->subject = $request->subject;
      $message->message = $request->message;
      $message->recip_id = $request->user;
      $user = Auth::user();
      $message->sender = $user->id;
      $message->active = 1;
      $message->seen = date("Y/m/d");
      $message->status = 1;
      $message->type = $request->type;
      $message->save();
       return redirect()->route('admin.index')->with('message', 'Message sent');
    }
    public function sendMessage(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.show');
    }
    public function adverts()
    {
       $data['advertsAct'] = Advert::all()->where('active', 1);
       $data['advertsDis'] = Advert::all()->where('active', 0);
       return view('admin.adverts', $data);
    }

    public function attributes()
    {
        $data['att_set'] = AttributeSet::all();
        $data['attributesRela'] = AttributeSetRelationship::all()->where('active', 1);
        $data['attributes'] = Attribute::all();
        return view('admin.attributes', $data);
    }
   public function categories()
   {
      $data['categories'] = Category::all()->where('parent_id', 0);
      return view('admin.categories', $data);
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
        $advert = Advert::find($id);
        $advert->active = $request->active;
        $advert->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function adminMessages()
    {
        $users = User::all();
        $data['users'] = $users;
        return view('admin.message', $data);
    }
}
