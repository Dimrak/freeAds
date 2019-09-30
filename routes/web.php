<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','CategoryController@index');
Route::get('home','CategoryController@index');
Auth::routes(); //this does what?, sin esto al poner
Route::resource('attributeSet', 'AttributeSetController');
//Route::resource('advert','AdvertController');
// /home daria un error al estar logeado
//Route::get('advert/{id}/edit', 'AdvertController@index');
//Route::get('message/{id}/show','MessageController@show')->name('message.show');
Route::get('/advert/byUser/{id}', 'AdvertController@byUser')->name('advert.byUser');
Route::get('category/categories', 'CategoryController@categories')->name('category.categories');
Route::get('advert/chooseCateg', 'AdvertController@chooseCateg')->name('advert.chooseCateg');
Route::get('advert/create/{id}', 'AdvertController@create')->name('advert.create');
Route::post('/advert/{id}', 'AdvertController@disable')->name('advert.disable');
Route::delete('/advert/{id}', 'AdvertController@destroy')->name('advert.destroy');



Route::get('admin/adverts', 'AdminController@adverts')->name('admin.adverts');
Route::get('admin/categories', 'AdminController@categories')->name('admin.categories');
Route::get('admin/attributes', 'AdminController@attributes')->name('admin.attributes');
//Route::post('attributes/storeAttSet', 'AttributeController@storeAttSet')->name('attributes.storeAttSet');
Route::resource('attribute', 'AttributeController');
Route::resource('attributeSetRela', 'AttributeSetRelaController');
Route::get('category/sub/{subCategory}', 'CategoryController@showSub')->name('category.showSub');
Route::get('category/sub/type/{secondSub}', 'CategoryController@showSubSub')->name('category.showSubSub');
//Route::get('category/show/{slug}/{slug}', 'CategoryController@show')->name('category.subcategory');

Route::resource('advert','AdvertController');
Route::resource('category','CategoryController');
Route::resource('city','CityController');
Route::resource('comment','CommentController');
Route::resource('showAll','CategoryController');
Route::resource('search','SearchController');
Route::resource('admin','AdminController');
Route::resource('message','MessageController');

//Route::get('subscribers', 'Api\SubscribersController@index');
//Route::resource('subscribers', 'SubscribersController');

//Route::
Route::get('message/showAll/{id}', 'MessageController@showAll')->name('messages.showAll');
Route::get('advert/userAds/{id}', 'AdvertController@userAds')->name('advert.userAds');
