<?php

Route::group(['prefix' => 'me', 'namespace' => 'Cms\Me\Controllers', 'before' => 'auth'], function()
{
	Route::get('/', [
		'as' => 'me.index',
		'uses' => 'DashboardController@index',
		]);

	Route::get('settings', [
		'as' => 'me.settings.edit',
		'uses' => 'SettingsController@edit',
		]);

	Route::put('settings', [
		'as' => 'me.settings.update',
		'uses' => 'SettingsController@update',
		]);

	Route::put('settings-password', [
		'as' => 'me.settings.update-password',
		'uses' => 'SettingsController@updatePassword',
		]);

});