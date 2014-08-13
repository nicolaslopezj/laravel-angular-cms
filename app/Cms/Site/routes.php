<?php

Route::group(['namespace' => 'Cms\Site\Controllers'], function() {

	Route::get('api/definitions/', [
		'as' => 'api.definitions.index',
		'uses' => 'DefinitionsController@index',
	]);

	Route::get('api/{entity_id}/', [
		'as' => 'api.entity.index',
		'uses' => 'EntitiesController@index',
	]);

	Route::get('api/{entity_id}/{id}', [
		'as' => 'api.entity.show',
		'uses' => 'EntitiesController@show',
	]);

	Route::get('/{route?}', [
		'as' => 'site.index',
		'uses' => 'SiteController@index',
	]);

});