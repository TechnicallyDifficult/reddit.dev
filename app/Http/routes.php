<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// first things first, let's make sure that url is all pretty
if (isset($_SERVER['REQUEST_URI']) and substr($_SERVER['REQUEST_URI'], -1) !== '/' and !preg_match('~^.*\?.+$~', $_SERVER['REQUEST_URI'])) {
	header("Location: {$_SERVER['REQUEST_URI']}/");
	die;
}

Route::get('/', 'MainController@root');

Route::get('/helloworld/', 'MainController@helloworld');

Route::get('/uppercase/{word?}/', 'MainController@uppercase');
Route::get('/lowercase/{word?}/', 'MainController@lowercase');

Route::get('/add/{x?}/{y?}/', 'MainController@add');

Route::get('/rolldice/{guess?}/', 'MainController@rolldice');

Route::get('/increment/{number?}/', 'MainController@increment');

Route::resource('posts', 'PostsController', ['parameters' => ['posts' => 'id']]);

// login/logout
Route::get('/login/', 'Auth\AuthController@showLoginForm');
Route::post('/login/', 'Auth\AuthController@login');
Route::post('/logout/', 'Auth\AuthController@logout');

// registration routes
Route::get('/signup/', 'Auth\RegisterController@showRegistrationForm');
Route::post('/signup/', 'Auth\RegisterController@register');

// password reset routes...
Route::get('password/reset/', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email/', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}/', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset/', 'Auth\ResetPasswordController@reset');

Route::get('/{error}/', 'MainController@error')->where('error', '^\d+$');

Route::get('/home/', 'HomeController@index');