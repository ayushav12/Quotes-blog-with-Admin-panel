<?php

namespace Blog1\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Authenticate
{
	public function handle($request,Closure $nest,$guard= null )
	{
		if(Auth::guard($guard)->guest()){
			if($request->ajax())
			{
			  return response('Unauthorized',401);
		    }
		   else 
		   {
            return redirect()->route('index');    
		   }
	    } 
	
	  return $next($request);
    } 
}