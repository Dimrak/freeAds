<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Exception\SSLConnectionException;


class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
//        $data['messages'] = Message::all()->where('recip_id', $user->id);
//        return view('messages.index', $data);
        $messages = Message::where('recip_id', $user->id)->orderBy('created_at', 'desc')->get();
        $data['messages'] = $messages;
//        dd(count($messages));
//        dd(empty($data['messages']));
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
    public function store(Request $request)
    {
       $check_user = Auth::user();
       $admin = $check_user->hasRole('admin');
       if ($request->user === 'All users' && $admin === true) {
         $clients = User::all()->where('active', 1);
         foreach ($clients as $client){
            $message = new Message();
            $message->subject = $request->subject;
            $message->message = $request->message;
            $message->recip_id = $client->id;
            $message->sender = $check_user->id;
            $message->active = 1;
            $message->seen = date("Y/m/d");
            $message->status = 1;
            $message->type = $request->type;
            $message->save();
         }
       } elseif (isset($request->user)) {
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
       return redirect()->route('admin.index')->with('message', 'Message sent to all users');
    }
    public function storeReply(Request $request, $id)
    {
//       dd($id);
       $user = Auth::user();
       $message = Message::all()->where('id', $id)->first();
       $admin = $message->sender;//STR '1'
       $newMessage = new Message();
       $newMessage->subject = $request->subject;
       $newMessage->message = $request->message;
       $newMessage->parent_id = $message->id;
       $newMessage->recip_id = $admin;
       $newMessage->sender = $user->id;
       $newMessage->type = $message->type;
       $newMessage->seen = date("Y/m/d");
       $newMessage->status = 1;
       $newMessage->active = 1;
       $newMessage->save();
       if($newMessage->save() == true) {
          return redirect()->route('message.index')->with('message', 'Message sent');
//       dd($message);
       }else{
          return redirect()->route('message.index')->with('message_wrong', 'Something went wrong, message not sent');
       }
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
