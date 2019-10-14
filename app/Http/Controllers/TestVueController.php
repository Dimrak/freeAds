<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestVueController extends Controller
{
    public function index()
    {
        return [
          'name' => 'Berta-Guille',
        ];
    }

   public function search(Request $request)
   {
      $users = User::where('email', $request->keywords)->get();

      return response()->json($users);
   }
}
