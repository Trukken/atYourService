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


//SEARCH page
Route::get('/', 'ServiceController@index');
//search results
Route::post('/search-results', 'ServiceController@searchResults');
Route::post('/livesearch', 'ServiceController@livesearch');

Route::get('/search-results', 'ServiceController@searchbyname');

Route::get('/services/select/{name}', 'ServiceController@searchbyname');


//POST A SERVICE
//add to database
Route::get('/add-services', 'ServiceController@create');
Route::post('/add-services', 'ServiceController@store');
//show details
Route::get('/services/detail/{id}', 'ServiceController@show');

// COMMENTS
//add to database
Route::post('/services/comments/add/{id}', 'CommentController@store');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LogOutController@index');
