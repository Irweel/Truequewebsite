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
    return view('demo');
});

Route::get('/welcome', function () {
    return view('welcome');
});

//Auth::routes();
// Las siguientes funciones fueron sacadas de /vendor/Laravel/framework/src/Illuminate/router.php
// los $this-> fueron reemplazados por Routes::
//

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
if ($options['register'] ?? true) {
  Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('register', 'Auth\RegisterController@register');
}

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
  if ($options['verify'] ?? false) {
    Route::emailVerification();
  }

Route::get('/home', 'HomeController@index')->name('home');

// Products 

Route::group(['middleware' => 'auth'], function () {
    //Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    //Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

    
    Route::get('profile', 'UserController@profile');
    Route::post('profile', 'UserController@update_avatar');

    Route::resource('products', 'ProductsController');
    
    Route::get('/add-product','ProductsController@addProduct');
    Route::post('/add-product','ProductsController@addProduct');
    });


