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

	Route::group(['prefix' => 'clients'], function() {
	    Route::get('/','ClientController@index');
		Route::get('/store','ClientController@store');
		Route::post('/store','ClientController@create');
		Route::get('/{id}','ClientController@view');
		Route::post('/update','ClientController@update');
	});

	Route::group(['prefix' => 'marketers'], function() {
	    Route::get('/','MarketerController@index');
		Route::get('/store','MarketerController@store');
		Route::post('/store','MarketerController@create');
		Route::get('/{id}','MarketerController@view');
		Route::post('/update','MarketerController@update');
	});

	Route::group(['prefix' => 'users'], function() {
	    Route::get('/','AdminUserController@index');
		Route::get('/{id}','AdminUserController@one');
		Route::post('/update','AdminUserController@update');
		Route::get('/{id}/status','AdminUserController@status');
	});

});