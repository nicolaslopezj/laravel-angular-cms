<?php

Route::group(['prefix' => '', 'namespace' => 'Cms\Auth\Controllers', 'before' => ''], function()
{
	Route::get('login', [
		'as' => 'login',
		'uses' => 'AuthController@login',
		]);

	Route::post('login', [
		'as' => 'auth.login.post',
		'uses' => 'AuthController@postLogin',
		]);

	Route::get('logut', [
		'as' => 'logout',
		'uses' => 'AuthController@logout',
		]);

	Route::controller('password', 'RemindersController');

});