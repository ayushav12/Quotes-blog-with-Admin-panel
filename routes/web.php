<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::group(['middleware'=>['web']],function(){
  Route::get('/index/{author?}',[
      'uses' => 'QuoteController@getIndex',
      'as' => 'index'
  	]);

  Route::post('/new',[
     'uses' => 'QuoteController@postQuote',
     'as' => 'create'
  	]);

  Route::get('/delete/{quote_id}',[
       'uses' => 'QuoteController@getDeleteQuote',
       'as' => 'delete' 
         	]);
  Route::get('/gotmail/{author_name}',[
        'uses'=>'QuoteController@getMailCallback',
        'as'=>'gotmail'  
  	]);
  Route::get('/admin/login',[
        'uses'=>'AdminController@getLogin',
        'as'=>'admin.login' 
  	]);
 Route::post('/admin/login',[
        'uses'=>'AdminController@postLogin',
        'as'=>'admin.login' 
  	]);
 Route::get('/admin/dashboard',[
        'uses'=>'AdminController@getDashboard',
       // 'middleware'=>'auth',
        'as'=>'admin.dashboard' 
  	]);
 Route::get('/admin/logout',[
     'uses'=>'AdminController@getLogout',
     'as'=>'admin.logout'
  ]);

});

