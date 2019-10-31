<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserEmailAdminListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUserEvent  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        //
    }
}
