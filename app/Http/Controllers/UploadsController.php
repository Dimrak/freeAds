<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadsController extends Controller
{
    //
   public function store()
   {
      $images = request()->file('file');
      dd($images);
   }
}
