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

Route::get('/', 'HomeController@index');
Route::get('/site/{slug}', 'HomeController@page');
Route::get('/team/{type}', 'HomeController@team');
Route::get('/alumni', 'HomeController@alumni');
Route::get('/form', 'HomeController@form');
Route::get('/courses', 'HomeController@courses');
Route::get('/course/{id}', 'HomeController@course');
Route::get('/module/{id}/{course}', 'HomeController@module');

Route::post('sendMessage', ['uses' => 'HomeController@sendMessage']);