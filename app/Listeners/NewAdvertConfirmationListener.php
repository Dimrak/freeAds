<?php

namespace App\Listeners;

use App\Mail\NewAdvertMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewAdvertConfirmationListener implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        sleep(10);

        Mail::to($event->user->email)->send(new NewAdvertMail());
    }
}
