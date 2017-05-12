<?php

namespace Blog1;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function author()
    {
    	return $this->belongsTo('Blog1\Author');
    }
}
