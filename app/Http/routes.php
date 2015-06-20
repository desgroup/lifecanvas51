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

    Route::get('/date', function () {

        //$fuzzyDate = new \App\Lifecanvas\FuzzyDate(2014, 2, 10, '','','','00111111110');

        $fuzzyDate = new \App\Lifecanvas\FuzzyDate;

        //$byte = \App\Byte::findOrFail(1);

        //return $fuzzyDate->getFormValues($byte->byte_time,$byte->accuracy);

        return $fuzzyDate->makeByteTime(2010, 2, 10, 1, 22, '');

    });
});