<?php

namespace App\Listeners;

use App\Message;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMessageListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
       sleep(5);

         $welcome = new Message();
       $admin = User::all()->where('id',1);
//       $admin = $check_user->hasRole('admin');

       $welcome->subject = 'Welcome to FreeAds';
       $welcome->message = 'You can contact the administration by sending an email to email@email.com';
       $welcome->recip_id = $event->user->id;
       $welcome->sender = $admin->id;
       $welcome->active = 1;
       $welcome->seen = date("Y/m/d");
       $welcome->status = 1;
       $welcome->type = 1;
//       dd($welcome);
       $welcome->save();
    }
}
