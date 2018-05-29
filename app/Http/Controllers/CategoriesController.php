<?php

namespace App\Http\Controllers;

Use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index($category_slug) {
    	// Get category ID
    	$category = \App\Categories::whereRaw('LOWER(title) = ?', [Categories::unslug($category_slug)])->first();

    	$news = \App\News::whereHas('categories', function($query) use ($category) {
    		$query->where('categories.id', $category->id);
    	})->latest()->simplePaginate(1);

    	return view('news.categories.index', [
    		'category' => $category,
    		'news' => $news
    	]);
    }
}
