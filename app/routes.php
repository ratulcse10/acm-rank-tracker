<?php

Route::get('/',function(){
	return Redirect::route('dashboard');
});

Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));


});

Route::group(array('before' => 'auth|Admin'), function()
{

	Route::get('students',['as' => 'students.index', 'uses' => 'StudentController@index']);
	Route::get('students/create',['as' => 'students.create', 'uses' => 'StudentController@create']);
	Route::post('students/create',['as' => 'students.store', 'uses' => 'StudentController@store']);
    Route::get('students/{id}',['as' => 'students.show', 'uses' => 'StudentController@show']);
    Route::get('students/{id}/edit',['as' => 'students.edit', 'uses' => 'StudentController@edit']);
	Route::put('students/{id}',['as' => 'students.update', 'uses' => 'StudentController@update']);
	Route::delete('students/{id}',['as' => 'students.delete', 'uses' => 'StudentController@destroy']);
});