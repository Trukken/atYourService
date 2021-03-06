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


Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@store');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LogOutController@index');

// Validate user email
Route::get('/token-validate/{token}', 'RegisterController@verify');

//Forgotten password
Route::get('/forgotpassword', 'ForgotController@index');
Route::post('/forgotpassword', 'ForgotController@send');
Route::get('/forgotpassword/{token}', 'ForgotController@edit');
Route::post('/forgotpassword/{token}', 'ForgotController@update');


//SEARCH page
Route::get('/', 'ServiceController@index');
//search results
Route::post('/search-results', 'ServiceController@searchResults');
Route::post('/search-results2', 'ServiceController@searchResults2');
Route::get('/livesearch', 'ServiceController@livesearch');

Route::get('/search-results', 'ServiceController@searchResults');

Route::get('/services/select/{name}', 'ServiceController@searchResults');


//Ban service! Only by admins
Route::get('/ban-service/{id}', 'AdminController@edit');
Route::get('/unban-service/{id}', 'AdminController@unban');


//POST A SERVICE
//add to database
Route::get('/add-services', 'ServiceController@create');
Route::post('/add-services', 'ServiceController@store');
//show details
Route::get('/services/detail/{id}', 'ServiceController@show');
//edit or update
Route::get('/services/edit/{id}', 'ServiceController@edit');
Route::put('/services/edit/{id}', 'ServiceController@update');
Route::put('user/{id}', 'ServiceController@update');

//delete from database
Route::get('/services/delete/{id}', 'ServiceController@destroy');
Route::delete('/services/delete/{id}', 'ServiceController@destroy');

Route::post('/report-service', 'ServiceController@reportService');
Route::post('/send-report', 'ServiceController@sendReport');

Route::get('/control-panel', 'AdminController@index');
Route::post('/control-panel', 'AdminController@trash');

// COMMENTS
//add to database
Route::post('/services/comments/add/{id}', 'CommentController@store');


//MY SERVICES/USER PAGE
Route::get('/user/{id}', 'ServiceController@showUser');
Route::post('/user-control', 'AdminController@userControl');

Route::get('/admin-panel', 'AdminController@displayOptions');
Route::post('/admin-panel', 'AdminController@redirect');

//USERS
//edit or update
Route::get('/user/edit/{id}', 'UserController@edit');
Route::put('/user/edit/{id}', 'UserController@update');


Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@send');
