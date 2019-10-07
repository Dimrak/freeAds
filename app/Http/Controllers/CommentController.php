<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
//        dd($request->comment);
        $user = Auth::user();
        if ($user && $user->hasAnyRole(['client', 'admin'])) {
            $comment = new Comment();
            $advert = Advert::all()->where('id', $request->advertId)->first();
            $comment->advert_id = $advert->id;
            $comment->content = $request->comment;
            $comment->user_id = $user->id;
            $comment->save();
            return redirect()->route('advert.show', $advert->slug)
                ->with('message-correct', 'Comment published');

        }else{
            $advert = Advert::all()->where('id', $request->advertId)->first();
            return redirect()->route('advert.show', $advert->slug)
                ->with('message', 'Only registered users can comment');
        }

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
