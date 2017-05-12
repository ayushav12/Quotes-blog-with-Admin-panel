<?php

namespace Blog1;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function quotes()
    {
    	return $this->hasMany('Blog1\Quote');//one to many relationship bcoz 1 author can publish many quotes
    }
}
