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
	]);

	$routes = \PublicRouteDriver::all();
	foreach ($routes as $route) {
		Route::get($route->laravel_format, [
			'as' => $route->name,
			'uses' => 'SiteController@route',
		]);
	}

	Route::get('sitemap.xml', [
		'as' => 'site.directory.sitemap',
		'uses' => 'DirectoryController@sitemap',
	]);

	Route::get('directory', [
		'as' => 'site.directory.index',
		'uses' => 'DirectoryController@index',
	]);

	Route::get('directory/{id}', [
		'as' => 'site.directory.depended',
		'uses' => 'DirectoryController@depended',
	]);

});

if (!Config::get('app.debug')) {

	App::error(function(\Exception $exception)
	{	
		Log::error($exception);
    	return Response::view('errors.unknown', array(), 500);
	});

	App::fatal(function($exception)
	{
		Log::error($exception);
	    return Response::view('errors.fatal', array(), 500);
	});

	App::missing(function($exception)
	{
	    return Response::view('errors.missing', array(), 404);
	});

}