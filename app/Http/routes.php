<?php

/*
 * Pages accessible without logging in
 */

Route::get('/', ['as' => 'splash', 'uses' => 'PagesController@splash']);


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
 * Routes requiring authentication
 */
$router->group(['middleware' => 'auth'], function() {

    Route::get('home', ['as' => 'home', 'uses' => 'PagesController@home']);

    Route::resource('bytes', 'BytesController');

});