<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function index($name)
    {
       $user = Auth::user();
       $data['name'] = $name;
       $data['user'] = $user;
       $data['adverts'] = Advert::all()->where('user_id',$user->id);
       return view('profile.index', $data);
    }
    public function edit($id)
    {
       $user = User::find($id);
       $data['user'] = $user;
       return view('profile.edit',$data);
    }
    public function store(Request $request, $id)
    {
//      dd($id);
      $user = User::find($id);
      $user->name = $request->name;
      $user->save();
      $data['name'] = $request->name;
       return redirect()->route('profile.index', $data);
    }
}
