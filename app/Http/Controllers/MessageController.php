<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
//        $data['messages'] = Message::all()->where('recip_id', $user->id);
//        return view('messages.index', $data);
        $messages = Message::where('recip_id', $user->id)->orderBy('created_at', 'desc')->get();
        $data['messages'] = $messages;
        return view('messages.index', $data);
    }
    public function show($id)
    {
        $message = Message::find($id);
        if($message->status != 0){
            $message->status = 0;
            $message->save();
        }
        $data['message'] = $message;
        return view('messages.single', $data);
    }
    public function showAll($id)
    {
//        dd($id);
        //       $adverts = Advert::orderBy('created_at', 'desc')->take(4)->get();

        $messages = Message::where('recip_id', $id)->orderBy('created_at', 'desc')->get();
        $data['messages'] = $messages;
        return view('messages.showAll', $data);
    }
}
