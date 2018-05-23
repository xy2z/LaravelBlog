<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

	// protected $primaryKey = 'pretty_url';
	// public $incrementing  = false;

	public function categories() {
		// Any post may have many categories
		// Any categories may have many post.
		return $this->belongsToMany(Categories::class, 'news_categories', 'news_id', 'category_id');
	}

    public function body_snippet() {
    	$snippet = strip_tags($this->body);

    	if (mb_strlen($snippet) > 50) {
    		return mb_substr($snippet, 0, 50) . '...';
		}

		return $snippet;
    }

    public function getRouteKeyName() {
    	return 'pretty_url';
    }
}
