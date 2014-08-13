<?php

Route::group(['prefix' => 'dev', 'namespace' => 'Cms\Dev\Controllers', 'before' => 'permissions.dev'], function()
{
	// Index
	Route::get('/', [
		'as' => 'dev.index',
		'uses' => 'DashboardController@index',
		]);

	// Packages
	Route::get('packages/{package}/delete', [
		'as' => 'dev.packages.delete',
		'uses' => 'PackagesController@delete',
		]);
	Route::resource('packages', 'PackagesController');

	// Images
	Route::resource('images', 'ImagesController');

	// Files
	Route::resource('files', 'FilesController');

	// Definitions
	Route::get('definitions/{id}/delete', [
		'as' => 'dev.definitions.delete',
		'uses' => 'DefinitionsController@delete',
		]);
	Route::resource('definitions', 'DefinitionsController');

	// Entities
	Route::get('entities/{id}/database', [
		'as' => 'dev.entities.database',
		'uses' => 'EntitiesController@database',
		]);
	Route::get('entities/{id}/migrate', [
		'as' => 'dev.entities.migrate',
		'uses' => 'EntitiesController@migrate',
		]);
	Route::get('entities/{id}/delete', [
		'as' => 'dev.entities.delete',
		'uses' => 'EntitiesController@delete',
		]);
	Route::resource('entities', 'EntitiesController');

	// Entities Attributes
	Route::get('entities/{entity_id}/attributes/{attribute_id}/delete', [
		'as' => 'dev.entities.attributes.delete',
		'uses' => 'AttributesController@delete',
		]);
	Route::resource('entities.attributes', 'AttributesController');

	// Routes
	Route::get('public-routes/{id}/delete', [
		'as' => 'dev.public-routes.delete',
		'uses' => 'PublicRoutesController@delete',
		]);
	Route::resource('public-routes', 'PublicRoutesController');

	// Views
	Route::get('public-views/{id}/delete', [
		'as' => 'dev.public-views.delete',
		'uses' => 'PublicViewsController@delete',
		]);
	Route::resource('public-views', 'PublicViewsController');

});

Route::group(['prefix' => 'dev/ajax', 'namespace' => 'Cms\Dev\AjaxControllers', 'before' => 'permissions.dev'], function()
{
	Route::get('/', [
		'as' => 'dev.ajax',
		'uses' => 'DashboardController@index',
		]);

	Route::resource('public-views', 'PublicViewsController');
	Route::resource('public-routes', 'PublicRoutesController');
	
});