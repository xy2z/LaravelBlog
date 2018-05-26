<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

	protected $fillable = ['title'];

    public function getRouteKeyName() {
    	return 'title';
    }

    public function news() {
		return $this->belongsToMany(News::class, 'news_categories', 'news_id', 'category_id');
    }
}
