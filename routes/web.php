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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/chat', 'ChatController@index')->name('chat');
// Route::get('/home/test', function () {

// $products = DB::select('select type,count(type) as count from products group by type');
// return $products;
// });
// Route::get('/home/test', 'ProductController@category');;

// Route::get('/chat', 'ChatController@index')->name('chat');

// Route::get('/home', 'HomeController');

// Send a message by Javascript.
Route::get('/test', 'API\ProductController@export');
