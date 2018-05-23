<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function getRouteKeyName() {
    	return 'title';
    }

    public function news() {
    	return $this->belongsToMany(News::class);
    }
}
