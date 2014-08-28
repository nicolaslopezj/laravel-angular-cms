<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Cms\Admin\Controllers', 'before' => 'permissions.admin'], function()
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

	Route::resource('files', 'FilesController');
	
	try {
		foreach (\EntityDriver::all() as $index => $entity) {
			Route::get($entity->route_name . '/{id}/delete', [
				'as' => 'admin.' . $entity->route_name . '.delete',
				'uses' => 'EntitiesController@delete',
			]);
			Route::resource($entity->route_name, 'EntitiesController');

			foreach ($entity->attributes as $index => $attribute) {
				if ($attribute->type == 'image_array') {

					Route::get($entity->route_name . '/{entity_id}/' . $attribute->name . '/{id}/delete', [
						'as' => 'admin.' . $entity->route_name . '.' . $attribute->name . '.delete',
						'uses' => 'EntityImagesController@delete',
					]);
					Route::resource($entity->route_name . '.' . $attribute->name, 'EntityImagesController');
				}
			}
		}
	} catch (\Exception $e) {
		
	}

});

Route::group(['prefix' => 'admin/ajax', 'namespace' => 'Cms\Admin\AjaxControllers', 'before' => 'permissions.admin'], function()
{
	Route::get('/', [
		'as' => 'admin.ajax',
		'uses' => 'DashboardController@index',
		]);

	Route::get('files/{id}/download', [
		'as' => 'admin.ajax.files.download',
		'uses' => 'FilesController@download',
		]);
	Route::resource('files', 'FilesController');

	Route::resource('file-links', 'FileLinksController');

	Route::resource('folder-links', 'FolderLinksController');
	
});