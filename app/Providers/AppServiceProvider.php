<?php

namespace App\Providers;

use App\Message;
use App\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {

        view()->composer('layouts.app', function($view) {
            $categories = Category::parents()->get();
            $user = Auth::user(); //get the id
           if ($user) {
               $messages = Message::NotRead()->User($user)->get();
           }else{
              $userOne = '';
           }
            $view->with(compact('categories', 'messages'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
