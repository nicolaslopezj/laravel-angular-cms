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