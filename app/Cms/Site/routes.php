<?php

Route::group(['namespace' => 'Cms\Site\Controllers'], function() {

	Route::get('js/app.js', [
		'as' => 'site.assets.appjs',
		'uses' => 'AssetsController@getAppJs',
	]);

	Route::get('api/definitions/', [
		'as' => 'api.definitions.index',
		'uses' => 'DefinitionsController@index',
	]);

	Route::get('api/{entity}/', [
		'as' => 'api.entity.index',
		'uses' => 'EntitiesController@index',
	]);

	Route::get('api/{entity}/{id}', [
		'as' => 'api.entity.show',
		'uses' => 'EntitiesController@show',
	])->where('id', '[0-9]+');

	Route::get('api/{entity}/{slug}', [
		'as' => 'api.entity.showSlug',
		'uses' => 'EntitiesController@showSlug',
	])->where('slug', '[a-zA-Z0-9_-]+');

	$routes = \PublicRouteDriver::all();
	foreach ($routes as $route) {
		Route::get($route->laravel_format, [
			'as' => $route->name,
			'uses' => 'SiteController@route',
		]);
	}

});

\App::missing(function($exception)
{
    return \App::make('Cms\Site\Controllers\SiteController')->missing();
});