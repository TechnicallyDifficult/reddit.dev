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

if (substr($_SERVER['REQUEST_URI'], -1) !== '/') {
	header('Location: ' . $_SERVER['REQUEST_URI'] . '/');
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helloworld', function () {
	return 'hello world';
});