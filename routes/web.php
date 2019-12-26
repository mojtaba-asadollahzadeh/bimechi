<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'home', 'middleware' => 'auth'], function() {

	Route::group(['prefix' => 'profile'], function() {
	    Route::get('/','UserController@profile');
		Route::post('/update','UserController@update');
		Route::post('/password','UserController@password');
	});

	Route::group(['prefix' => 'insurences'], function() {
	    Route::get('/','InsurenceController@index');
	    Route::post('/new','InsurenceController@new');
	    Route::post('/type','InsurenceController@newType');
	    Route::get('/delete/{id}','InsurenceController@delete');
	    Route::get('/type/delete/{id}','InsurenceController@deleteType');

	});
});