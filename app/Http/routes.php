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

Route::get('/', 'Main@root');

Route::get('/helloworld/', 'Main@helloworld');

Route::get('/uppercase/{word?}/', 'Main@uppercase');

Route::get('/lowercase/{word?}/', 'Main@lowercase');

Route::get('/add/{x?}/{y?}/', 'Main@add');

Route::get('/rolldice/{guess?}/', 'Main@rolldice');

Route::get('/increment/{number?}/', 'Main@increment');

Route::resource('posts', 'PostsController', ['parameters' => ['posts' => 'id']]);

Route::get('/{error}/', 'Main@error')->where('error', '^\d+$');