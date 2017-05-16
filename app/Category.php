<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function blog()
    {
    	$this->belongsToMany(Blog::class);
    }
}
