<?php

Route::group(['prefix' => 'me', 'namespace' => 'Cms\Me\Controllers', 'before' => 'auth'], function()
{
	Route::get('/', [
		'as' => 'me.index',
		'uses' => 'DashboardController@index',
		]);

});