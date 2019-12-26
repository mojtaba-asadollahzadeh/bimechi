<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function() {
    
	Route::get('/profile','UserController@profile');
	Route::post('/profile/update','UserController@update');
	Route::post('/profile/password','UserController@password');

});