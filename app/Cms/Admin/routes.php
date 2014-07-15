<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Cms\Admin\Controllers', 'before' => 'auth'], function()
{
	Route::get('/', [
		'as' => 'admin.index',
		'uses' => 'DashboardController@index',
		]);

	// Definitions
	Route::resource('definitions', 'DefinitionsController');

	// Users
	Route::get('users/{id}/delete', [
		'as' => 'admin.users.delete',
		'uses' => 'UsersController@delete',
		]);
	Route::resource('users', 'UsersController');
	
	
	foreach (\EntityDriver::all() as $index => $entity) {
		Route::get($entity->route_name . '/{id}/delete', [
			'as' => 'admin.' . $entity->route_name . '.delete',
			'uses' => 'EntitiesController@delete',
		]);
		Route::resource($entity->route_name, 'EntitiesController');
	}

});