<?php

Route::get('/test', function() {

    $image = Image::make(file_get_contents('http://i.dailymail.co.uk/i/pix/2015/01/06/2473100D00000578-2898639-Photographer_Andrey_Gudkov_snapped_the_images_on_the_plains_of_t-a-20_1420546215677.jpg'));

    return $image->response();

});

/*
 * Pages accessible without logging in
 */

Route::get('/', ['as' => 'splash', 'uses' => 'PagesController@splash']);


// Authentication routes...
Route::get('auth/login', ['as' => 'signin', 'uses' => 'Auth\AuthController@getLogin']);
//Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', ['as' => 'signup', 'uses' => 'Auth\AuthController@getRegister']);
//Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
 * Routes requiring authentication
 */
$router->group(['middleware' => 'auth'], function() {

    Route::get('home', ['as' => 'home', 'uses' => 'PagesController@home']);

    Route::resource('bytes', 'BytesController');
    Route::resource('people', 'PeopleController');
    Route::resource('places', 'PlacesController');
    Route::resource('images', 'ImagesController');
    Route::resource('lines', 'LinesController');

    Route::get('follow', 'FollowingController@index');
    Route::get('follow/{id}', 'FollowingController@follow');
    Route::get('profile/{id}', 'FollowingController@show');

});