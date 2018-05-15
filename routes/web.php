<?php


Route::get('/', 'NewsController@index')->name('home');
Route::get('/news/create', 'NewsController@create');
Route::post('/news/create', 'NewsController@store')->name('post.create');
Route::get('/news/{news}', 'NewsController@show');

// Auth::routes();

// Admin
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@store');
Route::get('/logout', 'LoginController@destroy')->name('logout');
