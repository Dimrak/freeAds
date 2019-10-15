<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
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
    public function store(Request $request)
    {
//        dd($request->recip_id);
       $check_user = Auth::user();
       $admin = $check_user->hasRole('admin');
       if ($request->recip_id === 'Send to all users' && $admin === true) {
         $clients = User::Active()->get();
         foreach ($clients as $client){
            $message = new Message();
            $message->subject = $request->subject;
            $message->message = $request->message;
            $message->recip_id = $client->id;
            $message->sender = $check_user->id;
            $message->active = 1;
            $message->seen = date("Y/m/d");
            $message->status = 0;
            $message->type = $request->type;
            $message->save();
         }
       } elseif (isset($request->recip_id)) {
           $data = request()->validate([
               'subject' => 'required',
               'message' => 'required',
               'recip_id' => 'required',
               'type' => 'required',
           ]);
           Message::create($data);
          return redirect()->route('admin.index')->with('message', 'Message sent');
       }
       return redirect()->route('admin.index')->with('message', 'Message sent to all users');
    }
    public function storeReply(Request $request, $id)
    {
        $data = request()->validate([
            'message' => 'required',
            'subject' => ''
        ]);
        $user = Auth::user();
        $message = Message::find($id);
        $admin = $message->sender;
        $data += [
            'recip_id' => $user->id,
            'sender'=> $admin,
            'parent_id' => $message->id,
            'type' => $message->type,
            ];
        Message::create($data);
       if(Message::create($data) == true) {
          return redirect()->route('message.index')->with('message', 'Message sent');
       }else{
          return redirect()->route('message.index')->with('message_wrong', 'Something went wrong, message not sent');
       }
    }
    public function showAll($id)
    {
        $messages = Message::where('recip_id', $id)->orderBy('created_at', 'desc')->get();
        $data['messages'] = $messages;
        return view('messages.showAll', $data);
    }
}
