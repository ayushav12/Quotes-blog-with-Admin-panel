<?php

namespace Blog1\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Blog1\Author;

class AdminController extends Controller
{
    public function getLogin()
    {
    	//to return the view
    	return view('admin.login');
    }

    public function getLogout()
    {
        Auth::logout(); //method of Auth facade for logging out
        return redirect()->route('index');
    }

    public function getDashboard()
    {    
        //to check for login
        if(!Auth::check())
        {
            return redirect()->back();
        }
    	$authors=Author::all();    	return view('admin.dashboard',['authors'=>$authors]);
    }

    public function postLogin(Request $request)
    {
    	//this function controls the login of the admin
    	//1.) Validation
        $this->validate($request,[
                'name'=>'required',
                'password'=>'required'
        	]); 
        
        //2.)Authentication of admin
        if(!Auth::attempt(['name'=>$request['name'],'password'=>$request['password']]))
        {
          return redirect()->back()->with(['fail'=>'Could not log you in!']);
        }  
        return redirect()->route('admin.dashboard');
    }
}
