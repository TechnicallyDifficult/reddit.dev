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
if (isset($_SERVER['REQUEST_URI']) && substr($_SERVER['REQUEST_URI'], -1) !== '/') {
    header("Location: {$_SERVER['REQUEST_URI']}/");
    die;
}

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/helloworld/', function ()
{
    return 'hello world';
});

Route::get('/uppercase/{word?}/', function ($word = 'uppercase')
{
    return strtoupper($word);
});

Route::get('/lowercase/{word?}/', function ($word = 'LOWERCASE')
{
    return strtolower($word);
});

Route::get('/add/{a?}/{b?}/', function ($a = 0, $b = 0)
{
    $o = $b < 0 ? '-' : '+';
    return "$a $o " . abs($b) . ' = ' . ($a + $b);
});

Route::get('/rolldice/', function () {
    return mt_rand(1, 6);
});