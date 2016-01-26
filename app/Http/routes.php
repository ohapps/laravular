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

// UI routes
Route::get('/', ['middleware' => 'auth', function () {
    return view('index');
}]);

Route::get('/account', ['middleware' => 'auth', function () {
    return view('account');
}]);

// API routes
Route::group(['prefix' => 'api', 'middleware' => 'auth.basic'], function () {
    Route::post('device-application', 'Api\DeviceApplicationController@store');
    Route::delete('device-application', 'Api\DeviceApplicationController@delete');
    Route::resource('application', 'Api\ApplicationController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('category', 'Api\CategoryController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('device', 'Api\DeviceController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});

// Authentication routes
Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
});

// Password management routes
Route::group(['prefix' => 'password'], function () {
    Route::get('email', 'Auth\PasswordController@getEmail');
    Route::post('email', 'Auth\PasswordController@postEmail');
    Route::get('reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('reset', 'Auth\PasswordController@postReset');
});
