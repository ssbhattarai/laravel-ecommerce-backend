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


// Route::get('/home', 'HomeController@index')->name('home');



// Route::get('admin-login', 'ADMIN\AdminLoginController@showLoginForm');

// Route::post('admin-login', ['as' => 'admin-login', 'uses' => 'ADMIN\AdminLoginController@login']);


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/test', 'API\ProductController@store');
Route::get('/test1', 'API\ProductController@export1');

// Route::get('', function ($id) {

// });
// Route::get('/home', 'HomeController@test')->name('landing');


// Route::get('/admin', function () {
//     return view('layouts.master');
// });

Route::get('/', function () {
    return view('landing');
});

Route::get('products', function () {
    return view('products.products');
});

Route::get('supliers', function () {
    return view('suplier.suplier');
});

Route::get('product-cart', function () {
    return view('products.addtocart');
});


Route::get('supplier-info', function () {
    return view('suplier.profile');
});

Route::get('orders', function () {
    return view('order.order');
});


// admin auth
// Route::get('admin/dashboard', 'AdminController@index');
// Route::get('admin', 'Admin\LoginController@ShowLoginForm')->name('admin.login');
// Route::post('admin', 'Admin\LoginController@login');
// Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendsPasswordResetEmails')->name('admin.password.email');
// Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
// Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');
// Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
// admin route 
// Route::get('/admin/{any}', 'AdminController@index')->where('any', '.*')->name('layouts.master'); // use {any} because the admin site must start with the admin/ 

//search route
Route::get('product/search', 'API\ProductController@searchP')->name('product.search');
Route::post('neworders', 'Frontend\OrderController@SaveOrder')->name('order');

Route::group(['prefix'  =>  ''], function () {
    Route::get('dashboard', 'AdminController@index');
    Route::get('admin/login', 'Admin\LoginController@ShowLoginForm')->name('admin.login');
    Route::post('admin/login', 'Admin\LoginController@login');
    Route::post('password/email', 'Admin\ForgotPasswordController@sendsPasswordResetEmails')->name('admin.password.email');
    Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/reset', 'Admin\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
});
