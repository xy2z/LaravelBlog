<?php


Route::get('/', 'NewsController@index');
Route::get('/news/create', 'NewsController@create');
Route::post('/news/create', 'NewsController@store');
Route::get('/news/{news}', 'NewsController@show');
