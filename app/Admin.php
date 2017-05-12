<?php

namespace Blog1;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //importing the in-built trait(code) for authentication 
    use Authenticatable;
}
