<?php

namespace App\Http\Controllers;

Use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Categories $category) {

    	$news = \App\News::get();
    	// return $news;

    	return view('news.categories.index', [
    		'category' => $category,
    		'news' => $news
    	]);
    }
}
