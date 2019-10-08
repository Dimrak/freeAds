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

//Category
//Route::resource('category', 'CategoryController');
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::get('category/sub/{subCategory}', 'CategoryController@showSub')->name('category.showSub');
Route::get('category/sub/type/{secondSub}', 'CategoryController@showSubSub')->name('category.showSubSub');
Route::get('category/{category}','CategoryController@show')->name('category.show');
Route::get('category/index', 'CategoryController@index')->name('category.index');
Route::get('category/categories', 'CategoryController@categories')->name('category.categories');
Route::post('category/store', 'CategoryController@store')->name('category.store');
Route::post('/category/{id}', 'CategoryController@disable')->name('category.disable');
Route::delete('/category/{id}', 'CategoryController@destroy')->name('category.destroy');

//Advert
Route::get('advert/createTemplate', 'AdvertController@createTemplate')->name('advert.createTemplate');
Route::get('advert/createSub', 'AdvertController@createSub')->name('advert.createSub');
Route::get('advert/create', 'AdvertController@create')->name('advert.create');
Route::resource('advert','AdvertController');
Route::get('advert/{$advert}', 'AdvertController@show')->name('advert.show');
Route::post('/advert/{id}', 'AdvertController@disable')->name('advert.disable');
Route::delete('/advert/{id}', 'AdvertController@destroy')->name('advert.destroy');

//Message
Route::resource('message', 'MessageController');
Route::get('message/showAll/{id}', 'MessageController@showAll')->name('message.showAll');

//Attribute
Route::resource('attribute', 'AttributeController');
Route::resource('attributeSet', 'AttributeSetController');

//Attribute_set_rela
Route::resource('attributeSetRela', 'AttributeSetRelaController');
Route::get('attributeSetRela/edit/{id}', 'AttributeSetRelaController@edit')->name('AttributeSetRela.edit');

//Search
//Route::get('search', 'SearchController@index')->name('search');
//Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');
Route::get('search/searching/', 'SearchController@searching')->name('search.searching');
//Route::get('search/index', 'SearchController@index')->name('search');
//Route::get('search/action', 'SearchController@action')->name('search.action');

//Admin
//Route::resource('admin', 'AdminController');
Route::get('admin/index', 'AdminController@index')->name('admin.index');
Route::get('admin/create', 'AdminController@create')->name('admin.create');
Route::get('admin/adverts', 'AdminController@adverts')->name('admin.adverts');
//Route::get('admin/adverts', 'AdminController@adverts')->name('admin.adverts');
Route::post('admin/store', 'AdminController@store')->name('admin.store');
Route::get('admin/categories', 'AdminController@categories')->name('admin.categories');
Route::get('admin/attributes', 'AdminController@attributes')->name('admin.attributes');
Route::resource('attribute', 'AttributeController');
//Route::get('attributeSetRela/update', 'AttributeSetRelaController@update')->name('attributeSetRela.update');

//Comment
Route::resource('comment', 'CommentController');

//City
Route::resource('city','CityController');

//For API
Route::get('subscribers', 'Api\SubscribersController@index');
Route::resource('subscribers', 'Api\SubscribersController');

//DEV::
//Route::get('message/showAll/{id}', 'MessageController@showAll')->name('messages.showAll');
//Route::get('advert/userAds/{id}', 'AdvertController@userAds')->name('advert.userAds');
