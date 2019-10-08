<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Subscribers;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    public function index()
    {
        return 1;
//        $subscribers = Subscriber::all();
//        return Subscribers::collection($subscribers);
    }
    public function create(Request $request)
    {
//        return 2;
        $subscriber = new Subscriber();
        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->save();

        return Subscribers::collection($request);
//        $subscriber = new Subscriber();
    }
    public function delete($id)
    {
//        return 1;
        $subscriber = new Subscriber();
        $subscriber::find($id);
        $subscriber->active = 0;
        $subscriber->name = $subscriber->name;
        $subscriber->email = $subscriber->email;
        $subscriber->save();

    }
    public function destroy($id)
    {
//        $subscriber = new Subscriber();
//        $subscriber = Subscriber::find($id)->first();
//        $subscriber = Subscriber::where('id',$id)->first();
        Subscriber::destroy($id);
        return 1;
//        $subscriber = Subscriber::where('email',$email)->first();
//        return $subscriber::destroy($id);
    }
}
