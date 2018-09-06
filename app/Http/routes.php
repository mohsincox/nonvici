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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();



Route::get('/log-in', 'LoginController@create');
Route::post('/log-in', 'LoginController@store');
Route::get('/log-out', 'LoginController@forget');

Route::get('/login3', 'LoginController@login3');

Route::group(['middleware' => 'usersession'], function () {
        Route::get('/ttt4', function ()    {
            // Uses User Session Middleware
            return 'hamba';
        });
    Route::get('/home', 'HomeController@index');

    Route::get('/phone', 'PhoneController@index');
	Route::get('/phone/create', 'PhoneController@create');
	Route::post('/phone', 'PhoneController@store');

	Route::get('/user', 'UserController@index');
	Route::get('/user/create', 'UserController@create');
	Route::post('/user', 'UserController@store');
});
