<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

	protected $primaryKey = 'pretty_url';
	public $incrementing  = false;

    public function body_snippet() {
    	$snippet = strip_tags($this->body);

    	if (mb_strlen($snippet) > 50) {
    		return mb_substr($snippet, 0, 50) . '...';
		}

		return $snippet;
    }
}
