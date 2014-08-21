<?php

Route::group(['namespace' => 'Cms\Site\Controllers'], function() {

	Route::get('js/app.js', [
		'as' => 'site.assets.appjs',
		'uses' => 'SiteController@getAppJs',
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

});

\App::missing(function($exception)
{
    $views = \PublicViewDriver::all();
	$styles = [];
	$scripts = [];

	foreach ($views as $index => $view) {
		if (ends_with($view->name, '.js')) {
			$scripts[] = asset('site/' . $view->name);
		}

		if (ends_with($view->name, '.css')) {
			$styles[] = asset('site/' . $view->name);
		}
	}

	return \View::make('site.home', compact('styles', 'scripts'));
});