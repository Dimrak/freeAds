<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /** Return view to upload file */
    public function uploadFile(){
        return view('uploadfile');
    }

    /** Example of File Upload */
    public function uploadFilePost(Request $request){
        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);
        $fileName = "fileName".time().'.'.request()->fileToUpload->getClientOriginalExtension();

        $request->fileToUpload->storeAs('images', $fileName);

        return back()
            ->with('success','You have successfully upload image.');

    }
}
