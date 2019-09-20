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
        $data['messages'] = Message::all()->where('recip_id', $user->id);
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
        $messages = Message::all()->where('recip_id', $id);
        $data['messages'] = $messages;
        return view('messages.showAll', $data);
    }
}
