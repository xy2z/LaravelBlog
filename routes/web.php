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

Route::get('/', function () {
	$news = App\News::latest()->where('published', 1)->get();

    return view('welcome', [
    	'news' => $news
    ]);
});


Route::get('news/{id}', function($id) {
	$news = App\News::get()->where('published', 1)->find($id);
	// $categories = App\NewsCategories::
	$categories = DB::table('news_categories')
		->join('news', 'news.id', '=', 'news_categories.news_id')
		->join('categories', 'categories.id', '=', 'news_categories.category_id')
		->select('categories.id', 'categories.title')
		->where('news.id', '=', $id)
		->get();

	return view('news_item', [
		'news' => $news,
		'categories' => $categories
	]);
});


Route::get('news', function() {
	return redirect('/');
});

Route::get('tags/{id}', function($id) {
	$category = \App\Categories::get()->find($id);

	$news = DB::table('news')
		->join('news_categories', 'news_categories.news_id', '=', 'news.id')
		->where('news_categories.category_id', '=', $id)
		->where('news.published', '=', 1)
		->select('news.id', 'news.title', 'news.created_at')
		->latest('news.id')
		->get();

	return view('news_categories', [
		'category' => $category,
		'news' => $news
	]);

});
