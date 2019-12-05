<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ServiceController@index');

Route::get('/register', 'UserController@index');
Route::post('/register', 'UserController@store');

Route::get('/login', 'UserController@displayLoginForm');
Route::post('/login', 'UserController@login');
