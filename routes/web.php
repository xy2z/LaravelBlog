<?php


Route::get('/', 'NewsController@index')->name('home');
Route::get('/news', function() {
	return redirect()->route('home');
});
// Create
Route::get('/news/create', 'NewsController@create');
Route::post('/news/create', 'NewsController@store')->name('post.create');

// Edit
Route::get('/news/edit/{news}', 'NewsController@edit');
Route::post('/news/edit/{news}', 'NewsController@update');

Route::get('/news/{news}', 'NewsController@show');

// News RSS Feed
Route::get('/feed', 'NewsController@feed')->name('feed');

// Tags
Route::get('/news/tags/{category}', 'CategoriesController@index');

// Auth
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@store');
Route::get('/logout', 'LoginController@destroy')->name('logout');
