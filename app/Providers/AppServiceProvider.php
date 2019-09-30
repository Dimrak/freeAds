<?php

namespace App\Providers;

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
            //get all parent categories with their subcategories
            $categories = \App\Category::parents()->get(); //For the categories in dropdown
            $user = Auth::user(); //get the id
           if ($user) {
              $messages = \App\Message::all()->where('recip_id', $user->id)->Where('status',1);
//              $userOne->unread();
           }else{
              $userOne = '';
           }
            //attach the categories to the view
//            $view->with(compact( 'messages'));
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
