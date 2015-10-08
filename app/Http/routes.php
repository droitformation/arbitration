<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index');
Route::get('/site/{slug}', 'HomeController@page');
Route::get('/team/{type}', 'HomeController@team');
Route::get('/alumni', 'HomeController@alumni');
Route::get('/form', 'HomeController@form');
Route::get('/courses', 'HomeController@courses');
Route::get('/course/{id}', 'HomeController@course');
Route::get('/module/{id}/{course}', 'HomeController@module');

Route::post('sendMessage', ['uses' => 'HomeController@sendMessage']);

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth','administration']], function () {

    Route::get('/', 'Backend\AdminController@index');
    Route::get('acc', 'Backend\AdminController@acc');
    Route::post('upload', 'Backend\UploadController@upload');
    Route::resource('page', 'Backend\PageController');
    Route::resource('alumni', 'Backend\AlumniController');
    Route::resource('team', 'Backend\TeamController');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('auth/login',  'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
|--------------------------------------------------------------------------
| Registration Routes
|--------------------------------------------------------------------------
*/

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
|--------------------------------------------------------------------------
| Password reset link request Routes
|--------------------------------------------------------------------------
*/

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

/*
|--------------------------------------------------------------------------
|  Password reset Routes
|--------------------------------------------------------------------------
*/

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
