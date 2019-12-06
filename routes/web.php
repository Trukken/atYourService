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



Route::get('/register', 'UserController@index');
Route::post('/register', 'UserController@store');


//search page
Route::get('/', 'ServiceController@index');
//search results
Route::post('/search-results', 'ServiceController@searchResults');
Route::post('/livesearch', 'ServiceController@livesearch');

Route::get('/search-results', 'ServiceController@searchbyname');


Route::get('/services/{name}', 'ServiceController@searchbyname');
//Route::get('/services/providers/{user}', 'ServiceController@searchbyname');
