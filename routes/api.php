<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Meaning of this root - not active to enable route:cache
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//No need to add the word api before, as it would be already creating the path with api/ before
Route::get('/subscribers', 'Api\SubscribersController@index');
Route::post('/subscribers/', 'Api\SubscribersController@create');
//Route::delete('/subscribers', 'Api\SubscribersController@destroy');
Route::delete('/subscribers/{id}', 'Api\SubscribersController@destroy');
