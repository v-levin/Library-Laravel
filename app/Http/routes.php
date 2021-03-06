<?php

//Route::get('/', function () {
//    return view('welcome');
//});

// Route::get('/', 'BookController@index');
Route::any('/', function() {
   return view('login_page');
});

Route::any('registration', 'UserController@registration');
Route::any('login', 'UserController@login');
Route::any('home', 'BookController@index');
Route::any('_home', 'BookController@_index');
Route::get('create', 'BookController@create');
Route::post('store', 'BookController@store');
Route::get('edit/{id}', 'BookController@edit');
Route::any('update/{id}', 'BookController@update');
Route::any('delete/{id}', 'BookController@destroy');
