<?php

namespace App\Providers;

use App\Events\AdvertCreatedEvent;
use App\Events\NewUserEvent;
use App\Events\WelcomeMessageEvent;
use App\Listeners\NewAdvertConfirmationListener;
use App\Listeners\NewUserEmailAdminListener;
use App\Listeners\WelcomeMessageListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        AdvertCreatedEvent::class => [
            NewAdvertConfirmationListener::class,
        ],
       NewUserEvent::class => [
          NewUserEmailAdminListener::class,
       ],
       WelcomeMessageEvent::class => [
          WelcomeMessageListener::class,
       ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
