<?php

namespace App\Http\Controllers;

Use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Categories $category) {

    	$news = \App\News::whereHas('categories', function($query) use ($category) {
    		$query->where('categories.id', $category->id);
    	})->latest()->get();

    	return view('news.categories.index', [
    		'category' => $category,
    		'news' => $news
    	]);
    }
}
